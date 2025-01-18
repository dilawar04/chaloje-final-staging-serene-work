<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Http;
use SimpleXMLElement;
use App\Utils\SignatureUtil;


class AirSerene
{

    private static $credential;
    public static $search = "/(\<|\/+)\w\:/m";
    public static $replace = "$1";

    public static function set_credential()
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

    public static function TimeFormate() {
        $microtime = microtime(true);
        $datetime = \DateTime::createFromFormat('U.u', sprintf('%.6f', $microtime)); 

        $Microseconds = $datetime->format('u'); 
        $lastThreeDigits = substr($Microseconds, -3); 
        return $datetime->format('YmdHis').$lastThreeDigits;
    }

    public static function makeSigningKey(){

        self::set_credential();

        $params = [
            "Departure" => request('DepartingOn', date('Y-m-d', strtotime('+0 days'))),
            "Origin" => request('LocationDep'),
            "Destination" => request('LocationArr'),
            "AdultNo" => request('AdultNo', 1),
            "ChildNo" => request('ChildNo', 0),
            "InfantNo" => request('InfantNo', 0)
        ];

        $Passengers = [
            'ADT' => request('AdultNo', 1),
            'CHD' => request('ChildNo', 0),
            'INF' => request('InfantNo', 0),
        ];

        $ServiceName = "NDC_AIRSHOPPING_SERVICE";
        $AuthUserID = self::$credential['AuthUserID'];
        $AuthAppID = self::$credential['AuthAppID'];
        $Version = "20.1";
        $Language = "en_US";
        $Timestamp = self::TimeFormate();
        $TimeZone = "+00:00";
        $ClientIP = self::$credential['IP'];
        $ContentType = "application/xml;charset=UTF-8";

    
        $Body = '<IATA_AirShoppingRQ xmlns="http://www.iata.org/IATA/2015/00/2020.1/IATA_AirShoppingRQ">
                    <Party>
                        <Sender>
                            <Aggregator>
                                <AggregatorID>'.self::$credential['AuthUserID'].'</AggregatorID>
                            </Aggregator>
                        </Sender>
                    </Party>
                    <Request>
                        <FlightRequest>
                            <OriginDestCriteria>
                                <OriginDepCriteria>
                                    <IATA_LocationCode>'.$params['Origin'].'</IATA_LocationCode>
                                    <Date>'.$params['Departure'].'</Date>
                                </OriginDepCriteria>
                                <DestArrivalCriteria>
                                    <IATA_LocationCode>'.$params['Destination'].'</IATA_LocationCode>
                                </DestArrivalCriteria>
                            </OriginDestCriteria>
                        </FlightRequest>
                        <ResponseParameters>
                            <CurParameter>
                                <RequestedCurCode>PKR</RequestedCurCode>
                            </CurParameter>
                        </ResponseParameters>
                        <Paxs>';
                            $counter = 1;
                            foreach ($Passengers as $Passenger => $Key) {
                                for ($i = 1; $i <= $Key; $i++) {
                                    $Body .= '<Pax>
                                        <PaxID>PAX'.$counter.'</PaxID>
                                        <PTC>'.$Passenger.'</PTC>
                                    </Pax>';
                                    $counter++;
                                }
                            }
                        $Body .='</Paxs>
                    </Request>
                </IATA_AirShoppingRQ>';

        $minifiedBody = preg_replace('/\s+/', ' ', $Body);
        $Body = str_replace('> <', '><', $minifiedBody);

        // dump($Body);
    
        // Corrected Signature String
        $Signature_String = $AuthAppID . "|" . $AuthUserID . "|" . $ServiceName . "|" . $Language . "|" . $AuthAppID . "|" . $Timestamp . "|" . $Body . "|" . $Version . "|" . $ClientIP;
        
        // Replace 'your_signature_key' with your actual signature key
        $signature_key = self::$credential['SignatureKey'];
    
        // Generate the signature using SignatureUtil
        $signature = SignatureUtil::newEncodeSHA($Signature_String, $signature_key);
        
        $signature = htmlspecialchars($signature);
        return [$signature, $Timestamp, $Body];
    }


