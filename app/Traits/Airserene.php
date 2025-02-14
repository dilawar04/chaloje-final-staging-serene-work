<?php

namespace App\Traits;
use App\Booking;
use Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use SimpleXMLElement;
use App\Utils\SignatureUtil;


trait Airserene
{    

    private static $credential;
    public static $search = "/(\<|\/+)\w\:/m";
    public static $replace = "$1";

    public static function SetCredential()
    {
        $OPT = json_decode(opt('airserene'), 1);
        $mode = $OPT['mode'];
        $crd = [
            'CarrierCode' => $OPT[$mode]['CarrierCode'],
            'EndPoint' => $OPT[$mode]['EndPoint'],
            'IP' => $OPT[$mode]['IP'],
            'AuthAppID' => $OPT[$mode]['AuthAppID'],
            'AuthUserID' => $OPT[$mode]['AuthUserID'],
            'AuthTktdeptid' => $OPT[$mode]['AuthTktdeptid'],
            'SignatureKey' => $OPT[$mode]['SignatureKey'],
            'Token' => $OPT[$mode]['Token'],
            'PlannedActiveTime' => $OPT[$mode]['PlannedActiveTime'],
            'Username' => $OPT[$mode]['Username'],
        ];
        //dd($crd);
        self::$credential = $crd;
    }

    public static function parseXML($xml)
    {
        $clean_xml = str_replace('htt//', 'http://', preg_replace(self::$search, self::$replace, $xml));
        $xml = simplexml_load_string($clean_xml);
        return json_decode(json_encode($xml));
    }

    public  function SerenePaymentMethod($response = [],$params = []) {
        
        self::SetCredential();

        $client = new Client();

        // MakeSigningKey
        $booking = Booking::find($response['booking_id']);
        // dd($booking);
        $json_data = json_decode($booking->flight_summary);
        $FirstTimestamp = $json_data->outbound->flight->TimeStamp;
        if($FirstTimestamp) {
            $FirstTimestamp = $json_data->outbound->flight->TimeStamp;
        }else {
            $FirstTimestamp = $json_data->inbound->flight->TimeStamp;
        }

        $ServiceName = "NDC_ORDERCHANGE_SERVICE";
        $AuthUserID = self::$credential['AuthUserID'];
        $AuthAppID = self::$credential['AuthAppID'];
        $Version = "20.1";
        $Language = "en_US";
        $Timestamp = $FirstTimestamp;
        $TimeZone = "+00:00";
        $ClientIP = self::$credential['IP'];
        $ContentType = "application/xml;charset=UTF-8";

    
        $Body = '<IATA_OrderChangeRQ xmlns="http://www.iata.org/IATA/2015/00/2020.1/IATA_OrderChangeRQ">
                    <Party>
                        <Sender>
                            <MarketingCarrier>
                                <AirlineDesigCode>ER</AirlineDesigCode>
                            </MarketingCarrier>
                        </Sender>
                    </Party>
                    <Request>
                        <Order>
                            <OrderID>'.$booking->pnr.'</OrderID>
                            <OwnerCode>ER</OwnerCode>
                        </Order>
                        <PaymentFunctions>
                            <PaymentProcessingDetails>
                                <Amount CurCode="PKR">'.$booking->total_amount.'</Amount>
                                <PaymentMethod>
                                    <OtherPaymentMethod>
                                        <Remark>
                                            <RemarkText>Balance</RemarkText>
                                        </Remark>
                                    </OtherPaymentMethod>
                                </PaymentMethod>
                                <TypeCode>AgentAccount</TypeCode>
                            </PaymentProcessingDetails>
                        </PaymentFunctions>
                    </Request>
                </IATA_OrderChangeRQ>';
                // dd($Body);

        $minifiedBody = preg_replace('/\s+/', ' ', $Body);
        $Body = str_replace('> <', '><', $minifiedBody);

        $Signature_String = $AuthAppID . "|" . $AuthUserID . "|" . $ServiceName . "|" . $Language . "|" . $AuthAppID . "|" . $Timestamp . "|" . $Body . "|" . $Version . "|" . $ClientIP;

        $signature_key = self::$credential['SignatureKey'];
    
        $signature = SignatureUtil::newEncodeSHA($Signature_String, $signature_key);
        
        $signature = htmlspecialchars($signature);

        $headers = [
            'ServiceName' => 'NDC_ORDERCHANGE_SERVICE',
            'AuthUserID' => self::$credential['AuthUserID'],
            'AuthAppID' => self::$credential['AuthAppID'],
            'AuthTktdeptid' => self::$credential['AuthTktdeptid'],
            'Version' => '20.1',
            'Language' => 'en_US',
            // 'Token' => 'CHALOJE',
            'Timestamp' => $Timestamp,
            'TimeZone' => '+00:00',
            'ClientIP' => self::$credential['IP'],
            'Content-Type' => 'application/xml;charset=UTF-8',
            'Sign' => $signature,
        ];

        // dump($headers);
        // dump($Body);

        $response = $client->request('POST', self::$credential['EndPoint'], [
            'headers' => $headers,
            'body' => $Body
        ]);

        $xml = $response->getBody()->getContents();
        // dump($xml);
        $json_data = self::parseXML($xml);
        // dd($json_data);

        \File::put( "{$action}-RS.xml", $xml);


        if (isset($json_data->Response->Order->OrderID)) {
            return [
                'data' => $json_data,
                'status' => true
            ];
        } else {
            return [
                'data' => $json_data,
                'status' => false
            ];
        }

    }
    

}