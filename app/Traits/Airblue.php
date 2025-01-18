<?php

namespace App\Traits;
use App\Booking;
use Illuminate\Http\Request;
use Http;

trait Airblue
{
    private static $credential;
    
    public static function set_credential()
    {
        $OPT = json_decode(opt('airblue'), 1);
        $mode = $OPT['mode'];
        $crd = [
            "URL" => !empty($OPT[$mode]['URL']) ? $OPT[$mode]['URL'] : "https://otatest.zapways.com/v2.0/OTAAPI.asmx",
            'ID' => $OPT[$mode]['ID'],
            'Password' => $OPT[$mode]['Password'],
            'Target' => $OPT[$mode]['Target'],
            'key' => $OPT[$mode]['key'],
            'Type' => $OPT[$mode]['Type'],
            'Version' => $OPT[$mode]['Version'],
        ];
        self::$credential = $crd;
    }

    public  function AirDemandTicket($response = []){
        self::set_credential();
        $booking = Booking::find($response['Order_Ref_Number']);
        $data = json_decode($booking->booking_summary);
        $params = $data->data->AirReservation->BookingReferenceID[1];
        $totalfare = $data->data->AirReservation->PriceInfo->ItinTotalFare->TotalFare->_Amount;
        $xml = "<Envelope xmlns='http://schemas.xmlsoap.org/soap/envelope/'>
                <Header/>
                <Body>
                    <AirDemandTicket xmlns='http://zapways.com/air/ota/2.0'>
                        <airDemandTicketRQ Target='". self::$credential['Target'] ."' Version='". self::$credential['Version'] ."' xmlns='http://www.opentravel.org/OTA/2003/05'>
                        <POS>
                            <Source ERSP_UserID='". self::$credential['key'] ."'>
                                <RequestorID Type='". self::$credential['Type'] ."' ID='". self::$credential['ID'] ."' MessagePassword='". self::$credential['Password'] ."'/>
                            </Source>
                        </POS>
                            <DemandTicketDetail>
                                <BookingReferenceID Instance='".$params->_Instance."' ID='".$params->_ID."'></BookingReferenceID>
                                <PaymentInfo PaymentType='".$params->_Type."' CurrencyCode='PKR' Amount='".$totalfare."'></PaymentInfo>
                            </DemandTicketDetail>
                        </airDemandTicketRQ>
                    </AirDemandTicket>
                </Body>
            </Envelope>";   

        $xmlresponse = Http::withHeaders(['Content-Type' => 'application/xml'])->send('POST', 'https://api.chaloje.businessfuelprovider.com/api?url=' . self::$credential['URL'], ['body' => $xml]);
            
        $isResponseSuccess = array_key_exists('Success', $xmlresponse['json']['Envelope']['Body']['AirDemandTicketResponse']['AirDemandTicketResult']);

        // if ($isResponseSuccess) {
            // return view('themes.chaloge.pages.thankyou')->with(compact('response'));
        // }
    }
}