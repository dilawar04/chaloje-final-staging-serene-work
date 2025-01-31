<?php

namespace App\Http\Controllers\Api;

use App\Helpers\HBL;
use function App\Helpers\callAPI;
use function App\Helpers\recParamsEncryption;
use Illuminate\Support\Facades\Session;


class PaymentController extends Controller
{
    private static $credential;

    public function __construct()
    {

    }

    public static function set_credential()
    {
        $OPT = json_decode(opt('hblgateway'), 1);
        $mode = $OPT['mode'];
        $crd = $OPT[$mode];
        $crd['MODE'] = $mode;

        self::$credential = $crd;
    }

    public static function hbl($booking_id, $retry = false)
    {
        self::set_credential();
        // dd($booking_id);
        // dd(\req('booking_id'));
        $data = null;

        if (\request()->has('retry')) {
            $booking_id = \req('booking_id');
            $retry = \req('retry');

            $data = \DB::table('payment_details')
                ->where(['order_number' => $booking_id])
                ->first();
        }

        $name = $retry ? $data->name : req('name');
        $email = $retry ? $data->email : req('email');
        $phone = $retry ? $data->phone : req('phone');
        $city = $retry ? $data->city : req('city');
        $state = $retry ? $data->state : req('state');
        $country = $retry ? $data->state : req('country');
        $surname = $retry ? $data->surname : req('surname');
        $postalCode = $retry ? $data->postalCode : req('postalCode');
        $addressLine = $retry ? $data->addressLine : req('addressLine');


        $bookings = \DB::table('booking')->where(['order_id' => $booking_id])->get();
        // dd($bookings);
        if ($bookings[1]) {
            $booking = $bookings[0];
        } else {
            $bookings = \App\Booking::with('details')->where('order_id', $booking_id)->first();
            $booking = $bookings;
        }
        // dd($booking);
        $summary = json_decode($booking->summary);
        // dump(json_decode($bookings[0]->summary));
        $InboundSummary = json_decode($bookings[1]->summary);
        // dd($bookings[1]->total_amount);
        $OrderSummaryDescription = [];
        foreach ($summary as $item) {
            // dd($item);
            // dd($item->price);
            if($item->label == 'ADULT'){
                $item->price = $item->price + $InboundSummary[0]->price;
            }
            if($item->label == 'CHILD'){
                $item->price = $item->price + $InboundSummary[1]->price;
            }
            if($item->label == 'INFANT'){
                $item->price = $item->price + $InboundSummary[2]->price;
            }
            if ($item->quantity > 0) {
                $OrderSummaryDescription[] = [
                    'ITEM_NAME' => $item->label,
                    'QUANTITY' => intval($item->quantity),
                    'UNIT_PRICE' => number_format($item->price, 2, '.', ''),
                    // 'UNIT_PRICE' => "5.00",
                    'OLD_PRICE' => 0,
                    'CATEGORY' => "{$item->label} Category",
                    'SUB_CATEGORY' => "{$item->label} Sub Category",
                ];
            }
        }
        $order = [
            'DISCOUNT_ON_TOTAL' => number_format(floatval($booking->discount)),
            'SUBTOTAL' => $booking->total_amount + $bookings[1]->total_amount,
            // 'SUBTOTAL' => 5,
            'OrderSummaryDescription' => $OrderSummaryDescription
        ];

        $merchant_fields = [
            'MDD1' => 'WC',
            'MDD2' => 'YES',
            'MDD4' => 'Chaloje Travel & Tour',
            'MDD9' => 12,
            'MDD10' => $booking->flight_type,
            'MDD11' => $booking->itinerary,
            'MDD12' => 'NO',
            'MDD20' => 'NO'
        ];
        $customer_id = mt_rand(1000000, 9999999);
        $reference_number = $booking_id;


        $data = [
            'USER_ID' => self::$credential['USER_ID'],
            'PASSWORD' => self::$credential['PASSWORD'],
            'CLIENT_NAME' => self::$credential['CLIENT_NAME'],
            'CHANNEL' => self::$credential['CHANNEL'],

            'RETURN_URL' => web_url('payment-methods/hbl/success'),
            'CANCEL_URL' => web_url('payment-methods/hbl/failed'),
            //            'RETURN_URL' => url('api/payment/status/success'),
//            'CANCEL_URL' => url('api/payment/status/failed'),
            'TYPE_ID' => '0',
            'ORDER' => $order,
            'SHIPPING_DETAIL' => [
                'NAME' => 'DHL SERVICE',
                'ICON_PATH' => null,
                'DELIEVERY_DAYS' => '7',
                'SHIPPING_COST' => '0',
            ],
            'ADDITIONAL_DATA' => [
                'REFERENCE_NUMBER' => $reference_number,
                'CUSTOMER_ID' => $customer_id,
                'CURRENCY' => 'PKR',
                'BILL_TO_FORENAME' => $name,
                'BILL_TO_SURNAME' => $surname,
                'BILL_TO_EMAIL' => $email,
                'BILL_TO_PHONE' => $phone,
                'BILL_TO_ADDRESS_LINE' => $addressLine,
                'BILL_TO_ADDRESS_STATE' => $state,
                'BILL_TO_ADDRESS_CITY' => $city,
                'BILL_TO_ADDRESS_POSTAL_CODE' => $postalCode,
                'BILL_TO_ADDRESS_COUNTRY' => $country,
                'MerchantFields' => $merchant_fields,
            ],
        ];

        //dd($data);

        $hbl = new HBL();

        $public_key = self::$credential['public_key'];
        $arrJson = json_encode(recParamsEncryption($data, $hbl, $public_key));

        //$url = 'https://testpaymentapi.hbl.com/hblpay/api/checkout';
        //Live
        $url = self::$credential['URL'] . "api/checkout";

        $jsonCyberSourceResult = json_decode(callAPI('POST', $url, $arrJson), true);
        //dd($url, $data, $jsonCyberSourceResult, json_encode($data));
        // dd($jsonCyberSourceResult, $summary,$data);
        // exit();

        if ($jsonCyberSourceResult['IsSuccess'] && $jsonCyberSourceResult['ResponseMessage'] == 'Success' || $jsonCyberSourceResult['ResponseMessage'] == 'Successful transaction' && $jsonCyberSourceResult['ResponseCode'] == 0) {
            $sessionId = base64_encode($jsonCyberSourceResult['Data']['SESSION_ID']);

            //$url =  "https://testpaymentapi.hbl.com/HBLPay/Site/index.html#/checkout?data=" . $sessionId;
            $url = self::$credential['URL'] . "site/index.html#/checkout?data=" . $sessionId;
            return ["url" => $url, "status" => true];

            //return "https://testpaymentapi.hbl.com/HBLPay/Site/index.html#/checkout?data=" . $sessionId;

        } else {
            return ["error" => 'Incorrect Information', "status" => false];
        }

        // return ['data' => $payment_data, "status" => true];

    }