    public static function getSingleFlight()
    {
        
        $makeSigningKeyNTimeXml = self::makeSigningKey();
        // echo 'asasa';
        // dump('aa',$token);

        // dump('second',$token[0]);
        // dump('second',$token[1]);
        // exit;
        $client = new Client();

        self::set_credential();

        $Passengers = [
            'ADT' => request('AdultNo', 1),
            'CHD' => request('ChildNo', 0),
            'INF' => request('InfantNo', 0),
        ];

        $headers = [
            'ServiceName' => 'NDC_AIRSHOPPING_SERVICE',
            'AuthUserID' => self::$credential['AuthUserID'],
            'AuthAppID' => self::$credential['AuthAppID'],
            'AuthTktdeptid' => self::$credential['AuthTktdeptid'],
            'Version' => '20.1',
            'Language' => 'en_US',
            // 'Token' => 'CHALOJE',
            'Timestamp' => $makeSigningKeyNTimeXml[1],
            'TimeZone' => '+00:00',
            'ClientIP' => self::$credential['IP'],
            'Content-Type' => 'application/xml;charset=UTF-8',
            'Sign' => $makeSigningKeyNTimeXml[0],
        ];
        // dd(self::$credential['EndPoint']);
        // dump('second',self::TimeFormate());
        // $Body = '<IATA_AirShoppingRQ xmlns="http://www.iata.org/IATA/2015/00/2020.1/IATA_AirShoppingRQ"><Party><Sender><Aggregator><AggregatorID>CHALOJE</AggregatorID></Aggregator></Sender></Party><Request><ShoppingCriteria><FlightCriteria><FlightCharacteristicsCriteria><PrefLevel><PrefContextText>OUTBOUND</PrefContextText></PrefLevel></FlightCharacteristicsCriteria></FlightCriteria></ShoppingCriteria><FlightRequest><OriginDestCriteria><OriginDepCriteria><IATA_LocationCode>KHI</IATA_LocationCode><Date>2025-01-28</Date></OriginDepCriteria><DestArrivalCriteria><IATA_LocationCode>ISB</IATA_LocationCode></DestArrivalCriteria></OriginDestCriteria></FlightRequest><ResponseParameters><CurParameter><RequestedCurCode>PKR</RequestedCurCode></CurParameter></ResponseParameters><Paxs><Pax><PaxID>PAX1</PaxID><PTC>ADT</PTC></Pax></Paxs></Request></IATA_AirShoppingRQ>';
        $Body = $makeSigningKeyNTimeXml[2];

        $response = $client->request('POST', self::$credential['EndPoint'], [
            'headers' => $headers,
            'body' => $Body
        ]);
        // dd($response);
        $xml = $response->getBody()->getContents();
        // dd($xml);

        // dd();       

        // dd($a->Response->OffersGroup->CarrierOffers);
        

        $json_data = self::parseXML($xml);

        // dd($json_data);
        // dd($json_data->Response->DataLists->PaxSegmentList->PaxSegment);
        // dd($json_data->Response->OffersGroup->CarrierOffers);
        $mergedOffers = [];

        foreach ($json_data->Response->OffersGroup->CarrierOffers->Offer as $flightOffer) {
            $journeyRefID = $flightOffer->JourneyOverview->JourneyPriceClass->PaxJourneyRefID;

            if ($journeyRefID) {
                if (!isset($mergedOffers[$journeyRefID])) {
                    $mergedOffers[$journeyRefID] = [];
                }

                $mergedOffers[$journeyRefID][] = $flightOffer;
            }
        }

        $PriceClasses = $json_data->Response->DataLists->PriceClassList->PriceClass;
        $BaggageAllowances = $json_data->Response->DataLists->BaggageAllowanceList->BaggageAllowance;
        $MergedData = [];

        foreach ($PriceClasses as $index => $PriceClass) {
            if (isset($BaggageAllowances[$index])) {
                $BaggageAllowance = $BaggageAllowances[$index];

                $MergedData[] = [
                    'Name' => $PriceClass->Name,
                    'PriceClassID' => $PriceClass->PriceClassID,
                    'BaggageAllowanceID' => $BaggageAllowance->BaggageAllowanceID,
                    'TypeCode' => $BaggageAllowance->TypeCode,
                    'MaximumWeight' => $BaggageAllowance->WeightAllowance->MaximumWeightMeasure,
                ];
            }
        }
        // dd($MergedData);
        // dump($mergedOffers);
        // dd($json_data->Response->DataLists->PaxSegmentList->PaxSegment);

        // foreach ($MergedData as $item) {
            // dump($item);
        // }
        // exit;
        
        $PaxJourneyList = $json_data->Response->DataLists->PaxJourneyList;
        // dd($PaxJourneyList->PaxJourney[0]->Duration);
        // dd($PaxJourneyList[0]->PaxJourney);
        // dd($json_data->Response->DataLists->PaxSegmentList->PaxSegment);
        $FLIGHTS = [];
        if($json_data->Response->DataLists){
            $counter = 0;
            // dd($json_data->Response->DataLists->PaxSegmentList->PaxSegment);
            foreach($mergedOffers as $Key => $Offer) {
                // dd($key);
                // dd($Offer);
                $SegmentDetail = $json_data->Response->DataLists->PaxSegmentList->PaxSegment[$counter];
                $TYPE = 'outbound';
                $FLIGHT = [
                    'AIRLINE' => 'Air Serene',
                    'AIRLINE_CODE' => $SegmentDetail->MarketingCarrierInfo->CarrierDesigCode,
                    'TYPE' => $TYPE,
                    "FLIGHT_NO" => $SegmentDetail->MarketingCarrierInfo->MarketingCarrierFlightNumberText,
                    "DEPARTURE_DATE" => \Carbon\Carbon::parse($SegmentDetail->Dep->AircraftScheduledDateTime)->format('Y-m-d'),
                    "DEPARTURE_TIME" => \Carbon\Carbon::parse($SegmentDetail->Dep->AircraftScheduledDateTime)->format('H:i:s'),
                    "ARRIVAL_DATE" => \Carbon\Carbon::parse($SegmentDetail->Arrival->AircraftScheduledDateTime)->format('Y-m-d'),
                    "ARRIVAL_TIME" => \Carbon\Carbon::parse($SegmentDetail->Arrival->AircraftScheduledDateTime)->format('H:i:s'),
                    "JOURNEY_CODE" => $Key,
                    "ORGN" => $SegmentDetail->Dep->IATA_LocationCode,
                    "DEST" => $SegmentDetail->Arrival->IATA_LocationCode,
                    "CURRENCY" => 'PKR',
                    "STOPS" => 0,
                    // "DURATION" => \Carbon\Carbon::parse('00:00:00')->addMinutes($PaxJourneyList[$counter]->PaxJourney[$counter]->Duration)->format('H\h i\m'),
                    "DURATION" => substr($PaxJourneyList->PaxJourney[$counter]->Duration,2),
                    "STATUS" => "ONTIME",
                ];
                $counter++;



                // dd($mergedOffer);
                $no_of_bags = 0;

                foreach($Offer as $PassengersDetails) {
                    // dd($PassengersDetails);
                    // dump($PassengersDetails->OfferID);
                    // dd($PassengersDetails->OfferItem->OfferItemID);
                    
                    // dd($PassengersDetails->JourneyOverview->JourneyPriceClass->PaxJourneyRefID);
                    // dd($PassengersDetails->OfferID);
                    // dd($PassengersDetails->OfferItem->FareDetail);
                    // dd($PassengersDetails);
                    foreach($PassengersDetails->OfferItem->FareDetail as $FareDetails) {
                        // dd($FareDetails);
                        // dd($FareDetails->FareComponent->PriceClassRefID);   
                        // dd($Passengers['ADT']);
                        // dd($FareDetails->PaxRefID);
                        // dump($FareDetails->Price->BaseAmount);
                        // dump($FareDetails->Price->TaxSummary->TotalTaxAmount);
                        // dd($FareDetails->Price->TotalAmount);
    
                        // dd('PAX' . ($Passengers['ADT'] + $Passengers['CHD']) + ($Passengers['INFANT']) );
                        // dd('PAX' . ($Passengers['ADT'] + $Passengers['CHD'] + $Passengers['INF']));
    
                        // $farePaxWise = [];
                        // dd('PAX' . $Passengers['ADT'] + $Passengers['CHD']);
                        if ($FareDetails->PaxRefID == 'PAX' . $Passengers['ADT']) {
                            $farePaxWise['ADULT'] = [
                                "BAGGAGE_NAME" => $FareDetails->FareComponent->PriceClassRefID,
                                "BASIC_FARE" => $FareDetails->Price->BaseAmount,
                                "TAX" => $FareDetails->Price->TaxSummary->TotalTaxAmount,
                                "TOTAL" => $FareDetails->Price->TotalAmount,
                                "FEES" => 0,
                                "SURCHARGE" => 0,
                            ];
                        }
                        
                        // Check for CHILD fares
                        if ($FareDetails->PaxRefID == 'PAX' . ($Passengers['ADT'] + $Passengers['CHD']) ) {
                            $farePaxWise['CHILD'] = [
                                "BAGGAGE_NAME" => $FareDetails->FareComponent->PriceClassRefID,
                                "BASIC_FARE" => $FareDetails->Price->BaseAmount,
                                "TAX" => $FareDetails->Price->TaxSummary->TotalTaxAmount,
                                "TOTAL" => $FareDetails->Price->TotalAmount,
                                "FEES" => 0,
                                "SURCHARGE" => 0,
                            ];
                        }
                        if ($FareDetails->PaxRefID == 'PAX' . ($Passengers['ADT'] + $Passengers['CHD'] + $Passengers['INF']) ) {
                            $farePaxWise['INFANT'] = [
                                "BAGGAGE_NAME" => $FareDetails->FareComponent->PriceClassRefID,
                                "BASIC_FARE" => $FareDetails->Price->BaseAmount,
                                "TAX" => $FareDetails->Price->TaxSummary->TotalTaxAmount,
                                "TOTAL" => $FareDetails->Price->TotalAmount,
                                "FEES" => 0,
                                "SURCHARGE" => 0,
                            ];
                        }
                    }
                    // dd($farePaxWise['ADULT']['BASIC_FARE'] + $farePaxWise['CHILD']['BASIC_FARE'] + + $farePaxWise['INFANT']['BASIC_FARE']);

                    foreach($MergedData as $Baggages) {
                        // dd($Baggages['PriceClassID']);
                        if($Baggages['PriceClassID'] == $farePaxWise['ADULT']['BAGGAGE_NAME']){
                            $FARES = [
                                // Uncomment these if needed:
                                
                                'title' => $Baggages['Name'],
                                'weight' => $Baggages['MaximumWeight'],
                                "TOTAL_BASIC_FARE" => $farePaxWise['ADULT']['BASIC_FARE'] + $farePaxWise['CHILD']['BASIC_FARE'] + $farePaxWise['INFANT']['BASIC_FARE'],

                                "TOTAL" => $farePaxWise['ADULT']['TOTAL'] + $farePaxWise['CHILD']['TOTAL'] + $farePaxWise['INFANT']['TOTAL'],


                                "FARE_PAX_WISE" => $farePaxWise,
                                "no_of_bags" => $no_of_bags,
                                "OfferID" => $PassengersDetails->OfferID,
                                "OfferItemID" => $PassengersDetails->OfferItem->OfferItemID,
            
                            ];
                        }
                    }

                    $FLIGHT['BAGGAGE_FARE'][] = $FARES;
                    // dd($FLIGHT);
                    $FLIGHTS[$TYPE][$FLIGHT['FLIGHT_NO']] = $FLIGHT;
                    // dd($FLIGHTS);
                    $no_of_bags++;
    
                }

            }

        } else {
            return ['status' => false, 'response' => ['serverError' => $response->serverError(), 'clientError' => $response->clientError()]];
        }

        if(empty($FLIGHTS)){
            $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'UnSuccess';
        }else{
            $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'Success';
        }
        return array_map('array_values', $FLIGHTS);
    }

