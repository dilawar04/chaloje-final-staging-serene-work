<?php

namespace App;

use GuzzleHttp\Client;
use Http;


class FlyJinnah
{
    //Documentation:  https://connectpoint.radixx.com/goldrelease/webframe.html#Sample%20XML%20Requests%20&%20Responses.html
    //Flow:  https://connectpoint.radixx.com/goldrelease/webframe.html#topic5.html
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

    //public static $search = "/(\<|\/)?\w\:/m";
    public static $search = "/(\<|\/+)\w\:/m";
    public static $replace = "$1";

    public static function parseXML($xml)
    {
        //$clean_xml = str_replace('htt//', 'http://', preg_replace(self::$search, self::$replace, $xml));
        $clean_xml = str_ireplace(['soap:', 'ns1:', 'ns2:', '@attributes'], ['', '', '', 'attributes'], $xml);
        return simplexml_load_string($clean_xml);
    }

    public static function OUTBOUND_PRICE_REQ_GET_ORIGINAL_PRICE($flight, $params, $Passengers, $Cookie, $TransactionIdentifier)
    {
        self::set_credential();
        // dd($flight['ARRIVAL_DATE']);
        $Identifier = $TransactionIdentifier;
       

        $ArrivalDate = $flight['ARRIVAL_DATE'].'T'.$flight['ARRIVAL_TIME'];
        $DepartureDate = $flight['DEPARTURE_DATE'].'T'.$flight['DEPARTURE_TIME'];

       
        $FlyjinnahFlightFlightNo = $flight['FLIGHT_NO'];
        $FlyjinnahFlightRPH = $flight['RPH'];

        $Orgn = $flight['ORGN'];
        $Dest = $flight['DEST'];


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
                    <ns2:AirItinerary DirectionInd="OneWay">
                        <ns2:OriginDestinationOptions>';
                            $body .= '<ns2:OriginDestinationOption>
                                <ns2:FlightSegment ArrivalDateTime="'.$ArrivalDate.'" DepartureDateTime="'.$DepartureDate.'" FlightNumber="'.$FlyjinnahFlightFlightNo.'" RPH="'.$FlyjinnahFlightRPH.'">
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

        return $json_data = json_decode(json_encode($xml), 1);
    } 
    
    public static function INBOUND_PRICE_REQ_GET_ORIGINAL_PRICE($flight, $params, $Passengers, $Cookie, $TransactionIdentifier)
    {
        self::set_credential();
        // dd($flight['ARRIVAL_DATE']);
        $Identifier = $TransactionIdentifier;
       

        $ArrivalDate = $flight['ARRIVAL_DATE'].'T'.$flight['ARRIVAL_TIME'];
        $DepartureDate = $flight['DEPARTURE_DATE'].'T'.$flight['DEPARTURE_TIME'];

       
        $FlyjinnahFlightFlightNo = $flight['FLIGHT_NO'];
        $FlyjinnahFlightRPH = $flight['RPH'];

        $Orgn = $flight['ORGN'];
        $Dest = $flight['DEST'];


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
                    <ns2:AirItinerary DirectionInd="OneWay">
                        <ns2:OriginDestinationOptions>';
                            $body .= '<ns2:OriginDestinationOption>
                                <ns2:FlightSegment ArrivalDateTime="'.$ArrivalDate.'" DepartureDateTime="'.$DepartureDate.'" FlightNumber="'.$FlyjinnahFlightFlightNo.'" RPH="'.$FlyjinnahFlightRPH.'">
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

        return $json_data = json_decode(json_encode($xml), 1);
    } 

    public static function OTA_AirAvailRQ($params = [])
    {
        // dd(request());
        self::set_credential();

        $params = collect([
            "Departure" => request('DepartingOn', date('Y-m-d', strtotime('+0 days'))),
            "Origin" => request('LocationDep', 'KHI'),
            "Destination" => request('LocationArr', 'ISB'),
            //"Return" => true,
            "AdultNo" => request('AdultNo', 1),
            "ChildNo" => request('ChildNo', 0),
            "InfantNo" => request('InfantNo', 0)
        ])->merge($params)->toArray();
        if (is_null($params['Returning'])) {
            unset($params['Returning']);
        }

        $Passengers = [
            'ADT' => \req('AdultNo'),
            'CHD' => \req('ChildNo'),
            'INF' => \req('InfantNo')
        ];
        // dd($params);
        $body = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
        <soap:Header>
            <wsse:Security soap:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
            <wsse:UsernameToken wsu:Id="UsernameToken-17855236" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
                <wsse:Username>' . self::$credential['USERNAME'] . '</wsse:Username>
                <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . self::$credential['PASSWORD'] . '</wsse:Password>
            </wsse:UsernameToken>
            </wsse:Security>
        </soap:Header>
        <soap:Body xmlns:ns2="http://www.opentravel.org/OTA/2003/05">
            <ns2:OTA_AirAvailRQ EchoToken="11868765275150-1300257933" PrimaryLangID="en-us" SequenceNmbr="1" Target="' . self::$credential['Target'] . '" TimeStamp="' . \Carbon\Carbon::now()->format('Y-m-d\TH:i:s') . '" Version="' . self::$credential['Version'] . '">
            <ns2:POS>
                <ns2:Source TerminalID="' . self::$credential['TerminalID'] . '">
                <ns2:RequestorID ID="' . self::$credential['USERNAME'] . '" Type="4" />
                <ns2:BookingChannel Type="12" />
                </ns2:Source>
            </ns2:POS>
            <ns2:OriginDestinationInformation>
                <ns2:DepartureDateTime>' . $params['Departure'] . 'T00:00:00</ns2:DepartureDateTime>
                <ns2:OriginLocation LocationCode="' . $params['Origin'] . '" />
                <ns2:DestinationLocation LocationCode="' . $params['Destination'] . '" />
            </ns2:OriginDestinationInformation>';

                if (!empty($params['Returning'])) {
                    $body .= '<ns2:OriginDestinationInformation>
                <ns2:DepartureDateTime>' . $params['Returning'] . 'T00:00:00</ns2:DepartureDateTime>
                <ns2:OriginLocation LocationCode="' . $params['Destination'] . '" />
                <ns2:DestinationLocation LocationCode="' . $params['Origin'] . '" />
            </ns2:OriginDestinationInformation>';
                }

                $body .= '<ns2:TravelerInfoSummary>
                <ns2:AirTravelerAvail>
                ';
                foreach ($Passengers as $key => $qty) {
                    if ($qty > 0) {
                        $body .= '<ns2:PassengerTypeQuantity Code="' . $key . '" Quantity="' . $qty . '" />' . "\n";
                    }
                }
                $body .= '</ns2:AirTravelerAvail>
            </ns2:TravelerInfoSummary>
            </ns2:OTA_AirAvailRQ>
        </soap:Body>
        </soap:Envelope>';
        //    dump($body);
        //   exit();
        /*
        <ns2:PassengerTypeQuantity Code="CHD" Quantity="'.$params['ChildNo'].'" />
          <ns2:PassengerTypeQuantity Code="INF" Quantity="'.$params['InfantNo'].'" />
        */

        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'getAvailability',
        ];
        // dump(self::$credential, $headers);
        // die($body);
        if (!req('c')) {
            $response = $client->request('POST', self::$credential['URL'], [
                'headers' => $headers,
                'body' => $body
            ]);
            $_xml = $response->getBody()->getContents();
            file_put_contents(!empty($params['Returning']) ? 'RT-' : '' . 'FJ.xml', $_xml);
        } else {
            $_xml = file_get_contents(!empty($params['Returning']) ? 'RT-' : '' . 'FJ.xml');
        }
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
        // dd($Cookie);


        // dd($SecureID);
        // __Secure-AAID= end

        //die($_xml);

        $xml = self::parseXML($_xml);
        $json_data = json_decode(json_encode($xml), 1);
        // dump($json_data);
        // exit;
        //pre($json_data);
        //$json_data = json_decode(json_encode($xml), JSON_PRETTY_PRINT);
        //return $json_data;