    public static function hbl_status($status = '')
    {

        $encryptedData = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        // $newData = self::hbl()->$jsonCyberSourceResult;
        // dump($newData);
        // @mail("zaynsaeed365@gmail.com", 'HBL RESPONSE', $newData);
        $encryptedData = str_replace('data=', '', $encryptedData);
        $url_params = self::decryptData($encryptedData);
        $splitToArray = explode('&', $url_params);
        //echo "<pre>"; print_r($splitToArray); echo "</pre>";
        $responseCode = str_replace('RESPONSE_CODE=', '', $splitToArray[0]);
        $responseMsg = str_replace('RESPONSE_MESSAGE=', '', $splitToArray[1]);
        $orderRefNumber = str_replace('ORDER_REF_NUMBER=', '', $splitToArray[2]);

        if ($status == 'failed') {
            $response = ['message' => $responseMsg, 'code' => $responseCode, 'Order_Ref_Number' => $orderRefNumber, 'status' => false];
        } else if ($status == 'success') {
            $paymentType = str_replace('PAYMENT_TYPE=', '', $splitToArray[3]);
            $response = ['message' => $responseMsg, 'code' => $responseCode, 'Order_Ref_Number' => $orderRefNumber, 'Payment_Type' => $paymentType, 'status' => true];
        } else {
            $response = ['message' => 'some error has occurred please try again', 'status' => false];
        }
      
        if(\Request::ajax()){
            return $response;
        } else {
            return $response;
            if($response['status']) {
                \Redirect::to(web_url('thank-you?' . http_build_query($response)));
            } else {
                \Redirect::to(web_url('booking-fail?' . http_build_query($response)));
            }
        }
    }

    public static function decryptData($data)
    {
        self::set_credential();
       
       $privatePEMKey= self::$credential['private_key'];
       
       
        $DECRYPT_BLOCK_SIZE = 512;
        $decrypted = '';

        $data = str_split(base64_decode($data), $DECRYPT_BLOCK_SIZE);
        foreach ($data as $chunk) {
            $partial = '';

            $decryptionOK = openssl_private_decrypt($chunk, $partial, $privatePEMKey, OPENSSL_PKCS1_PADDING);

            if ($decryptionOK === false) {
                $decrypted = '';
                return $decrypted;
            }
            $decrypted .= $partial;
        }

        return utf8_decode($decrypted);
    }

    public function payment_details()
    {

        $data = DB_FormFields('payment_details');
        // dd($data['table']);
        $booking_id = \req('order_number');
        // dd($booking_id);
        save($data['table'], $data['data']);

        return self::hbl($booking_id);
    }
}