    // public static function getSingleFlight()
    // {
    //     self::set_credential();

    //     // echo 'asd';
    //     // exit;
    //     $params = [
    //         'currency' => 'PKR',
    //         'Origin' => req('LocationDep'),
    //         'Destination' => req('LocationArr'),
    //         'Departure' => \Carbon\Carbon::parse(req('DepartingOn'))->format('Y-m-d'),
    //         "Return" => false,
    //         "Returning" => date('Y-m-d', strtotime('+2 days')),
    //         //"Returning" => \Carbon\Carbon::parse(req('ReturningOn', date('Y-m-d', strtotime('+2 days'))))->format('Y-m-d'),
    //         "AdultNo" => 1,
    //         "ChildNo" => 0,
    //         "InfantNo" => 0,
    //         ];
    //     // dd($params);    

    //     $params['Return'] = (\request('Return') == 'true');
    //     if($params['Return']){
    //         $params['Returning'] = \Carbon\Carbon::parse(req('ReturningOn'))->format('Y-m-d');
    //     }

    //     // $token = self::RetrieveSecurityToken();
    //     // $FlightSchedules = self::GetFlightScheduleInformation($token, $params);

        
    //     // $FareQuoteShop = self::RetrieveFareQuoteShop($params);
    //     // dd($FareQuoteShop->SegmentDetails->SegmentDetail);
    //     // dd($FareQuoteShop->SegmentDetails->SegmentDetail->);
    //     // $params['LFID'] = $FareQuoteShop->SegmentDetails->SegmentDetail[0]->LFID;
    //     // $params['LFID'] = $FareQuoteShop->SegmentDetails->SegmentDetail->LFID;
    //     // $params['Departure'] = $FareQuoteShop->SegmentDetails->SegmentDetail[0]->DepartureDate;
    //     // $params['Departure'] = $FareQuoteShop->SegmentDetails->SegmentDetail->DepartureDate;
    //     // dd($params);

      
    //     // dd($FareQuote);
    //     $FareQuote = self::RetrieveFareQuoteShop($params);
    //     // dump($FareQuoteShop);
    //     // dd($params);
    //     // dd($FareQuote);
    //     // dd($FareQuote->FlightSegments->FlightSegment);
    //     // $a = $FareQuoteShop->SegmentDetails;
    //     // dd($a);

