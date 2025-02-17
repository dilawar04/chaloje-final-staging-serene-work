<?php
namespace App;

use Http;
//https://www.truugo.com/xml_validator/
class AirBlue {

    public static $search = "/(\<|\/+)\w\:/m";
    public static $replace = "$1";
    /**
     * @var array
     */
    private static $credential;

    public static function parseXML($xml)
    {
        $clean_xml = str_replace('htt//', 'http://', preg_replace(self::$search, self::$replace, $xml));
        $xml = simplexml_load_string($clean_xml);
        return $xml;
        return json_decode(json_encode($xml));
    }

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
        //dd($crd);
        self::$credential = $crd;
    }

    /**
     * @return \Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public static function airLowFareSearch(){
        self::set_credential();

        $OriginLocation = \req('LocationDep');
        $DestinationLocation = \req('LocationArr');
        $DepartureDateTime = \req('DepartingOn');
        // $ReturningOn = \req('ReturningOn');
        // $Return = (!empty($ReturningOn) ? true : false);
        $Return = false;
        $Passengers = [
            'ADT' => \req('AdultNo'),
            'CHD' => \req('ChildNo'),
            'INF' => \req('InfantNo')
        ];
        // dd($Return);
        // dd($DepartureDateTime);



        /* TODO::Dynamic XML*/
        $_passengers_XML = '';
        $round_trip_XML = '';

        /*Generate Passenger XML*/
        foreach ($Passengers as $key => $value) {
            if ($value > 0)
                $_passengers_XML .= "<PassengerTypeQuantity Code='$key' Quantity='$value'></PassengerTypeQuantity>";
        }
        /*Generate Round Trip XML*/
        if ($Return) {
            $round_trip_XML = "
            <OriginDestinationInformation xmlns='http://www.opentravel.org/OTA/2003/05'>
                    <DepartureDateTime>" . date('Y-m-d', strtotime($ReturningOn)) . "</DepartureDateTime>
                    <OriginLocation LocationCode='$DestinationLocation'></OriginLocation>
                    <DestinationLocation LocationCode='$OriginLocation'></DestinationLocation>
                </OriginDestinationInformation>";
        }


        $xml = "<Envelope xmlns='http://schemas.xmlsoap.org/soap/envelope/'>
            <Body>
                <AirLowFareSearch xmlns='http://zapways.com/air/ota/2.0'>
                    <airLowFareSearchRQ EchoToken='-8586704355136787339' Target='". self::$credential['Target'] ."' Version='". self::$credential['Version'] ."' xmlns='http://www.opentravel.org/OTA/2003/05'>
                        <POS xmlns='http://www.opentravel.org/OTA/2003/05'>
                            <Source ERSP_UserID='". self::$credential['key'] ."'>
                                <RequestorID Type='". self::$credential['Type'] ."' ID='". self::$credential['ID'] ."' MessagePassword='". self::$credential['Password'] ."'/>
                            </Source>
                        </POS>
                        <OriginDestinationInformation xmlns='http://www.opentravel.org/OTA/2003/05'>
                            <DepartureDateTime>" . date('Y-m-d', strtotime($DepartureDateTime)) . "</DepartureDateTime>
                            <OriginLocation LocationCode='$OriginLocation'></OriginLocation>
                            <DestinationLocation LocationCode='{$DestinationLocation}'></DestinationLocation>
                        </OriginDestinationInformation>
                        {$round_trip_XML}
                        <TravelerInfoSummary xmlns='http://www.opentravel.org/OTA/2003/05'>
                            <AirTravelerAvail>
                            {$_passengers_XML}
                            </AirTravelerAvail>
                        </TravelerInfoSummary>
                    </airLowFareSearchRQ>
                </AirLowFareSearch>
            </Body>
        </Envelope>";

        // dd($xml);
        if(!req('c')) {
            $response = Http::withHeaders(['Content-Type' => 'application/xml'])->send('POST', 'https://api.chaloje.com/api?url=' . self::$credential['URL'], ['body' => $xml]);
            // dd($response);
            file_put_contents((!empty($ReturningOn) ? 'RT-' : '') . 'AB.json', json_encode($response['json']));
            file_put_contents((!empty($ReturningOn) ? 'RT-' : '') . 'AB.xml', $response['xml']);

        } else {
            $response['json'] = json_decode(file_get_contents((!empty($ReturningOn) ? 'RT-' : ''). 'AB.json'), 1);
            $response['xml'] = file_get_contents((!empty($ReturningOn) ? 'RT-' : ''). 'AB.xml');
        }

        
        $json_data = $response['json'];
        

        if(isset($json_data['Envelope']['Body']['AirLowFareSearchResponse']['AirLowFareSearchResult']['Success'])){
            $XML = $response['xml'];
            // dd($XML);
            $XML = str_ireplace(['SOAP-ENV:', 'SOAP:', 'NS1:'], '', $XML);
            // dd($XML);
            $xml = simplexml_load_string($XML);
            // dd($xml);
            //$Result = $response->json->Envelope->Body->AirLowFareSearchResponse->AirLowFareSearchResult;

            $Result = $json_data['Envelope']['Body']['AirLowFareSearchResponse']['AirLowFareSearchResult'];
            // dd($Result);
            $FLIGHTS = [];
            // dd($FLIGHTS);
            $EXIST_FLIGHTS = [];
            // dd($EXIST_FLIGHTS);
            $itineraries =  $Result['PricedItineraries']['PricedItinerary'];
            // dd($itineraries);
            // dd($Result['PricedItineraries']);
            foreach ($itineraries as $i => $itinerary) {

                // dd($itinerary);
                // dd($xml->Body->AirLowFareSearchResponse->AirLowFareSearchResult->PricedItineraries->PricedItinerary[$i]->AirItineraryPricingInfo->PTC_FareBreakdowns->asXML());
                $TRAVELERS_XML = $xml->Body->AirLowFareSearchResponse->AirLowFareSearchResult->PricedItineraries->PricedItinerary[$i]->AirItineraryPricingInfo->PTC_FareBreakdowns->asXML();
                // dump('TRAVELERS_XML',$TRAVELERS_XML);
                // exit;
                $OriginDestination_XML = $xml->Body->AirLowFareSearchResponse->AirLowFareSearchResult->PricedItineraries->PricedItinerary[$i]->AirItinerary->OriginDestinationOptions->OriginDestinationOption->FlightSegment->asXML();
                // dump('OriginDestination_XML', $OriginDestination_XML);
                // exit;
                $FlightSegment = $itinerary['AirItinerary']['OriginDestinationOptions']['OriginDestinationOption']['FlightSegment'];
                // dump('FlightSegment',$FlightSegment);
                $PriceSegment = $itinerary["AirItineraryPricingInfo"];
                // dd($PriceSegment);
                // dd($PriceSegment["PTC_FareBreakdowns"]["PTC_FareBreakdown"]['FareInfo'][1]["RuleInfo"]['ChargesRules']);
                $condition = $PriceSegment["PTC_FareBreakdowns"]["PTC_FareBreakdown"]['FareInfo'][1]["RuleInfo"]['ChargesRules'];
                // dump('condition',$condition);
                if ($condition == null) {
                    $rules_info = $PriceSegment["PTC_FareBreakdowns"]["PTC_FareBreakdown"][0]["FareInfo"][1]["RuleInfo"]['ChargesRules'];
                    // dd($FareInfos);
                    // $rules_info = $PriceSegment["PTC_FareBreakdowns"]["PTC_FareBreakdown"]['FareInfo'][1]["RuleInfo"]['ChargesRules'];
                    // dd($rules_info);
                } else {
                    $rules_info = $PriceSegment["PTC_FareBreakdowns"]['PTC_FareBreakdown']['FareInfo'][1]["RuleInfo"]['ChargesRules'];
                }
                // dd($rules_info);
                // dd($rules_info);
                //$TYPE = (\Carbon\Carbon::parse($FlightSegment['ArrivalDateTime'])->diffInDays(\Carbon\Carbon::parse($ReturningOn)) == 0 && !empty($ReturningOn) ? 'inbound' : 'outbound');
                $TYPE = ($itinerary['_OriginDestinationRefNumber'] == 1 ? 'inbound' : 'outbound');
                $DURATION = \Carbon\Carbon::parse($FlightSegment['_DepartureDateTime'])->diffInSeconds(\Carbon\Carbon::parse($FlightSegment['_ArrivalDateTime']));
                // dd($FlightSegment['Equipment']['_AirEquipType']);
                $flight = [
                    'AIRLINE' => 'Airblue',
                    'TYPE' => $TYPE,
                    'AIRLINE_CODE' => $FlightSegment['OperatingAirline']['_Code'],
                    'FLIGHT_NO' => $FlightSegment['_FlightNumber'],
                    'DEPARTURE_DATE' => \Carbon\Carbon::parse($FlightSegment['_DepartureDateTime'])->format('Y-m-d'),
                    'DEPARTURE_TIME' => \Carbon\Carbon::parse($FlightSegment['_DepartureDateTime'])->format('H:i:s'),
                    'ARRIVAL_DATE' => \Carbon\Carbon::parse($FlightSegment['_ArrivalDateTime'])->format('Y-m-d'),
                    'ARRIVAL_TIME' => \Carbon\Carbon::parse($FlightSegment['_ArrivalDateTime'])->format('H:i:s'),
                    'JOURNEY_CODE' => $FlightSegment['Equipment']['_AirEquipType'],
                    'ORGN' => $FlightSegment['DepartureAirport']['_LocationCode'],
                    'DEST' => $FlightSegment['ArrivalAirport']['_LocationCode'],
                    'CURRENCY' => $PriceSegment['ItinTotalFare']['BaseFare']['_CurrencyCode'] ?? 'PKR',
                    'STOPS' => $FlightSegment['_StopQuantity'],
                    //'DURATION_MINUTES' => $DURATION,
                    'DURATION' => \Carbon\Carbon::parse($DURATION)->format('H') . 'h ' . \Carbon\Carbon::parse($DURATION)->format('i') . 'm',//'02h 00m',
                    'STATUS' => $FlightSegment['_Status'],
                    'RPH' => $FlightSegment['_RPH'],
                    'REFERENCE_NO' => $itinerary['_OriginDestinationRefNumber'],
                    'TRAVELERS_XML' => $TRAVELERS_XML,
                    'OriginDestination_XML' => $OriginDestination_XML,
                    'RULES_INFO' => $rules_info,
                ];
                // dd($flight);

                $conditionbaggage = $PriceSegment['PTC_FareBreakdowns']['PTC_FareBreakdown']['FareInfo'][1]['PassengerFare']['FareBaggageAllowance'];
                if($conditionbaggage == null) {
                    $FareBaggage = $PriceSegment['PTC_FareBreakdowns']['PTC_FareBreakdown'][0]['FareInfo'][1]['PassengerFare']['FareBaggageAllowance'];
                }else{
                    $FareBaggage = $PriceSegment['PTC_FareBreakdowns']['PTC_FareBreakdown']['FareInfo'][1]['PassengerFare']['FareBaggageAllowance'];
                }
                // dd($FareBaggage);

                // dd('FareBaggage',$FareBaggage);
                $FARE_PAX_WISE = collect($FareBaggage)->toArray();
                // dd($FARE_PAX_WISE);
                $BAG = [];
                // dd($BAG);

                $FareBreakdowns = $PriceSegment['PTC_FareBreakdowns'];
                // dump('farebreakdown',$FareBreakdowns);
                foreach ($FareBreakdowns as $fareBreakdown) {
                    // dd($fareBreakdown); 
                    if($fareBreakdown['PassengerTypeQuantity']['_Code'] == 'ADT'){
                        
                            // dd($PassengerTypeQuantity);
                            // dump('asd',$PassengerTypeQuantity['PassengerTypeQuantity']);
                        $key = $fareBreakdown['PassengerTypeQuantity']['_Code'];
                        $amount = $fareBreakdown['PassengerFare']['TotalFare']['_Amount'];
                        $basic_fare = $fareBreakdown['PassengerFare']['BaseFare']['_Amount'];
                        $tax = $fareBreakdown['PassengerFare']['Taxes']['_Amount'];

                        $PassengerType = 'ADULT';
                        if($key == 'CHD') {
                            $PassengerType = 'CHILD';
                        } elseif($key == 'INF'){
                            $PassengerType = 'INFANT';
                        }

                        $FARE_PAX_WISE[$PassengerType] = [
                            'BASIC_FARE' => $basic_fare,
                            'TAX' => $tax,
                            'TOTAL' => $amount,
                            'FEES' => 0,
                            'SURCHARGE' => 0,
                            'FARE_BAGGAGE' => $FareBaggage,
                        ];
                        // dd($FARE_PAX_WISE[$PassengerType]);
                        // dd($fareBreakdown);

                        $weight = intval(str_ireplace([' kg'], [''], $FARE_PAX_WISE['_UnitOfMeasureQuantity']));
                        $no_of_bags = intval(($weight > 0 ? ($weight / 20) : 0));
                        $BAG['title'] = ($weight == 0 ? "Value" : ($weight == 20 ? "Flexi" : ($weight == 30 ? "Xtra" : "Default Baggage")));
                        $BAG['weight'] = "{$weight} KG";
                        $BAG['no_of_bags'] = $no_of_bags;
                        $BAG['TOTAL_BASIC_FARE'] = $basic_fare;

                        // dump('FLIGHTS',$FLIGHTS[$TYPE][$FlightSegment['_FlightNumber']]['BAGGAGE_FARE']);

                    }else{

                        $PassengerTypeQuantities = $fareBreakdown;

                        foreach($PassengerTypeQuantities as $PassengerTypeQuantity){
                            // dd($PassengerTypeQuantity);
                            // dump('asd',$PassengerTypeQuantity['PassengerTypeQuantity']);
                        $key = $PassengerTypeQuantity['PassengerTypeQuantity']['_Code'];
                        $amount = $PassengerTypeQuantity['PassengerFare']['TotalFare']['_Amount'];
                        $basic_fare = $PassengerTypeQuantity['PassengerFare']['BaseFare']['_Amount'];
                        $tax = $PassengerTypeQuantity['PassengerFare']['Taxes']['_Amount'];

                        $PassengerType = 'ADULT';
                        if($key == 'CHD') {
                            $PassengerType = 'CHILD';
                        } elseif($key == 'INF'){
                            $PassengerType = 'INFANT';
                        }

                        $FARE_PAX_WISE[$PassengerType] = [
                            'BASIC_FARE' => $basic_fare,
                            'TAX' => $tax,
                            'TOTAL' => $amount,
                            'FEES' => 0,
                            'SURCHARGE' => 0,
                            'FARE_BAGGAGE' => $FareBaggage,
                        ];
                        // dd($FARE_PAX_WISE);
    
                        $weight = intval(str_ireplace([' kg'], [''], $FARE_PAX_WISE['_UnitOfMeasureQuantity']));
                        $no_of_bags = intval(($weight > 0 ? ($weight / 20) : 0));
                        $BAG['title'] = ($weight == 0 ? "Value" : ($weight == 20 ? "Flexi" : ($weight == 30 ? "Xtra" : "Default Baggage")));
                        $BAG['weight'] = "{$weight} KG";
                        $BAG['no_of_bags'] = $no_of_bags;
                        $BAG['TOTAL_BASIC_FARE'] = $basic_fare;


                    }
                    // dump('FLIGHTS',$FLIGHTS[$TYPE][$FlightSegment['_FlightNumber']]);

                    }         
                    // dump('FLIGHTS',$FLIGHTS[$TYPE][$FlightSegment['_FlightNumber']]);
 
                    // $PassengerTypeQuantities = $fareBreakdown;

                    // foreach($PassengerTypeQuantities as $PassengerTypeQuantity){
                    //         // dd($PassengerTypeQuantity);
                    //         // dump('asd',$PassengerTypeQuantity['PassengerTypeQuantity']);
                    //     $key = $PassengerTypeQuantity['PassengerTypeQuantity']['_Code'];
                    //     $amount = $PassengerTypeQuantity['PassengerFare']['TotalFare']['_Amount'];
                    //     $basic_fare = $PassengerTypeQuantity['PassengerFare']['BaseFare']['_Amount'];
                    //     $tax = $PassengerTypeQuantity['PassengerFare']['Taxes']['_Amount'];

                    //     $PassengerType = 'ADULT';
                    //     if($key == 'CHD') {
                    //         $PassengerType = 'CHILD';
                    //     } elseif($key == 'INF'){
                    //         $PassengerType = 'INFANT';
                    //     }

                    //     $FARE_PAX_WISE[$PassengerType] = [
                    //         'BASIC_FARE' => $basic_fare,
                    //         'TAX' => $tax,
                    //         'TOTAL' => $amount,
                    //         'FEES' => 0,
                    //         'SURCHARGE' => 0,
                    //         'FARE_BAGGAGE' => $FareBaggage,
                    //     ];
                    //     // dd($FARE_PAX_WISE[$PassengerType]);
    
                    //     $weight = intval(str_ireplace([' kg'], [''], $FARE_PAX_WISE['_UnitOfMeasureQuantity']));
                    //     $no_of_bags = intval(($weight > 0 ? ($weight / 20) : 0));
                    //     $BAG['title'] = ($no_of_bags == 0 ? "Nil Baggage" : ($no_of_bags == 1 ? "Standard Baggage" : 'Extra Baggage'));
                    //     $BAG['weight'] = "{$weight} KG";
                    //     $BAG['no_of_bags'] = $no_of_bags;


                    // }
                        // dd($FARE_PAX_WISE[$PassengerType]);
                        // dd($FARE_PAX_WISE['INFANT']);
                    $TOTAL = (\request('AdultNo') * $FARE_PAX_WISE['ADULT']['TOTAL'] + \request('ChildNo') * $FARE_PAX_WISE['CHILD']['TOTAL'] + \request('InfantNo') * $FARE_PAX_WISE['INFANT']['TOTAL']);
            //    dd();
                    
     
                  
                }
                if(in_array($FlightSegment['_FlightNumber'], $EXIST_FLIGHTS)){
                    // dump('FLIGHTS',$FLIGHTS[$TYPE][$FlightSegment['_FlightNumber']]['BAGGAGE_FARE']);
                    $FLIGHTS[$TYPE][$FlightSegment['_FlightNumber']]['BAGGAGE_FARE'][] = array_merge($BAG,
                        [
                            "TOTAL" => $TOTAL,
                            'FARE_PAX_WISE' => $FARE_PAX_WISE
                        ]
                    );
                    continue;

                } else{
                    $flight['BAGGAGE_FARE'][] = array_merge($BAG,
                        [
                            "TOTAL" => $TOTAL,
                            'FARE_PAX_WISE' => $FARE_PAX_WISE
                        ]
                        
                    );

                }

                
                // dump("total",$TOTAL);
                // dd($flight);
                if ($flight['REFERENCE_NO'] == 0) {
                    // dd($FLIGHTS['outbound'][$FlightSegment['_FlightNumber']]);
                    // echo 'echo;';
                    // exit;
                    $FLIGHTS['outbound'][$FlightSegment['_FlightNumber']] = $flight;
                } else if ($flight['REFERENCE_NO'] == 1) {
                    $FLIGHTS['inbound'][$FlightSegment['_FlightNumber']] = $flight;
                }
                // dd($FLIGHTS);
                $EXIST_FLIGHTS[$FlightSegment['_FlightNumber']] = $FlightSegment['_FlightNumber'];


            }
            if(empty($FLIGHTS)){
                $FLIGHTS['FLIGHT_Airblue_STATUS'][] = 'UnSuccess';
                // $FLIGHTS['FLIGHT_STATUS'][] = 1;
                // $FLIGHTS['AIRLINE'] = 'Airblue';
            }else{
                $FLIGHTS['FLIGHT_Airblue_STATUS'][] = 'Success';
            }
            // dump($FLIGHTS);
            return array_map('array_values', $FLIGHTS);


        } else {
            return [
                'data' => $json_data['Envelope']['Body']['AirLowFareSearchResponse']['AirLowFareSearchResult']['Errors'],
                'code' => $json_data['Envelope']['Body']['AirLowFareSearchResponse']['AirLowFareSearchResult']['Errors'],
                'status' => false
            ];
        }


        if (array_key_exists('Errors', $Result)) {
            return ['data' => $Result['Errors'], 'status' => false];
        }
        if (array_key_exists('Warnings', $Result)) {
            return ['data' => $Result['Warnings'], 'status' => false];
        }
    }

    public static function airLowFareSearchInbound(){
        self::set_credential();

        $OriginLocation = \req('LocationArr');
        $DestinationLocation = \req('LocationDep');
        $DepartureDateTime = \req('ReturningOn');
        // $ReturningOn = \req('ReturningOn');
        // $Return = (!empty($ReturningOn) ? true : false);
        $Return = false;
        $Passengers = [
            'ADT' => \req('AdultNo'),
            'CHD' => \req('ChildNo'),
            'INF' => \req('InfantNo')
        ];
        // dd($Return);



        /* TODO::Dynamic XML*/
        $_passengers_XML = '';
        $round_trip_XML = '';

        /*Generate Passenger XML*/
        foreach ($Passengers as $key => $value) {
            if ($value > 0)
                $_passengers_XML .= "<PassengerTypeQuantity Code='$key' Quantity='$value'></PassengerTypeQuantity>";
        }
        /*Generate Round Trip XML*/
        if ($Return) {
            $round_trip_XML = "
            <OriginDestinationInformation xmlns='http://www.opentravel.org/OTA/2003/05'>
                    <DepartureDateTime>" . date('Y-m-d', strtotime($ReturningOn)) . "</DepartureDateTime>
                    <OriginLocation LocationCode='$DestinationLocation'></OriginLocation>
                    <DestinationLocation LocationCode='$OriginLocation'></DestinationLocation>
                </OriginDestinationInformation>";
        }


        $xml = "<Envelope xmlns='http://schemas.xmlsoap.org/soap/envelope/'>
            <Body>
                <AirLowFareSearch xmlns='http://zapways.com/air/ota/2.0'>
                    <airLowFareSearchRQ EchoToken='-8586704355136787339' Target='". self::$credential['Target'] ."' Version='". self::$credential['Version'] ."' xmlns='http://www.opentravel.org/OTA/2003/05'>
                        <POS xmlns='http://www.opentravel.org/OTA/2003/05'>
                            <Source ERSP_UserID='". self::$credential['key'] ."'>
                                <RequestorID Type='". self::$credential['Type'] ."' ID='". self::$credential['ID'] ."' MessagePassword='". self::$credential['Password'] ."'/>
                            </Source>
                        </POS>
                        <OriginDestinationInformation xmlns='http://www.opentravel.org/OTA/2003/05'>
                            <DepartureDateTime>" . date('Y-m-d', strtotime($DepartureDateTime)) . "</DepartureDateTime>
                            <OriginLocation LocationCode='$OriginLocation'></OriginLocation>
                            <DestinationLocation LocationCode='{$DestinationLocation}'></DestinationLocation>
                        </OriginDestinationInformation>
                        {$round_trip_XML}
                        <TravelerInfoSummary xmlns='http://www.opentravel.org/OTA/2003/05'>
                            <AirTravelerAvail>
                            {$_passengers_XML}
                            </AirTravelerAvail>
                        </TravelerInfoSummary>
                    </airLowFareSearchRQ>
                </AirLowFareSearch>
            </Body>
        </Envelope>";

        // dd($xml);
        if(!req('c')) {
            $response = Http::withHeaders(['Content-Type' => 'application/xml'])->send('POST', 'https://api.chaloje.com/api?url=' . self::$credential['URL'], ['body' => $xml]);
            // dd($response);
            file_put_contents((!empty($ReturningOn) ? 'RT-' : '') . 'AB.json', json_encode($response['json']));
            file_put_contents((!empty($ReturningOn) ? 'RT-' : '') . 'AB.xml', $response['xml']);

        } else {
            $response['json'] = json_decode(file_get_contents((!empty($ReturningOn) ? 'RT-' : ''). 'AB.json'), 1);
            $response['xml'] = file_get_contents((!empty($ReturningOn) ? 'RT-' : ''). 'AB.xml');
        }

        
        $json_data = $response['json'];
        

        if(isset($json_data['Envelope']['Body']['AirLowFareSearchResponse']['AirLowFareSearchResult']['Success'])){
            $XML = $response['xml'];
            // dd($XML);
            $XML = str_ireplace(['SOAP-ENV:', 'SOAP:', 'NS1:'], '', $XML);
            // dd($XML);
            $xml = simplexml_load_string($XML);
            // dd($xml);
            //$Result = $response->json->Envelope->Body->AirLowFareSearchResponse->AirLowFareSearchResult;

            $Result = $json_data['Envelope']['Body']['AirLowFareSearchResponse']['AirLowFareSearchResult'];
            // dd($Result);
            $FLIGHTS = [];
            // dd($FLIGHTS);
            $EXIST_FLIGHTS = [];
            // dd($EXIST_FLIGHTS);
            $itineraries =  $Result['PricedItineraries']['PricedItinerary'];
            // dd($itineraries);
            // dd($Result['PricedItineraries']);
            foreach ($itineraries as $i => $itinerary) {

                // dd($itinerary);
                // dd($xml->Body->AirLowFareSearchResponse->AirLowFareSearchResult->PricedItineraries->PricedItinerary[$i]->AirItineraryPricingInfo->PTC_FareBreakdowns->asXML());
                $TRAVELERS_XML = $xml->Body->AirLowFareSearchResponse->AirLowFareSearchResult->PricedItineraries->PricedItinerary[$i]->AirItineraryPricingInfo->PTC_FareBreakdowns->asXML();
                // dump('TRAVELERS_XML',$TRAVELERS_XML);
                // exit;
                $OriginDestination_XML = $xml->Body->AirLowFareSearchResponse->AirLowFareSearchResult->PricedItineraries->PricedItinerary[$i]->AirItinerary->OriginDestinationOptions->OriginDestinationOption->FlightSegment->asXML();
                // dump('OriginDestination_XML', $OriginDestination_XML);
                // exit;
                $FlightSegment = $itinerary['AirItinerary']['OriginDestinationOptions']['OriginDestinationOption']['FlightSegment'];
                // dump('FlightSegment',$FlightSegment);
                $PriceSegment = $itinerary["AirItineraryPricingInfo"];
                // dd($PriceSegment);
                // dd($PriceSegment["PTC_FareBreakdowns"]["PTC_FareBreakdown"]['FareInfo'][1]["RuleInfo"]['ChargesRules']);
                $condition = $PriceSegment["PTC_FareBreakdowns"]["PTC_FareBreakdown"]['FareInfo'][1]["RuleInfo"]['ChargesRules'];
                // dump('condition',$condition);
                if ($condition == null) {
                    $rules_info = $PriceSegment["PTC_FareBreakdowns"]["PTC_FareBreakdown"][0]["FareInfo"][1]["RuleInfo"]['ChargesRules'];
                    // dd($FareInfos);
                    // $rules_info = $PriceSegment["PTC_FareBreakdowns"]["PTC_FareBreakdown"]['FareInfo'][1]["RuleInfo"]['ChargesRules'];
                    // dd($rules_info);
                } else {
                    $rules_info = $PriceSegment["PTC_FareBreakdowns"]['PTC_FareBreakdown']['FareInfo'][1]["RuleInfo"]['ChargesRules'];
                }
                // dd($rules_info);
                // dd($rules_info);
                //$TYPE = (\Carbon\Carbon::parse($FlightSegment['ArrivalDateTime'])->diffInDays(\Carbon\Carbon::parse($ReturningOn)) == 0 && !empty($ReturningOn) ? 'inbound' : 'outbound');
                $TYPE = ($itinerary['_OriginDestinationRefNumber'] == 1 ? 'inbound' : 'outbound');
                $DURATION = \Carbon\Carbon::parse($FlightSegment['_DepartureDateTime'])->diffInSeconds(\Carbon\Carbon::parse($FlightSegment['_ArrivalDateTime']));
                // dd($FlightSegment['Equipment']['_AirEquipType']);
                $TYPE = 'inbound';
                $flight = [
                    'AIRLINE' => 'Airblue',
                    'TYPE' => 'inbound',
                    'AIRLINE_CODE' => $FlightSegment['OperatingAirline']['_Code'],
                    'FLIGHT_NO' => $FlightSegment['_FlightNumber'],
                    'DEPARTURE_DATE' => \Carbon\Carbon::parse($FlightSegment['_DepartureDateTime'])->format('Y-m-d'),
                    'DEPARTURE_TIME' => \Carbon\Carbon::parse($FlightSegment['_DepartureDateTime'])->format('H:i:s'),
                    'ARRIVAL_DATE' => \Carbon\Carbon::parse($FlightSegment['_ArrivalDateTime'])->format('Y-m-d'),
                    'ARRIVAL_TIME' => \Carbon\Carbon::parse($FlightSegment['_ArrivalDateTime'])->format('H:i:s'),
                    'JOURNEY_CODE' => $FlightSegment['Equipment']['_AirEquipType'],
                    'ORGN' => $FlightSegment['DepartureAirport']['_LocationCode'],
                    'DEST' => $FlightSegment['ArrivalAirport']['_LocationCode'],
                    'CURRENCY' => $PriceSegment['ItinTotalFare']['BaseFare']['_CurrencyCode'] ?? 'PKR',
                    'STOPS' => $FlightSegment['_StopQuantity'],
                    //'DURATION_MINUTES' => $DURATION,
                    'DURATION' => \Carbon\Carbon::parse($DURATION)->format('H') . 'h ' . \Carbon\Carbon::parse($DURATION)->format('i') . 'm',//'02h 00m',
                    'STATUS' => $FlightSegment['_Status'],
                    'RPH' => $FlightSegment['_RPH'],
                    'REFERENCE_NO' => $itinerary['_OriginDestinationRefNumber'],
                    'TRAVELERS_XML' => $TRAVELERS_XML,
                    'OriginDestination_XML' => $OriginDestination_XML,
                    'RULES_INFO' => $rules_info,
                ];
                // dd($flight);

                $conditionbaggage = $PriceSegment['PTC_FareBreakdowns']['PTC_FareBreakdown']['FareInfo'][1]['PassengerFare']['FareBaggageAllowance'];
                if($conditionbaggage == null) {
                    $FareBaggage = $PriceSegment['PTC_FareBreakdowns']['PTC_FareBreakdown'][0]['FareInfo'][1]['PassengerFare']['FareBaggageAllowance'];
                }else{
                    $FareBaggage = $PriceSegment['PTC_FareBreakdowns']['PTC_FareBreakdown']['FareInfo'][1]['PassengerFare']['FareBaggageAllowance'];
                }
                // dd($FareBaggage);

                // dd('FareBaggage',$FareBaggage);
                $FARE_PAX_WISE = collect($FareBaggage)->toArray();
                // dd($FARE_PAX_WISE);
                $BAG = [];
                // dd($BAG);

                $FareBreakdowns = $PriceSegment['PTC_FareBreakdowns'];
                // dump('farebreakdown',$FareBreakdowns);
                foreach ($FareBreakdowns as $fareBreakdown) {
                    // dd($fareBreakdown); 
                    if($fareBreakdown['PassengerTypeQuantity']['_Code'] == 'ADT'){
                        
                            // dd($PassengerTypeQuantity);
                            // dump('asd',$PassengerTypeQuantity['PassengerTypeQuantity']);
                        $key = $fareBreakdown['PassengerTypeQuantity']['_Code'];
                        $amount = $fareBreakdown['PassengerFare']['TotalFare']['_Amount'];
                        $basic_fare = $fareBreakdown['PassengerFare']['BaseFare']['_Amount'];
                        $tax = $fareBreakdown['PassengerFare']['Taxes']['_Amount'];

                        $PassengerType = 'ADULT';
                        if($key == 'CHD') {
                            $PassengerType = 'CHILD';
                        } elseif($key == 'INF'){
                            $PassengerType = 'INFANT';
                        }

                        $FARE_PAX_WISE[$PassengerType] = [
                            'BASIC_FARE' => $basic_fare,
                            'TAX' => $tax,
                            'TOTAL' => $amount,
                            'FEES' => 0,
                            'SURCHARGE' => 0,
                            'FARE_BAGGAGE' => $FareBaggage,
                        ];
                        // dd($FARE_PAX_WISE[$PassengerType]);
                        // dd($fareBreakdown);

                        $weight = intval(str_ireplace([' kg'], [''], $FARE_PAX_WISE['_UnitOfMeasureQuantity']));
                        $no_of_bags = intval(($weight > 0 ? ($weight / 20) : 0));
                        $BAG['title'] = ($weight == 0 ? "Value" : ($weight == 20 ? "Flexi" : ($weight == 30 ? "Xtra" : "Default Baggage")));
                        $BAG['weight'] = "{$weight} KG";
                        $BAG['no_of_bags'] = $no_of_bags;
                        $BAG['TOTAL_BASIC_FARE'] = $basic_fare;

                        // dump('FLIGHTS',$FLIGHTS[$TYPE][$FlightSegment['_FlightNumber']]['BAGGAGE_FARE']);

                    }else{

                        $PassengerTypeQuantities = $fareBreakdown;

                        foreach($PassengerTypeQuantities as $PassengerTypeQuantity){
                            // dd($PassengerTypeQuantity);
                            // dump('asd',$PassengerTypeQuantity['PassengerTypeQuantity']);
                        $key = $PassengerTypeQuantity['PassengerTypeQuantity']['_Code'];
                        $amount = $PassengerTypeQuantity['PassengerFare']['TotalFare']['_Amount'];
                        $basic_fare = $PassengerTypeQuantity['PassengerFare']['BaseFare']['_Amount'];
                        $tax = $PassengerTypeQuantity['PassengerFare']['Taxes']['_Amount'];

                        $PassengerType = 'ADULT';
                        if($key == 'CHD') {
                            $PassengerType = 'CHILD';
                        } elseif($key == 'INF'){
                            $PassengerType = 'INFANT';
                        }

                        $FARE_PAX_WISE[$PassengerType] = [
                            'BASIC_FARE' => $basic_fare,
                            'TAX' => $tax,
                            'TOTAL' => $amount,
                            'FEES' => 0,
                            'SURCHARGE' => 0,
                            'FARE_BAGGAGE' => $FareBaggage,
                        ];
                        // dd($FARE_PAX_WISE);
    
                        $weight = intval(str_ireplace([' kg'], [''], $FARE_PAX_WISE['_UnitOfMeasureQuantity']));
                        $no_of_bags = intval(($weight > 0 ? ($weight / 20) : 0));
                        $BAG['title'] = ($weight == 0 ? "Value" : ($weight == 20 ? "Flexi" : ($weight == 30 ? "Xtra" : "Default Baggage")));
                        $BAG['weight'] = "{$weight} KG";
                        $BAG['no_of_bags'] = $no_of_bags;
                        $BAG['TOTAL_BASIC_FARE'] = $basic_fare;


                    }
                    // dump('FLIGHTS',$FLIGHTS[$TYPE][$FlightSegment['_FlightNumber']]);

                    }         
                    // dump('FLIGHTS',$FLIGHTS[$TYPE][$FlightSegment['_FlightNumber']]);
 
                    // $PassengerTypeQuantities = $fareBreakdown;

                    // foreach($PassengerTypeQuantities as $PassengerTypeQuantity){
                    //         // dd($PassengerTypeQuantity);
                    //         // dump('asd',$PassengerTypeQuantity['PassengerTypeQuantity']);
                    //     $key = $PassengerTypeQuantity['PassengerTypeQuantity']['_Code'];
                    //     $amount = $PassengerTypeQuantity['PassengerFare']['TotalFare']['_Amount'];
                    //     $basic_fare = $PassengerTypeQuantity['PassengerFare']['BaseFare']['_Amount'];
                    //     $tax = $PassengerTypeQuantity['PassengerFare']['Taxes']['_Amount'];

                    //     $PassengerType = 'ADULT';
                    //     if($key == 'CHD') {
                    //         $PassengerType = 'CHILD';
                    //     } elseif($key == 'INF'){
                    //         $PassengerType = 'INFANT';
                    //     }

                    //     $FARE_PAX_WISE[$PassengerType] = [
                    //         'BASIC_FARE' => $basic_fare,
                    //         'TAX' => $tax,
                    //         'TOTAL' => $amount,
                    //         'FEES' => 0,
                    //         'SURCHARGE' => 0,
                    //         'FARE_BAGGAGE' => $FareBaggage,
                    //     ];
                    //     // dd($FARE_PAX_WISE[$PassengerType]);
    
                    //     $weight = intval(str_ireplace([' kg'], [''], $FARE_PAX_WISE['_UnitOfMeasureQuantity']));
                    //     $no_of_bags = intval(($weight > 0 ? ($weight / 20) : 0));
                    //     $BAG['title'] = ($no_of_bags == 0 ? "Nil Baggage" : ($no_of_bags == 1 ? "Standard Baggage" : 'Extra Baggage'));
                    //     $BAG['weight'] = "{$weight} KG";
                    //     $BAG['no_of_bags'] = $no_of_bags;


                    // }
                        // dd($FARE_PAX_WISE[$PassengerType]);
                        // dd($FARE_PAX_WISE['INFANT']);
                    $TOTAL = (\request('AdultNo') * $FARE_PAX_WISE['ADULT']['TOTAL'] + \request('ChildNo') * $FARE_PAX_WISE['CHILD']['TOTAL'] + \request('InfantNo') * $FARE_PAX_WISE['INFANT']['TOTAL']);
            //    dd();
                    
     
                  
                }
                if(in_array($FlightSegment['_FlightNumber'], $EXIST_FLIGHTS)){
                    // dump('FLIGHTS',$FLIGHTS[$TYPE][$FlightSegment['_FlightNumber']]['BAGGAGE_FARE']);
                    $FLIGHTS[$TYPE][$FlightSegment['_FlightNumber']]['BAGGAGE_FARE'][] = array_merge($BAG,
                        [
                            "TOTAL" => $TOTAL,
                            'FARE_PAX_WISE' => $FARE_PAX_WISE
                        ]
                    );
                    continue;

                } else{
                    $flight['BAGGAGE_FARE'][] = array_merge($BAG,
                        [
                            "TOTAL" => $TOTAL,
                            'FARE_PAX_WISE' => $FARE_PAX_WISE
                        ]
                        
                    );

                }

                
                // dump("total",$TOTAL);
                // dd($flight);
                if ($flight['REFERENCE_NO'] == 0) {
                    // dd($FLIGHTS['outbound'][$FlightSegment['_FlightNumber']]);
                    // echo 'echo;';
                    // exit;
                    $FLIGHTS['inbound'][$FlightSegment['_FlightNumber']] = $flight;
                } else if ($flight['REFERENCE_NO'] == 1) {
                    $FLIGHTS['inbound'][$FlightSegment['_FlightNumber']] = $flight;
                }
                // dd($FLIGHTS);
                $EXIST_FLIGHTS[$FlightSegment['_FlightNumber']] = $FlightSegment['_FlightNumber'];


            }
            if(empty($FLIGHTS)){
                $FLIGHTS['FLIGHT_Airblue_STATUS'][] = 'UnSuccess';
                // $FLIGHTS['FLIGHT_STATUS'][] = 1;
                // $FLIGHTS['AIRLINE'] = 'Airblue';
            }else{
                $FLIGHTS['FLIGHT_Airblue_STATUS'][] = 'Success';
            }
            // dd($FLIGHTS);
            return array_map('array_values', $FLIGHTS);


        } else {
            return [
                'data' => $json_data['Envelope']['Body']['AirLowFareSearchResponse']['AirLowFareSearchResult']['Errors'],
                'code' => $json_data['Envelope']['Body']['AirLowFareSearchResponse']['AirLowFareSearchResult']['Errors'],
                'status' => false
            ];
        }


        if (array_key_exists('Errors', $Result)) {
            return ['data' => $Result['Errors'], 'status' => false];
        }
        if (array_key_exists('Warnings', $Result)) {
            return ['data' => $Result['Warnings'], 'status' => false];
        }
    }


    public static  function bookSeat($params = [])
    {
        self::set_credential();
        $RPH = 0;
        $T_XML = str_ireplace(['<0', '<48', '>48'], ['&lt;0', '&lt;48', '&gt;48'], \req('TRAVELERS_XML') ?? $params['TRAVELERS_XML']);
        $OriginDestination_XML = \req('OriginDestination_XML') ?? $params['OriginDestination_XML'];
        $roundOriginDestination_XML = '';
        $roundTRAVELERS_XML = '';
        if(!empty($params['inbound']->flight->OriginDestination_XML)) {
            $roundOriginDestination_XML = $params['inbound']->flight->OriginDestination_XML;
            $RT_XML = str_ireplace(['<0', '<48', '>48'], ['&lt;0', '&lt;48', '&gt;48'], $params['inbound']->flight->TRAVELERS_XML);
            $RemovePTCRT_XML = str_ireplace(['</PTC_FareBreakdowns>', '<PTC_FareBreakdowns>'],'', $RT_XML);
            $roundTRAVELERS_XML = $RemovePTCRT_XML;
            $T_XML = str_ireplace(['</PTC_FareBreakdowns>', '<PTC_FareBreakdowns>'],'', $T_XML);
            $TRAVELERS_XML = $T_XML;
        } else {
            $TRAVELERS_XML = $T_XML;
        }
        $TRAVELERS = \req('TRAVELERS') ?? $params['TRAVELERS'];
        $TRAVELERS_INFORMATION = \req('TRAVELERS_INFORMATION') ?? $params['TRAVELERS_INFORMATION'];
        // dd(request()->get('adult')['Cnic'][0]);
        $Passengers = [
            'ADT' => $TRAVELERS['ADULT'],
            'CHD' => $TRAVELERS['CHILD'],
            'INF' => $TRAVELERS['INFANT'],
        ];

        $xml = "<Envelope xmlns='http://schemas.xmlsoap.org/soap/envelope/'>
            <Header/>
            <Body>
                <AirBook xmlns='http://zapways.com/air/ota/2.0'>
                    <airBookRQ Target='". self::$credential['Target'] ."' Version='". self::$credential['Version'] ."' EchoToken='-8586704355136787339' TimeStamp='2022-02-18T00:00:00.000Z' ResStatus='Book' PriceInd='false' xmlns='http://www.opentravel.org/OTA/2003/05'>
                        <POS>
                            <Source ERSP_UserID='". self::$credential['key'] ."'>
                                <RequestorID Type='". self::$credential['Type'] ."' ID='". self::$credential['ID'] ."' MessagePassword='". self::$credential['Password'] ."'/>
                            </Source>
                        </POS>
                        <AirItinerary>";
                        if($roundOriginDestination_XML == ''){
                        $xml .=  "<OriginDestinationOptions>
                                    <OriginDestinationOption>
                                        {$OriginDestination_XML}
                                    </OriginDestinationOption>
                                </OriginDestinationOptions>
                                </AirItinerary>";
                        }else{
                        $xml .=  "<OriginDestinationOptions>
                                    <OriginDestinationOption>
                                        {$OriginDestination_XML}
                                    </OriginDestinationOption>
                                    <OriginDestinationOption>
                                        {$roundOriginDestination_XML}
                                    </OriginDestinationOption>
                                </OriginDestinationOptions>
                                </AirItinerary>";
                        }
                        
                        if($roundTRAVELERS_XML == ''){
                            $xml .= "<PriceInfo>{$TRAVELERS_XML}</PriceInfo>";
                        }else{
                            $xml .= "<PriceInfo><PTC_FareBreakdowns>
                                {$roundTRAVELERS_XML}
                                {$TRAVELERS_XML}
                            </PTC_FareBreakdowns></PriceInfo>";
                        }
                        
                        $xml .= "<TravelerInfo>";
                        foreach ($TRAVELERS_INFORMATION as $type => $items) {
                            $MainEmail = request()->get('email');
                            $MainNumber = substr(preg_replace('/\D/', '', request()->get('mobile')) ,1);  
                            $MainCnic = preg_replace('/\D/', '', request()->get('adult')['Cnic'][0]);
                            foreach ($items as $i => $item) {
                                $RPH++;
                                $key = '';
                                if ($type === 'ADULT') $key = 'ADT';
                                else if ($type === 'CHILD') $key = 'CHD';
                                else if ($type === 'INFANT') $key = 'INF';
                                $xml .= "
                                            <AirTraveler BirthDate='" . \Carbon\Carbon::parse($item['Dob'])->format('Y-m-d') . "'>
                                                <PersonName>
                                                    <GivenName>{$item['Firstname']}</GivenName>
                                                    <Surname>{$item['Lastname']}</Surname>";
                                                    if ($type !== 'INFANT') {
                                                        $xml .= "<NameTitle>{$item['Title']}</NameTitle>";
                                                    }

                                $xml .= "</PersonName>
                                                <Telephone PhoneLocationType='10' CountryAccessCode='92' PhoneNumber='{$MainNumber}' />
                                                <Email>{$MainEmail}</Email>
                                                <Document DocID='{$MainCnic}' DocType='2' DocIssueCountry='PK' DocHolderNationality='PK'/>
                                                <PassengerTypeQuantity Code='{$key}' Quantity='1'/>
                                                <TravelerRefNumber RPH='{$RPH}'/>
                                            </AirTraveler>
                                        ";
                            }
                        }
                        $xml .= "</TravelerInfo></airBookRQ>
                        </AirBook>
            </Body>
        </Envelope>";
        // dd($xml);

        $response = Http::withHeaders(['Content-Type' => 'application/xml'])->send('POST', 'https://api.chaloje.com/api?url=' . self::$credential['URL'], ['body' => $xml]);
        $json = $response['json'];

        if (isset($json['Envelope']['Body']['AirBookResponse']['AirBookResult']['Success'])) {
            return [
                'data' => $response['json']['Envelope']['Body']['AirBookResponse']['AirBookResult'],
                'status' => true
            ];
        } else {
            return [
                'data' => $response['json']['Envelope']['Body']['AirBookResponse']['AirBookResult']['Errors']['Error']['_ShortText'],
                'desc' => $response['json']['Envelope']['Body']['AirBookResponse']['AirBookResult']['Errors']['Error']['__text'],
                'code' => $response['json']['Envelope']['Body']['AirBookResponse']['AirBookResult']['Errors']['Error']['_Code'],
                'status' => false
            ];
        }
    }

    
    public static  function cancel($params = [])
    {

        self::set_credential();

        $xml = "<Envelope xmlns='http://schemas.xmlsoap.org/soap/envelope/'>
    <Header/>
    <Body>
        <Cancel xmlns='http://zapways.com/air/ota/2.0'>
            <cancelRQ Target='". self::$credential['Target'] ."' Version='". self::$credential['Version'] ."' xmlns='http://www.opentravel.org/OTA/2003/05'>
                <POS>
                    <Source ERSP_UserID='". self::$credential['key'] ."'>
                        <RequestorID Type='". self::$credential['Type'] ."' ID='". self::$credential['ID'] ."' MessagePassword='". self::$credential['Password'] ."'/>
                    </Source>
                </POS>
                <UniqueID ID='{$params['PNR']}'></UniqueID>
            </cancelRQ>
        </Cancel>
    </Body>
</Envelope> ";

        $response = Http::withHeaders(['Content-Type' => 'application/xml'])
            ->send('POST', 'https://api.chaloje.com/api?url=' . self::$credential['URL'], ['body' => $xml]);

        $isResponseSuccess = array_key_exists('Success', $response['json']['Envelope']['Body']['AirBookResponse']['AirBookResult']);

        if ($isResponseSuccess) {
            return [
                'data' => $response['json']['Envelope']['Body']['CancelResponse']['CancelResult'],
                'status' => true
            ];
        } else {
            return [
                'data' => $response['json']['Envelope']['Body']['CancelResponse']['CancelResult']['Errors']['Error'],
                'status' => false
            ];
        }
    }

}
