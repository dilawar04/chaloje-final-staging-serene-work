<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;
use App\Utils\SignatureUtil;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;


class FlightController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public static $credential = [
        "URL" => "https://9p6.isaaviations.com/webservices/services/AAResWebServices",
        //?wsdl
        'AGENT_CODE' => 'AAAKHI5033',
        'USERNAME' => 'CHALOJETRAVEL9P',
        'PASSWORD' => "pass1234",
        'Target' => "test",
        'TerminalID' => "TestUser/Test Runner",
        'Payment_CompanyName' => "AAAKHI5033",
    ];

    public static function set_credential()
    {
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
    public function index()
    {
        $row = \App\Project::where(['status' => 'Active'])->limit(1)->first();
        $blocks = \App\ProjectBlock::where(['project_id' => $row->id, 'status' => 'Active'])->get();

        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('projects.index', compact('row', 'blocks'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public static function parseXML($xml)
    {
        //$clean_xml = str_replace('htt//', 'http://', preg_replace(self::$search, self::$replace, $xml));
        $clean_xml = str_ireplace(['soap:', 'ns1:', 'ns2:', '@attributes'], ['', '', '', 'attributes'], $xml);
        return simplexml_load_string($clean_xml);
    }

    public static function testingserenee(){
        
        // Including SignatureUtil Logic
        $ServiceName = "NDC_AIRSHOPPING_SERVICE";
        $AuthUserID = "CHALOJE";
        $AuthAppID = "CHALOJE";
        $Version = "20.1";
        $Language = "en_US";
        $Timestamp = "20250106133112222";
        $TimeZone = "+00:00";
        $ClientIP = "127.0.0.1";
        $ContentType = "application/xml;charset=UTF-8";
    
        $Body = '<IATA_AirShoppingRQ xmlns="http://www.iata.org/IATA/2015/00/2020.1/IATA_AirShoppingRQ"><Party><Sender><Aggregator><AggregatorID>CHALOJE</AggregatorID></Aggregator></Sender></Party><Request><ShoppingCriteria><FlightCriteria><FlightCharacteristicsCriteria><PrefLevel><PrefContextText>OUTBOUND</PrefContextText></PrefLevel></FlightCharacteristicsCriteria></FlightCriteria></ShoppingCriteria><FlightRequest><OriginDestCriteria><OriginDepCriteria><IATA_LocationCode>KHI</IATA_LocationCode><Date>2025-01-28</Date></OriginDepCriteria><DestArrivalCriteria><IATA_LocationCode>ISB</IATA_LocationCode></DestArrivalCriteria></OriginDestCriteria></FlightRequest><ResponseParameters><CurParameter><RequestedCurCode>PKR</RequestedCurCode></CurParameter></ResponseParameters><Paxs><Pax><PaxID>PAX1</PaxID><PTC>ADT</PTC></Pax></Paxs></Request></IATA_AirShoppingRQ>';
    
        // Corrected Signature String
        $Signature_String = $AuthAppID . "|" . $AuthUserID . "|" . $ServiceName . "|" . $Language . "|" . $AuthAppID . "|" . $Timestamp . "|" . $Body . "|" . $Version . "|" . $ClientIP;
    
        echo "Signature String: " . htmlspecialchars($Signature_String) . '<br>';
    
        // Replace 'your_signature_key' with your actual signature key
        $signature_key = 'cmop8Betyf7HuBDiu176L6niwnRntYd8';
    
        // Generate the signature using SignatureUtil
        $signature = SignatureUtil::newEncodeSHA($Signature_String, $signature_key);
    
        echo "Generated Signature: " . htmlspecialchars($signature);
    }
    
    public static function testingsereneereq(){
        
        $client = new Client();

        $headers = [
            'ServiceName' => 'NDC_AIRSHOPPING_SERVICE',
            'AuthUserID' => 'CHALOJE',
            'AuthAppID' => 'CHALOJE',
            'AuthTktdeptid' => 'OT11521',
            'Version' => '20.1',
            'Language' => 'en_US',
            // 'Token' => 'CHALOJE',
            'Timestamp' => '20250106133112222',
            'TimeZone' => '+00:00',
            'ClientIP' => '127.0.0.1',
            'Content-Type' => 'application/xml;charset=UTF-8',
            'Sign' => '5jvqOYEL2vTD9lJxiwIFpC8v4w+NQH/2deKI1O4kStE='
        ];
    
        $body = '<IATA_AirShoppingRQ xmlns="http://www.iata.org/IATA/2015/00/2020.1/IATA_AirShoppingRQ"><Party><Sender><Aggregator><AggregatorID>CHALOJE</AggregatorID></Aggregator></Sender></Party><Request><ShoppingCriteria><FlightCriteria><FlightCharacteristicsCriteria><PrefLevel><PrefContextText>OUTBOUND</PrefContextText></PrefLevel></FlightCharacteristicsCriteria></FlightCriteria></ShoppingCriteria><FlightRequest><OriginDestCriteria><OriginDepCriteria><IATA_LocationCode>KHI</IATA_LocationCode><Date>2025-01-28</Date></OriginDepCriteria><DestArrivalCriteria><IATA_LocationCode>ISB</IATA_LocationCode></DestArrivalCriteria></OriginDestCriteria></FlightRequest><ResponseParameters><CurParameter><RequestedCurCode>PKR</RequestedCurCode></CurParameter></ResponseParameters><Paxs><Pax><PaxID>PAX1</PaxID><PTC>ADT</PTC></Pax></Paxs></Request></IATA_AirShoppingRQ>';
        // dd($body);
        // exit; 
        // $client = new Client();

        
        $response = $client->request('POST', 'https://uater.quickprs.com/api/ndcServlet', [
            'headers' => $headers,
            'body' => $body
        ]);
        // dd($response);
        $xml = $response->getBody()->getContents();
        dd($xml);
        exit;
        if(req('c')){
            \File::put( "{$action}-RS.txt", $xml);
        }

        $json_data = self::parseXML($xml);
        dd($json_data);
        exit;

        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"}->SecurityToken;
    }

    public static function PRICE_REQ_FOR_GETTING_BAGGAGES($FlyjinnahOutbound, $FlyjinnahInbound, $type, $flight)
    {
        $Passengers = [
            'ADT' => $flight->travelers->AdultNo,
            'CHD' => $flight->travelers->ChildNo,
            'INF' => $flight->travelers->InfantNo,
        ];

        self::set_credential();

        if($type == 'outbound' && $FlyjinnahOutbound->airline == 'fly-jinnah') {
            $FlightNo = $FlyjinnahOutbound->flight->FLIGHT_NO;
            $RPH = $FlyjinnahOutbound->flight->RPH;    

            $ArrivalDate = $FlyjinnahOutbound->flight->ARRIVAL_DATE.'T'.$FlyjinnahOutbound->flight->ARRIVAL_TIME;
            $DepartureDate = $FlyjinnahOutbound->flight->DEPARTURE_DATE.'T'.$FlyjinnahOutbound->flight->DEPARTURE_TIME;
            
            $Identifier = $FlyjinnahOutbound->flight->TransactionIdentifier;
            $Cookie = $FlyjinnahOutbound->flight->Cookie;

            $Orgn = $FlyjinnahOutbound->flight->ORGN;
            $Dest = $FlyjinnahOutbound->flight->DEST;

        }
        
        if($type == 'inbound' && $FlyjinnahInbound->airline == 'fly-jinnah') {
            $FlightNo = $FlyjinnahInbound->flight->FLIGHT_NO;
            $RPH = $FlyjinnahInbound->flight->RPH;    

            $ArrivalDate = $FlyjinnahInbound->flight->ARRIVAL_DATE.'T'.$FlyjinnahInbound->flight->ARRIVAL_TIME;
            $DepartureDate = $FlyjinnahInbound->flight->DEPARTURE_DATE.'T'.$FlyjinnahInbound->flight->DEPARTURE_TIME;
            
            $Identifier = $FlyjinnahInbound->flight->TransactionIdentifier;
            $Cookie = $FlyjinnahInbound->flight->Cookie;

            $Orgn = $FlyjinnahInbound->flight->ORGN;
            $Dest = $FlyjinnahInbound->flight->DEST;

        }
        
        $DirectionInd = 'OneWay'; 


        $body = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
            <soap:Header>
                <wsse:Security soap:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
                    <wsse:UsernameToken wsu:Id="UsernameToken-17855236" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
                        <wsse:Username>'.self::$credential['USERNAME'].'</wsse:Username>
                        <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">'.self::$credential['PASSWORD'].'</wsse:Password>
                    </wsse:UsernameToken>
                </wsse:Security>
            </soap:Header>
            <soap:Body xmlns:ns2="http://www.opentravel.org/OTA/2003/05">
                <ns2:OTA_AirPriceRQ EchoToken="11868765275150-1300257933" PrimaryLangID="en-us" SequenceNmbr="1" Target="live" TransactionIdentifier="'.$Identifier.'" Version="20061.00">
                    <ns2:POS>
                        <ns2:Source TerminalID="'.self::$credential['USERNAME'].'">
                            <ns2:RequestorID ID="'.self::$credential['USERNAME'].'" Type="4" />
                            <ns2:BookingChannel Type="12" />
                        </ns2:Source>
                    </ns2:POS>
                    <ns2:AirItinerary DirectionInd="'.$DirectionInd.'">
                        <ns2:OriginDestinationOptions>';
                            $body .= '<ns2:OriginDestinationOption>
                                <ns2:FlightSegment ArrivalDateTime="'.$ArrivalDate.'" DepartureDateTime="'.$DepartureDate.'" FlightNumber="'.$FlightNo.'" RPH="'.$RPH.'">
                                    <ns2:DepartureAirport LocationCode="'.$Orgn.'" Terminal="'.self::$credential['USERNAME'].'" />
                                    <ns2:ArrivalAirport LocationCode="'.$Dest.'" Terminal="'.self::$credential['USERNAME'].'" />
                                </ns2:FlightSegment>
                            </ns2:OriginDestinationOption>';

                        $body .= '</ns2:OriginDestinationOptions>
                    </ns2:AirItinerary>
                    <ns2:TravelerInfoSummary>
                        <ns2:AirTravelerAvail>';
                            
                            foreach ($Passengers as $Passenger => $Key) {
                                if($Key > 0){
                                    $body .= '<ns2:PassengerTypeQuantity Code="'.$Passenger.'" Quantity="'.$Key.'" />';
                                }
                            }  
                            

                        $body .='</ns2:AirTravelerAvail>
                    </ns2:TravelerInfoSummary>
                </ns2:OTA_AirPriceRQ>
            </soap:Body>
        </soap:Envelope>';
        // dump('OTA_AirPriceRQWithoutBundleId',$body);
        // dd($body);
        // exit;

        $url = 'https://reservations.flyjinnah.com/webservices/services/AAResWebServices';
        $client = new Client();

        $headers = [
            'Cookie' => $Cookie,
            'Content-Type' => 'text/xml',
        ];
        
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'body' => $body,
        ]);
        $_xml = $response->getBody()->getContents();
        
        $xml = self::parseXML($_xml);
        
        return $json_data = json_decode(json_encode($xml));
    }

    public static function PRICE_REQ_FOR_BAGGAGE_APPLYING($FlyjinnahOutbound, $FlyjinnahInbound, $flight, $type, $FlyjinnahOutboundGettingBundleServiceId, $FlyjinnahInboundGettingBundleServiceId)
    {

        $Passengers = [
            'ADT' => $flight->travelers->AdultNo,
            'CHD' => $flight->travelers->ChildNo,
            'INF' => $flight->travelers->InfantNo,
        ];

        self::set_credential();

        if($type == 'outbound' && $FlyjinnahOutbound->airline == 'fly-jinnah') {
            $FlightNo = $FlyjinnahOutbound->flight->FLIGHT_NO;
            $RPH = $FlyjinnahOutbound->flight->RPH;    

            $ArrivalDate = $FlyjinnahOutbound->flight->ARRIVAL_DATE.'T'.$FlyjinnahOutbound->flight->ARRIVAL_TIME;
            $DepartureDate = $FlyjinnahOutbound->flight->DEPARTURE_DATE.'T'.$FlyjinnahOutbound->flight->DEPARTURE_TIME;
            
            $Identifier = $FlyjinnahOutbound->flight->TransactionIdentifier;
            $Cookie = $FlyjinnahOutbound->flight->Cookie;

            $Orgn = $FlyjinnahOutbound->flight->ORGN;
            $Dest = $FlyjinnahOutbound->flight->DEST;


        }
        
        if($type == 'inbound' && $FlyjinnahInbound->airline == 'fly-jinnah') {
            $FlightNo = $FlyjinnahInbound->flight->FLIGHT_NO;
            $RPH = $FlyjinnahInbound->flight->RPH;    

            $ArrivalDate = $FlyjinnahInbound->flight->ARRIVAL_DATE.'T'.$FlyjinnahInbound->flight->ARRIVAL_TIME;
            $DepartureDate = $FlyjinnahInbound->flight->DEPARTURE_DATE.'T'.$FlyjinnahInbound->flight->DEPARTURE_TIME;
            
            $Identifier = $FlyjinnahInbound->flight->TransactionIdentifier;
            $Cookie = $FlyjinnahInbound->flight->Cookie;

            $Orgn = $FlyjinnahInbound->flight->ORGN;
            $Dest = $FlyjinnahInbound->flight->DEST;
        
        }
        
        $DirectionInd = 'OneWay'; 

        $body = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
            <soap:Header>
                <wsse:Security soap:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
                    <wsse:UsernameToken wsu:Id="UsernameToken-17855236" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
                        <wsse:Username>'.self::$credential['USERNAME'].'</wsse:Username>
                        <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">'.self::$credential['PASSWORD'].'</wsse:Password>
                    </wsse:UsernameToken>
                </wsse:Security>
            </soap:Header>
            <soap:Body xmlns:ns2="http://www.opentravel.org/OTA/2003/05">
                <ns2:OTA_AirPriceRQ EchoToken="11868765275150-1300257933" PrimaryLangID="en-us" SequenceNmbr="1" Target="live" TransactionIdentifier="'.$Identifier.'" Version="20061.00">
                    <ns2:POS>
                        <ns2:Source TerminalID="'.self::$credential['USERNAME'].'">
                            <ns2:RequestorID ID="'.self::$credential['USERNAME'].'" Type="4" />
                            <ns2:BookingChannel Type="12" />
                        </ns2:Source>
                    </ns2:POS>
                    <ns2:AirItinerary DirectionInd="'.$DirectionInd.'">
                        <ns2:OriginDestinationOptions>';

                        $body .= '<ns2:OriginDestinationOption>
                                <ns2:FlightSegment ArrivalDateTime="'.$ArrivalDate.'" DepartureDateTime="'.$DepartureDate.'" FlightNumber="'.$FlightNo.'" RPH="'.$RPH.'">
                                    <ns2:DepartureAirport LocationCode="'.$Orgn.'" Terminal="'.self::$credential['USERNAME'].'" />
                                    <ns2:ArrivalAirport LocationCode="'.$Dest.'" Terminal="'.self::$credential['USERNAME'].'" />
                                </ns2:FlightSegment>
                            </ns2:OriginDestinationOption>';

                        $body .= '</ns2:OriginDestinationOptions>
                    </ns2:AirItinerary>
                    <ns2:TravelerInfoSummary>
                        <ns2:AirTravelerAvail>';

                        foreach ($Passengers as $Passenger => $Key) {
                            if($Key > 0){
                                $body .= '<ns2:PassengerTypeQuantity Code="'.$Passenger.'" Quantity="'.$Key.'" />';
                            }
                        }  

                        $body .= '</ns2:AirTravelerAvail>
                    </ns2:TravelerInfoSummary>
                    <ns2:BundledServiceSelectionOptions>';

                    if($type == 'outbound' && $FlyjinnahOutbound->airline == 'fly-jinnah') {
                        $body .= '<ns2:OutBoundBunldedServiceId>'.$FlyjinnahOutboundGettingBundleServiceId.'</ns2:OutBoundBunldedServiceId>
                                    <ns2:InBoundBunldedServiceId>null</ns2:InBoundBunldedServiceId>';
                    }
                    if($type == 'inbound' && $FlyjinnahInbound->airline == 'fly-jinnah') {
                        $body .= '<ns2:OutBoundBunldedServiceId>'.$FlyjinnahInboundGettingBundleServiceId.'</ns2:OutBoundBunldedServiceId>
                                    <ns2:InBoundBunldedServiceId>null</ns2:InBoundBunldedServiceId>';
                    }

                    $body .= '</ns2:BundledServiceSelectionOptions>
                </ns2:OTA_AirPriceRQ>
            </soap:Body>
        </soap:Envelope>';
        // dump('BundledServiceSelectionOptions',$body);
        // dd($body);
        // exit;


        $url = 'https://reservations.flyjinnah.com/webservices/services/AAResWebServices';
        $client = new Client();

        $headers = [
            'Cookie' => $Cookie,
            'Content-Type' => 'text/xml',
        ];
        
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'body' => $body,
        ]);
        $_xml = $response->getBody()->getContents();
        
        $xml = self::parseXML($_xml);
        // dd($xml);
        // dump('PRICE_REQ_FOR_BAGGAGE_APPLYING',$xml);
        // exit;
        return $json_data = json_decode(json_encode($xml));
    }

    public static function BAGGAGE_DETAILS_REQUEST_GET($FlyjinnahOutbound, $FlyjinnahInbound, $flight, $type)
    {

        self::set_credential();

        if($type == 'outbound' && $FlyjinnahOutbound->airline == 'fly-jinnah') {
            $FlightNo = $FlyjinnahOutbound->flight->FLIGHT_NO;
            $RPH = $FlyjinnahOutbound->flight->RPH;    

            $ArrivalDate = $FlyjinnahOutbound->flight->ARRIVAL_DATE.'T'.$FlyjinnahOutbound->flight->ARRIVAL_TIME;
            $DepartureDate = $FlyjinnahOutbound->flight->DEPARTURE_DATE.'T'.$FlyjinnahOutbound->flight->DEPARTURE_TIME;
            
            $Identifier = $FlyjinnahOutbound->flight->TransactionIdentifier;
            $Cookie = $FlyjinnahOutbound->flight->Cookie;

            $Orgn = $FlyjinnahOutbound->flight->ORGN;
            $Dest = $FlyjinnahOutbound->flight->DEST;


        }
        
        if($type == 'inbound' && $FlyjinnahInbound->airline == 'fly-jinnah') {
            $FlightNo = $FlyjinnahInbound->flight->FLIGHT_NO;
            $RPH = $FlyjinnahInbound->flight->RPH;    

            $ArrivalDate = $FlyjinnahInbound->flight->ARRIVAL_DATE.'T'.$FlyjinnahInbound->flight->ARRIVAL_TIME;
            $DepartureDate = $FlyjinnahInbound->flight->DEPARTURE_DATE.'T'.$FlyjinnahInbound->flight->DEPARTURE_TIME;
            
            $Identifier = $FlyjinnahInbound->flight->TransactionIdentifier;
            $Cookie = $FlyjinnahInbound->flight->Cookie;

            $Orgn = $FlyjinnahInbound->flight->ORGN;
            $Dest = $FlyjinnahInbound->flight->DEST;
        
        }
        

        $body = '<?xml version="1.0" encoding="UTF-8"?>
                    <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                        xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                        <soap:Header>
                            <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" soap:mustUnderstand="1">
                                <wsse:UsernameToken xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd" wsu:Id="UsernameToken-17855236">
                                    <wsse:Username>'.self::$credential['USERNAME'].'</wsse:Username>
                                    <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">'.self::$credential['PASSWORD'].'</wsse:Password>
                                </wsse:UsernameToken>
                            </wsse:Security>
                        </soap:Header>
                        <soap:Body xmlns:ns="http://www.opentravel.org/OTA/2003/05">
                            <ns:AA_OTA_AirBaggageDetailsRQ EchoToken="11868765275150-1300257933" PrimaryLangID="en-us" SequenceNmbr="1" TransactionIdentifier="'.$Identifier.'" Version="20061.00">
                                <ns:POS>
                                    <ns:Source TerminalID="'.self::$credential['USERNAME'].'">
                                        <ns:RequestorID ID="'.self::$credential['USERNAME'].'" Type="4"/>
                                        <ns:BookingChannel Type="12"/>
                                    </ns:Source>
                                </ns:POS>
                                <ns:BaggageDetailsRequests>';

                                    $body .= '<ns:BaggageDetailsRequest>
                                        <ns:FlightSegmentInfo ArrivalDateTime="'.$ArrivalDate.'" DepartureDateTime="'.$DepartureDate.'" FlightNumber="'.$FlightNo.'" RPH="'.$RPH.'" returnFlag="false">
                                            <ns:DepartureAirport LocationCode="'.$Orgn.'" Terminal="'.self::$credential['USERNAME'].'"/>
                                            <ns:ArrivalAirport LocationCode="'.$Dest.'" Terminal="'.self::$credential['USERNAME'].'"/>
                                            <ns:OperatingAirline Code="9P"/>
                                        </ns:FlightSegmentInfo>
                                    </ns:BaggageDetailsRequest>';

                                $body .= '</ns:BaggageDetailsRequests>
                            </ns:AA_OTA_AirBaggageDetailsRQ>
                        </soap:Body>
                    </soap:Envelope>';
        // dump('AA_OTA_AirBaggageDetailsRQ',$body);
        // dd($body);
        // exit;


        $url = 'https://reservations.flyjinnah.com/webservices/services/AAResWebServices';
        $client = new Client();

        $headers = [
            'Cookie' => $Cookie,
            'Content-Type' => 'text/xml',
        ];
        
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'body' => $body,
        ]);
        // dd($response);
        // exit;
        $_xml = $response->getBody()->getContents();
        // dd($_xml);
        $xml = self::parseXML($_xml);
        // dd('AA_OTA_AirBaggageDetailsRQ',$xml);
        // exit;
        return $json_data = json_decode(json_encode($xml));
    }

    public static function SeatMap($FlyjinnahOutbound, $FlyjinnahInbound, $flight, $type)
    {
        
        self::set_credential();

        if($type == 'outbound' && $FlyjinnahOutbound->airline == 'fly-jinnah') {
            $FlightNo = $FlyjinnahOutbound->flight->FLIGHT_NO;
            $RPH = $FlyjinnahOutbound->flight->RPH;    

            $ArrivalDate = $FlyjinnahOutbound->flight->ARRIVAL_DATE.'T'.$FlyjinnahOutbound->flight->ARRIVAL_TIME;
            $DepartureDate = $FlyjinnahOutbound->flight->DEPARTURE_DATE.'T'.$FlyjinnahOutbound->flight->DEPARTURE_TIME;
            
            $Identifier = $FlyjinnahOutbound->flight->TransactionIdentifier;
            $Cookie = $FlyjinnahOutbound->flight->Cookie;

            $Orgn = $FlyjinnahOutbound->flight->ORGN;
            $Dest = $FlyjinnahOutbound->flight->DEST;


        }
        
        if($type == 'inbound' && $FlyjinnahInbound->airline == 'fly-jinnah') {
            $FlightNo = $FlyjinnahInbound->flight->FLIGHT_NO;
            $RPH = $FlyjinnahInbound->flight->RPH;    

            $ArrivalDate = $FlyjinnahInbound->flight->ARRIVAL_DATE.'T'.$FlyjinnahInbound->flight->ARRIVAL_TIME;
            $DepartureDate = $FlyjinnahInbound->flight->DEPARTURE_DATE.'T'.$FlyjinnahInbound->flight->DEPARTURE_TIME;
            
            $Identifier = $FlyjinnahInbound->flight->TransactionIdentifier;
            $Cookie = $FlyjinnahInbound->flight->Cookie;

            $Orgn = $FlyjinnahInbound->flight->ORGN;
            $Dest = $FlyjinnahInbound->flight->DEST;
        
        }
        $DirectionInd = 'OneWay';


        $body = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
            <soap:Header>
                <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" soap:mustUnderstand="1">
                    <wsse:UsernameToken xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd" wsu:Id="UsernameToken-17855236">
                    <wsse:Username>'.self::$credential['USERNAME'].'</wsse:Username>
                    <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">'.self::$credential['PASSWORD'].'</wsse:Password>
                    </wsse:UsernameToken>
                </wsse:Security>
            </soap:Header>
            <soap:Body xmlns:ns="http://www.opentravel.org/OTA/2003/05">
                <ns:OTA_AirSeatMapRQ EchoToken="11868765275150-1300257933" PrimaryLangID="en-us" SequenceNmbr="1" TransactionIdentifier="'.$Identifier.'" Version="20061.00">
                <ns:POS>
                    <ns:Source TerminalID="'.self::$credential['USERNAME'].'">
                    <ns:RequestorID ID="'.self::$credential['USERNAME'].'" Type="4"/>
                    <ns:BookingChannel Type="12"/>
                    </ns:Source>
                </ns:POS>
                <ns:SeatMapRequests>';

                    $body .= '<ns:SeatMapRequest>
                        <ns:FlightSegmentInfo ArrivalDateTime="'.$ArrivalDate.'" DepartureDateTime="'.$DepartureDate.'" FlightNumber="'.$FlightNo.'" RPH="'.$RPH.'">
                        <ns:DepartureAirport LocationCode="'.$Orgn.'"/>
                        <ns:ArrivalAirport LocationCode="'.$Dest.'"/>
                        </ns:FlightSegmentInfo>
                    </ns:SeatMapRequest>';

                $body .= '</ns:SeatMapRequests>
                </ns:OTA_AirSeatMapRQ>
            </soap:Body>
        </soap:Envelope>';
        // dump('seat',$body);
        // exit;

        $url = 'https://reservations.flyjinnah.com/webservices/services/AAResWebServices';
        $client = new Client();

        $headers = [
            'Cookie' => $Cookie,
            'Content-Type' => 'text/xml',
        ];
        
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'body' => $body,
        ]);
        $_xml = $response->getBody()->getContents();
        
        $xml = self::parseXML($_xml);
        // print_r($xml);
        // exit;
        return $json_data = json_decode(json_encode($xml));

    }

    public static function HasMeals($FlyjinnahOutbound, $FlyjinnahInbound, $flight, $type)
    {
        self::set_credential();

        if($type == 'outbound' && $FlyjinnahOutbound->airline == 'fly-jinnah') {
            $FlightNo = $FlyjinnahOutbound->flight->FLIGHT_NO;
            $RPH = $FlyjinnahOutbound->flight->RPH;    

            $ArrivalDate = $FlyjinnahOutbound->flight->ARRIVAL_DATE.'T'.$FlyjinnahOutbound->flight->ARRIVAL_TIME;
            $DepartureDate = $FlyjinnahOutbound->flight->DEPARTURE_DATE.'T'.$FlyjinnahOutbound->flight->DEPARTURE_TIME;
            
            $Identifier = $FlyjinnahOutbound->flight->TransactionIdentifier;
            $Cookie = $FlyjinnahOutbound->flight->Cookie;

            $Orgn = $FlyjinnahOutbound->flight->ORGN;
            $Dest = $FlyjinnahOutbound->flight->DEST;

        }
        
        if($type == 'inbound' && $FlyjinnahInbound->airline == 'fly-jinnah') {
            $FlightNo = $FlyjinnahInbound->flight->FLIGHT_NO;
            $RPH = $FlyjinnahInbound->flight->RPH;    

            $ArrivalDate = $FlyjinnahInbound->flight->ARRIVAL_DATE.'T'.$FlyjinnahInbound->flight->ARRIVAL_TIME;
            $DepartureDate = $FlyjinnahInbound->flight->DEPARTURE_DATE.'T'.$FlyjinnahInbound->flight->DEPARTURE_TIME;
            
            $Identifier = $FlyjinnahInbound->flight->TransactionIdentifier;
            $Cookie = $FlyjinnahInbound->flight->Cookie;

            $Orgn = $FlyjinnahInbound->flight->ORGN;
            $Dest = $FlyjinnahInbound->flight->DEST;
        
        }
        $DirectionInd = 'OneWay';

        $body = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
            <soap:Header>
                <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" soap:mustUnderstand="1">
                    <wsse:UsernameToken xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd" wsu:Id="UsernameToken-17855236">
                    <wsse:Username>'.self::$credential['USERNAME'].'</wsse:Username>
                    <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">'.self::$credential['PASSWORD'].'</wsse:Password>
                    </wsse:UsernameToken>
                </wsse:Security>
            </soap:Header>
        <soap:Body xmlns:ns2="http://www.opentravel.org/OTA/2003/05">
            <ns2:AA_OTA_AirMealDetailsRQ EchoToken="11868765275150-1300257933" PrimaryLangID="en-us" SequenceNmbr="1" TransactionIdentifier="'.$Identifier.'" Version="20061">
        <ns2:POS>
            <ns2:Source TerminalID="'.self::$credential['USERNAME'].'">
                <ns2:RequestorID ID="'.self::$credential['USERNAME'].'" Type="4"/>
                <ns2:BookingChannel Type="12"/>
            </ns2:Source>
        </ns2:POS>
        <ns2:MealDetailsRequests>';

            $body .= '<ns2:MealDetailsRequest>
                <ns2:FlightSegmentInfo ArrivalDateTime="'.$ArrivalDate.'" DepartureDateTime="'.$DepartureDate.'" FlightNumber="'.$FlightNo.'" RPH="'.$RPH.'">
                    <ns2:OperatingAirline/>
                    <ns2:DepartureAirport LocationCode="'.$Orgn.'" Terminal="'.self::$credential['USERNAME'].'"/>
                    <ns2:ArrivalAirport LocationCode="'.$Dest.'" Terminal="'.self::$credential['USERNAME'].'"/>
                </ns2:FlightSegmentInfo>
            </ns2:MealDetailsRequest>';

        $body .= '</ns2:MealDetailsRequests>
        </ns2:AA_OTA_AirMealDetailsRQ>
        </soap:Body>
        </soap:Envelope>';
        // dump('meal',$body);
        // exit;
        $url = 'https://reservations.flyjinnah.com/webservices/services/AAResWebServices';
        $client = new Client();

        $headers = [
            'Cookie' => $Cookie,
            'Content-Type' => 'text/xml',
        ];
        
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'body' => $body,
        ]);
        // dd($response);
        $_xml = $response->getBody()->getContents();
        
        $xml = self::parseXML($_xml);
        // dd($xml);
        return $json_data = json_decode(json_encode($xml));
    }

    public function checkFlight()
    {
        // dd(\request());
        $referer = $_SERVER['HTTP_REFERER'];
        $urlComponents = parse_url($referer);
        parse_str($urlComponents['query'], $queryParams);

        $type = req('type');
        // dump($type);
        if($type == 'outbound'){
            session()->forget('inbound');
            session()->forget('flyjinnahinbound');
            session()->forget('inboundflyjinnahseatavailablity');
            session()->forget('inboundflyjinnahMealavailablity');
            session()->forget('inboundBundlerServiceId');
        }
        
        session()->put($type, req('flight'));
        session()->put('flyjinnah'.$type, req('flight'));
        // dump(session()->get('inbound'));
        // dump(session()->get('flyjinnahinbound'));

        
        $flight = json_decode(session()->get($type));
        // dump($type,$flight);
        $FlyjinnahOutbound = json_decode(session()->get('flyjinnahoutbound'));
        $FlyjinnahInbound = json_decode(session()->get('flyjinnahinbound'));
        // dump($FlyjinnahOutbound);
        // dd($queryParams['ReturningOn']);
        // dump($type);


        if($type == 'outbound' && $FlyjinnahOutbound->airline == 'fly-jinnah') {
            $PRICEREQFORGETTINGBAGGAGESResponse = self::PRICE_REQ_FOR_GETTING_BAGGAGES($FlyjinnahOutbound, $FlyjinnahInbound, $type, $flight);
            // dd($PRICEREQFORGETTINGBAGGAGESResponse);
            $BundledServicesIDs = $PRICEREQFORGETTINGBAGGAGESResponse->Body->OTA_AirPriceRS->PricedItineraries->PricedItinerary->AirItinerary->OriginDestinationOptions->AABundledServiceExt;
            // dd($FlyjinnahOutbound->baggage->title);
            // dd($BundledServicesIDs->bundledService);
            foreach($BundledServicesIDs->bundledService as $BundledServicesID){
                if($FlyjinnahOutbound->baggage->title == $BundledServicesID->bundledServiceName){
                    $FlyjinnahOutboundGettingBundleServiceId = $BundledServicesID->bunldedServiceId;
                }
            }
            if(empty($FlyjinnahOutboundGettingBundleServiceId)){
                $FlyjinnahOutboundGettingBundleServiceId = 'null';
            }

            $PRICE_REQ_FOR_BAGGAGE_APPLYINGResponse = self::PRICE_REQ_FOR_BAGGAGE_APPLYING($FlyjinnahOutbound, $FlyjinnahInbound, $flight, $type, $FlyjinnahOutboundGettingBundleServiceId, $FlyjinnahInboundGettingBundleServiceId);
            $BAGGAGE_DETAILS_REQUEST_GET = self::BAGGAGE_DETAILS_REQUEST_GET($FlyjinnahOutbound, $FlyjinnahInbound, $flight, $type);
            $SeatMapResponse = self::SeatMap($FlyjinnahOutbound, $FlyjinnahInbound, $flight, $type);
            $HasMealsResponse = self::HasMeals($FlyjinnahOutbound, $FlyjinnahInbound, $flight, $type);

            // dump($SeatMapResponse);
            // dd($HasMealsResponse);

            $SeatMapOutboundResponse->Body->OTA_AirSeatMapRS->SeatMapResponses->SeatMapResponse->SeatMapDetails->CabinClass->AirRows->AirRow = $SeatMapResponse->Body->OTA_AirSeatMapRS->SeatMapResponses->SeatMapResponse->SeatMapDetails->CabinClass->AirRows->AirRow;
            $HasMealsOutboundResponse->Body->AA_OTA_AirMealDetailsRS->MealDetailsResponses->MealDetailsResponse->Meal = $HasMealsResponse->Body->AA_OTA_AirMealDetailsRS->MealDetailsResponses->MealDetailsResponse->Meal;

            // dump($SeatMapOutboundResponse);
            // dump($HasMealsOutboundResponse);

            session()->put($type, req('flight'));
            session()->put('flyjinnah'.$type, req('flight'));

            session()->put(['outboundBundlerServiceId' => $FlyjinnahOutboundGettingBundleServiceId]);
            session()->put(['outboundflyjinnahMealavailablity' => $HasMealsOutboundResponse,'outboundflyjinnahseatavailablity' => $SeatMapOutboundResponse]);
            return ['status' => 1];
        }   

        if($type == 'inbound' && $FlyjinnahInbound->airline == 'fly-jinnah') {
            $PRICEREQFORGETTINGBAGGAGESResponse = self::PRICE_REQ_FOR_GETTING_BAGGAGES($FlyjinnahOutbound, $FlyjinnahInbound, $type, $flight);

            $BundledServicesIDs = $PRICEREQFORGETTINGBAGGAGESResponse->Body->OTA_AirPriceRS->PricedItineraries->PricedItinerary->AirItinerary->OriginDestinationOptions->AABundledServiceExt;
            // dd($FlyjinnahOutbound->baggage->title);
            // dd($BundledServicesIDs->bundledService);
            foreach($BundledServicesIDs->bundledService as $BundledServicesID){
                if($FlyjinnahInbound->baggage->title == $BundledServicesID->bundledServiceName){
                    $FlyjinnahInboundGettingBundleServiceId = $BundledServicesID->bunldedServiceId;
                }
            }
            if(empty($FlyjinnahInboundGettingBundleServiceId)){
                $FlyjinnahInboundGettingBundleServiceId = 'null';
            }

            $PRICE_REQ_FOR_BAGGAGE_APPLYINGResponse = self::PRICE_REQ_FOR_BAGGAGE_APPLYING($FlyjinnahOutbound, $FlyjinnahInbound, $flight, $type, $FlyjinnahOutboundGettingBundleServiceId, $FlyjinnahInboundGettingBundleServiceId);
            $BAGGAGE_DETAILS_REQUEST_GET = self::BAGGAGE_DETAILS_REQUEST_GET($FlyjinnahOutbound, $FlyjinnahInbound, $flight, $type);
            $SeatMapResponse = self::SeatMap($FlyjinnahOutbound, $FlyjinnahInbound, $flight, $type);
            $HasMealsResponse = self::HasMeals($FlyjinnahOutbound, $FlyjinnahInbound, $flight, $type);

            $SeatMapInboundResponse->Body->OTA_AirSeatMapRS->SeatMapResponses->SeatMapResponse->SeatMapDetails->CabinClass->AirRows->AirRow = $SeatMapResponse->Body->OTA_AirSeatMapRS->SeatMapResponses->SeatMapResponse->SeatMapDetails->CabinClass->AirRows->AirRow;
            $HasMealsInboundResponse->Body->AA_OTA_AirMealDetailsRS->MealDetailsResponses->MealDetailsResponse->Meal = $HasMealsResponse->Body->AA_OTA_AirMealDetailsRS->MealDetailsResponses->MealDetailsResponse->Meal;
            
            // dump($SeatMapInboundResponse);
            // dump($HasMealsInboundResponse);

            session()->put($type, req('flight'));
            session()->put('flyjinnah'.$type, req('flight'));

            session()->put(['inboundBundlerServiceId' => $FlyjinnahInboundGettingBundleServiceId]);
            session()->put(['inboundflyjinnahMealavailablity' => $HasMealsInboundResponse,'inboundflyjinnahseatavailablity' => $SeatMapInboundResponse]);
            return ['status' => 1];
        }
    }

    public function pdf()
    {
        $id = getUri(3);
        if (!empty($id)) {
            if(is_int($id)){
                $row = \App\Booking::find($id);
            } else {
                $row = \App\Booking::where('pnr', $id)->first();
            }
            if ($row->id <= 0) {
                set_notification('Access forbidden!');
                if (request()->ajax() || request()->is('api/*')) {
                    return api_response(['status' => false, 'message' => join('<br/>', show_validation_errors())]);
                }
                return redirect()->back();// \Redirect::to(admin_url('', true));
            }

        } else {
            set_notification('Invalid URL!');
            if (request()->ajax() || request()->is('api/*')) {
                return api_response(['status' => false, 'message' => join('<br/>', show_validation_errors())]);
            }
            return redirect()->back();// \Redirect::to(admin_url('', true));
        }

        return \App\Booking::pdf_invoice($row->id);
    }


    function ajax($action, $id = null) {

        switch ($action){
            case 'property_status':
                $project_id = req('project_id');
                $block_id = req('block_id');
                $street = req('street');
                $plot = req('plot');
                $ghz = req('ghz');

                $property = \App\ProjectProperty::where(['project_id' => $project_id, 'block_id' => $block_id/*, 'street' => $street*/, 'plot' => $plot, 'category' => $ghz])
                    ->first();

                if($property->id > 0){
                    $block = \App\ProjectBlock::find($block_id);
                    $type = \App\PropertyType::find($property->type_id);
                    $property->type = $type->type;
                    $property->block = $block->title;
                    $featuers = \App\ProjectProperty::featuers($property->id);
                    $property->features = $featuers;
                    $property->extra_cost = (array_sum(array_column($featuers, 'amount')));
                    $property->total_cost = ($property->price + floatval(array_sum(array_column($featuers, 'amount'))));

                    return $property;
                } else {
                    return ['status' => false, 'message' => 'Record not exist'];
                }
                break;
        }
    }
}