    //     // $FareQuoteShop = self::RetrieveFareQuote($token, $params, $FareQuote);
    //     // echo 'asdasd';
    //     // exit;
    //     // dd($FareQuoteShop);
    //     // dd($FareQuote->FlightSegments->FlightSegment);

    //     //dd($FareQuote);
    //     // $AARQuote = self::RetrieveAARQuote($token, [
    //     //     'Origin' => $FareQuote->SegmentDetails->SegmentDetail->Origin,
    //     //     'Destination' => $FareQuote->SegmentDetails->SegmentDetail->Destination,
    //     //     'DepartureDate' => $FareQuote->SegmentDetails->SegmentDetail->DepartureDate,
    //     //     'LFID' => $FareQuote->SegmentDetails->SegmentDetail->LFID
    //     // ]);

    //     // dump($FareQuote->FlightSegments);
    //     // dd($FareQuote, $FareQuote->SegmentDetails->SegmentDetail);
    //     $FLIGHTS = [];
    //     if(count($FareQuote->SegmentDetails->SegmentDetail) > 0){
    //         // dd($FareQuote->SegmentDetails->SegmentDetail);
    //         foreach ($FareQuote->SegmentDetails->SegmentDetail as $k => $SegmentDetail) {
    //             // dd($SegmentDetail);
    //                 // dd($FareQuote->FlightSegments->FlightSegment);
    //             if(count($FareQuote->SegmentDetails->SegmentDetail) == 1){
    //                 $SegmentDetail = $FareQuote->SegmentDetails->SegmentDetail;
    //             }
    //             // dd($SegmentDetail);
    //             $FlightSegment = (is_array($FareQuote->FlightSegments->FlightSegment) ? $FareQuote->FlightSegments->FlightSegment[$k] : $FareQuote->FlightSegments->FlightSegment);
    //             // dd($FlightSegment);
    //             $FareInfosTypes = $FlightSegment->FareTypes->FareType;
    //             // dd($FareInfosTypes);
    //             // dd($SegmentDetail);

