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

    public static function set_credential(){
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
   
	public static function parseXML($xml){
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
                // dd($Body);

        $minifiedBody = preg_replace('/\s+/', ' ', $Body);
        $Body = str_replace('> <', '><', $minifiedBody);

        $Signature_String = $AuthAppID . "|" . $AuthUserID . "|" . $ServiceName . "|" . $Language . "|" . $AuthAppID . "|" . $Timestamp . "|" . $Body . "|" . $Version . "|" . $ClientIP;

        $signature_key = self::$credential['SignatureKey'];
    
        $signature = SignatureUtil::newEncodeSHA($Signature_String, $signature_key);
        
        $signature = htmlspecialchars($signature);
        return [$signature, $Timestamp, $Body];
    }

    function convertToArrayIfNotExists($data) {
        if (!is_array($data)) {
            return [$data];
        }
        return $data;
    }

    public static function getSingleFlight(){
        
        $makeSigningKeyNTimeXml = self::makeSigningKey();
        
        $client = new Client();

        self::set_credential();
        $Passengers = array_map(
            fn($key, $value) => [$key => $value], 
            ['ADT', 'CHD', 'INF'], 
            [request('AdultNo', 1),
            request('ChildNo', 0), 
            request('InfantNo', 0)]
        );

        

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
       
        $Body = $makeSigningKeyNTimeXml[2];

        $response = $client->request('POST', self::$credential['EndPoint'], [
            'headers' => $headers,
            'body' => $Body
        ]);
        // dd($response);
        // org
        // $xml = $response->getBody()->getContents();
        // dd($xml);

        // dd();       

        // dd($a->Response->OffersGroup->CarrierOffers);
        
        // org
        // $json_data = self::parseXML($xml);


        $xml = '<IATA_AirShoppingRS xmlns="http://www.iata.org/IATA/2015/00/2020.1/IATA_AirShoppingRS"><Response><DataLists><BaggageAllowanceList><BaggageAllowance><BaggageAllowanceID>BaggageAllowanceID1</BaggageAllowanceID><TypeCode>Checked</TypeCode><WeightAllowance><MaximumWeightMeasure UnitCode="KG">20</MaximumWeightMeasure></WeightAllowance></BaggageAllowance><BaggageAllowance><BaggageAllowanceID>BaggageAllowanceID2</BaggageAllowanceID><TypeCode>Checked</TypeCode><WeightAllowance><MaximumWeightMeasure UnitCode="KG">40</MaximumWeightMeasure></WeightAllowance></BaggageAllowance><BaggageAllowance><BaggageAllowanceID>BaggageAllowanceID3</BaggageAllowanceID><TypeCode>Checked</TypeCode><WeightAllowance><MaximumWeightMeasure UnitCode="KG">80</MaximumWeightMeasure></WeightAllowance></BaggageAllowance></BaggageAllowanceList><OriginDestList><OriginDest><DestCode>ISB</DestCode><OriginCode>KHI</OriginCode><OriginDestID>KHIISB</OriginDestID><PaxJourneyRefID>FLT1</PaxJourneyRefID><PaxJourneyRefID>FLT2</PaxJourneyRefID></OriginDest></OriginDestList><PaxJourneyList><PaxJourney><DistanceMeasure UnitCode="KM">1126</DistanceMeasure><Duration>PT2H</Duration><PaxJourneyID>FLT1</PaxJourneyID><PaxSegmentRefID>SEG1</PaxSegmentRefID></PaxJourney><PaxJourney><DistanceMeasure UnitCode="KM">1126</DistanceMeasure><Duration>PT2H</Duration><PaxJourneyID>FLT2</PaxJourneyID><PaxSegmentRefID>SEG2</PaxSegmentRefID></PaxJourney></PaxJourneyList><PaxList><Pax><PaxID>PAX1</PaxID><PTC>ADT</PTC></Pax></PaxList><PaxSegmentList><PaxSegment><Arrival><AircraftScheduledDateTime>2025-01-31T18:00:00.000+05:00</AircraftScheduledDateTime><IATA_LocationCode>ISB</IATA_LocationCode></Arrival><Dep><AircraftScheduledDateTime>2025-01-31T16:00:00.000+05:00</AircraftScheduledDateTime><IATA_LocationCode>KHI</IATA_LocationCode></Dep><Duration>PT2H</Duration><MarketingCarrierInfo><CarrierDesigCode>ER</CarrierDesigCode><MarketingCarrierFlightNumberText>502</MarketingCarrierFlightNumberText><OperationalSuffixText/></MarketingCarrierInfo><PaxSegmentID>SEG1</PaxSegmentID></PaxSegment><PaxSegment><Arrival><AircraftScheduledDateTime>2025-01-31T09:00:00.000+05:00</AircraftScheduledDateTime><IATA_LocationCode>ISB</IATA_LocationCode></Arrival><Dep><AircraftScheduledDateTime>2025-01-31T07:00:00.000+05:00</AircraftScheduledDateTime><IATA_LocationCode>KHI</IATA_LocationCode></Dep><Duration>PT2H</Duration><MarketingCarrierInfo><CarrierDesigCode>ER</CarrierDesigCode><MarketingCarrierFlightNumberText>500</MarketingCarrierFlightNumberText><OperationalSuffixText/></MarketingCarrierInfo><PaxSegmentID>SEG2</PaxSegmentID></PaxSegment></PaxSegmentList><PenaltyList><Penalty><CancelFeeInd>true</CancelFeeInd><DescText>Before 4h of departure</DescText><PenaltyID>SEG1-ADT-1</PenaltyID><Price><TotalAmount CurCode="PKR">3500.00</TotalAmount></Price><TypeCode>Cancellation</TypeCode><ExpirationDateTime>2025-01-31T12:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><CancelFeeInd>true</CancelFeeInd><DescText>Within 4h of departure</DescText><PenaltyID>SEG1-ADT-2</PenaltyID><Price><TotalAmount CurCode="PKR">5000.00</TotalAmount></Price><TypeCode>Cancellation</TypeCode><EffectiveDateTime>2025-01-31T12:00:00.000+05:00</EffectiveDateTime><ExpirationDateTime>2025-01-31T16:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><ChangeFeeInd>true</ChangeFeeInd><DescText>Before 4h of departure</DescText><PenaltyID>SEG1-ADT-3</PenaltyID><Price><TotalAmount CurCode="PKR">3000.00</TotalAmount></Price><TypeCode>Change</TypeCode><ExpirationDateTime>2025-01-31T12:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><ChangeFeeInd>true</ChangeFeeInd><DescText>Within 4h of departure</DescText><PenaltyID>SEG1-ADT-4</PenaltyID><Price><TotalAmount CurCode="PKR">4500.00</TotalAmount></Price><TypeCode>Change</TypeCode><EffectiveDateTime>2025-01-31T12:00:00.000+05:00</EffectiveDateTime><ExpirationDateTime>2025-01-31T16:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><CancelFeeInd>true</CancelFeeInd><DescText>Before 4h of departure</DescText><PenaltyID>SEG2-ADT-1</PenaltyID><Price><TotalAmount CurCode="PKR">3500.00</TotalAmount></Price><TypeCode>Cancellation</TypeCode><ExpirationDateTime>2025-01-31T03:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><CancelFeeInd>true</CancelFeeInd><DescText>Within 4h of departure</DescText><PenaltyID>SEG2-ADT-2</PenaltyID><Price><TotalAmount CurCode="PKR">5000.00</TotalAmount></Price><TypeCode>Cancellation</TypeCode><EffectiveDateTime>2025-01-31T03:00:00.000+05:00</EffectiveDateTime><ExpirationDateTime>2025-01-31T07:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><ChangeFeeInd>true</ChangeFeeInd><DescText>Before 4h of departure</DescText><PenaltyID>SEG2-ADT-3</PenaltyID><Price><TotalAmount CurCode="PKR">3000.00</TotalAmount></Price><TypeCode>Change</TypeCode><ExpirationDateTime>2025-01-31T03:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><ChangeFeeInd>true</ChangeFeeInd><DescText>Within 4h of departure</DescText><PenaltyID>SEG2-ADT-4</PenaltyID><Price><TotalAmount CurCode="PKR">4500.00</TotalAmount></Price><TypeCode>Change</TypeCode><EffectiveDateTime>2025-01-31T03:00:00.000+05:00</EffectiveDateTime><ExpirationDateTime>2025-01-31T07:00:00.000+05:00</ExpirationDateTime></Penalty></PenaltyList><PriceClassList><PriceClass><Name>FREE BAGGAGE</Name><PriceClassID>FREEBAGGAGE</PriceClassID></PriceClass><PriceClass><Name>ECONOMYREGULAR</Name><PriceClassID>ECONOMYREGULAR</PriceClassID></PriceClass><PriceClass><Name>Serene Plus</Name><PriceClassID>SERENEPLUS</PriceClassID></PriceClass></PriceClassList><ServiceDefinitionList><ServiceDefinition><Desc><DescText>FREE BAGGAGE (20KG)</DescText></Desc><Name>LB</Name><OwnerCode>ER</OwnerCode><ServiceCode>XBAG</ServiceCode><ServiceDefinitionAssociation><BaggageAllowanceRef><BaggageAllowanceRefID>BaggageAllowanceID1</BaggageAllowanceRefID></BaggageAllowanceRef></ServiceDefinitionAssociation><ServiceDefinitionID>SRV1</ServiceDefinitionID></ServiceDefinition><ServiceDefinition><Desc><DescText>ECONOMY REGULAR (40KG)</DescText></Desc><Name>REG</Name><OwnerCode>ER</OwnerCode><ServiceCode>XBAG</ServiceCode><ServiceDefinitionAssociation><BaggageAllowanceRef><BaggageAllowanceRefID>BaggageAllowanceID2</BaggageAllowanceRefID></BaggageAllowanceRef></ServiceDefinitionAssociation><ServiceDefinitionID>SRV2</ServiceDefinitionID></ServiceDefinition></ServiceDefinitionList></DataLists><OffersGroup><CarrierOffers><CarrierOffersSummary><MatchedOfferQty>5</MatchedOfferQty></CarrierOffersSummary><Offer><JourneyOverview><JourneyPriceClass><PaxJourneyRefID>FLT1</PaxJourneyRefID></JourneyPriceClass></JourneyOverview><OfferID>17376272350166AEC9F7-1</OfferID><OfferItem><FareDetail><FareComponent><CabinType><CabinTypeName>Y</CabinTypeName></CabinType><FareRule><PenaltyRefID>SEG1-ADT-1</PenaltyRefID><PenaltyRefID>SEG1-ADT-2</PenaltyRefID><PenaltyRefID>SEG1-ADT-3</PenaltyRefID><PenaltyRefID>SEG1-ADT-4</PenaltyRefID></FareRule><PaxSegmentRefID>SEG1</PaxSegmentRefID><Price><BaseAmount CurCode="PKR">10398.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">19534.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">6966.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><TotalTaxAmount CurCode="PKR">9136.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">19534.66</TotalAmount></Price><PriceClassRefID>FREEBAGGAGE</PriceClassRefID><RBD><RBD_Code>T</RBD_Code></RBD></FareComponent><PaxRefID>PAX1</PaxRefID><Price><BaseAmount CurCode="PKR">10398.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">19534.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">6966.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">9136.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">19534.66</TotalAmount></Price></FareDetail><MandatoryInd>true</MandatoryInd><OfferItemID>17376272350166AEC9F7-1-1</OfferItemID><Price><BaseAmount CurCode="PKR">10398.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">19534.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">6966.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">9136.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">19534.66</TotalAmount></Price><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><ServiceDefinitionRef><PaxSegmentRefID>SEG1</PaxSegmentRefID><ServiceDefinitionRefID>SRV1</ServiceDefinitionRefID></ServiceDefinitionRef></ServiceAssociations><ServiceID>1</ServiceID></Service><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><PaxJourneyRef><PaxJourneyRefID>FLT1</PaxJourneyRefID></PaxJourneyRef></ServiceAssociations><ServiceID>2</ServiceID></Service></OfferItem><OwnerCode>ER</OwnerCode></Offer><Offer><JourneyOverview><JourneyPriceClass><PaxJourneyRefID>FLT1</PaxJourneyRefID></JourneyPriceClass></JourneyOverview><OfferID>17376272350166AEC9F7-2</OfferID><OfferItem><FareDetail><FareComponent><CabinType><CabinTypeName>Y</CabinTypeName></CabinType><FareRule><PenaltyRefID>SEG1-ADT-1</PenaltyRefID><PenaltyRefID>SEG1-ADT-2</PenaltyRefID><PenaltyRefID>SEG1-ADT-3</PenaltyRefID><PenaltyRefID>SEG1-ADT-4</PenaltyRefID></FareRule><PaxSegmentRefID>SEG1</PaxSegmentRefID><Price><BaseAmount CurCode="PKR">11398.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">21204.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">7636.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><TotalTaxAmount CurCode="PKR">9806.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">21204.66</TotalAmount></Price><PriceClassRefID>ECONOMYREGULAR</PriceClassRefID><RBD><RBD_Code>T</RBD_Code></RBD></FareComponent><PaxRefID>PAX1</PaxRefID><Price><BaseAmount CurCode="PKR">11398.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">21204.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">7636.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">9806.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">21204.66</TotalAmount></Price></FareDetail><MandatoryInd>true</MandatoryInd><OfferItemID>17376272350166AEC9F7-2-1</OfferItemID><Price><BaseAmount CurCode="PKR">11398.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">21204.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">7636.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">9806.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">21204.66</TotalAmount></Price><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><ServiceDefinitionRef><PaxSegmentRefID>SEG1</PaxSegmentRefID><ServiceDefinitionRefID>SRV2</ServiceDefinitionRefID></ServiceDefinitionRef></ServiceAssociations><ServiceID>1</ServiceID></Service><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><PaxJourneyRef><PaxJourneyRefID>FLT1</PaxJourneyRefID></PaxJourneyRef></ServiceAssociations><ServiceID>2</ServiceID></Service></OfferItem><OwnerCode>ER</OwnerCode></Offer><Offer><BaggageAllowance><BaggageAllowanceRefID>BaggageAllowanceID3</BaggageAllowanceRefID><BaggageFlightAssociations><PaxSegmentRef><PaxSegmentRefID>SEG1</PaxSegmentRefID></PaxSegmentRef></BaggageFlightAssociations><PaxRefID>PAX1</PaxRefID></BaggageAllowance><JourneyOverview><JourneyPriceClass><PaxJourneyRefID>FLT1</PaxJourneyRefID></JourneyPriceClass></JourneyOverview><OfferID>17376272350166AEC9F7-3</OfferID><OfferItem><FareDetail><FareComponent><CabinType><CabinTypeName>J</CabinTypeName></CabinType><FareRule><PenaltyRefID>SEG1-ADT-1</PenaltyRefID><PenaltyRefID>SEG1-ADT-2</PenaltyRefID><PenaltyRefID>SEG1-ADT-3</PenaltyRefID><PenaltyRefID>SEG1-ADT-4</PenaltyRefID></FareRule><PaxSegmentRefID>SEG1</PaxSegmentRefID><Price><BaseAmount CurCode="PKR">13698.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">25045.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">9177.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><TotalTaxAmount CurCode="PKR">11347.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">25045.66</TotalAmount></Price><PriceClassRefID>SERENEPLUS</PriceClassRefID><RBD><RBD_Code>I</RBD_Code></RBD></FareComponent><PaxRefID>PAX1</PaxRefID><Price><BaseAmount CurCode="PKR">13698.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">25045.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">9177.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">11347.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">25045.66</TotalAmount></Price></FareDetail><MandatoryInd>true</MandatoryInd><OfferItemID>17376272350166AEC9F7-3-1</OfferItemID><Price><BaseAmount CurCode="PKR">13698.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">25045.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">9177.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">11347.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">25045.66</TotalAmount></Price><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><PaxJourneyRef><PaxJourneyRefID>FLT1</PaxJourneyRefID></PaxJourneyRef></ServiceAssociations><ServiceID>1</ServiceID></Service></OfferItem><OwnerCode>ER</OwnerCode></Offer><Offer><JourneyOverview><JourneyPriceClass><PaxJourneyRefID>FLT2</PaxJourneyRefID></JourneyPriceClass></JourneyOverview><OfferID>17376272350166AEC9F7-4</OfferID><OfferItem><FareDetail><FareComponent><CabinType><CabinTypeName>Y</CabinTypeName></CabinType><FareRule><PenaltyRefID>SEG2-ADT-1</PenaltyRefID><PenaltyRefID>SEG2-ADT-2</PenaltyRefID><PenaltyRefID>SEG2-ADT-3</PenaltyRefID><PenaltyRefID>SEG2-ADT-4</PenaltyRefID></FareRule><PaxSegmentRefID>SEG2</PaxSegmentRefID><Price><BaseAmount CurCode="PKR">8598.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">16528.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">5760.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><TotalTaxAmount CurCode="PKR">7930.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">16528.66</TotalAmount></Price><PriceClassRefID>FREEBAGGAGE</PriceClassRefID><RBD><RBD_Code>L</RBD_Code></RBD></FareComponent><PaxRefID>PAX1</PaxRefID><Price><BaseAmount CurCode="PKR">8598.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">16528.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">5760.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">7930.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">16528.66</TotalAmount></Price></FareDetail><MandatoryInd>true</MandatoryInd><OfferItemID>17376272350166AEC9F7-4-1</OfferItemID><Price><BaseAmount CurCode="PKR">8598.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">16528.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">5760.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">7930.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">16528.66</TotalAmount></Price><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><ServiceDefinitionRef><PaxSegmentRefID>SEG2</PaxSegmentRefID><ServiceDefinitionRefID>SRV1</ServiceDefinitionRefID></ServiceDefinitionRef></ServiceAssociations><ServiceID>1</ServiceID></Service><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><PaxJourneyRef><PaxJourneyRefID>FLT2</PaxJourneyRefID></PaxJourneyRef></ServiceAssociations><ServiceID>2</ServiceID></Service></OfferItem><OwnerCode>ER</OwnerCode></Offer><Offer><JourneyOverview><JourneyPriceClass><PaxJourneyRefID>FLT2</PaxJourneyRefID></JourneyPriceClass></JourneyOverview><OfferID>17376272350166AEC9F7-5</OfferID><OfferItem><FareDetail><FareComponent><CabinType><CabinTypeName>Y</CabinTypeName></CabinType><FareRule><PenaltyRefID>SEG2-ADT-1</PenaltyRefID><PenaltyRefID>SEG2-ADT-2</PenaltyRefID><PenaltyRefID>SEG2-ADT-3</PenaltyRefID><PenaltyRefID>SEG2-ADT-4</PenaltyRefID></FareRule><PaxSegmentRefID>SEG2</PaxSegmentRefID><Price><BaseAmount CurCode="PKR">9598.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">18198.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">6430.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><TotalTaxAmount CurCode="PKR">8600.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">18198.66</TotalAmount></Price><PriceClassRefID>ECONOMYREGULAR</PriceClassRefID><RBD><RBD_Code>L</RBD_Code></RBD></FareComponent><PaxRefID>PAX1</PaxRefID><Price><BaseAmount CurCode="PKR">9598.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">18198.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">6430.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">8600.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">18198.66</TotalAmount></Price></FareDetail><MandatoryInd>true</MandatoryInd><OfferItemID>17376272350166AEC9F7-5-1</OfferItemID><Price><BaseAmount CurCode="PKR">9598.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">18198.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">6430.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">8600.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">18198.66</TotalAmount></Price><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><ServiceDefinitionRef><PaxSegmentRefID>SEG2</PaxSegmentRefID><ServiceDefinitionRefID>SRV2</ServiceDefinitionRefID></ServiceDefinitionRef></ServiceAssociations><ServiceID>1</ServiceID></Service><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><PaxJourneyRef><PaxJourneyRefID>FLT2</PaxJourneyRefID></PaxJourneyRef></ServiceAssociations><ServiceID>2</ServiceID></Service></OfferItem><OwnerCode>ER</OwnerCode></Offer></CarrierOffers></OffersGroup><ShoppingResponse><ShoppingResponseRefID>17376272350166AEC9F7</ShoppingResponseRefID></ShoppingResponse></Response></IATA_AirShoppingRS>';
        $json_data = self::parseXML($xml);

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
        
        $PaxJourneyList = $json_data->Response->DataLists->PaxJourneyList;
        $FLIGHTS = [];
        if($json_data->Response->DataLists){
            $counter = 0;
            foreach($mergedOffers as $Key => $Offer) {
                if( is_array($json_data->Response->DataLists->PaxSegmentList->PaxSegment) ) {
                    $DURATION = substr($PaxJourneyList->PaxJourney[$counter]->Duration,2);
                    $SegmentDetail = $json_data->Response->DataLists->PaxSegmentList->PaxSegment[$counter];
                } else if($json_data->Response->DataLists->PaxSegmentList->PaxSegment) {
                    $DURATION = $PaxJourneyList->PaxJourney->Duration;
                    $SegmentDetail = $json_data->Response->DataLists->PaxSegmentList->PaxSegment;
                }

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
                    "DURATION" => $DURATION,
                    "STATUS" => "ONTIME",
                    'ShoppingResponseRefID' => $json_data->Response->ShoppingResponse->ShoppingResponseRefID,
                    'PaxList' => $json_data->Response->DataLists->PaxList,
                    'TimeStamp' => $makeSigningKeyNTimeXml[1],
                ];
                $counter++;



                $no_of_bags = 0;

                foreach($Offer as $PassengersDetails) {

                    $PassengersDetails->OfferItem->FareDetail = self::convertToArrayIfNotExists($PassengersDetails->OfferItem->FareDetail);


                    foreach($PassengersDetails->OfferItem->FareDetail as $key => $FareDetails) {

                        if ($Passengers[$key]['ADT']) {

                            $farePaxWise['ADULT'] = [
                                "BAGGAGE_NAME" => $FareDetails->FareComponent->PriceClassRefID,
                                "BASIC_FARE" => $FareDetails->Price->BaseAmount,
                                "TAX" => $FareDetails->Price->TaxSummary->TotalTaxAmount,
                                "TOTAL" => $FareDetails->Price->TotalAmount,
                                "FEES" => 0,
                                "SURCHARGE" => 0,
                            ];
                        }

                        if ($Passengers[$key]['CHD']) {
                            $farePaxWise['CHILD'] = [
                                "BAGGAGE_NAME" => $FareDetails->FareComponent->PriceClassRefID,
                                "BASIC_FARE" => $FareDetails->Price->BaseAmount,
                                "TAX" => $FareDetails->Price->TaxSummary->TotalTaxAmount,
                                "TOTAL" => $FareDetails->Price->TotalAmount,
                                "FEES" => 0,
                                "SURCHARGE" => 0,
                            ];
                        }
                        if ($Passengers[$key]['INF']) {
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

                    foreach($MergedData as $Baggages) {
                        if($Baggages['PriceClassID'] == $farePaxWise['ADULT']['BAGGAGE_NAME']){
                            $FARES = [
                                
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
                    $FLIGHTS[$TYPE][$FLIGHT['FLIGHT_NO']] = $FLIGHT;
                    $no_of_bags++;
    
                }

            }

        }

        if(empty($FLIGHTS)){
            $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'UnSuccess';
        }else{
            $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'Success';
        }
        return array_map('array_values', $FLIGHTS);
    }

    public static function makeSigningKeyOrderCreateRQ($params, $flights){
        
        // dd($flights['outbound']->flight->TimeStamp);

        $OfferID = $flights['outbound']->baggage->OfferID;
        $OfferItemID = $flights['outbound']->baggage->OfferItemID;
        $ShoppingResponseRefID = $flights['outbound']->flight->ShoppingResponseRefID;
        $Mobile = $params['MOBILE'];
        $Email = $params['EMAIL'];
        $Passengers = $params['TRAVELERS_INFORMATION'];
        $ContactInfoFN = $Passengers['ADT'][0]['Firstname'];
        $ContactInfoLN = $Passengers['ADT'][0]['Lastname'];
        $PaxList = $flights['outbound']->flight->PaxList;
        $PaxList = self::convertToArrayIfNotExists($PaxList->Pax);
        $FlightTimeStamp = $flights['outbound']->flight->TimeStamp;
        // dd($PaxList);


        self::set_credential();

        $ServiceName = "NDC_ORDERCREATE_SERVICE";
        $AuthUserID = self::$credential['AuthUserID'];
        $AuthAppID = self::$credential['AuthAppID'];
        $Version = "20.1";
        $Language = "en_US";
        $Timestamp = $FlightTimeStamp;
        $TimeZone = "+00:00";
        $ClientIP = self::$credential['IP'];
        $ContentType = "application/xml;charset=UTF-8";

    
            $Body = '<IATA_OrderCreateRQ xmlns="http://www.iata.org/IATA/2015/00/2020.1/IATA_OrderCreateRQ">
                <Request>
                    <CreateOrder>
                        <SelectedOffer>
                            <OfferRefID>'.$OfferID.'</OfferRefID>
                            <OwnerCode>ER</OwnerCode>
                            <SelectedOfferItem>
                                <OfferItemRefID>'.$OfferItemID.'</OfferItemRefID>';
                                foreach($PaxList as $PaxListPerson) {
                                    $Body .='<PaxRefID>'.$PaxListPerson->PaxID.'</PaxRefID>';
                                }
                                $Body .='</SelectedOfferItem>
                            <ShoppingResponseRefID>'.$ShoppingResponseRefID.'</ShoppingResponseRefID>
                        </SelectedOffer>
                    </CreateOrder>
                    <DataLists>
                        <ContactInfoList>
                            <ContactInfo>
                                <IndividualRefID>PAX1</IndividualRefID>
                                <Phone>
                                    <AreaCodeNumber>92</AreaCodeNumber>
                                    <PhoneNumber>'.$Mobile.'</PhoneNumber>
                                </Phone>
                                <EmailAddress>
                                    <EmailAddressText>'.$Email.'</EmailAddressText>
                                </EmailAddress>
                            </ContactInfo>
                            <ContactInfo>
                                <ContactPurposeText>3</ContactPurposeText>
                                <Phone>
                                    <AreaCodeNumber>92</AreaCodeNumber>
                                    <PhoneNumber>'.$Mobile.'</PhoneNumber>
                                </Phone>
                                <EmailAddress>
                                    <EmailAddressText>'.$Email.'</EmailAddressText>
                                </EmailAddress>
                                <Individual>
                                    <Surname>'.$ContactInfoFN.'</Surname>
                                    <GivenName>'.$ContactInfoLN.'</GivenName>
                                </Individual>
                            </ContactInfo>
                        </ContactInfoList>
                        <PaxList>';

                            $PaxIndividualID = 1;
                            $PaxListCounter = 0;
                            $PaxRefID = 1;
                        
                            foreach($Passengers as $key => $Passenger) {
                                foreach($Passenger as $Passenger) {
                                $Body .='<Pax>
                                    <CitizenshipCountryCode>PK</CitizenshipCountryCode>
                                    <IdentityDoc>
                                        <ExpiryDate>2025-11-04</ExpiryDate>
                                        <GivenName>'.$Passenger['Firstname'].'</GivenName>
                                        <IdentityDocID>'.(str_replace('-','',$Passenger['Cnic'])).'</IdentityDocID>
                                        <IdentityDocTypeCode>CNIC</IdentityDocTypeCode>
                                        <IssuingCountryCode>PK</IssuingCountryCode>
                                        <Surname>'.$Passenger['Lastname'].'</Surname>
                                    </IdentityDoc>
                                    <Individual>
                                        <Birthdate>'.$Passenger['Dob'].'</Birthdate>
                                        <GenderCode>M</GenderCode>
                                        <GivenName>'.$Passenger['Firstname'].'</GivenName>
                                        <IndividualID>PAX'.$PaxIndividualID.'</IndividualID>
                                        <Surname>'.$Passenger['Lastname'].'</Surname>
                                    </Individual>
                                    <PaxID>PAX'.$PaxIndividualID.'</PaxID>
                                    <PTC>'.$key.'</PTC>';
                                    if($PaxList[$PaxListCounter]->PTC == 'INF') {
                                        $Body .='<PaxRefID>PAX'.$PaxRefID.'</PaxRefID>';
                                        $PaxRefID++;
                                    }
                                    $Body .='</Pax>';
                                    $PaxIndividualID++;
                                    $PaxListCounter++;
                                }
                                
                            }
                        $Body .='</PaxList>
                    </DataLists>
                </Request>
                </IATA_OrderCreateRQ>';

        $minifiedBody = preg_replace('/\s+/', ' ', $Body);
        $Body = str_replace('> <', '><', $minifiedBody);
        // dd($Body);
        $Signature_String = $AuthAppID . "|" . $AuthUserID . "|" . $ServiceName . "|" . $Language . "|" . $AuthAppID . "|" . $Timestamp . "|" . $Body . "|" . $Version . "|" . $ClientIP;
        
        $signature_key = self::$credential['SignatureKey'];
    
        $signature = SignatureUtil::newEncodeSHA($Signature_String, $signature_key);
        
        $signature = htmlspecialchars($signature);
        return [$signature, $Timestamp, $Body];
    }

    public static function OrderCreateRQ($params, $flights, $makeSigningKeyOrderCreateRQ){
        
        // dd($flights);
        
        $client = new Client();

        self::set_credential();

        $headers = [
            'ServiceName' => 'NDC_ORDERCREATE_SERVICE',
            'AuthUserID' => self::$credential['AuthUserID'],
            'AuthAppID' => self::$credential['AuthAppID'],
            'AuthTktdeptid' => self::$credential['AuthTktdeptid'],
            'Version' => '20.1',
            'Language' => 'en_US',
            // 'Token' => 'CHALOJE',
            'Timestamp' => $flights['outbound']->flight->TimeStamp,
            'TimeZone' => '+00:00',
            'ClientIP' => self::$credential['IP'],
            'Content-Type' => 'application/xml;charset=UTF-8',
            'Sign' => $makeSigningKeyOrderCreateRQ[0],
        ];
       
        $Body = $makeSigningKeyOrderCreateRQ[2];
        // dd($Body);

        $response = $client->request('POST', self::$credential['EndPoint'], [
            'headers' => $headers,
            'body' => $Body
        ]);


        // $xml = $response->getBody()->getContents();
        $xml = '<IATA_OrderViewRS xmlns="http://www.iata.org/IATA/2015/00/2020.1/IATA_OrderViewRS"><Response><DataLists><BaggageAllowanceList><BaggageAllowance><BaggageAllowanceID>BaggageAllowanceID1</BaggageAllowanceID><TypeCode>Checked</TypeCode><WeightAllowance><MaximumWeightMeasure UnitCode="KG">80</MaximumWeightMeasure></WeightAllowance></BaggageAllowance></BaggageAllowanceList><ContactInfoList><ContactInfo><ContactInfoID>PAX1-1</ContactInfoID><EmailAddress><EmailAddressText>s.dilawarali95@gmail.com</EmailAddressText></EmailAddress><IndividualRefID>PAX1</IndividualRefID><Phone><AreaCodeNumber>92</AreaCodeNumber><PhoneNumber>0321-8969503</PhoneNumber></Phone></ContactInfo><ContactInfo><ContactInfoID>Emergency contact</ContactInfoID><ContactPurposeText>3</ContactPurposeText><EmailAddress><EmailAddressText>s.dilawarali95@gmail.com</EmailAddressText></EmailAddress><Individual><GivenName>Rizvi</GivenName><Surname>Syed Yaseen Ali</Surname></Individual><Phone><AreaCodeNumber>92</AreaCodeNumber><PhoneNumber>0321-8969503</PhoneNumber></Phone></ContactInfo></ContactInfoList><OriginDestList><OriginDest><DestCode>ISB</DestCode><OriginCode>KHI</OriginCode><OriginDestID>KHIISB</OriginDestID><PaxJourneyRefID>FLT1</PaxJourneyRefID></OriginDest></OriginDestList><PaxJourneyList><PaxJourney><PaxJourneyID>FLT1</PaxJourneyID><PaxSegmentRefID>SEG1</PaxSegmentRefID></PaxJourney></PaxJourneyList><PaxList><Pax><CitizenshipCountryCode>PK</CitizenshipCountryCode><IdentityDoc><ExpiryDate>2025-11-04Z</ExpiryDate><GivenName>Syed Yaseen Ali</GivenName><IdentityDocID>5433222344666</IdentityDocID><IdentityDocTypeCode>CNIC</IdentityDocTypeCode><IssuingCountryCode>PK</IssuingCountryCode><Surname>Rizvi</Surname></IdentityDoc><Individual><Birthdate>2004-09-16Z</Birthdate><GenderCode>M</GenderCode><GivenName>Syed Yaseen Ali</GivenName><IndividualID>PAX1</IndividualID><Surname>Rizvi</Surname></Individual><PaxID>PAX1</PaxID><PTC>ADT</PTC></Pax></PaxList><PaxSegmentList><PaxSegment><Arrival><AircraftScheduledDateTime>2025-01-31T18:00:00.000+05:00</AircraftScheduledDateTime><IATA_LocationCode>ISB</IATA_LocationCode></Arrival><Dep><AircraftScheduledDateTime>2025-01-31T16:00:00.000+05:00</AircraftScheduledDateTime><IATA_LocationCode>KHI</IATA_LocationCode></Dep><MarketingCarrierInfo><CarrierDesigCode>ER</CarrierDesigCode><MarketingCarrierFlightNumberText>502</MarketingCarrierFlightNumberText><OperationalSuffixText/></MarketingCarrierInfo><PaxSegmentID>SEG1</PaxSegmentID></PaxSegment></PaxSegmentList><PenaltyList><Penalty><CancelFeeInd>true</CancelFeeInd><DescText>Before 4h of departure</DescText><PenaltyID>SEG1-ADT-1</PenaltyID><Price><TotalAmount CurCode="PKR">3500.00</TotalAmount></Price><TypeCode>Cancellation</TypeCode><ExpirationDateTime>2025-01-31T12:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><CancelFeeInd>true</CancelFeeInd><DescText>Within 4h of departure</DescText><PenaltyID>SEG1-ADT-2</PenaltyID><Price><TotalAmount CurCode="PKR">5000.00</TotalAmount></Price><TypeCode>Cancellation</TypeCode><EffectiveDateTime>2025-01-31T12:00:00.000+05:00</EffectiveDateTime><ExpirationDateTime>2025-01-31T16:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><ChangeFeeInd>true</ChangeFeeInd><DescText>Before 4h of departure</DescText><PenaltyID>SEG1-ADT-3</PenaltyID><Price><TotalAmount CurCode="PKR">3000.00</TotalAmount></Price><TypeCode>Change</TypeCode><ExpirationDateTime>2025-01-31T12:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><ChangeFeeInd>true</ChangeFeeInd><DescText>Within 4h of departure</DescText><PenaltyID>SEG1-ADT-4</PenaltyID><Price><TotalAmount CurCode="PKR">4500.00</TotalAmount></Price><TypeCode>Change</TypeCode><EffectiveDateTime>2025-01-31T12:00:00.000+05:00</EffectiveDateTime><ExpirationDateTime>2025-01-31T16:00:00.000+05:00</ExpirationDateTime></Penalty></PenaltyList><PriceClassList><PriceClass><Name>Serene Plus</Name><PriceClassID>SERENEPLUS</PriceClassID></PriceClass></PriceClassList></DataLists><Order><CreationDateTime>2025-01-23T10:17:27.000Z</CreationDateTime><OrderID>O2025012310172796505</OrderID><OrderItem><CreationDateTime>2025-01-23T10:17:27.000Z</CreationDateTime><FareDetail><FareComponent><CabinType><CabinTypeName>Serene Plus</CabinTypeName></CabinType><FareRule><PenaltyRefID>SEG1-ADT-1</PenaltyRefID><PenaltyRefID>SEG1-ADT-2</PenaltyRefID><PenaltyRefID>SEG1-ADT-3</PenaltyRefID><PenaltyRefID>SEG1-ADT-4</PenaltyRefID></FareRule><PaxSegmentRefID>SEG1</PaxSegmentRefID><Price><BaseAmount CurCode="PKR">13698.00</BaseAmount><TaxSummary><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">9177.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><TotalTaxAmount CurCode="PKR">11347.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">25045.66</TotalAmount></Price><PriceClassRefID>SERENEPLUS</PriceClassRefID><RBD><RBD_Code>I</RBD_Code></RBD></FareComponent><PaxRefID>PAX1</PaxRefID><Price><BaseAmount CurCode="PKR">13698.00</BaseAmount><TaxSummary><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">9177.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><TotalTaxAmount CurCode="PKR">11347.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">25045.66</TotalAmount></Price></FareDetail><OrderItemID>AIR-1</OrderItemID><OwnerCode>ER</OwnerCode><PaymentTimeLimitDateTime>2025-01-23T14:17:28.000Z</PaymentTimeLimitDateTime><Price><BaseAmount CurCode="PKR">13698.00</BaseAmount><TaxSummary><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">9177.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><TotalTaxAmount CurCode="PKR">11347.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">25045.66</TotalAmount></Price><BaggageAllowance><BaggageAllowanceRefID>BaggageAllowanceID1</BaggageAllowanceRefID><BaggageFlightAssociations><PaxSegmentRef><PaxSegmentRefID>SEG1</PaxSegmentRefID></PaxSegmentRef></BaggageFlightAssociations><PaxRefID>PAX1</PaxRefID></BaggageAllowance><Service><BookingRef><BookingID>M0DVJ5</BookingID></BookingRef><PaxRefID>PAX1</PaxRefID><ServiceAssociations><PaxSegmentRef><PaxSegmentRefID>SEG1</PaxSegmentRefID></PaxSegmentRef></ServiceAssociations><ServiceID>PAX1-SEG1</ServiceID></Service><StatusCode>NOT ENTITLED</StatusCode></OrderItem><OwnerCode>ER</OwnerCode><StatusCode>OPENED</StatusCode><TotalPrice><BaseAmount CurCode="PKR">13698.00</BaseAmount><TaxSummary><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">9177.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><TotalTaxAmount CurCode="PKR">11347.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">25045.66</TotalAmount></TotalPrice></Order></Response></IATA_OrderViewRS>';
        // dump($xml);
        $json_data = self::parseXML($xml);
        // dd($json_data->Response->Order->OrderID);
        // dd($json_data->Response->Order->TotalPrice->TotalAmount);
        
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


    // Return Flights

    public static function makeSigningKeyOutBound(){

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
                        <ShoppingCriteria>
                            <FlightCriteria>
                                <FlightCharacteristicsCriteria>
                                    <PrefLevel>
                                        <PrefContextText>OUTBOUND</PrefContextText>
                                    </PrefLevel>
                                </FlightCharacteristicsCriteria>
                            </FlightCriteria>
                        </ShoppingCriteria>
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
                // dd($Body);

        $minifiedBody = preg_replace('/\s+/', ' ', $Body);
        $Body = str_replace('> <', '><', $minifiedBody);

        $Signature_String = $AuthAppID . "|" . $AuthUserID . "|" . $ServiceName . "|" . $Language . "|" . $AuthAppID . "|" . $Timestamp . "|" . $Body . "|" . $Version . "|" . $ClientIP;

        $signature_key = self::$credential['SignatureKey'];
    
        $signature = SignatureUtil::newEncodeSHA($Signature_String, $signature_key);
        
        $signature = htmlspecialchars($signature);
        return [$signature, $Timestamp, $Body];
    }

    public static function getSingleFlightOutBound(){
        
        $makeSigningKeyNTimeXml = self::makeSigningKeyOutBound();
        dd($makeSigningKeyNTimeXml);
        $client = new Client();

        self::set_credential();
        $Passengers = array_map(
            fn($key, $value) => [$key => $value], 
            ['ADT', 'CHD', 'INF'], 
            [request('AdultNo', 1),
            request('ChildNo', 0), 
            request('InfantNo', 0)]
        );

        

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
       
        $Body = $makeSigningKeyNTimeXml[2];

        $response = $client->request('POST', self::$credential['EndPoint'], [
            'headers' => $headers,
            'body' => $Body
        ]);
        // dd($response);
        // org
        $xml = $response->getBody()->getContents();
        // dd($xml);

        // dd();       

        // dd($a->Response->OffersGroup->CarrierOffers);
        
        // org
        $json_data = self::parseXML($xml);

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
        $BaggageAllowances = self::convertToArrayIfNotExists($BaggageAllowances);
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
        
        $PaxJourneyList = $json_data->Response->DataLists->PaxJourneyList;
        $FLIGHTS = [];
        if($json_data->Response->DataLists){
            $counter = 0;
            foreach($mergedOffers as $Key => $Offer) {
                if( is_array($json_data->Response->DataLists->PaxSegmentList->PaxSegment) ) {
                    $DURATION = substr($PaxJourneyList->PaxJourney[$counter]->Duration,2);
                    $SegmentDetail = $json_data->Response->DataLists->PaxSegmentList->PaxSegment[$counter];
                } else if($json_data->Response->DataLists->PaxSegmentList->PaxSegment) {
                    $DURATION = $PaxJourneyList->PaxJourney->Duration;
                    $SegmentDetail = $json_data->Response->DataLists->PaxSegmentList->PaxSegment;
                }

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
                    "DURATION" => $DURATION,
                    "STATUS" => "ONTIME",
                    'ShoppingResponseRefID' => $json_data->Response->ShoppingResponse->ShoppingResponseRefID,
                    'PaxList' => $json_data->Response->DataLists->PaxList,
                    'TimeStamp' => $makeSigningKeyNTimeXml[1],
                ];
                $counter++;



                $no_of_bags = 0;

                foreach($Offer as $PassengersDetails) {

                    $PassengersDetails->OfferItem->FareDetail = self::convertToArrayIfNotExists($PassengersDetails->OfferItem->FareDetail);


                    foreach($PassengersDetails->OfferItem->FareDetail as $key => $FareDetails) {

                        if ($Passengers[$key]['ADT']) {

                            $farePaxWise['ADULT'] = [
                                "BAGGAGE_NAME" => $FareDetails->FareComponent->PriceClassRefID,
                                "BASIC_FARE" => $FareDetails->Price->BaseAmount,
                                "TAX" => $FareDetails->Price->TaxSummary->TotalTaxAmount,
                                "TOTAL" => $FareDetails->Price->TotalAmount,
                                "FEES" => 0,
                                "SURCHARGE" => 0,
                            ];
                        }

                        if ($Passengers[$key]['CHD']) {
                            $farePaxWise['CHILD'] = [
                                "BAGGAGE_NAME" => $FareDetails->FareComponent->PriceClassRefID,
                                "BASIC_FARE" => $FareDetails->Price->BaseAmount,
                                "TAX" => $FareDetails->Price->TaxSummary->TotalTaxAmount,
                                "TOTAL" => $FareDetails->Price->TotalAmount,
                                "FEES" => 0,
                                "SURCHARGE" => 0,
                            ];
                        }
                        if ($Passengers[$key]['INF']) {
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

                    foreach($MergedData as $Baggages) {
                        if($Baggages['PriceClassID'] == $farePaxWise['ADULT']['BAGGAGE_NAME']){
                            $FARES = [
                                
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
                    $FLIGHTS[$TYPE][$FLIGHT['FLIGHT_NO']] = $FLIGHT;
                    $no_of_bags++;
    
                }

            }

        }

        if(empty($FLIGHTS)){
            $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'UnSuccess';
        }else{
            $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'Success';
        }
        return array_map('array_values', $FLIGHTS);
    }

    public static function makeSigningKeyInBound(){

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
                        <ShoppingCriteria>
                            <FlightCriteria>
                                <FlightCharacteristicsCriteria>
                                    <PrefLevel>
                                        <PrefContextText>INBOUND</PrefContextText>
                                    </PrefLevel>
                                </FlightCharacteristicsCriteria>
                            </FlightCriteria>
                        </ShoppingCriteria>
                        <FlightRequest>
                            <ShoppingResponse>
                                <ShoppingResponseRefID>17289783665656BAE5B2</ShoppingResponseRefID>
                            </ShoppingResponse>
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
                // dd($Body);

        $minifiedBody = preg_replace('/\s+/', ' ', $Body);
        $Body = str_replace('> <', '><', $minifiedBody);

        $Signature_String = $AuthAppID . "|" . $AuthUserID . "|" . $ServiceName . "|" . $Language . "|" . $AuthAppID . "|" . $Timestamp . "|" . $Body . "|" . $Version . "|" . $ClientIP;

        $signature_key = self::$credential['SignatureKey'];
    
        $signature = SignatureUtil::newEncodeSHA($Signature_String, $signature_key);
        
        $signature = htmlspecialchars($signature);
        return [$signature, $Timestamp, $Body];
    }

    public static function getSingleFlightInBound($_airserene_response){
        
        dd($_airserene_response);
        $makeSigningKeyNTimeXml = self::makeSigningKeyInBound();
        
        $client = new Client();

        self::set_credential();
        $Passengers = array_map(
            fn($key, $value) => [$key => $value], 
            ['ADT', 'CHD', 'INF'], 
            [request('AdultNo', 1),
            request('ChildNo', 0), 
            request('InfantNo', 0)]
        );

        

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
       
        $Body = $makeSigningKeyNTimeXml[2];

        $response = $client->request('POST', self::$credential['EndPoint'], [
            'headers' => $headers,
            'body' => $Body
        ]);
        // dd($response);
        // org
        // $xml = $response->getBody()->getContents();
        // dd($xml);

        // dd();       

        // dd($a->Response->OffersGroup->CarrierOffers);
        
        // org
        // $json_data = self::parseXML($xml);


        $xml = '<IATA_AirShoppingRS xmlns="http://www.iata.org/IATA/2015/00/2020.1/IATA_AirShoppingRS"><Response><DataLists><BaggageAllowanceList><BaggageAllowance><BaggageAllowanceID>BaggageAllowanceID1</BaggageAllowanceID><TypeCode>Checked</TypeCode><WeightAllowance><MaximumWeightMeasure UnitCode="KG">20</MaximumWeightMeasure></WeightAllowance></BaggageAllowance><BaggageAllowance><BaggageAllowanceID>BaggageAllowanceID2</BaggageAllowanceID><TypeCode>Checked</TypeCode><WeightAllowance><MaximumWeightMeasure UnitCode="KG">40</MaximumWeightMeasure></WeightAllowance></BaggageAllowance><BaggageAllowance><BaggageAllowanceID>BaggageAllowanceID3</BaggageAllowanceID><TypeCode>Checked</TypeCode><WeightAllowance><MaximumWeightMeasure UnitCode="KG">80</MaximumWeightMeasure></WeightAllowance></BaggageAllowance></BaggageAllowanceList><OriginDestList><OriginDest><DestCode>ISB</DestCode><OriginCode>KHI</OriginCode><OriginDestID>KHIISB</OriginDestID><PaxJourneyRefID>FLT1</PaxJourneyRefID><PaxJourneyRefID>FLT2</PaxJourneyRefID></OriginDest></OriginDestList><PaxJourneyList><PaxJourney><DistanceMeasure UnitCode="KM">1126</DistanceMeasure><Duration>PT2H</Duration><PaxJourneyID>FLT1</PaxJourneyID><PaxSegmentRefID>SEG1</PaxSegmentRefID></PaxJourney><PaxJourney><DistanceMeasure UnitCode="KM">1126</DistanceMeasure><Duration>PT2H</Duration><PaxJourneyID>FLT2</PaxJourneyID><PaxSegmentRefID>SEG2</PaxSegmentRefID></PaxJourney></PaxJourneyList><PaxList><Pax><PaxID>PAX1</PaxID><PTC>ADT</PTC></Pax></PaxList><PaxSegmentList><PaxSegment><Arrival><AircraftScheduledDateTime>2025-01-31T18:00:00.000+05:00</AircraftScheduledDateTime><IATA_LocationCode>ISB</IATA_LocationCode></Arrival><Dep><AircraftScheduledDateTime>2025-01-31T16:00:00.000+05:00</AircraftScheduledDateTime><IATA_LocationCode>KHI</IATA_LocationCode></Dep><Duration>PT2H</Duration><MarketingCarrierInfo><CarrierDesigCode>ER</CarrierDesigCode><MarketingCarrierFlightNumberText>502</MarketingCarrierFlightNumberText><OperationalSuffixText/></MarketingCarrierInfo><PaxSegmentID>SEG1</PaxSegmentID></PaxSegment><PaxSegment><Arrival><AircraftScheduledDateTime>2025-01-31T09:00:00.000+05:00</AircraftScheduledDateTime><IATA_LocationCode>ISB</IATA_LocationCode></Arrival><Dep><AircraftScheduledDateTime>2025-01-31T07:00:00.000+05:00</AircraftScheduledDateTime><IATA_LocationCode>KHI</IATA_LocationCode></Dep><Duration>PT2H</Duration><MarketingCarrierInfo><CarrierDesigCode>ER</CarrierDesigCode><MarketingCarrierFlightNumberText>500</MarketingCarrierFlightNumberText><OperationalSuffixText/></MarketingCarrierInfo><PaxSegmentID>SEG2</PaxSegmentID></PaxSegment></PaxSegmentList><PenaltyList><Penalty><CancelFeeInd>true</CancelFeeInd><DescText>Before 4h of departure</DescText><PenaltyID>SEG1-ADT-1</PenaltyID><Price><TotalAmount CurCode="PKR">3500.00</TotalAmount></Price><TypeCode>Cancellation</TypeCode><ExpirationDateTime>2025-01-31T12:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><CancelFeeInd>true</CancelFeeInd><DescText>Within 4h of departure</DescText><PenaltyID>SEG1-ADT-2</PenaltyID><Price><TotalAmount CurCode="PKR">5000.00</TotalAmount></Price><TypeCode>Cancellation</TypeCode><EffectiveDateTime>2025-01-31T12:00:00.000+05:00</EffectiveDateTime><ExpirationDateTime>2025-01-31T16:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><ChangeFeeInd>true</ChangeFeeInd><DescText>Before 4h of departure</DescText><PenaltyID>SEG1-ADT-3</PenaltyID><Price><TotalAmount CurCode="PKR">3000.00</TotalAmount></Price><TypeCode>Change</TypeCode><ExpirationDateTime>2025-01-31T12:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><ChangeFeeInd>true</ChangeFeeInd><DescText>Within 4h of departure</DescText><PenaltyID>SEG1-ADT-4</PenaltyID><Price><TotalAmount CurCode="PKR">4500.00</TotalAmount></Price><TypeCode>Change</TypeCode><EffectiveDateTime>2025-01-31T12:00:00.000+05:00</EffectiveDateTime><ExpirationDateTime>2025-01-31T16:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><CancelFeeInd>true</CancelFeeInd><DescText>Before 4h of departure</DescText><PenaltyID>SEG2-ADT-1</PenaltyID><Price><TotalAmount CurCode="PKR">3500.00</TotalAmount></Price><TypeCode>Cancellation</TypeCode><ExpirationDateTime>2025-01-31T03:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><CancelFeeInd>true</CancelFeeInd><DescText>Within 4h of departure</DescText><PenaltyID>SEG2-ADT-2</PenaltyID><Price><TotalAmount CurCode="PKR">5000.00</TotalAmount></Price><TypeCode>Cancellation</TypeCode><EffectiveDateTime>2025-01-31T03:00:00.000+05:00</EffectiveDateTime><ExpirationDateTime>2025-01-31T07:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><ChangeFeeInd>true</ChangeFeeInd><DescText>Before 4h of departure</DescText><PenaltyID>SEG2-ADT-3</PenaltyID><Price><TotalAmount CurCode="PKR">3000.00</TotalAmount></Price><TypeCode>Change</TypeCode><ExpirationDateTime>2025-01-31T03:00:00.000+05:00</ExpirationDateTime></Penalty><Penalty><ChangeFeeInd>true</ChangeFeeInd><DescText>Within 4h of departure</DescText><PenaltyID>SEG2-ADT-4</PenaltyID><Price><TotalAmount CurCode="PKR">4500.00</TotalAmount></Price><TypeCode>Change</TypeCode><EffectiveDateTime>2025-01-31T03:00:00.000+05:00</EffectiveDateTime><ExpirationDateTime>2025-01-31T07:00:00.000+05:00</ExpirationDateTime></Penalty></PenaltyList><PriceClassList><PriceClass><Name>FREE BAGGAGE</Name><PriceClassID>FREEBAGGAGE</PriceClassID></PriceClass><PriceClass><Name>ECONOMYREGULAR</Name><PriceClassID>ECONOMYREGULAR</PriceClassID></PriceClass><PriceClass><Name>Serene Plus</Name><PriceClassID>SERENEPLUS</PriceClassID></PriceClass></PriceClassList><ServiceDefinitionList><ServiceDefinition><Desc><DescText>FREE BAGGAGE (20KG)</DescText></Desc><Name>LB</Name><OwnerCode>ER</OwnerCode><ServiceCode>XBAG</ServiceCode><ServiceDefinitionAssociation><BaggageAllowanceRef><BaggageAllowanceRefID>BaggageAllowanceID1</BaggageAllowanceRefID></BaggageAllowanceRef></ServiceDefinitionAssociation><ServiceDefinitionID>SRV1</ServiceDefinitionID></ServiceDefinition><ServiceDefinition><Desc><DescText>ECONOMY REGULAR (40KG)</DescText></Desc><Name>REG</Name><OwnerCode>ER</OwnerCode><ServiceCode>XBAG</ServiceCode><ServiceDefinitionAssociation><BaggageAllowanceRef><BaggageAllowanceRefID>BaggageAllowanceID2</BaggageAllowanceRefID></BaggageAllowanceRef></ServiceDefinitionAssociation><ServiceDefinitionID>SRV2</ServiceDefinitionID></ServiceDefinition></ServiceDefinitionList></DataLists><OffersGroup><CarrierOffers><CarrierOffersSummary><MatchedOfferQty>5</MatchedOfferQty></CarrierOffersSummary><Offer><JourneyOverview><JourneyPriceClass><PaxJourneyRefID>FLT1</PaxJourneyRefID></JourneyPriceClass></JourneyOverview><OfferID>17376272350166AEC9F7-1</OfferID><OfferItem><FareDetail><FareComponent><CabinType><CabinTypeName>Y</CabinTypeName></CabinType><FareRule><PenaltyRefID>SEG1-ADT-1</PenaltyRefID><PenaltyRefID>SEG1-ADT-2</PenaltyRefID><PenaltyRefID>SEG1-ADT-3</PenaltyRefID><PenaltyRefID>SEG1-ADT-4</PenaltyRefID></FareRule><PaxSegmentRefID>SEG1</PaxSegmentRefID><Price><BaseAmount CurCode="PKR">10398.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">19534.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">6966.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><TotalTaxAmount CurCode="PKR">9136.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">19534.66</TotalAmount></Price><PriceClassRefID>FREEBAGGAGE</PriceClassRefID><RBD><RBD_Code>T</RBD_Code></RBD></FareComponent><PaxRefID>PAX1</PaxRefID><Price><BaseAmount CurCode="PKR">10398.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">19534.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">6966.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">9136.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">19534.66</TotalAmount></Price></FareDetail><MandatoryInd>true</MandatoryInd><OfferItemID>17376272350166AEC9F7-1-1</OfferItemID><Price><BaseAmount CurCode="PKR">10398.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">19534.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">6966.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">9136.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">19534.66</TotalAmount></Price><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><ServiceDefinitionRef><PaxSegmentRefID>SEG1</PaxSegmentRefID><ServiceDefinitionRefID>SRV1</ServiceDefinitionRefID></ServiceDefinitionRef></ServiceAssociations><ServiceID>1</ServiceID></Service><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><PaxJourneyRef><PaxJourneyRefID>FLT1</PaxJourneyRefID></PaxJourneyRef></ServiceAssociations><ServiceID>2</ServiceID></Service></OfferItem><OwnerCode>ER</OwnerCode></Offer><Offer><JourneyOverview><JourneyPriceClass><PaxJourneyRefID>FLT1</PaxJourneyRefID></JourneyPriceClass></JourneyOverview><OfferID>17376272350166AEC9F7-2</OfferID><OfferItem><FareDetail><FareComponent><CabinType><CabinTypeName>Y</CabinTypeName></CabinType><FareRule><PenaltyRefID>SEG1-ADT-1</PenaltyRefID><PenaltyRefID>SEG1-ADT-2</PenaltyRefID><PenaltyRefID>SEG1-ADT-3</PenaltyRefID><PenaltyRefID>SEG1-ADT-4</PenaltyRefID></FareRule><PaxSegmentRefID>SEG1</PaxSegmentRefID><Price><BaseAmount CurCode="PKR">11398.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">21204.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">7636.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><TotalTaxAmount CurCode="PKR">9806.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">21204.66</TotalAmount></Price><PriceClassRefID>ECONOMYREGULAR</PriceClassRefID><RBD><RBD_Code>T</RBD_Code></RBD></FareComponent><PaxRefID>PAX1</PaxRefID><Price><BaseAmount CurCode="PKR">11398.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">21204.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">7636.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">9806.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">21204.66</TotalAmount></Price></FareDetail><MandatoryInd>true</MandatoryInd><OfferItemID>17376272350166AEC9F7-2-1</OfferItemID><Price><BaseAmount CurCode="PKR">11398.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">21204.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">7636.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">9806.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">21204.66</TotalAmount></Price><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><ServiceDefinitionRef><PaxSegmentRefID>SEG1</PaxSegmentRefID><ServiceDefinitionRefID>SRV2</ServiceDefinitionRefID></ServiceDefinitionRef></ServiceAssociations><ServiceID>1</ServiceID></Service><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><PaxJourneyRef><PaxJourneyRefID>FLT1</PaxJourneyRefID></PaxJourneyRef></ServiceAssociations><ServiceID>2</ServiceID></Service></OfferItem><OwnerCode>ER</OwnerCode></Offer><Offer><BaggageAllowance><BaggageAllowanceRefID>BaggageAllowanceID3</BaggageAllowanceRefID><BaggageFlightAssociations><PaxSegmentRef><PaxSegmentRefID>SEG1</PaxSegmentRefID></PaxSegmentRef></BaggageFlightAssociations><PaxRefID>PAX1</PaxRefID></BaggageAllowance><JourneyOverview><JourneyPriceClass><PaxJourneyRefID>FLT1</PaxJourneyRefID></JourneyPriceClass></JourneyOverview><OfferID>17376272350166AEC9F7-3</OfferID><OfferItem><FareDetail><FareComponent><CabinType><CabinTypeName>J</CabinTypeName></CabinType><FareRule><PenaltyRefID>SEG1-ADT-1</PenaltyRefID><PenaltyRefID>SEG1-ADT-2</PenaltyRefID><PenaltyRefID>SEG1-ADT-3</PenaltyRefID><PenaltyRefID>SEG1-ADT-4</PenaltyRefID></FareRule><PaxSegmentRefID>SEG1</PaxSegmentRefID><Price><BaseAmount CurCode="PKR">13698.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">25045.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">9177.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><TotalTaxAmount CurCode="PKR">11347.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">25045.66</TotalAmount></Price><PriceClassRefID>SERENEPLUS</PriceClassRefID><RBD><RBD_Code>I</RBD_Code></RBD></FareComponent><PaxRefID>PAX1</PaxRefID><Price><BaseAmount CurCode="PKR">13698.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">25045.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">9177.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">11347.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">25045.66</TotalAmount></Price></FareDetail><MandatoryInd>true</MandatoryInd><OfferItemID>17376272350166AEC9F7-3-1</OfferItemID><Price><BaseAmount CurCode="PKR">13698.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">25045.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">9177.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">11347.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">25045.66</TotalAmount></Price><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><PaxJourneyRef><PaxJourneyRefID>FLT1</PaxJourneyRefID></PaxJourneyRef></ServiceAssociations><ServiceID>1</ServiceID></Service></OfferItem><OwnerCode>ER</OwnerCode></Offer><Offer><JourneyOverview><JourneyPriceClass><PaxJourneyRefID>FLT2</PaxJourneyRefID></JourneyPriceClass></JourneyOverview><OfferID>17376272350166AEC9F7-4</OfferID><OfferItem><FareDetail><FareComponent><CabinType><CabinTypeName>Y</CabinTypeName></CabinType><FareRule><PenaltyRefID>SEG2-ADT-1</PenaltyRefID><PenaltyRefID>SEG2-ADT-2</PenaltyRefID><PenaltyRefID>SEG2-ADT-3</PenaltyRefID><PenaltyRefID>SEG2-ADT-4</PenaltyRefID></FareRule><PaxSegmentRefID>SEG2</PaxSegmentRefID><Price><BaseAmount CurCode="PKR">8598.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">16528.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">5760.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><TotalTaxAmount CurCode="PKR">7930.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">16528.66</TotalAmount></Price><PriceClassRefID>FREEBAGGAGE</PriceClassRefID><RBD><RBD_Code>L</RBD_Code></RBD></FareComponent><PaxRefID>PAX1</PaxRefID><Price><BaseAmount CurCode="PKR">8598.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">16528.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">5760.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">7930.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">16528.66</TotalAmount></Price></FareDetail><MandatoryInd>true</MandatoryInd><OfferItemID>17376272350166AEC9F7-4-1</OfferItemID><Price><BaseAmount CurCode="PKR">8598.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">16528.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">5760.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">7930.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">16528.66</TotalAmount></Price><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><ServiceDefinitionRef><PaxSegmentRefID>SEG2</PaxSegmentRefID><ServiceDefinitionRefID>SRV1</ServiceDefinitionRefID></ServiceDefinitionRef></ServiceAssociations><ServiceID>1</ServiceID></Service><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><PaxJourneyRef><PaxJourneyRefID>FLT2</PaxJourneyRefID></PaxJourneyRef></ServiceAssociations><ServiceID>2</ServiceID></Service></OfferItem><OwnerCode>ER</OwnerCode></Offer><Offer><JourneyOverview><JourneyPriceClass><PaxJourneyRefID>FLT2</PaxJourneyRefID></JourneyPriceClass></JourneyOverview><OfferID>17376272350166AEC9F7-5</OfferID><OfferItem><FareDetail><FareComponent><CabinType><CabinTypeName>Y</CabinTypeName></CabinType><FareRule><PenaltyRefID>SEG2-ADT-1</PenaltyRefID><PenaltyRefID>SEG2-ADT-2</PenaltyRefID><PenaltyRefID>SEG2-ADT-3</PenaltyRefID><PenaltyRefID>SEG2-ADT-4</PenaltyRefID></FareRule><PaxSegmentRefID>SEG2</PaxSegmentRefID><Price><BaseAmount CurCode="PKR">9598.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">18198.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">6430.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><TotalTaxAmount CurCode="PKR">8600.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">18198.66</TotalAmount></Price><PriceClassRefID>ECONOMYREGULAR</PriceClassRefID><RBD><RBD_Code>L</RBD_Code></RBD></FareComponent><PaxRefID>PAX1</PaxRefID><Price><BaseAmount CurCode="PKR">9598.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">18198.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">6430.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">8600.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">18198.66</TotalAmount></Price></FareDetail><MandatoryInd>true</MandatoryInd><OfferItemID>17376272350166AEC9F7-5-1</OfferItemID><Price><BaseAmount CurCode="PKR">9598.00</BaseAmount><Discount><PreDiscountedAmount CurCode="PKR">18198.66</PreDiscountedAmount></Discount><TaxSummary><Tax><Amount CurCode="PKR">50.00</Amount><DescText>STAMP DUTY</DescText><TaxCode>N9</TaxCode></Tax><Tax><Amount CurCode="PKR">100.00</Amount><DescText>TAX SECURITY CHARGE</DescText><TaxCode>XZ</TaxCode></Tax><Tax><Amount CurCode="PKR">1500.00</Amount><DescText>TAX EXCISE DUTY PAKISTAN</DescText><TaxCode>PK</TaxCode></Tax><Tax><Amount CurCode="PKR">20.00</Amount><DescText>GOVERNMENT AIRPORT TAX</DescText><TaxCode>YI</TaxCode></Tax><Tax><Amount CurCode="PKR">6430.66</Amount><DescText>fuel surcharge domestic</DescText><TaxCode>YQD</TaxCode></Tax><Tax><Amount CurCode="PKR">500.00</Amount><DescText>Embarkation Fee</DescText><TaxCode>SP</TaxCode></Tax><TotalTaxAmount CurCode="PKR">8600.66</TotalTaxAmount></TaxSummary><TotalAmount CurCode="PKR">18198.66</TotalAmount></Price><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><ServiceDefinitionRef><PaxSegmentRefID>SEG2</PaxSegmentRefID><ServiceDefinitionRefID>SRV2</ServiceDefinitionRefID></ServiceDefinitionRef></ServiceAssociations><ServiceID>1</ServiceID></Service><Service><PaxRefID>PAX1</PaxRefID><ServiceAssociations><PaxJourneyRef><PaxJourneyRefID>FLT2</PaxJourneyRefID></PaxJourneyRef></ServiceAssociations><ServiceID>2</ServiceID></Service></OfferItem><OwnerCode>ER</OwnerCode></Offer></CarrierOffers></OffersGroup><ShoppingResponse><ShoppingResponseRefID>17376272350166AEC9F7</ShoppingResponseRefID></ShoppingResponse></Response></IATA_AirShoppingRS>';
        $json_data = self::parseXML($xml);

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
        
        $PaxJourneyList = $json_data->Response->DataLists->PaxJourneyList;
        $FLIGHTS = [];
        if($json_data->Response->DataLists){
            $counter = 0;
            foreach($mergedOffers as $Key => $Offer) {
                if( is_array($json_data->Response->DataLists->PaxSegmentList->PaxSegment) ) {
                    $DURATION = substr($PaxJourneyList->PaxJourney[$counter]->Duration,2);
                    $SegmentDetail = $json_data->Response->DataLists->PaxSegmentList->PaxSegment[$counter];
                } else if($json_data->Response->DataLists->PaxSegmentList->PaxSegment) {
                    $DURATION = $PaxJourneyList->PaxJourney->Duration;
                    $SegmentDetail = $json_data->Response->DataLists->PaxSegmentList->PaxSegment;
                }

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
                    "DURATION" => $DURATION,
                    "STATUS" => "ONTIME",
                    'ShoppingResponseRefID' => $json_data->Response->ShoppingResponse->ShoppingResponseRefID,
                    'PaxList' => $json_data->Response->DataLists->PaxList,
                    'TimeStamp' => $makeSigningKeyNTimeXml[1],
                ];
                $counter++;



                $no_of_bags = 0;

                foreach($Offer as $PassengersDetails) {

                    $PassengersDetails->OfferItem->FareDetail = self::convertToArrayIfNotExists($PassengersDetails->OfferItem->FareDetail);


                    foreach($PassengersDetails->OfferItem->FareDetail as $key => $FareDetails) {

                        if ($Passengers[$key]['ADT']) {

                            $farePaxWise['ADULT'] = [
                                "BAGGAGE_NAME" => $FareDetails->FareComponent->PriceClassRefID,
                                "BASIC_FARE" => $FareDetails->Price->BaseAmount,
                                "TAX" => $FareDetails->Price->TaxSummary->TotalTaxAmount,
                                "TOTAL" => $FareDetails->Price->TotalAmount,
                                "FEES" => 0,
                                "SURCHARGE" => 0,
                            ];
                        }

                        if ($Passengers[$key]['CHD']) {
                            $farePaxWise['CHILD'] = [
                                "BAGGAGE_NAME" => $FareDetails->FareComponent->PriceClassRefID,
                                "BASIC_FARE" => $FareDetails->Price->BaseAmount,
                                "TAX" => $FareDetails->Price->TaxSummary->TotalTaxAmount,
                                "TOTAL" => $FareDetails->Price->TotalAmount,
                                "FEES" => 0,
                                "SURCHARGE" => 0,
                            ];
                        }
                        if ($Passengers[$key]['INF']) {
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

                    foreach($MergedData as $Baggages) {
                        if($Baggages['PriceClassID'] == $farePaxWise['ADULT']['BAGGAGE_NAME']){
                            $FARES = [
                                
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
                    $FLIGHTS[$TYPE][$FLIGHT['FLIGHT_NO']] = $FLIGHT;
                    $no_of_bags++;
    
                }

            }

        }

        if(empty($FLIGHTS)){
            $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'UnSuccess';
        }else{
            $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'Success';
        }
        return array_map('array_values', $FLIGHTS);
    }


}
