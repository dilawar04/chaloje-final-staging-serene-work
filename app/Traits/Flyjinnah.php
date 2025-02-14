<?php

namespace App\Traits;
use App\Booking;
use Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use SimpleXMLElement;

trait Flyjinnah
{    

    //Documentation:  https://connectpoint.radixx.com/goldrelease/webframe.html#Sample%20XML%20Requests%20&%20Responses.html
    //Flow:  https://connectpoint.radixx.com/goldrelease/webframe.html#topic5.html
    private static $credential;
    public static $search = "/(\<|\/+)\w\:/m";
    public static $replace = "$1";

    public static function SetCredentialFlyJinnah() {
        $OPT = json_decode(opt('flyjinnah'), 1);
        $mode = $OPT['mode'];
        $crd = [
            "URL" => !empty($OPT[$mode]['URL']) ? $OPT[$mode]['URL'] : "https://9p6.isaaviations.com/webservices/services/AAResWebServices",
            //?wsdl
            'AGENT_CODE' => $OPT[$mode]['AGENT_CODE'],
            'USERNAME' => $OPT[$mode]['USERNAME'],
            'PASSWORD' => $OPT[$mode]['PASSWORD'],
            'Target' => strtolower($mode),
            'TerminalID' => $OPT[$mode]['TerminalID'],
            'Version' => $OPT[$mode]['Version'],
            'Payment_CompanyName' => $OPT[$mode]['Payment_CompanyName'],
        ];
        //dd($crd);
        self::$credential = $crd;
    }

    public static function parseXMLFlyJinnah($xml) {
        $clean_xml = str_ireplace(['soap:', 'ns1:', 'ns2:', '@attributes'], ['', '', '', 'attributes'], $xml);
        return simplexml_load_string($clean_xml);
    }

    public function OTA_ReadRQ($response = []) {
        self::SetCredentialFlyJinnah();
        $booking = Booking::find($response['booking_id']);
        $body = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                    <soap:Header>
                        <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" soap:mustUnderstand="1">
                            <wsse:UsernameToken xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd" wsu:Id="UsernameToken-17855236">
                                <wsse:Username>'.self::$credential['USERNAME'].'</wsse:Username>
                                <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">'.self::$credential['PASSWORD'].'</wsse:Password>
                            </wsse:UsernameToken>
                        </wsse:Security>
                    </soap:Header>
                    <soap:Body xmlns:ns1="http://www.isaaviation.com/thinair/webservices/OTA/Extensions/2003/05" xmlns:ns2="http://www.opentravel.org/OTA/2003/05">
                        <ns2:OTA_ReadRQ EchoToken="11868765275150-1300257933" PrimaryLangID="en-us" SequenceNmbr="1" Target="' . self::$credential['Target'] . '" Version="20061.00">
                            <ns2:POS>
                                <ns2:Source TerminalID="'.self::$credential['TerminalID'].'">
                                <ns2:RequestorID ID="'.self::$credential['USERNAME'].'" Type="4"/>
                                <ns2:BookingChannel Type="12"/>
                                </ns2:Source>
                            </ns2:POS>
                            <ns2:ReadRequests>
                                <ns2:ReadRequest>
                                <ns2:UniqueID ID="'.$booking->pnr.'" Type="14"/>
                                </ns2:ReadRequest>
                            </ns2:ReadRequests>
                        </ns2:OTA_ReadRQ>
                        <ns1:AAReadRQExt>
                            <ns1:AALoadDataOptions>
                                <ns1:LoadTravelerInfo>true</ns1:LoadTravelerInfo>
                                <ns1:LoadAirItinery>true</ns1:LoadAirItinery>
                                <ns1:LoadPriceInfoTotals>true</ns1:LoadPriceInfoTotals>
                                <ns1:LoadFullFilment>true</ns1:LoadFullFilment>
                            </ns1:AALoadDataOptions>
                        </ns1:AAReadRQExt>
                    </soap:Body>
                </soap:Envelope>';
        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml'
        ];
        $response = $client->request('POST', self::$credential['URL'], [
            'headers' => $headers,
            'body' => $body
        ]);

        $SetCookie = $response->getHeader('set-cookie');
        // dump($SetCookie);
        // JSESSIONID start
        $JSIDSetCookie = $SetCookie[0];
        $JSIDpattern = '/([^;]+)/';
        preg_match($JSIDpattern, $JSIDSetCookie, $matches);
        $jsessionid = isset($matches[1]) ? $matches[1] : null;

        // JSESSIONID end

        // __Secure-AAID= start 
        $SecureIdSetCookie = $SetCookie[1];
        $SecureIdpattern = '/=([^==;]+)/';
        preg_match($SecureIdpattern, $SecureIdSetCookie, $matches1);
        $SecureID = isset($matches1[1]) ? $matches1[1] : null;
        $Cookie = $jsessionid;
 
        $_xml = $response->getBody()->getContents();
        $xml = self::parseXMLFlyJinnah($_xml);