    //             $TYPE = 'outbound';
    //             $FLIGHT = [
    //                 'AIRLINE' => 'Air Serene',
    //                 'AIRLINE_CODE' => 'ER',
    //                 'TYPE' => $TYPE,
    //                 "FLIGHT_NO" => $SegmentDetail->FlightNum,
    //                 "DEPARTURE_DATE" => \Carbon\Carbon::parse($SegmentDetail->DepartureDate)->format('Y-m-d'),
    //                 "DEPARTURE_TIME" => \Carbon\Carbon::parse($SegmentDetail->DepartureDate)->format('H:i:s'),
    //                 "ARRIVAL_DATE" => \Carbon\Carbon::parse($SegmentDetail->ArrivalDate)->format('Y-m-d'),
    //                 "ARRIVAL_TIME" => \Carbon\Carbon::parse($SegmentDetail->ArrivalDate)->format('H:i:s'),
    //                 "JOURNEY_CODE" => $SegmentDetail->FlightNum,
    //                 "ORGN" => $SegmentDetail->Origin,
    //                 "DEST" => $SegmentDetail->Destination,
    //                 "CURRENCY" => $SegmentDetail->OriginalCurrency ?? 'PKR',
    //                 "STOPS" => $SegmentDetail->Stops,
    //                 "FLIGHT_TIME" => $SegmentDetail->FlightTime,
    //                 "DURATION" => \Carbon\Carbon::parse('00:00:00')->addMinutes($SegmentDetail->FlightTime)->format('H\h i\m'),
    //                 //"DURATION" => str_pad(($SegmentDetail->FlightTime / 60), 2, '0', STR_PAD_LEFT) . "h",
    //                 "STATUS" => "ONTIME",
    //                 "LFID" => $SegmentDetail->LFID
    //             ];
    //             // dd($FareQuote);
    //             // dd($FareQuote->FlightSegments->FlightSegment);
    //             // $FareInfosTypes = $FareQuote->FlightSegments->FlightSegment->FareTypes->FareType;
    //             // $a = json_decode($FareInfosTypes);
    //             // dd($a);
    //             // dd($FareInfosTypes);
    //             // if(count($FareInfosTypes) > 0){
    //             //     dd($FareInfosTypes);
    //             // }else{
    //             //     echo 'else';
    //             //     dd($FareInfosTypes);
    //             //     // exit;
    //             // }
    //             if(count($FareInfosTypes) > 0){
    //                 foreach ($FareInfosTypes as $fareInfosType) {
    //                     // dd($fareInfosType);
    //                     // echo 'as';
    //                     // dump($fareInfosType);
    //                     // dd($fareInfosType);
    //                     // dd($fareInfosType->FareInfos->FareInfo);
    //                     $all_baggage = $fareInfosType->FareInfos->FareInfo;
    //                     // dd($all_baggage);
    //                     $adult_bag = collect($all_baggage)->where('PTCID', 1)->all();
    //                     $child_bag = collect($all_baggage)->where('PTCID', 6)->all();
    //                     $infant_bag = collect($all_baggage)->where('PTCID', 5)->all();
    //                     // dd($as);
    //                     // dd($free_baggage);
    //                     $adult_info = end($adult_bag);
    //                     // dd($adult_info);
    //                     $child_info = end($child_bag);
    //                     $infant_info = end($infant_bag);
    //                     // dd()
    //                     // dd($last_free_baggage);