        if (isset($json_data['Body']['OTA_AirAvailRS']['Success'])) {
            $FLIGHTS = [];

            $OriginDestinationInformation = $json_data['Body']['OTA_AirAvailRS']['OriginDestinationInformation'];
            $OriginDestinationInformation = is_array($OriginDestinationInformation['OriginDestinationOptions']) ? $OriginDestinationInformation['OriginDestinationOptions'] : $OriginDestinationInformation;
            // dd($OriginDestinationInformation);
            //dd(self::$credential['Target'] == 'live' ? $OriginDestinationInformation : );
            // dd($OriginDestinationInformation);
            foreach ($OriginDestinationInformation as $i => $info) {
                // dump($info);
                // dd($xml->Body->OTA_AirAvailRS->AAAirAvailRSExt->PricedItineraries->PricedItinerary->AirItineraryPricingInfo->PTC_FareBreakdowns->PTC_FareBreakdown->asXML());
                $TRAVELERS_XML = $xml->Body->OTA_AirAvailRS->AAAirAvailRSExt->PricedItineraries->PricedItinerary->AirItineraryPricingInfo->PTC_FareBreakdowns->PTC_FareBreakdown->asXML();
                $OriginDestination_XML = json_encode($info);
                // dump($TRAVELERS_XML);
                // dump($OriginDestination_XML);
                if (!empty($params['Returning'])) {
                    //$segments = $info['OriginDestinationOptions']['OriginDestinationOption'];
                    $segments = [$info];
                } else {
                    //$segments = [$info['OriginDestinationOptions']['OriginDestinationOption']];
                    $segments = [$info];
                }
                // dd($segments);
                

                foreach ($segments as $seg) {
                    // dd($seg);
                    //dd(self::$credential['Target'] == 'live' ? $seg['OriginDestinationOptions']['OriginDestinationOption']['FlightSegment'] : );
                    $segment = (is_array($seg['FlightSegment']) ? $seg['FlightSegment'] : $seg['OriginDestinationOptions']['OriginDestinationOption']);
                    // dd($segments);
                    if (empty($params['Returning'])) {
                        // SINGLE FLIGHT ARRAY
                        // echo "WORKING";
                        // exit();
                        $FlightSegment = $segment['FlightSegment']['@attributes'];

                    } else {
                        // RETURN FLIGHT ARRAY
                        // echo "WORKING Return";
                        // exit();
                        $FlightSegment = ["outbound" => $segment[0]['FlightSegment'], "inbound" => $segment[1]['FlightSegment']];
                    }
                    // dd($FlightSegment); 
                    $TYPE = (!empty($params['Returning']) && \Carbon\Carbon::parse($FlightSegment['ArrivalDateTime'])->diffInDays(\Carbon\Carbon::parse($params['Returning'])) == 0 ? 'inbound' : 'outbound');
                    // dd($TYPE);
                    // exit;
                    $DURATION = str_replace(['PT', 'M0.000S', 'H'], ['', 'm', 'h '], $FlightSegment['JourneyDuration']); //PT 2H 0M0.000S
                    $TransactionIdentifier = $json_data['Body']['OTA_AirAvailRS']['@attributes']['TransactionIdentifier'];
                    $rules_info = [];
                    // dd($segment['FlightSegment']);
                   
                        // SINGLE FLIGHT DATA
                        // dd($segment);
                    $flight = [
                        'AIRLINE' => 'Fly Jinnah',
                        'AIRLINE_CODE' => "9P",
                        'TYPE' => 'outbound',
                        'FLIGHT_NO' => $FlightSegment['FlightNumber'],
                        'DEPARTURE_DATE' => \Carbon\Carbon::parse($FlightSegment['DepartureDateTime'])->format('Y-m-d'),
                        'DEPARTURE_TIME' => \Carbon\Carbon::parse($FlightSegment['DepartureDateTime'])->format('H:i:s'),
                        'ARRIVAL_DATE' => \Carbon\Carbon::parse($FlightSegment['ArrivalDateTime'])->format('Y-m-d'),
                        'ARRIVAL_TIME' => \Carbon\Carbon::parse($FlightSegment['ArrivalDateTime'])->format('H:i:s'),
                        'JOURNEY_CODE' => $segment['FlightSegment']['DepartureAirport']['@attributes']['LocationCode'] . "-" . $segment['FlightSegment']['ArrivalAirport']['@attributes']['LocationCode'],
                        'TERMINAL' => $segment['FlightSegment'][($TYPE == 'outbound') ? 'DepartureAirport' : 'ArrivalAirport']['@attributes']['Terminal'],
                        'ORGN' => $segment['FlightSegment']['DepartureAirport']['@attributes']['LocationCode'],
                        'DEST' => $segment['FlightSegment']['ArrivalAirport']['@attributes']['LocationCode'],
                        'CURRENCY' => 'PKR',
                        'STOPS' => 0,
                        //'DURATION_MINUTES' => $DURATION,
                        'DURATION' => $DURATION,
                        //'DURATION' => \Carbon\Carbon::parse($DURATION)->format('H') . 'h ' . \Carbon\Carbon::parse($DURATION)->format('i') . 'm',//'02h 00m',
                        'STATUS' => "ONTIME",
                        'RPH' => $FlightSegment['RPH'],
                        'TRAVELERS_XML' => $TRAVELERS_XML,
                        'OriginDestination_XML' => $OriginDestination_XML,
                        'RULES_INFO' => $rules_info,
                        'TransactionIdentifier' => $TransactionIdentifier,
                        'Cookie' => $Cookie,
                    ];
                    // dd($flight);
                    $FARE_PAX_WISE = [];
                    /*if(!empty($params['Returning'])){
                        $segments = $info['OriginDestinationOptions']['OriginDestinationOption'];
                    } else {
                        $segments = [$info['OriginDestinationOptions']['OriginDestinationOption']];
                    }*/
                    
                    $PRICEREQGETORIGINALPRICE = self::OUTBOUND_PRICE_REQ_GET_ORIGINAL_PRICE($flight, $params, $Passengers, $Cookie, $TransactionIdentifier);
                   
                    $PTC_FareBreakdowns = $PRICEREQGETORIGINALPRICE['Body']['OTA_AirPriceRS']['PricedItineraries']['PricedItinerary']['AirItineraryPricingInfo']['PTC_FareBreakdowns'];
                    // dd($json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']);
                    if (!is_array($PTC_FareBreakdowns['PTC_FareBreakdown'][0])) {
                        $PTC_FareBreakdowns['PTC_FareBreakdown'] = [$PTC_FareBreakdowns['PTC_FareBreakdown']];
                    }
                    // dd($PTC_FareBreakdowns);
                    foreach ($PTC_FareBreakdowns['PTC_FareBreakdown'] as $_fare) {

                        $FeeFares = $_fare['PassengerFare']['Fees']['Fee'];
                        $TaxFares = $_fare['PassengerFare']['Taxes']['Tax'];

                        $Fee = 0; 
                        $TAX = 0;
                        foreach ($TaxFares as $taxItem) {
                            $taxAmount = $taxItem['@attributes']['Amount'];
                            $TAX += $taxAmount;
                        }
                        foreach ($FeeFares as $FeeItem) {
                            $FeeAmount = $FeeItem['@attributes']['Amount'];
                            $Fee += $FeeAmount;
                        }

                        $PassengerQty = $_fare['PassengerTypeQuantity']['@attributes']['Quantity'];
                        $PassengerCode = $_fare['PassengerTypeQuantity']['@attributes']['Code'];
                        $PassengerType = 'ADULT';
                        if ($PassengerCode == 'CHD') {
                            $PassengerType = 'CHILD';
                        } else if ($PassengerCode == 'INF') {
                            $PassengerType = 'INFANT';
                        }
                        $TOTAL = $_fare['PassengerFare']['TotalFare']['@attributes']['Amount'];
                        // dd($TOTAL);
                        $FARE = $_fare['PassengerFare']['BaseFare']['@attributes'];
                        $FARE_PAX_WISE[$PassengerType] = [
                            'BASIC_FARE' => floatval($FARE['Amount']),
                            'TAX' => $TAX,
                            'TOTAL' => floatval($TOTAL),
                            // * $PassengerQty,
                            'FEES' => $Fee,
                            'SURCHARGE' => 0,
                        ];
                    }
                    // dd($FARE_PAX_WISE);
                    $M_TOTAL = ($params['AdultNo'] * $FARE_PAX_WISE['ADULT']['TOTAL'] + $params['ChildNo'] * $FARE_PAX_WISE['CHILD']['TOTAL'] + $params['InfantNo'] * $FARE_PAX_WISE['INFANT']['TOTAL']);
                    $TOTAL_BASIC_FARE = ($params['AdultNo'] * $FARE_PAX_WISE['ADULT']['BASIC_FARE'] + $params['ChildNo'] * $FARE_PAX_WISE['CHILD']['BASIC_FARE'] + $params['InfantNo'] * $FARE_PAX_WISE['INFANT']['BASIC_FARE']);
                    // dump($FARE_PAX_WISE);
                    // dump($json_data);
                    // $BaggageRateList = $json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions']['AABundledServiceExt']['bundledService'];
                     
                    //foreach ($json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions'] as $bag) {

                    //$OriginDestinationOptions = $json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions'];
                    if (!empty($params['Returning'])) {
                        $OriginDestinationOptions = $json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions'];
                    } else {
                        $OriginDestinationOptions = [
                            'OriginDestinationOption' => [$json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions']['OriginDestinationOption']],
                            'AABundledServiceExt' => [$json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions']['AABundledServiceExt']]
                        ];
                    }
                    // dd($OriginDestinationOptions);
                    $OriginDestinationOptions = $json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions'];
                    // dd($OriginDestinationOptions);
                    $BAGGAGE_FARE = [];

                    $bag_basic = [
                        'title' => 'Basic',
                        'bundledServiceName' => 'Basic',
                        'no_of_bags' => 0,
                        'weight' => '0 Kg Checked Baggage',
                        'included_services' => 'BAGGAGE, SEAT_MAP, MEAL, FLEXI_CHARGES(Additional Charges if included)',
                        'description' => [ "Flight" => "",
                        "Checked Baggage" => "none"],
                        'bookingClasses' => 'Economy',
                        'TOTAL' => $M_TOTAL,
                        'TOTAL_BASIC_FARE' => $TOTAL_BASIC_FARE,
                        // + $bag['perPaxBundledFee'],
                        'MTOTAL' => ($params['AdultNo'] * $FARE_PAX_WISE['ADULT']['TOTAL'] + $params['ChildNo'] * $FARE_PAX_WISE['CHILD']['TOTAL'] + $params['InfantNo'] * $FARE_PAX_WISE['INFANT']['TOTAL']), 
                        // + $bag['perPaxBundledFee'],
                        'FARE_PAX_WISE' => $FARE_PAX_WISE
                    ];
                    if($OriginDestinationOptions['AABundledServiceExt']['bundledService'][0]){
                        $bag_value_flex = $OriginDestinationOptions['AABundledServiceExt']['bundledService'][0];
                        $bag_ultimate = $OriginDestinationOptions['AABundledServiceExt']['bundledService'][1];    
                        $mergedBages = [$bag_basic,$bag_value_flex, $bag_ultimate];    
                    }else{
                        $TotalBages = $OriginDestinationOptions['AABundledServiceExt']['bundledService'];
                        $mergedBages = [$bag_basic,$TotalBages];    
                    }  
                    // dd($mergedBages[1]['bundledServiceName']);
                    // if($mergedBages[1]['bundledServiceName'] == 'Ultimate') {
                    //     echo 'correct';
                    // }
                    // echo 'wrong';
                    // exit;
                    $BagCounter = 0;

                    foreach ($mergedBages as $bag) {
                        if($bag['bundledServiceName'] == 'Ultimate') {
                            if($BagCounter == '2'){
                                $FARE_PAX_WISE['ADULT']['TOTAL'] -= $mergedBages[$BagCounter-1]['perPaxBundledFee'];
                                $FARE_PAX_WISE['CHILD']['TOTAL'] -= $mergedBages[$BagCounter-1]['perPaxBundledFee'];    
                            }

                            $FARE_PAX_WISE['ADULT']['TOTAL'] += $bag['perPaxBundledFee'];
                            $FARE_PAX_WISE['CHILD']['TOTAL'] += $bag['perPaxBundledFee'];  
                        } 
                        if($bag['bundledServiceName'] == 'Value') {
                            if($BagCounter == '2'){
                                $FARE_PAX_WISE['ADULT']['TOTAL'] -= $mergedBages[$BagCounter-1]['perPaxBundledFee'];
                                $FARE_PAX_WISE['CHILD']['TOTAL'] -= $mergedBages[$BagCounter-1]['perPaxBundledFee'];    
                            }

                            $FARE_PAX_WISE['ADULT']['TOTAL'] += $bag['perPaxBundledFee'];
                            $FARE_PAX_WISE['CHILD']['TOTAL'] += $bag['perPaxBundledFee'];
                        }
                        $BagCounter++;

                        $TOTAL = $params['AdultNo'] * $FARE_PAX_WISE['ADULT']['TOTAL'] + $params['ChildNo'] * $FARE_PAX_WISE['CHILD']['TOTAL'] + $params['InfantNo'] * $FARE_PAX_WISE['INFANT']['TOTAL'];

                        $text = $bag['description'];
                        $lines = explode("\n", $text);
                        $data = [];
                        foreach ($lines as $line) {
                            list($key, $value) = explode(": ", $line, 2);
                            $data[trim($key)] = trim($value);
                        }
                        if ($bag['bundledServiceName'] == 'Value' || $bag['bundledServiceName'] == 'Value Flex') {
                            $weight = '23 Kg Checked Baggage';
                        } elseif ($bag['bundledServiceName'] == 'Ultimate') {
                            $weight = '46 Kg Checked Baggage';
                        } elseif ($bag['bundledServiceName'] == 'Basic') {
                            $weight = '0 Kg Checked Baggage';
                        }     
                        // dd($FARE_PAX_WISE);                     
                        $BAGGAGE_FARE[] = [
                            'title' => $bag['bundledServiceName'],
                            'no_of_bags' => ($bag['bundledServiceName'] == 'Value' ? 1 : ($bag['bundledServiceName'] == 'Extra' ? 2 : 0)),
                            'weight' =>  $weight,
                            'included_services' => join(', ', $bag['includedServies']),
                            'description' => $data,
                            'bookingClasses' => $bag['bookingClasses'],
                            'TOTAL' => $TOTAL,
                            // + $bag['perPaxBundledFee'],
                            'TOTAL_BASIC_FARE' => $TOTAL_BASIC_FARE,
                            'MTOTAL' => $M_TOTAL + $bag['perPaxBundledFee'], 
                            // + $bag['perPaxBundledFee'],
                            'FARE_PAX_WISE' => $FARE_PAX_WISE
                        ];
                    }
                     
                    $flight['BAGGAGE_FARE'] = array_merge_recursive($BAGGAGE_FARE);
                    // dd($flight['BAGGAGE_FARE']);
                    //$flight['xml'] = $_xml;
                    $FLIGHTS[$TYPE][$flight['FLIGHT_NO']] = $flight;
                    // if (!empty($params['Returning'])) {
                    //     $InboundFlight['BAGGAGE_FARE'] = array_merge_recursive($InBoundBAGGAGE_FARE);
                    //     $FLIGHTS['inbound'][$InboundFlight['FLIGHT_NO']] = $InboundFlight;
                    // }
                    // dd($FLIGHTS['inbound'][$InboundFlight['FLIGHT_NO']]);
                    // dump('new--aw',$flight);
                }
            }
             $info = array_map('array_values', $FLIGHTS);
            //  dd($info);
            $FLIGHTS['FLIGHT_FlyJinnah_STATUS'][] = 'Success';
            // dd($FLIGHTS);
            return array_map('array_values', $FLIGHTS);
        } else {
            return [
                'data' => $json_data['Body']['OTA_AirAvailRS']['Errors']['Error']['@attributes']['ShortText'],
                'code' => $json_data['Body']['OTA_AirAvailRS']['Errors']['Error']['@attributes']['Code'],
                'status' => false,
                'FLIGHT_FlyJinnah_STATUS' => 'UnSuccess'
            ];

            //return $json_data['Body']['OTA_AirAvailRS'];
        }
    }
    
    public static function OTA_AirAvailInBoundRQ($params = [])
    {
        // dd(request());
        self::set_credential();

        $params = collect([
            "Departure" => request('ReturningOn', date('Y-m-d', strtotime('+0 days'))),
            "Origin" => request('LocationArr'),
            "Destination" => request('LocationDep'),
            //"Return" => true,
            "AdultNo" => request('AdultNo', 1),
            "ChildNo" => request('ChildNo', 0),
            "InfantNo" => request('InfantNo', 0)
        ])->merge($params)->toArray();
        if (is_null($params['Returning'])) {
            unset($params['Returning']);
        }

        $Passengers = [
            'ADT' => \req('AdultNo'),
            'CHD' => \req('ChildNo'),
            'INF' => \req('InfantNo')
        ];
        // dd($params);
        $body = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
        <soap:Header>
            <wsse:Security soap:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
            <wsse:UsernameToken wsu:Id="UsernameToken-17855236" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
                <wsse:Username>' . self::$credential['USERNAME'] . '</wsse:Username>
                <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . self::$credential['PASSWORD'] . '</wsse:Password>
            </wsse:UsernameToken>
            </wsse:Security>
        </soap:Header>
        <soap:Body xmlns:ns2="http://www.opentravel.org/OTA/2003/05">
            <ns2:OTA_AirAvailRQ EchoToken="11868765275150-1300257933" PrimaryLangID="en-us" SequenceNmbr="1" Target="' . self::$credential['Target'] . '" TimeStamp="' . \Carbon\Carbon::now()->format('Y-m-d\TH:i:s') . '" Version="' . self::$credential['Version'] . '">
            <ns2:POS>
                <ns2:Source TerminalID="' . self::$credential['TerminalID'] . '">
                <ns2:RequestorID ID="' . self::$credential['USERNAME'] . '" Type="4" />
                <ns2:BookingChannel Type="12" />
                </ns2:Source>
            </ns2:POS>
            <ns2:OriginDestinationInformation>
                <ns2:DepartureDateTime>' . $params['Departure'] . 'T00:00:00</ns2:DepartureDateTime>
                <ns2:OriginLocation LocationCode="' . $params['Origin'] . '" />
                <ns2:DestinationLocation LocationCode="' . $params['Destination'] . '" />
            </ns2:OriginDestinationInformation>';

                if (!empty($params['Returning'])) {
                    $body .= '<ns2:OriginDestinationInformation>
                <ns2:DepartureDateTime>' . $params['Returning'] . 'T00:00:00</ns2:DepartureDateTime>
                <ns2:OriginLocation LocationCode="' . $params['Destination'] . '" />
                <ns2:DestinationLocation LocationCode="' . $params['Origin'] . '" />
            </ns2:OriginDestinationInformation>';
                }

                $body .= '<ns2:TravelerInfoSummary>
                <ns2:AirTravelerAvail>
                ';
                foreach ($Passengers as $key => $qty) {
                    if ($qty > 0) {
                        $body .= '<ns2:PassengerTypeQuantity Code="' . $key . '" Quantity="' . $qty . '" />' . "\n";
                    }
                }
                $body .= '</ns2:AirTravelerAvail>
            </ns2:TravelerInfoSummary>
            </ns2:OTA_AirAvailRQ>
        </soap:Body>
        </soap:Envelope>';
        //    dump($body);
        //   exit();
        /*
        <ns2:PassengerTypeQuantity Code="CHD" Quantity="'.$params['ChildNo'].'" />
          <ns2:PassengerTypeQuantity Code="INF" Quantity="'.$params['InfantNo'].'" />
        */

        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'getAvailability',
        ];
        // dump(self::$credential, $headers);
        // die($body);
        if (!req('c')) {
            $response = $client->request('POST', self::$credential['URL'], [
                'headers' => $headers,
                'body' => $body
            ]);
            $_xml = $response->getBody()->getContents();
            file_put_contents(!empty($params['Returning']) ? 'RT-' : '' . 'FJ.xml', $_xml);
        } else {
            $_xml = file_get_contents(!empty($params['Returning']) ? 'RT-' : '' . 'FJ.xml');
        }
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
        // dump($Cookie);


        // dd($SecureID);
        // __Secure-AAID= end

        //die($_xml);

        $xml = self::parseXML($_xml);
        $json_data = json_decode(json_encode($xml), 1);
        // dump($json_data);
        // exit;
        //pre($json_data);
        //$json_data = json_decode(json_encode($xml), JSON_PRETTY_PRINT);
        //return $json_data;

        if (isset($json_data['Body']['OTA_AirAvailRS']['Success'])) {
            $FLIGHTS = [];

            $OriginDestinationInformation = $json_data['Body']['OTA_AirAvailRS']['OriginDestinationInformation'];
            $OriginDestinationInformation = is_array($OriginDestinationInformation['OriginDestinationOptions']) ? $OriginDestinationInformation['OriginDestinationOptions'] : $OriginDestinationInformation;
            // dd($OriginDestinationInformation);
            //dd(self::$credential['Target'] == 'live' ? $OriginDestinationInformation : );
            foreach ($OriginDestinationInformation as $i => $info) {

                $TRAVELERS_XML = $xml->Body->OTA_AirAvailRS->AAAirAvailRSExt->PricedItineraries->PricedItinerary->AirItineraryPricingInfo->PTC_FareBreakdowns->PTC_FareBreakdown->asXML();
                $OriginDestination_XML = json_encode($info);
                if (!empty($params['Returning'])) {
                    //$segments = $info['OriginDestinationOptions']['OriginDestinationOption'];
                    $segments = [$info];
                } else {
                    //$segments = [$info['OriginDestinationOptions']['OriginDestinationOption']];
                    $segments = [$info];
                }
                // dd($segments);

                foreach ($segments as $seg) {
                    // dd($seg);
                    //dd(self::$credential['Target'] == 'live' ? $seg['OriginDestinationOptions']['OriginDestinationOption']['FlightSegment'] : );
                    $segment = (is_array($seg['FlightSegment']) ? $seg['FlightSegment'] : $seg['OriginDestinationOptions']['OriginDestinationOption']);
                    // dd($segments);
                    if (empty($params['Returning'])) {
                        // SINGLE FLIGHT ARRAY
                        // echo "WORKING";
                        // exit();
                        $FlightSegment = $segment['FlightSegment']['@attributes'];

                    } else {
                        // RETURN FLIGHT ARRAY
                        // echo "WORKING Return";
                        // exit();
                        $FlightSegment = ["outbound" => $segment[0]['FlightSegment'], "inbound" => $segment[1]['FlightSegment']];
                    }
                    // dd($FlightSegment); 
                    $TYPE = (!empty($params['Returning']) && \Carbon\Carbon::parse($FlightSegment['ArrivalDateTime'])->diffInDays(\Carbon\Carbon::parse($params['Returning'])) == 0 ? 'inbound' : 'outbound');
                    // dd($TYPE);
                    // exit;
                    $DURATION = str_replace(['PT', 'M0.000S', 'H'], ['', 'm', 'h '], $FlightSegment['JourneyDuration']); //PT 2H 0M0.000S
                    $TransactionIdentifier = $json_data['Body']['OTA_AirAvailRS']['@attributes']['TransactionIdentifier'];
                    $rules_info = [];
                    // dd($segment['FlightSegment']);
                   
                        // SINGLE FLIGHT DATA
                        // dd($segment);
                    $flight = [
                        'AIRLINE' => 'Fly Jinnah',
                        'AIRLINE_CODE' => "9P",
                        'TYPE' => 'inbound',
                        'FLIGHT_NO' => $FlightSegment['FlightNumber'],
                        'DEPARTURE_DATE' => \Carbon\Carbon::parse($FlightSegment['DepartureDateTime'])->format('Y-m-d'),
                        'DEPARTURE_TIME' => \Carbon\Carbon::parse($FlightSegment['DepartureDateTime'])->format('H:i:s'),
                        'ARRIVAL_DATE' => \Carbon\Carbon::parse($FlightSegment['ArrivalDateTime'])->format('Y-m-d'),
                        'ARRIVAL_TIME' => \Carbon\Carbon::parse($FlightSegment['ArrivalDateTime'])->format('H:i:s'),
                        'JOURNEY_CODE' => $segment['FlightSegment']['DepartureAirport']['@attributes']['LocationCode'] . "-" . $segment['FlightSegment']['ArrivalAirport']['@attributes']['LocationCode'],
                        'TERMINAL' => $segment['FlightSegment'][($TYPE == 'outbound') ? 'DepartureAirport' : 'ArrivalAirport']['@attributes']['Terminal'],
                        'ORGN' => $segment['FlightSegment']['DepartureAirport']['@attributes']['LocationCode'],
                        'DEST' => $segment['FlightSegment']['ArrivalAirport']['@attributes']['LocationCode'],
                        'CURRENCY' => 'PKR',
                        'STOPS' => 0,
                        //'DURATION_MINUTES' => $DURATION,
                        'DURATION' => $DURATION,
                        //'DURATION' => \Carbon\Carbon::parse($DURATION)->format('H') . 'h ' . \Carbon\Carbon::parse($DURATION)->format('i') . 'm',//'02h 00m',
                        'STATUS' => "ONTIME",
                        'RPH' => $FlightSegment['RPH'],
                        'TRAVELERS_XML' => $TRAVELERS_XML,
                        'OriginDestination_XML' => $OriginDestination_XML,
                        'RULES_INFO' => $rules_info,
                        'TransactionIdentifier' => $TransactionIdentifier,
                        'Cookie' => $Cookie,
                    ];
                    // dd($flight);
                    $FARE_PAX_WISE = [];
                    /*if(!empty($params['Returning'])){
                        $segments = $info['OriginDestinationOptions']['OriginDestinationOption'];
                    } else {
                        $segments = [$info['OriginDestinationOptions']['OriginDestinationOption']];
                    }*/

                    $PRICEREQGETORIGINALPRICE = self::INBOUND_PRICE_REQ_GET_ORIGINAL_PRICE($flight, $params, $Passengers, $Cookie, $TransactionIdentifier);

                    $PTC_FareBreakdowns = $PRICEREQGETORIGINALPRICE['Body']['OTA_AirPriceRS']['PricedItineraries']['PricedItinerary']['AirItineraryPricingInfo']['PTC_FareBreakdowns'];
                    // dd($json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']);
                    if (!is_array($PTC_FareBreakdowns['PTC_FareBreakdown'][0])) {
                        $PTC_FareBreakdowns['PTC_FareBreakdown'] = [$PTC_FareBreakdowns['PTC_FareBreakdown']];
                    }
                    // dd($PTC_FareBreakdowns);
                    foreach ($PTC_FareBreakdowns['PTC_FareBreakdown'] as $_fare) {
                        // dd($_fare);
                        $FeeFares = $_fare['PassengerFare']['Fees']['Fee'];
                        $TaxFares = $_fare['PassengerFare']['Taxes']['Tax'];

                        $Fee = 0; 
                        $TAX = 0;
                        foreach ($TaxFares as $taxItem) {
                            $taxAmount = $taxItem['@attributes']['Amount'];
                            $TAX += $taxAmount;
                        }
                        foreach ($FeeFares as $FeeItem) {
                            $FeeAmount = $FeeItem['@attributes']['Amount'];
                            $Fee += $FeeAmount;
                        }
                        // dd($_fare);
                        // dump($Fee);
                        // dd($TAX);
                        $PassengerQty = $_fare['PassengerTypeQuantity']['@attributes']['Quantity'];
                        $PassengerCode = $_fare['PassengerTypeQuantity']['@attributes']['Code'];
                        $PassengerType = 'ADULT';
                        if ($PassengerCode == 'CHD') {
                            $PassengerType = 'CHILD';
                        } else if ($PassengerCode == 'INF') {
                            $PassengerType = 'INFANT';
                        }
                        $TOTAL = $_fare['PassengerFare']['TotalFare']['@attributes']['Amount'];
                        // dd($TOTAL);
                        $FARE = $_fare['PassengerFare']['BaseFare']['@attributes'];
                        $FARE_PAX_WISE[$PassengerType] = [
                            'BASIC_FARE' => floatval($FARE['Amount']),
                            'TAX' => $TAX,
                            'TOTAL' => floatval($TOTAL),
                            // * $PassengerQty,
                            'FEES' => $Fee,
                            'SURCHARGE' => 0,
                        ];
                    }
                    // dd($FARE_PAX_WISE);
                    $M_TOTAL = ($params['AdultNo'] * $FARE_PAX_WISE['ADULT']['TOTAL'] + $params['ChildNo'] * $FARE_PAX_WISE['CHILD']['TOTAL'] + $params['InfantNo'] * $FARE_PAX_WISE['INFANT']['TOTAL']);
                    $TOTAL = $json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItineraryPricingInfo']['ItinTotalFare']['TotalFare']['@attributes']['Amount'];
                    $TOTAL_BASIC_FARE = ($params['AdultNo'] * $FARE_PAX_WISE['ADULT']['BASIC_FARE'] + $params['ChildNo'] * $FARE_PAX_WISE['CHILD']['BASIC_FARE'] + $params['InfantNo'] * $FARE_PAX_WISE['INFANT']['BASIC_FARE']);
                    // dump($FARE_PAX_WISE);
                    // dump($json_data);
                    // $BaggageRateList = $json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions']['AABundledServiceExt']['bundledService'];
                     
                    //foreach ($json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions'] as $bag) {

                    //$OriginDestinationOptions = $json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions'];
                    if (!empty($params['Returning'])) {
                        $OriginDestinationOptions = $json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions'];
                    } else {
                        $OriginDestinationOptions = [
                            'OriginDestinationOption' => [$json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions']['OriginDestinationOption']],
                            'AABundledServiceExt' => [$json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions']['AABundledServiceExt']]
                        ];
                    }
                    // dd($OriginDestinationOptions);
                    $OriginDestinationOptions = $json_data['Body']['OTA_AirAvailRS']['AAAirAvailRSExt']['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions'];
                    $BAGGAGE_FARE = []; 

                        $bag_basic = [
                            'title' => 'Basic',
                            'bundledServiceName' => 'Basic',
                            'no_of_bags' => 0,
                            'weight' => '0 Kg Checked Baggage',
                            'included_services' => 'BAGGAGE, SEAT_MAP, MEAL, FLEXI_CHARGES(Additional Charges if included)',
                            'description' => [ "Flight" => "",
                            "Checked Baggage" => "none"],
                            'bookingClasses' => 'Economy',
                            'TOTAL' => $M_TOTAL,
                            'TOTAL_BASIC_FARE' => $TOTAL_BASIC_FARE,
                            // + $bag['perPaxBundledFee'],
                            'MTOTAL' => ($params['AdultNo'] * $FARE_PAX_WISE['ADULT']['TOTAL'] + $params['ChildNo'] * $FARE_PAX_WISE['CHILD']['TOTAL'] + $params['InfantNo'] * $FARE_PAX_WISE['INFANT']['TOTAL']), 
                            // + $bag['perPaxBundledFee'],
                            'FARE_PAX_WISE' => $FARE_PAX_WISE
                        ];
                        if($OriginDestinationOptions['AABundledServiceExt']['bundledService'][0]){
                            $bag_value_flex = $OriginDestinationOptions['AABundledServiceExt']['bundledService'][0];
                            $bag_ultimate = $OriginDestinationOptions['AABundledServiceExt']['bundledService'][1];    
                            $mergedBages = [$bag_basic,$bag_value_flex, $bag_ultimate];    
                        }else{
                            $TotalBages = $OriginDestinationOptions['AABundledServiceExt']['bundledService'];
                            $mergedBages = [$bag_basic,$TotalBages];    
                        }   
                        // dd($mergedBages);
                        $BagCounter = 0;
    
                        foreach ($mergedBages as $bag) {

                            if($bag['bundledServiceName'] == 'Ultimate') {
                            
                                if($BagCounter == '2'){
                                    $FARE_PAX_WISE['ADULT']['TOTAL'] -= $mergedBages[$BagCounter-1]['perPaxBundledFee'];
                                    $FARE_PAX_WISE['CHILD']['TOTAL'] -= $mergedBages[$BagCounter-1]['perPaxBundledFee'];    
                                }
    
                                $FARE_PAX_WISE['ADULT']['TOTAL'] += $bag['perPaxBundledFee'];
                                $FARE_PAX_WISE['CHILD']['TOTAL'] += $bag['perPaxBundledFee'];  
                                // dd($FARE_PAX_WISE);                          
                            } elseif($bag['bundledServiceName'] == 'Value') {
                                
                                if($BagCounter == '2'){
                                    $FARE_PAX_WISE['ADULT']['TOTAL'] -= $mergedBages[$BagCounter-1]['perPaxBundledFee'];
                                    $FARE_PAX_WISE['CHILD']['TOTAL'] -= $mergedBages[$BagCounter-1]['perPaxBundledFee'];    
                                }
    
                                $FARE_PAX_WISE['ADULT']['TOTAL'] += $bag['perPaxBundledFee'];
                                $FARE_PAX_WISE['CHILD']['TOTAL'] += $bag['perPaxBundledFee'];
                                // dd($FARE_PAX_WISE);
                            }
                            $BagCounter++;


                            $TOTAL = $params['AdultNo'] * $FARE_PAX_WISE['ADULT']['TOTAL'] + $params['ChildNo'] * $FARE_PAX_WISE['CHILD']['TOTAL'] + $params['InfantNo'] * $FARE_PAX_WISE['INFANT']['TOTAL'];

                            $text = $bag['description'];
                            $lines = explode("\n", $text);
                            $data = [];
                            foreach ($lines as $line) {
                                list($key, $value) = explode(": ", $line, 2);
                                $data[trim($key)] = trim($value);
                            }
                            if ($bag['bundledServiceName'] == 'Value' || $bag['bundledServiceName'] == 'Value Flex') {
                                $weight = '23 Kg Checked Baggage';
                            } elseif ($bag['bundledServiceName'] == 'Ultimate') {
                                $weight = '46 Kg Checked Baggage';
                            } elseif ($bag['bundledServiceName'] == 'Basic') {
                                $weight = '0 Kg Checked Baggage';
                            }                          
                            $BAGGAGE_FARE[] = [
                                'title' => $bag['bundledServiceName'],
                                'no_of_bags' => ($bag['bundledServiceName'] == 'Value' ? 1 : ($bag['bundledServiceName'] == 'Extra' ? 2 : 0)),
                                'weight' =>  $weight,
                                'included_services' => join(', ', $bag['includedServies']),
                                'description' => $data,
                                'bookingClasses' => $bag['bookingClasses'],
                                'TOTAL' => $TOTAL,
                                // + $bag['perPaxBundledFee'],
                                'TOTAL_BASIC_FARE' => $TOTAL_BASIC_FARE,
                                'MTOTAL' => $M_TOTAL + $bag['perPaxBundledFee'], 
                                // + $bag['perPaxBundledFee'],
                                'FARE_PAX_WISE' => $FARE_PAX_WISE
                            ];
                        }
                    $flight['BAGGAGE_FARE'] = array_merge_recursive($BAGGAGE_FARE);
                    // dd($flight['BAGGAGE_FARE']);
                    //$flight['xml'] = $_xml;
                    $FLIGHTS['inbound'][$flight['FLIGHT_NO']] = $flight;
                    // if (!empty($params['Returning'])) {
                    //     $InboundFlight['BAGGAGE_FARE'] = array_merge_recursive($InBoundBAGGAGE_FARE);
                    //     $FLIGHTS['inbound'][$InboundFlight['FLIGHT_NO']] = $InboundFlight;
                    // }
                    // dd($FLIGHTS['inbound'][$InboundFlight['FLIGHT_NO']]);
                    // dump('new--aw',$flight);
                }
            }
             $info = array_map('array_values', $FLIGHTS);
            //  dd($info);
            $FLIGHTS['FLIGHT_FlyJinnah_STATUS'][] = 'Success';
            // dd($FLIGHTS);
            return array_map('array_values', $FLIGHTS);
        } else {
            return [
                'data' => $json_data['Body']['OTA_AirAvailRS']['Errors']['Error']['@attributes']['ShortText'],
                'code' => $json_data['Body']['OTA_AirAvailRS']['Errors']['Error']['@attributes']['Code'],
                'status' => false,
                'FLIGHT_FlyJinnah_STATUS' => 'UnSuccess'
            ];

            //return $json_data['Body']['OTA_AirAvailRS'];
        }
    }

    public static function OTA_AirPriceRQ($params = [], $flight)
    {
        self::set_credential();

        $params = collect([
            "Departure" => $flight->flight->DEPARTURE_DATE,
            "Origin" => $flight->flight->ORGN,
            "Destination" => $flight->flight->DEST,
            "AdultNo" => $flight->travelers->AdultNo,
            "ChildNo" => $flight->travelers->ChildNo,
            "InfantNo" => $flight->travelers->InfantNo
        ])->merge($params)->toArray();
        // dd($params);
        $Passengers = [
            'ADT' => $flight->travelers->AdultNo,
            'CHD' => $flight->travelers->ChildNo,
            'INF' => $flight->travelers->InfantNo,
        ];
        // dd($Passengers);
        $DepartureDateTime = $flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME;
        $FlightRPH = $flight->flight->RPH;
        $FlightBaggage = $flight->baggage;
        $BaggageCode = $params['form'][$flight->type.'baggageCode'];
        $BundlerServiceId = $params['form'][$flight->type.'BundlerServiceId'];
        $ident = $flight->flight->TransactionIdentifier;
        $outbounddest = $flight->flight->ORGN.'-'.$flight->flight->DEST;

        // dd($outbounddest);
        // dd($params['form']['seatbooking'][$outbounddest]);
        $checkseatBooking = $params['form']['seatbooking'][$outbounddest];
        $HasSeatBooking = !empty(array_filter(array_column($checkseatBooking, 0)));
        // dump($HasSeatBooking);
        $checkmealBooking = $params['form']['mealbooking'][$outbounddest];
        $HasMealBooking = !empty(array_filter(array_column($checkmealBooking, 0)));
        // dd($HasMealBooking);
        // dd($params['form']['seatbooking']);
        $body = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
        <soap:Header>
            <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" soap:mustUnderstand="1">
            <wsse:UsernameToken xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd" wsu:Id="UsernameToken-17855236">
                <wsse:Username>' . self::$credential['USERNAME'] . '</wsse:Username>
                <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . self::$credential['PASSWORD'] . '</wsse:Password>
            </wsse:UsernameToken>
            </wsse:Security>
        </soap:Header>
        <soap:Body xmlns:ns1="http://www.opentravel.org/OTA/2003/05">
            <ns1:OTA_AirPriceRQ EchoToken="11868765275150-1300257933" PrimaryLangID="en-us" SequenceNmbr="1" TransactionIdentifier="'.$ident.'" Version="' . self::$credential['Version'] . '">
            <ns1:POS>
                <ns1:Source TerminalID="' . self::$credential['TerminalID'] . '">
                <ns1:RequestorID ID="' . self::$credential['USERNAME'] . '" Type="4" />
                <ns1:BookingChannel Type="12" />
                </ns1:Source>
            </ns1:POS>
            <ns1:AirItinerary DirectionInd="OneWay">
                <ns1:OriginDestinationOptions>';

                // $body .= str_replace(['<', '<ns1:/'], ['<ns1:', '</ns1:'], $flight['OriginDestination_XML']);
                $body .= '<ns1:OriginDestinationOption>
                    <ns1:FlightSegment ArrivalDateTime="'.$flight->flight->ARRIVAL_DATE.'T'.$flight->flight->ARRIVAL_TIME.'" DepartureDateTime="'.$flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME.'" FlightNumber="'.$flight->flight->FLIGHT_NO.'" RPH="'.$flight->flight->RPH.'">
                    <ns1:DepartureAirport LocationCode="'.$flight->flight->ORGN.'" Terminal="'.self::$credential['TerminalID'].'" />
                    <ns1:ArrivalAirport LocationCode="'.$flight->flight->DEST.'" Terminal="'.self::$credential['TerminalID'].'" />
                    </ns1:FlightSegment>
                </ns1:OriginDestinationOption>';

                $body .= '</ns1:OriginDestinationOptions>
                </ns1:AirItinerary>';

                $body .= '<ns1:TravelerInfoSummary>
                <ns1:AirTravelerAvail>';
                foreach ($Passengers as $key => $qty) {
                    if ($qty > 0) {
                        $body .= '<ns1:PassengerTypeQuantity Code="' . $key . '" Quantity="' . $qty . '" />' . "\n";
                    }
                }
                $body .= '</ns1:AirTravelerAvail>';

                $body .= '<ns1:SpecialReqDetails>';

                $TotalPassengers = $params['travelers']['AdultNo'] + $params['travelers']['ChildNo'] + $params['travelers']['InfantNo'];

                if($HasMealBooking == true){
                    $body .= '<ns1:MealRequests>';
                    // $body .= '<ns1:MealRequest mealCode="'.$params['form']['meal'].'" mealQuantity="1" TravelerRefNumberRPHList="A1" FlightRefNumberRPHList="'.$params['flight']['RPH'].'" DepartureDateTime="'.$flight['DEPARTURE_DATE'].'T'.$flight['DEPARTURE_TIME'].'" FlightNumber="'.$flight['FLIGHT_NO'].'"/>
                    
                    // foreach($TotalPassengers as $TotalPassenger){
                    $ChildRPH = 0;
                    for ($RPH = 1; $RPH <= $TotalPassengers; $RPH++) {
                        if($RPH <= $params['travelers']['AdultNo']){
                            $AdultmealCode = $params['form']['mealbooking'][$outbounddest]['adult-'.$RPH][0];
                            $TotalAdult = $RPH; 
                            $body .='<ns1:MealRequest mealCode="'.$AdultmealCode.'" mealQuantity="1" TravelerRefNumberRPHList="A'.$RPH.'" FlightRefNumberRPHList="'.$FlightRPH.'" DepartureDateTime="'.$DepartureDateTime.'" FlightNumber="'.$flight->flight->FLIGHT_NO.'"/>';
                        }
                        if ($RPH > $TotalAdult && $RPH <= $TotalAdult + $params['travelers']['ChildNo']) {
                            $ChildRPH++;
                            $ChildmealCode = $params['form']['mealbooking'][$outbounddest]['child-'.$ChildRPH][0];
                            $TotalChild = $RPH;
                            $body .='<ns1:MealRequest mealCode="'.$ChildmealCode.'" mealQuantity="1" TravelerRefNumberRPHList="C'.$RPH.'" FlightRefNumberRPHList="'.$FlightRPH.'" DepartureDateTime="'.$DepartureDateTime.'" FlightNumber="'.$flight->flight->FLIGHT_NO.'"/>';
                        }
                    }   
                    $body .= '</ns1:MealRequests>';
                }    
                if($HasSeatBooking == true){
                    $body .= '<ns1:SeatRequests>';

                    for ($RPH = 1; $RPH <= $TotalPassengers; $RPH++) {
                        
                        if($RPH <= $params['travelers']['AdultNo']){
                            $AdultRPH++;
                            $AdultseatCode = $params['form']['seatbooking'][$outbounddest]['adult-'.$RPH][0];
                            $TotalAdultSeat = $RPH; 
                            $body .= '<ns1:SeatRequest SeatNumber="'.$AdultseatCode.'" TravelerRefNumberRPHList="A'.$AdultRPH.'" FlightRefNumberRPHList="'.$FlightRPH.'"/>';
                        }
                        
                        if ($RPH > $params['travelers']['AdultNo'] && $RPH <= $params['travelers']['AdultNo'] + $params['travelers']['ChildNo']) {
                            $ChildSeatRPH++;
                            $ChildseatCode = $params['form']['seatbooking'][$outbounddest]['child-'.$ChildSeatRPH][0];
                            $TotalChild = $RPH;
                            $body .= '<ns1:SeatRequest SeatNumber="'.$ChildseatCode.'" TravelerRefNumberRPHList="C'.$RPH.'" FlightRefNumberRPHList="'.$FlightRPH.'"/>';
                        }

                    } 
                    // $body .= '<ns1:SeatRequest SeatNumber="'.$params['form']['seatbooking']['adult-1'][0].'" TravelerRefNumberRPHList="A1" FlightRefNumberRPHList="'.$FlightRPH.'"/>';

                    $body .= '</ns1:SeatRequests>';
                }

                $body .= '<ns1:BaggageRequests>';
                
                for ($RPH = 1; $RPH <= $TotalPassengers; $RPH++) {
                    
                    if($RPH <= $params['travelers']['AdultNo']){
                        $AdultRPH++;
                        $AdultseatCode = $params['form']['seatbooking']['adult-'.$RPH][0];
                        $TotalAdultSeat = $RPH; 
                        $body .= '<ns1:BaggageRequest baggageCode="'.$BaggageCode.'" TravelerRefNumberRPHList="A'.$RPH.'" FlightRefNumberRPHList="'.$FlightRPH.'" DepartureDateTime="'.$DepartureDateTime.'" FlightNumber="'.$flight->flight->FLIGHT_NO.'"/>';
                    }
                    
                    if ($RPH > $params['travelers']['AdultNo'] && $RPH <= $params['travelers']['AdultNo'] + $params['travelers']['ChildNo']) {
                        $ChildSeatRPH++;
                        $ChildseatCode = $params['form']['seatbooking']['child-'.$ChildSeatRPH][0];
                        $TotalChild = $RPH;
                        $body .= '<ns1:BaggageRequest baggageCode="'.$BaggageCode.'" TravelerRefNumberRPHList="C'.$RPH.'" FlightRefNumberRPHList="'.$FlightRPH.'" DepartureDateTime="'.$DepartureDateTime.'" FlightNumber="'.$flight->flight->FLIGHT_NO.'"/>';
                    }

                }                 
                $body .= '</ns1:BaggageRequests>';

                $body .= '</ns1:SpecialReqDetails>';
                
                $body .= '</ns1:TravelerInfoSummary>';
                
                // $body .= '<ns1:OutBoundBunldedServiceId>448</ns1:OutBoundBunldedServiceId>';
                // $body .= '<ns1:BundledServiceSelectionOptions>
                //                 <ns1:OutBoundBunldedServiceId>448</ns1:OutBoundBunldedServiceId>
                //         </ns1:BundledServiceSelectionOptions>';
                $body .= '<ns1:BundledServiceSelectionOptions>
                            <ns1:OutBoundBunldedServiceId>'.$BundlerServiceId.'</ns1:OutBoundBunldedServiceId>
                        </ns1:BundledServiceSelectionOptions>';

                $body .= '</ns1:OTA_AirPriceRQ>
        </soap:Body>
        </soap:Envelope>';
        // dd($body);
                // dd(self::$credential['URL']);
        $client = new Client();
        $headers = [
            'Cookie' => $flight->flight->Cookie,
            'Content-Type' => 'text/xml',
            // 'SOAPAction' => 'getPrice'
        ];
        $response = $client->request('POST', self::$credential['URL'], [
            'headers' => $headers,
            'body' => $body
        ]);
        // dd($response);


        $_xml = $response->getBody()->getContents();

        $xml = self::parseXML($_xml);
        $json_data = json_decode(json_encode($xml), 1);
        // dump('bhaggage',$json_data);
        // return $json_data;
        if (isset($json_data['Body']['OTA_AirPriceRS']['Success'])) {

            $RES = $json_data['Body']['OTA_AirPriceRS'];
            $RES['TransactionIdentifier'] = $RES['@attributes']['TransactionIdentifier'];
            $RES['TOTAL'] = $RES['PricedItineraries']['PricedItinerary']['AirItineraryPricingInfo']['ItinTotalFare']['TotalFare']['@attributes']['Amount'];
            $RES['FlightNumber'] = $RES['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions']['OriginDestinationOption']['FlightSegment']['@attributes']['FlightNumber'];
            $RES['RPH'] = $RES['PricedItineraries']['PricedItinerary']['AirItinerary']['OriginDestinationOptions']['OriginDestinationOption']['FlightSegment']['@attributes']['RPH'];
            $RES['status'] = true;
            return $RES;
        } else {
            return [
                'data' => $json_data['Body']['OTA_AirPriceRS']['Errors']['Error']['@attributes']['ShortText'],
                'code' => $json_data['Body']['OTA_AirPriceRS']['Errors']['Error']['@attributes']['Code'],
                'status' => false
            ];
            //return $json_data['Body']['OTA_AirPriceRS'];
        }
    }

    public static function OTA_AirBookRQ($params = [], $flight)
    {
        self::set_credential();
        $Passengers = $params['TRAVELERS_INFORMATION'];
        $TRAVELERS_INFORMATION = $params['TRAVELERS_INFORMATION'];

        $ident = $flight->flight->TransactionIdentifier;
        $DepartureDateTime = $flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME;


        $body = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
        <soap:Header>
            <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" soap:mustUnderstand="1">
                <wsse:UsernameToken xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd" wsu:Id="UsernameToken-17855236">
                    <wsse:Username>' . self::$credential['USERNAME'] . '</wsse:Username>
                    <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . self::$credential['PASSWORD'] . '</wsse:Password>
                </wsse:UsernameToken>
            </wsse:Security>
        </soap:Header>
        <soap:Body xmlns:ns1="http://www.isaaviation.com/thinair/webservices/OTA/Extensions/2003/05" xmlns:ns2="http://www.opentravel.org/OTA/2003/05">
            <ns2:OTA_AirBookRQ EchoToken="11868765275150-1300257933" PrimaryLangID="en-us" SequenceNmbr="1" Target="' . self::$credential['Target'] . '" TransactionIdentifier="' . $ident . '" Version="' . self::$credential['Version'] . '">
                <ns2:POS>
                    <ns2:Source TerminalID="' . self::$credential['TerminalID'] . '">
                    <ns2:RequestorID ID="' . self::$credential['USERNAME'] . '" Type="4"/>
                    <ns2:BookingChannel Type="12"/>
                    </ns2:Source>
                </ns2:POS>
                <ns2:AirItinerary>
                    <ns2:OriginDestinationOptions>
                    <ns2:OriginDestinationOption>
                        <ns2:FlightSegment ArrivalDateTime="' . $flight->flight->ARRIVAL_DATE . 'T' . $flight->flight->ARRIVAL_TIME . '" DepartureDateTime="'.$DepartureDateTime.'" FlightNumber="' . $flight->flight->FLIGHT_NO . '" RPH="'.$flight->flight->RPH.'">
                            <ns2:DepartureAirport LocationCode="'.$flight->flight->ORGN.'" Terminal="CHALOOJE_API"/>
                            <ns2:ArrivalAirport LocationCode="'.$flight->flight->DEST.'" Terminal="CHALOOJE_API"/>
                        </ns2:FlightSegment>
                    </ns2:OriginDestinationOption>';

                $body .= '</ns2:OriginDestinationOptions>
                </ns2:AirItinerary><ns2:TravelerInfo>';
                $TravelerRefNumber = 1;
                $TravelerRefNumberInfant = 0;
                foreach($Passengers as $key => $Passenger) {
                    foreach($Passenger as $Passenger) {
                        // dd($key);
                        $TravelerRefInfant = '';
                        
                        if($key == 'ADULT') {
                            $PassengerType = 'ADT';
                        } elseif($key == 'CHILD') {
                            $PassengerType = 'CHD';
                        } elseif($key == 'INFANT') {
                            $PassengerType = 'INF';
                            $NoInFant = $TravelerRefNumber - $TravelerRefNumberInfant;
                            $TravelerRefInfant = '/A'.$NoInFant ;
                        }
                        $body .= '<ns2:AirTraveler BirthDate="'.$Passenger['Dob'].'T00:00:00" PassengerTypeCode="' . $PassengerType . '">
                                    <ns2:PersonName>
                                        <ns2:GivenName>' . $Passenger['Firstname'] . '</ns2:GivenName>
                                        <ns2:Surname>' . $Passenger['Lastname'] . '</ns2:Surname>
                                        <ns2:NameTitle>' . $Passenger['Title'] . '</ns2:NameTitle>
                                    </ns2:PersonName>
                                    <ns2:Telephone AreaCityCode="6" CountryAccessCode="971" PhoneNumber="" />
                                <ns2:Document DocHolderNationality="PK"/>
                            <ns2:TravelerRefNumber RPH="'.substr($PassengerType,0,1).''.$TravelerRefNumber.''.$TravelerRefInfant.'"/>
                        </ns2:AirTraveler>';
                        if($key == 'ADULT' || $key == 'CHILD') {
                            $TravelerRefNumberInfant++;
                        }
                        $TravelerRefNumber++;
                    }
                } 

            $body .= '</ns2:TravelerInfo></ns2:OTA_AirBookRQ>
            <ns1:AAAirBookRQExt>';

                $body .= '<ns1:ContactInfo>
                    <ns1:PersonName>
                    <ns1:Title>' . $TRAVELERS_INFORMATION['ADULT'][0]['Title'] . '</ns1:Title>
                    <ns1:FirstName>' . $TRAVELERS_INFORMATION['ADULT'][0]['Firstname'] . '</ns1:FirstName>
                    <ns1:LastName>' . $TRAVELERS_INFORMATION['ADULT'][0]['Lastname'] . '</ns1:LastName>
                    </ns1:PersonName>
                    <ns1:Telephone>
                    <ns1:PhoneNumber>' . \Str::substr($params['form']['mobile'], 5) . '</ns1:PhoneNumber>
                    <ns1:CountryCode>' . \Str::substr($params['form']['mobile'], 0, 2) . '</ns1:CountryCode>
                    <ns1:AreaCode>' . \Str::substr($params['form']['mobile'], 2, 3) . '</ns1:AreaCode>
                    </ns1:Telephone>
                    <ns1:Mobile>
                    <ns1:PhoneNumber>' . \Str::substr($params['form']['mobile'], 5) . '</ns1:PhoneNumber>
                    <ns1:CountryCode>' . \Str::substr($params['form']['mobile'], 0, 2) . '</ns1:CountryCode>
                    <ns1:AreaCode>' . \Str::substr($params['form']['mobile'], 2, 3) . '</ns1:AreaCode>
                    </ns1:Mobile>
                    <ns1:Email>' . $params['form']['email'] . '</ns1:Email>
                    <ns1:Address>
                    <ns1:CountryName>
                        <ns1:CountryName>Pakistan</ns1:CountryName>
                        <ns1:CountryCode>PK</ns1:CountryCode>
                    </ns1:CountryName>
                    <ns1:CityName>'.$flight->flight->ORGN.'</ns1:CityName>
                    </ns1:Address>
                </ns1:ContactInfo>';

                $body .= '</ns1:AAAirBookRQExt>
        </soap:Body>
        </soap:Envelope>';
        // dump($body);
        // exit;
        $client = new Client();
        $headers = [
            'Cookie' => $flight->flight->Cookie,
            'Content-Type' => 'text/xml',
            // 'SOAPAction' => 'book'
            // 'Cookie' => 'JSESSIONID=de281191~BADA0C4350973DCB5B9373168A73FB4C.de1191; __Secure-AAID=MTcxOTA0NzI2OF9Qb3N0bWFuUnVudGltZS83LjM5LjBfNTQuODYuNTAuMTM5XzI2ODM2'
            //'Cookie' => 'ASP.NET_SessionId=3ct1j0ulgleikqbranmnj4qh'
        ];
        $response = $client->request('POST', self::$credential['URL'], [
            'headers' => $headers,
            'body' => $body
        ]);
        //die($body);

        $_xml = $response->getBody()->getContents();
        $xml = self::parseXML($_xml);

        $json_data = json_decode(json_encode($xml), 1);
        // dd($json_data);
        if (isset($json_data['Body']['OTA_AirBookRS']['Success'])) {
            return [
                //'data' => $response['json']['Envelope']['Body']['OTA_AirBookRQResponse']['OTA_AirBookRQResult'],
                'data' => $json_data['Body']['OTA_AirBookRS'],
                'status' => true
            ];
        } else {
            return [
                'data' => $json_data['Body']['OTA_AirBookRS']['Errors']['Error']['@attributes']['ShortText'],
                'code' => $json_data['Body']['OTA_AirBookRS']['Errors']['Error']['@attributes']['Code'],
                'status' => false
            ];
        }
    }

    public static function OTA_ReadRQ($params = [])
    {
        self::set_credential();

        $body = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
        <soap:Header>
            <wsse:Security soap:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
                <wsse:UsernameToken wsu:Id="UsernameToken-17855236" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
                    <wsse:Username>' . self::$credential['USERNAME'] . '</wsse:Username>
                    <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . self::$credential['PASSWORD'] . '</wsse:Password>
                </wsse:UsernameToken>
            </wsse:Security>
        </soap:Header>
        <soap:Body xmlns:ns1="http://www.isaaviation.com/thinair/webservices/OTA/Extensions/2003/05" xmlns:ns2="http://www.opentravel.org/OTA/2003/05">
            <ns2:OTA_ReadRQ EchoToken="11839640750780-171674061" PrimaryLangID="en-us" SequenceNmbr="1" TimeStamp="2008-09-25T10:54:35" Version="' . self::$credential['Version'] . '">
            <ns2:POS>
                <ns2:Source TerminalID="' . self::$credential['TerminalID'] . '">
                <ns2:RequestorID ID="' . self::$credential['USERNAME'] . '" Type="4"/>
                <ns2:BookingChannel Type="12"/>
                </ns2:Source>
            </ns2:POS>
            <ns2:ReadRequests>
                <ns2:ReadRequest>
                <ns2:UniqueID ID="' . $params['pnr'] . '" Type="14" />
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
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'read',
            //'Cookie' => 'ASP.NET_SessionId=3ct1j0ulgleikqbranmnj4qh'
        ];
        $response = $client->request('POST', self::$credential['URL'], [
            'headers' => $headers,
            'body' => $body
        ]);

        $_xml = $response->getBody()->getContents();
        $xml = self::parseXML($_xml);

        $json_data = json_decode(json_encode($xml), 1);
        //dump($json_data);
        if (isset($json_data['Envelope']['Body']['AAReadRQExtRS']['Success'])) {
            return [
                //'data' => $response['json']['Envelope']['Body']['OTA_AirBookRQResponse']['OTA_AirBookRQResult'],
                'data' => $json_data['Envelope']['Body']['AAReadRQExtRS'],
                'status' => true
            ];
        } else {
            return [
                'data' => $json_data['Envelope']['Body']['AAReadRQExtRS']['Errors']['Error']['@attributes']['ShortText'],
                'code' => $json_data['Envelope']['Body']['AAReadRQExtRS']['Errors']['Error']['@attributes']['Code'],
                'status' => false
            ];
        }
    }

}