        $json_data = json_decode(json_encode($xml), 1);
        
        return ['json' => $json_data, 'Cookie' => $jsessionid];
    }


    public function OTA_AirBookModifyRQ($response = []) {

        $OTA_ReadRQ = self::OTA_ReadRQ($response);
        $TransactionIdentifier = $OTA_ReadRQ['json']['Body']['OTA_AirBookRS']['@attributes']['TransactionIdentifier'];
        $Cookie = $OTA_ReadRQ['Cookie'];
        
        self::SetCredentialFlyJinnah();
        
        $booking = Booking::find($response['booking_id']);

        $body = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
                    <soapenv:Header>
                        <ns2:Security xmlns:ns2="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:ns3="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
                            <ns2:UsernameToken ns3:Id="UsernameToken-17855236">
                                <ns2:Username>'.self::$credential['USERNAME'].'</ns2:Username>
                                <ns2:Password>'.self::$credential['PASSWORD'].'</ns2:Password>
                            </ns2:UsernameToken>
                        </ns2:Security>
                    </soapenv:Header>
                    <soapenv:Body>
                        <ns8:OTA_AirBookModifyRQ EchoToken="11868765275150-1300257933" SequenceNmbr="1" TransactionIdentifier="'.$TransactionIdentifier.'" Version="20061.0" xmlns:ns8="http://www.opentravel.org/OTA/2003/05" xmlns="http://www.isaaviation.com/thinair/webservices/api/airinventory" xmlns:ns2="http://www.isaaviation.com/thinair/webservices/api/airreservation" xmlns:ns4="http://www.isaaviation.com/thinair/webservices/api/commons" xmlns:ns3="http://www.isaaviation.com/thinair/webservices/api/airschedules" xmlns:ns5="http://www.isaaviation.com/thinair/webservices/api/eticketupdate" xmlns:ns6="http://www.isaaviation.com/thinair/webservices/api/updatepfs" xmlns:ns7="http://www.isaaviation.com/thinair/webservices/OTA/Extensions/2003/05">
                            <ns8:POS>
                                <ns8:Source>
                                <ns8:RequestorID ID="'.self::$credential['USERNAME'].'" Type="4"/>
                                <ns8:BookingChannel Type="12"/>
                                </ns8:Source>
                            </ns8:POS>
                            <ns8:AirBookModifyRQ ModificationType="9">
                                <ns8:Fulfillment>
                                <ns8:PaymentDetails>
                                    <ns8:PaymentDetail>
                                        <ns8:DirectBill>
                                            <ns8:CompanyName Code="'.self::$credential['AGENT_CODE'].'"/>
                                        </ns8:DirectBill>
                                        <ns8:PaymentAmount Amount="'.$booking->total_amount.'" CurrencyCode="PKR" DecimalPlaces="2"/>
                                    </ns8:PaymentDetail>
                                </ns8:PaymentDetails>
                                </ns8:Fulfillment>
                                <ns8:BookingReferenceID ID="'.$booking->pnr.'" Type="14"/>
                            </ns8:AirBookModifyRQ>
                        </ns8:OTA_AirBookModifyRQ>
                        <ns7:AAAirBookModifyRQExt xmlns:ns7="http://www.isaaviation.com/thinair/webservices/OTA/Extensions/2003/05" xmlns="http://www.isaaviation.com/thinair/webservices/api/airinventory" xmlns:ns2="http://www.isaaviation.com/thinair/webservices/api/airreservation" xmlns:ns4="http://www.isaaviation.com/thinair/webservices/api/commons" xmlns:ns3="http://www.isaaviation.com/thinair/webservices/api/airschedules" xmlns:ns5="http://www.isaaviation.com/thinair/webservices/api/eticketupdate" xmlns:ns6="http://www.isaaviation.com/thinair/webservices/api/updatepfs" xmlns:ns8="http://www.opentravel.org/OTA/2003/05">
                            <ns7:AALoadDataOptions>
                                <ns7:LoadTravelerInfo>true</ns7:LoadTravelerInfo>
                                <ns7:LoadAirItinery>true</ns7:LoadAirItinery>
                                <ns7:LoadPriceInfoTotals>true</ns7:LoadPriceInfoTotals>
                                <ns7:LoadFullFilment>true</ns7:LoadFullFilment>
                            </ns7:AALoadDataOptions>
                        </ns7:AAAirBookModifyRQExt>
                    </soapenv:Body>
                </soapenv:Envelope>';
        // exit;
        $client = new Client();
        $headers = [
            'Cookie' => $Cookie,
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'modifyReservation'
        ];
        $response = $client->request('POST', self::$credential['URL'], [
            'headers' => $headers,
            'body' => $body
        ]);

        $_xml = $response->getBody()->getContents();
        $xml = self::parseXMLFlyJinnah($_xml);

        $json_data = json_decode(json_encode($xml), 1);
    }

}