    //                     $FareInfos = $fareInfosType->FareInfos->FareInfo;
    //                     // dump('fare',$FareInfos);
    //                     // continue;
    //                     $_FARES[] = collect($FareInfos)->where('PTCID', 1)->reverse()->first();
    //                     // dd($_FARES);
    //                     $_FARES[] = collect($FareInfos)->where('PTCID', 6)->reverse()->first();
    //                     // dd($_FARES);
    //                     $_FARES[] = collect($FareInfos)->where('PTCID', 5)->reverse()->first();
    //                     // dd($_FARES[1]);
    //                     $FARES = [
    //                         'title' => $fareInfosType->FareTypeName,
    //                         'no_of_bags' => ($fareInfosType->FareTypeName == 'Free Baggage' ? 0 : ('bundledServiceName' == 'Extra' ? 2 : 1)),
    //                         'weight' => ($fareInfosType->FareTypeName == 'Free Baggage' ? '0 KG' : ('bundledServiceName' == 'Extra' ? 2 : '20 KG')),
    //                         "FareTypeID" => $fareInfosType->FareTypeID,
    //                         "sub_class_desc" => $fareInfosType->FareTypeName,
    //                         "FilterRemove" => $fareInfosType->FilterRemove,
    //                         "TOTAL_BASIC_FARE" =>$adult_info->BaseFareAmtNoTaxes + $child_info->BaseFareAmtNoTaxes + $infant_info->BaseFareAmtNoTaxes,
    //                         'FARE_PAX_WISE' => [
    //                             'ADULT' => [
    //                                 // "BASIC_FARE" => $_FARES[0]->BaseFareAmtNoTaxes,
    //                                 // "TAX" => ($_FARES[0]->BaseFareAmtInclTax - $_FARES[0]->BaseFareAmtNoTaxes),
    //                                 // "TOTAL" => $_FARES[0]->BaseFareAmtInclTax,
    //                                 // "FEES" => 0,
    //                                 // "SURCHARGE" => 0,
    //                                 "BASIC_FARE" =>$adult_info->BaseFareAmtNoTaxes,
    //                                 "TAX" => ($adult_info->BaseFareAmtInclTax - $adult_info->BaseFareAmtNoTaxes),
    //                                 "TOTAL" => $adult_info->BaseFareAmtInclTax,
    //                                 "FEES" => 0,
    //                                 "SURCHARGE" => 0,
    //                                 "FCCode" => $adult_info->FCCode,
    //                                 "FBCode" => $adult_info->FBCode,
    //                             ],
    //                             'CHILD' => [
    //                                 // "BASIC_FARE" => $_FARES[1]->BaseFareAmtNoTaxes,
    //                                 // "TAX" => ($_FARES[1]->BaseFareAmtInclTax - $_FARES[1]->BaseFareAmtNoTaxes),
    //                                 // "TOTAL" => $_FARES[1]->BaseFareAmtInclTax,
    //                                 // "FEES" => 0,
    //                                 // "SURCHARGE" => 0
    //                                 "BASIC_FARE" =>$child_info->BaseFareAmtNoTaxes,
    //                                 "TAX" => ($child_info->BaseFareAmtInclTax - $child_info->BaseFareAmtNoTaxes),
    //                                 "TOTAL" => $child_info->BaseFareAmtInclTax,
    //                                 "FEES" => 0,
    //                                 "SURCHARGE" => 0,
    //                                 "FCCode" => $child_info->FCCode,
    //                                 "FBCode" => $child_info->FBCode,


    //                             ],
    //                             'INFANT' => [
    //                                 // "BASIC_FARE" => $_FARES[2]->BaseFareAmtNoTaxes,
    //                                 // "TAX" => ($_FARES[2]->BaseFareAmtInclTax - $_FARES[2]->BaseFareAmtNoTaxes),
    //                                 // "TOTAL" => $_FARES[2]->BaseFareAmtInclTax,
    //                                 // "FEES" => 0,
    //                                 // "SURCHARGE" => 0
    //                                 "BASIC_FARE" =>$infant_info->BaseFareAmtNoTaxes,
    //                                 "TAX" => ($infant_info->BaseFareAmtInclTax - $infant_info->BaseFareAmtNoTaxes),
    //                                 "TOTAL" => $infant_info->BaseFareAmtInclTax,
    //                                 "FEES" => 0,
    //                                 "SURCHARGE" => 0,
    //                                 "FCCode" => $infant_info->FCCode,
    //                                 "FBCode" => $infant_info->FBCode,

    //                             ]
    //                         ]
    //                     ];
    //                     // dd($FARES);

    //                     $FARES['FARE_PAX_WISE']['ADULT'] = collect($FARES['FARE_PAX_WISE']['ADULT'])->merge($adult_info)->toArray();
    //                     $FARES['FARE_PAX_WISE']['CHILD'] = collect($FARES['FARE_PAX_WISE']['CHILD'])->merge($child_info)->toArray();
    //                     $FARES['FARE_PAX_WISE']['INFANT'] = collect($FARES['FARE_PAX_WISE']['INFANT'])->merge($infant_info)->toArray();
    //                     $FARES['TOTAL'] = (\request('AdultNo') * $FARES['FARE_PAX_WISE']['ADULT']['TOTAL'] +
    //                         \request('ChildNo') * $FARES['FARE_PAX_WISE']['CHILD']['TOTAL'] +
    //                         \request('InfantNo') * $FARES['FARE_PAX_WISE']['INFANT']['TOTAL']);
    //                     // dd($FARES);
    //                     // dd($FARES['TOTAL']);
    //                     $FLIGHT['BAGGAGE_FARE'][] = $FARES;
    //                 }
    //             }
    //             //$FLIGHTS['outbound'][] = $FLIGHT;
    //             $FLIGHTS[$TYPE][$FLIGHT['FLIGHT_NO']] = $FLIGHT;
    //             // dd($FLIGHTS[$TYPE][$FLIGHT['FLIGHT_NO']]);
    //             //array_push($FLIGHTS, $FLIGHT);
    //         }
    //     }

    //     //$DURATION = \Carbon\Carbon::parse($FareQuote->SegmentDetails->SegmentDetail->DepartureDate)->diff(\Carbon\Carbon::parse($FareQuote->SegmentDetails->SegmentDetail->ArrivalDate));
    //     //$response['DURATION'] = $DURATION->format('H i');
    //     // dd($FLIGHTS);
    //     if(empty($FLIGHTS)){
    //         $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'UnSuccess';
    //     }else{
    //         $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'Success';
    //     }
    //     return array_map('array_values', $FLIGHTS);
    // }


}
