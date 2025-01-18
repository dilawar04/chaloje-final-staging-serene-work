<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Http;
use SimpleXMLElement;

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
            'Username' => $OPT[$mode]['Username'],
            'Password' => $OPT[$mode]['Password'],
            'CarrierCode' => $OPT[$mode]['CarrierCode'],
            'IATANum' => $OPT[$mode]['IATANum'],
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

    public static function makeSession()
    {

        self::set_credential();

        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Security/RetrieveSecurityToken',
            //'Cookie' => 'ASP.NET_SessionId=3ct1j0ulgleikqbranmnj4qh'
            // 'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'
        ];
        $action = end(explode('/', $headers['SOAPAction']));

        $body = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
    <Body>
        <RetrieveSecurityToken xmlns="http://tempuri.org/">
            <!-- Optional -->
            <RetrieveSecurityTokenRequest>
                <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                    <!-- Optional -->
                    <CarrierCode>
                        <AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</AccessibleCarrierCode>
                    </CarrierCode>
                </CarrierCodes>
                <LogonID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Security.Request">' . self::$credential['Username'] . '</LogonID>
                <Password xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Security.Request">' . self::$credential['Password'] . '</Password>
            </RetrieveSecurityTokenRequest>
        </RetrieveSecurityToken>
    </Body>
</Envelope>';

        if(req('c')){
            $action = end(explode('/', $headers['SOAPAction']));
            $RQ = collect(['URI' => 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Security.svc'])->merge($headers)->map(function ($val, $key){
                return "{$key} : {$val}";
            })->join("\n");
            $RQ .= "\n-------------------------------------------------------------------------- \n\n";
            $RQ .= $body;
            \File::put("{$action}-RQ.xml", $RQ);
        }

        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Security.svc', [
            'headers' => $headers,
            'body' => $body
        ]);
        $xml = $response->getBody()->getContents();
        if(req('c')){
            \File::put( "{$action}-RS.txt", $xml);
        }

        $json_data = self::parseXML($xml);


        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"}->SecurityToken;
    }

    public static function RetrieveSecurityToken(){
        return self::makeSession();
    }

    public static function ValidateSecurityToken($token)
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Security/ValidateSecurityToken',
            // 'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];
        $action = end(explode('/', $headers['SOAPAction']));

        $body = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
    <Body>
        <ValidateSecurityToken xmlns="http://tempuri.org/">
            <!-- Optional -->
            <ValidateSecurityTokenRequest>
                <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                    <!-- Optional -->
                    <CarrierCode>
                        <AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</AccessibleCarrierCode>
                    </CarrierCode>
                </CarrierCodes>
                <SecurityToken xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Security.Request">' . $token . '</SecurityToken>
            </ValidateSecurityTokenRequest>
        </ValidateSecurityToken>
    </Body>
</Envelope>';

        if(req('c')){
            $action = end(explode('/', $headers['SOAPAction']));
            $RQ = collect(['URI' => 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Security.svc'])->merge($headers)->map(function ($val, $key){
                return "{$key} : {$val}";
            })->join("\n");
            $RQ .= "\n-------------------------------------------------------------------------- \n\n";
            $RQ .= $body;
            \File::put("{$action}-RQ.xml", $RQ);
        }


        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Security.svc', [
            'headers' => $headers,
            'body' => $body
        ]);
        $xml = $response->getBody()->getContents();
        if(req('c')){
            \File::put( "{$action}-RS.xml", $xml);
        }

        $json_data = self::parseXML($xml);

        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"}->ValidationResult;
    }

    public static function GetFlightScheduleInformation($token = null, $params = [])
    {
        echo '1';
        exit;
        if(empty($token)) {
            $token = self::makeSession();
        }

        $params = collect([
            "Departure" => date('Y-m-d'),
            "Origin" => "KHI",
            "Destination" => "ISB",
            "SearchType" => "Route",
            //"Return" => true,
            "Returning" => date('Y-m-d', strtotime('+2 days')),
            "PassengerTypeID" => ['Adult' => 1, 'Child' => 6, 'Infant' => 5],
            "AdultNo" => 1,
            "ChildNo" => 0,
            "InfantNo" => 0
        ])->merge($params)->toArray();
        //$params[0]['Return'] = (\request('Return') == 'true');

        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Flight/GetFlightScheduleInformation',
            // 'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];
        $action = end(explode('/', $headers['SOAPAction']));


        $body = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
            <Body>
                <GetFlightScheduleInformation xmlns="http://tempuri.org/">
                    <!-- Optional -->
                    <GetFlightScheduleInformationRequest>
                        <SecurityGUID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'.$token.'</SecurityGUID>
                        <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                            <!-- Optional -->
                            <CarrierCode>
                                <AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</AccessibleCarrierCode>
                            </CarrierCode>
                        </CarrierCodes>
                        <ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'. \request()->ip() .'</ClientIPAddress>
                        <HistoricUserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"></HistoricUserName>
                        <SearchType xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">'.$params['SearchType'].'</SearchType>
                        <Origin xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">'.$params['Origin'].'</Origin>
                        <Destination xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">'.$params['Destination'].'</Destination>
                        <FlightNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">1</FlightNumber>
                        <StartSerachDate xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">'.$params['Departure'].'</StartSerachDate>
                        <EndSearchDate xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">'.$params['Returning'].'</EndSearchDate>
                        <IncludeCancelled xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">false</IncludeCancelled>
                    </GetFlightScheduleInformationRequest>
                </GetFlightScheduleInformation>
            </Body>
        </Envelope>';

        // dd($body);


        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Flight.svc', [
            'headers' => $headers,
            'body' => $body
        ]);
        $xml = $response->getBody()->getContents();

        $json_data = self::parseXML($xml);


        $FlightSchedules = $json_data->Body->{"{$action}Response"}->{"{$action}Result"};
        $FLIGHTS = [];
        if (count($FlightSchedules) > 0){
            foreach ($FlightSchedules->FlightSchedule->FlightInformation as $flightSchedule) {
                [$hours, $minutes] = explode(':', $flightSchedule->Duration);
                $FLIGHT = [
                    'AIRLINE' => 'Air Serene',
                    "FLIGHT_NO" => $flightSchedule->FlightNumber,
                    "DEPARTURE_DATE" => \Carbon\Carbon::parse($flightSchedule->ActualDeparture)->format('Y-m-d'),
                    "DEPARTURE_TIME" => \Carbon\Carbon::parse($flightSchedule->ActualDeparture)->format('H:i:s'),
                    "ARRIVAL_TIME" => \Carbon\Carbon::parse($flightSchedule->ActualArrival)->format('H:i:s'),
                    "JOURNEY_CODE" => $flightSchedule->FlightNumber,
                    "ORGN" => $flightSchedule->Origin,
                    "DEST" => $flightSchedule->Destination,
                    "CURRENCY" => $params['currency'],
                    "STOPS" => $flightSchedule->Stops,
                    //"FLIGHT_TIME" => $flightSchedule->Duration,
                    "FLIGHT_TIME" => (int)$hours * 60 + (int)$minutes,
                    //"DURATION" => str_pad(($flightSchedule->duration / 60), 2, '0', STR_PAD_LEFT) . "h",
                    "DURATION" => \Carbon\Carbon::parse($flightSchedule->Duration)->format('H\h i\m'),
                    "STATUS" => "ONTIME"
                ];

                array_push($FLIGHTS, (object)$FLIGHT);
            }
        }

        return $FLIGHTS;
    }

    public static function RetrieveFareQuoteShop($params = [])
    {
        self::set_credential();
        // dd($a);
        // echo '-2';
        // exit;
        // dump('request',\request());
        // dump('param',$params);
        // exit;
        // dd($params);
        $default = [
            'currency' => 'PKR',
            'Origin' => \req('LocationDep'),
            'Destination' => \req('LocationArr'),
            'Departure' => \req('DepartingOn'),
            "ArrivalDate" => date('Y-m-d', strtotime('+2 days')),
            "PassengerTypeID" => ['Adult' => 1, 'Child' => 6, 'Infant' => 5],
            "AdultNo" => \req('AdultNo'),
            "ChildNo" => \req('ChildNo'),
            "InfantNo" => \req('InfantNo'),
        ];
        // dd($default);

        // dd(\req('DepartingOn'));
        // dd($default);
        // dump($default);
        // dd($params['Departure']);
        $params = array_merge($params, $default);
        // dd($params);

        // dd($params);
//         $a = '<rad1:FareQuoteRequestInfo>
//         <rad1:PassengerTypeID>6</rad1:PassengerTypeID>
//         <rad1:TotalSeatsRequired>1</rad1:TotalSeatsRequired>
//      </rad1:FareQuoteRequestInfo>
//      <rad1:FareQuoteRequestInfo>
//         <rad1:PassengerTypeID>5</rad1:PassengerTypeID>
//         <rad1:TotalSeatsRequired>1</rad1:TotalSeatsRequired>
//      </rad1:FareQuoteRequestInfo>
//      <rad1:FareQuoteRequestInfo>
//         <rad1:PassengerTypeID>1</rad1:PassengerTypeID>
//         <rad1:TotalSeatsRequired>2</rad1:TotalSeatsRequired>
//      </rad1:FareQuoteRequestInfo>';

//         if(\req('AdultNo')){
//            '<rad1:FareQuoteRequestInfo>
//                 <rad1:PassengerTypeID>6</rad1:PassengerTypeID>
//                 <rad1:TotalSeatsRequired>1</rad1:TotalSeatsRequired>
//             </rad1:FareQuoteRequestInfo>';
//         }
//         if(\req('ChildNo')){
//             '<rad1:FareQuoteRequestInfo>
//                     <rad1:PassengerTypeID>6</rad1:PassengerTypeID>
//                     <rad1:TotalSeatsRequired>1</rad1:TotalSeatsRequired>
//                 </rad1:FareQuoteRequestInfo>';
//         }
//         if(\req('InfantNo')){
//         '<rad1:FareQuoteRequestInfo>
//                 <rad1:PassengerTypeID>6</rad1:PassengerTypeID>
//                 <rad1:TotalSeatsRequired>1</rad1:TotalSeatsRequired>
//             </rad1:FareQuoteRequestInfo>';
//         }
//         foreach ($params['PassengerTypeID'] as $PassengerType => $pTypeId) {
//             dump('f',$params[$PassengerType . "No"]);
//             // dump($PassengerType);
//             // dump($pTypeId);
//             if ($params[$PassengerType . "No"] > 0) {
//                 $body .= '<a:FareQuoteRequestInfo>
//                     <a:PassengerTypeID>' . $pTypeId . '</a:PassengerTypeID>
//                     <a:TotalSeatsRequired>' . $params[$PassengerType . "No"] . '</a:TotalSeatsRequired>
//                 </a:FareQuoteRequestInfo>';
//             }
//         }


// exit;
        //$token = self::makeSession();
        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Pricing/RetrieveFareQuoteShop',
            // 'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];
        $action = end(explode('/', $headers['SOAPAction']));
        
        // dd($action);

        // dd($params['PassengerTypeID']);

        // foreach ($params['PassengerTypeID'] as $PassengerType => $pTypeId) {
        //     // echo 'asdaasd1';
        //     dd($params[$PassengerType . "No"]);

        //     if ($params[$PassengerType . "No"] > 0) {
        //     //  echo '21';
        //         // $body .= '<a:FareQuoteRequestInfo>
        //         //     <a:PassengerTypeID>' . $pTypeId . '</a:PassengerTypeID>
        //         //     <a:TotalSeatsRequired>' . $params[$PassengerType . "No"] . '</a:TotalSeatsRequired>
        //         // </a:FareQuoteRequestInfo>';
        //     }
        // }
        // exit;

        // dd($body);

        $body = '<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
        <s:Body>
            <RetrieveFareQuoteShop xmlns="http://tempuri.org/">
                <RetrieveFareQuoteShopRequest xmlns:a="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.FareQuote" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
                    <LogonID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">' . self::$credential['Username'] . '</LogonID>
                    <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                    <CarrierCode>
                        <AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</AccessibleCarrierCode>
                    </CarrierCode>
                    </CarrierCodes>
                    <Password xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">' . self::$credential['Password'] . '</Password>
                    <UserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"/>
                    <ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">::1</ClientIPAddress>
                    <TaPassword xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">June@2024</TaPassword>
                    <HistoricUserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"/>
                    <a:CurrencyOfFareQuote>' . $params['currency'] . '</a:CurrencyOfFareQuote>
                    <a:PromotionalCode i:nil="true"/>
                    <a:IataNumberOfRequestor i:nil="true"/>
                    <a:CorporationID>0</a:CorporationID>
        <a:FareFilterMethod>NoCombinabilityAllFares</a:FareFilterMethod>
        <a:FareGroupMethod>WebFareTypes</a:FareGroupMethod>
        <a:InventoryFilterMethod>Available</a:InventoryFilterMethod>
                    <a:FareQuoteDetails>
                    <a:FareQuoteDetail>
                        <a:Origin>' . $params['Origin'] . '</a:Origin>
                        <a:Destination>' . $params['Destination'] . '</a:Destination>
                        <a:UseAirportsNotMetroGroups>false</a:UseAirportsNotMetroGroups>
                        <a:UseAirportsNotMetroGroupsAsRule>false</a:UseAirportsNotMetroGroupsAsRule>
                        <a:UseAirportsNotMetroGroupsForFrom>false</a:UseAirportsNotMetroGroupsForFrom>
                        <a:UseAirportsNotMetroGroupsForTo>false</a:UseAirportsNotMetroGroupsForTo>
                        <a:DateOfDeparture>' . $params['Departure'] . '</a:DateOfDeparture>
                        <a:FareTypeCategory>1</a:FareTypeCategory>
                        <a:FareClass i:nil="true"/>
                        <a:FareBasisCode i:nil="true"/>
                        <a:Cabin i:nil="true"/>
                        <a:LFID>0</a:LFID>
                        <a:OperatingCarrierCode>' . self::$credential['CarrierCode'] . '</a:OperatingCarrierCode>
                        <a:MarketingCarrierCode>' . self::$credential['CarrierCode'] . '</a:MarketingCarrierCode>
                        <a:NumberOfDaysBefore>0</a:NumberOfDaysBefore>
                        <a:NumberOfDaysAfter>0</a:NumberOfDaysAfter>
                        <a:LanguageCode>1</a:LanguageCode>
                        <a:TicketPackageID>1</a:TicketPackageID>
                        <a:FareQuoteRequestInfos>
                            ';
                foreach ($params['PassengerTypeID'] as $PassengerType => $pTypeId) {
                    if ($params[$PassengerType . "No"] > 0) {
                        $body .= '<a:FareQuoteRequestInfo>
                            <a:PassengerTypeID>' . $pTypeId . '</a:PassengerTypeID>
                            <a:TotalSeatsRequired>' . $params[$PassengerType . "No"] . '</a:TotalSeatsRequired>
                        </a:FareQuoteRequestInfo>';
                    }
                }

            $body .= '
                        </a:FareQuoteRequestInfos>
                    </a:FareQuoteDetail>
                    </a:FareQuoteDetails>
                </RetrieveFareQuoteShopRequest>
            </RetrieveFareQuoteShop>
        </s:Body>
        </s:Envelope>';
        // dd($body);
        // dump('FAREQUOTESHOP-REQ',$body);
        // exit;
        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Pricing.svc', [
            'headers' => $headers,
            'body' => $body
        ]);
        $xml = $response->getBody()->getContents();

        $json_data = self::parseXML($xml);
        // dump('farequoteshop body',$body);
        // dump('reponse',$json_data);
        // dd($json_data);
        // exit;
        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};

    }


    public static function RetrieveFareQuoteShopMul($params = [])
    {
        self::set_credential();
        // dd($a);
        // echo '-2';
        // exit;
        // dump('request',\request());
        // dump('param',$params);
        // exit;
        // dd($params);
        $default = [
            'currency' => 'PKR',
            'Origin' => \req('LocationArr'),
            'Destination' => \req('LocationDep'),
            'Departure' => \req('ReturningOn'),
            "ArrivalDate" => date('Y-m-d', strtotime('+2 days')),
            "PassengerTypeID" => ['Adult' => 1, 'Child' => 6, 'Infant' => 5],
            "AdultNo" => \req('AdultNo'),
            "ChildNo" => \req('ChildNo'),
            "InfantNo" => \req('InfantNo'),
        ];
    //    dd($default);
    //    exit;
        // dd(\req('DepartingOn'));
        // dd($default);
        // dump($default);
        // dd($params['Departure']);
        $params = array_merge($params, $default);
        // dd($params);

        // dd($params);
//         $a = '<rad1:FareQuoteRequestInfo>
//         <rad1:PassengerTypeID>6</rad1:PassengerTypeID>
//         <rad1:TotalSeatsRequired>1</rad1:TotalSeatsRequired>
//      </rad1:FareQuoteRequestInfo>
//      <rad1:FareQuoteRequestInfo>
//         <rad1:PassengerTypeID>5</rad1:PassengerTypeID>
//         <rad1:TotalSeatsRequired>1</rad1:TotalSeatsRequired>
//      </rad1:FareQuoteRequestInfo>
//      <rad1:FareQuoteRequestInfo>
//         <rad1:PassengerTypeID>1</rad1:PassengerTypeID>
//         <rad1:TotalSeatsRequired>2</rad1:TotalSeatsRequired>
//      </rad1:FareQuoteRequestInfo>';

//         if(\req('AdultNo')){
//            '<rad1:FareQuoteRequestInfo>
//                 <rad1:PassengerTypeID>6</rad1:PassengerTypeID>
//                 <rad1:TotalSeatsRequired>1</rad1:TotalSeatsRequired>
//             </rad1:FareQuoteRequestInfo>';
//         }
//         if(\req('ChildNo')){
//             '<rad1:FareQuoteRequestInfo>
//                     <rad1:PassengerTypeID>6</rad1:PassengerTypeID>
//                     <rad1:TotalSeatsRequired>1</rad1:TotalSeatsRequired>
//                 </rad1:FareQuoteRequestInfo>';
//         }
//         if(\req('InfantNo')){
//         '<rad1:FareQuoteRequestInfo>
//                 <rad1:PassengerTypeID>6</rad1:PassengerTypeID>
//                 <rad1:TotalSeatsRequired>1</rad1:TotalSeatsRequired>
//             </rad1:FareQuoteRequestInfo>';
//         }
//         foreach ($params['PassengerTypeID'] as $PassengerType => $pTypeId) {
//             dump('f',$params[$PassengerType . "No"]);
//             // dump($PassengerType);
//             // dump($pTypeId);
//             if ($params[$PassengerType . "No"] > 0) {
//                 $body .= '<a:FareQuoteRequestInfo>
//                     <a:PassengerTypeID>' . $pTypeId . '</a:PassengerTypeID>
//                     <a:TotalSeatsRequired>' . $params[$PassengerType . "No"] . '</a:TotalSeatsRequired>
//                 </a:FareQuoteRequestInfo>';
//             }
//         }


// exit;
        //$token = self::makeSession();
        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Pricing/RetrieveFareQuoteShop',
            // 'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];
        $action = end(explode('/', $headers['SOAPAction']));
        
        // dd($action);

        // dd($params['PassengerTypeID']);

        // foreach ($params['PassengerTypeID'] as $PassengerType => $pTypeId) {
        //     // echo 'asdaasd1';
        //     dd($params[$PassengerType . "No"]);

        //     if ($params[$PassengerType . "No"] > 0) {
        //     //  echo '21';
        //         // $body .= '<a:FareQuoteRequestInfo>
        //         //     <a:PassengerTypeID>' . $pTypeId . '</a:PassengerTypeID>
        //         //     <a:TotalSeatsRequired>' . $params[$PassengerType . "No"] . '</a:TotalSeatsRequired>
        //         // </a:FareQuoteRequestInfo>';
        //     }
        // }
        // exit;

        // dd($body);

        $body = '<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
        <s:Body>
            <RetrieveFareQuoteShop xmlns="http://tempuri.org/">
                <RetrieveFareQuoteShopRequest xmlns:a="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.FareQuote" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
                    <LogonID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">' . self::$credential['Username'] . '</LogonID>
                    <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                    <CarrierCode>
                        <AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</AccessibleCarrierCode>
                    </CarrierCode>
                    </CarrierCodes>
                    <Password xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">' . self::$credential['Password'] . '</Password>
                    <UserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"/>
                    <ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">::1</ClientIPAddress>
                    <TaPassword xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"/>
                    <HistoricUserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"/>
                    <a:CurrencyOfFareQuote>' . $params['currency'] . '</a:CurrencyOfFareQuote>
                    <a:PromotionalCode i:nil="true"/>
                    <a:IataNumberOfRequestor i:nil="true"/>
                    <a:CorporationID>0</a:CorporationID>
        <a:FareFilterMethod>NoCombinabilityAllFares</a:FareFilterMethod>
        <a:FareGroupMethod>WebFareTypes</a:FareGroupMethod>
        <a:InventoryFilterMethod>Available</a:InventoryFilterMethod>
                    <a:FareQuoteDetails>
                    <a:FareQuoteDetail>
                        <a:Origin>' . $params['Origin'] . '</a:Origin>
                        <a:Destination>' . $params['Destination'] . '</a:Destination>
                        <a:UseAirportsNotMetroGroups>false</a:UseAirportsNotMetroGroups>
                        <a:UseAirportsNotMetroGroupsAsRule>false</a:UseAirportsNotMetroGroupsAsRule>
                        <a:UseAirportsNotMetroGroupsForFrom>false</a:UseAirportsNotMetroGroupsForFrom>
                        <a:UseAirportsNotMetroGroupsForTo>false</a:UseAirportsNotMetroGroupsForTo>
                        <a:DateOfDeparture>' . $params['Departure'] . '</a:DateOfDeparture>
                        <a:FareTypeCategory>1</a:FareTypeCategory>
                        <a:FareClass i:nil="true"/>
                        <a:FareBasisCode i:nil="true"/>
                        <a:Cabin i:nil="true"/>
                        <a:LFID>0</a:LFID>
                        <a:OperatingCarrierCode>' . self::$credential['CarrierCode'] . '</a:OperatingCarrierCode>
                        <a:MarketingCarrierCode>' . self::$credential['CarrierCode'] . '</a:MarketingCarrierCode>
                        <a:NumberOfDaysBefore>0</a:NumberOfDaysBefore>
                        <a:NumberOfDaysAfter>0</a:NumberOfDaysAfter>
                        <a:LanguageCode>1</a:LanguageCode>
                        <a:TicketPackageID>1</a:TicketPackageID>
                        <a:FareQuoteRequestInfos>
                            ';
                foreach ($params['PassengerTypeID'] as $PassengerType => $pTypeId) {
                    if ($params[$PassengerType . "No"] > 0) {
                        $body .= '<a:FareQuoteRequestInfo>
                            <a:PassengerTypeID>' . $pTypeId . '</a:PassengerTypeID>
                            <a:TotalSeatsRequired>' . $params[$PassengerType . "No"] . '</a:TotalSeatsRequired>
                        </a:FareQuoteRequestInfo>';
                    }
                }

            $body .= '
                        </a:FareQuoteRequestInfos>
                    </a:FareQuoteDetail>
                    </a:FareQuoteDetails>
                </RetrieveFareQuoteShopRequest>
            </RetrieveFareQuoteShop>
        </s:Body>
        </s:Envelope>';
        // dd($body);
        // dump('FAREQUOTESHOP-REQ',$body);
        // exit;
        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Pricing.svc', [
            'headers' => $headers,
            'body' => $body
        ]);
        $xml = $response->getBody()->getContents();

        $json_data = self::parseXML($xml);

        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};

    }

    public static function RetrieveFareQuote($token,$params = [],$flights)
    {
        self::set_credential();
        // dd($flights);
        // dd($flights['outbound']->travelers->LocationDep);
        $RFQS = $flights['outbound']->baggage->FARE_PAX_WISE->ADULT;
        $RFQSF = $flights['outbound']->flight->LFID;

        $INRFQS = $flights['inbound']->baggage->FARE_PAX_WISE->ADULT;
        $INRFQSF = $flights['inbound']->flight->LFID;

        // dd($INRFQSF);

        // dd($RFQS->FCCode);
        // dd($RFQS);
        // echo 'asdas';
        // exit;
        // dd($FareQuote);
        // dd($FareQuote->FlightSegments->FlightSegment);
        // dd($FareQuote->SegmentDetails->SegmentDetail);
        // dd($FareQuote);
        // echo 'sdsad';
        // exit;
        // dd($params);
        // $FareQuoteShop = self::RetrieveFareQuoteShop($params);
        // dump('freequote', $FareQuoteShop);
        // $fareInfosType = $FareQuoteShop->FlightSegments->FlightSegment[0]->FareTypes;
        // dd($fareInfosType);
        // $free_baggage = $fareInfosType->FareType[0]->FareInfos->FareInfo;
        // dd($free_baggage);             
        // $last_free_baggage = end($free_baggage);
        // dd($last_free_baggage->FCCode);
                        // dd($params);       
        if(empty($flights['outbound'])){
            $default = ['currency' => 'PKR',
                'fareFilterMethod' => 'NoCombinabilityRoundtripLowestFarePerFareType',
                'Origin' => $flights['inbound']->travelers->LocationDep,
                'Destination' => $flights['inbound']->travelers->LocationArr,
                'Departure' => $flights['inbound']->travelers->ReturningOn,
                'Returning' => $flights['inbound']->travelers->ReturningOn,
                'Return' => false,
                'Cabin' => 'ECONOMY',
                // 'FareClass' => 'Q',
                // 'LFID' => '0',
                "PassengerTypeID" => ['Adult' => 1, 'Child' => 6, 'Infant' => 5],
                "AdultNo" => $flights['inbound']->travelers->AdultNo,
                "ChildNo" => $flights['inbound']->travelers->ChildNo,
                "InfantNo" => $flights['inbound']->travelers->InfantNo,
                //'FareBasisCode' => 'QELBPK',
            ];
            }else{
                $default = ['currency' => 'PKR',
                'fareFilterMethod' => 'NoCombinabilityRoundtripLowestFarePerFareType',
                'Origin' => $flights['outbound']->travelers->LocationDep,
                'Destination' => $flights['outbound']->travelers->LocationArr,
                'Departure' => $flights['outbound']->travelers->DepartingOn,
                'Returning' => $flights['outbound']->travelers->ReturningOn,
                'Return' => false,
                'Cabin' => 'ECONOMY',
                // 'FareClass' => 'Q',
                // 'LFID' => '0',
                "PassengerTypeID" => ['Adult' => 1, 'Child' => 6, 'Infant' => 5],
                "AdultNo" => $flights['outbound']->travelers->AdultNo,
                "ChildNo" => $flights['outbound']->travelers->ChildNo,
                "InfantNo" => $flights['outbound']->travelers->InfantNo,
                //'FareBasisCode' => 'QELBPK',
            ];
        }                                    
        
        // dd($flights);
        // exit;
        $params = array_merge($params, $default);
        // if($flights['outbound']->airline != $flights['inbound']->airline){
        //     unset($params['ReturningOn']); 
        //     $params['Returning'] = null;
        // }
        // dd($params);
        // exit;
        // dd($flights['outbound']->travelers->AdultNo);
        // exit;
        //$token = self::makeSession();
        $client = new Client();
        $headers = [
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Pricing/RetrieveFareQuote',
            'Content-Type' => 'text/xml',
            // 'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];

        $action = end(explode('/', $headers['SOAPAction']));
    
        
        $body = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
                <Body>
                    <RetrieveFareQuote xmlns="http://tempuri.org/">
                        <!-- Optional -->
                        <RetrieveFareQuoteRequest>
                            <SecurityGUID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">' . $token . '</SecurityGUID>
                            <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                                <!-- Optional -->
                                <CarrierCode>
                                    <AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</AccessibleCarrierCode>
                                </CarrierCode>
                            </CarrierCodes>
                            <ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"></ClientIPAddress>
                            <HistoricUserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"></HistoricUserName>
                            <CurrencyOfFareQuote xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.FareQuote">' . $params['currency'] . '</CurrencyOfFareQuote>
                            <PromotionalCode xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.FareQuote"></PromotionalCode>
                            <IataNumberOfRequestor xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.FareQuote">00788302</IataNumberOfRequestor>
                            <CorporationID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.FareQuote">0</CorporationID>
                            <FareFilterMethod xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.FareQuote">NoCombinabilityRoundtripLowestFarePerFareType</FareFilterMethod>
                            <FareGroupMethod xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.FareQuote">WebFareTypes</FareGroupMethod>
                            <InventoryFilterMethod xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.FareQuote">Available</InventoryFilterMethod>
                            <FareQuoteDetails xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.FareQuote">';

                            $FareQuoteDetailOutbound  = '';
                            // echo 'asdasdas';exit;
                            if(!empty($flights['outbound'])){
                                $FareQuoteDetailOutbound = '<FareQuoteDetail>
                                    <Origin>' . $params['Origin'] . '</Origin>
                                    <Destination>' . $params['Destination'] . '</Destination>
                                    <UseAirportsNotMetroGroups>false</UseAirportsNotMetroGroups>
                                    <UseAirportsNotMetroGroupsAsRule>false</UseAirportsNotMetroGroupsAsRule>
                                    <UseAirportsNotMetroGroupsForFrom>false</UseAirportsNotMetroGroupsForFrom>
                                    <UseAirportsNotMetroGroupsForTo>false</UseAirportsNotMetroGroupsForTo>
                                    <DateOfDeparture>'. $params['Departure'].'</DateOfDeparture>
                                    <FareTypeCategory>1</FareTypeCategory>
                                    <FareClass>'.$RFQS->FCCode.'</FareClass> <!--Get from RetrieveFareQuoteShop-->
                                    <FareBasisCode>'.$RFQS->FBCode.'</FareBasisCode> <!--Get from RetrieveFareQuoteShop-->
                                     <Cabin>'.$RFQS->Cabin.'</Cabin> <!--Get from RetrieveFareQuoteShop-->
                                     <LFID>'.$RFQSF.'</LFID> <!--Get from RetrieveFareQuoteShop-->

                                    <OperatingCarrierCode></OperatingCarrierCode>
                                    <MarketingCarrierCode></MarketingCarrierCode>
                                    <NumberOfDaysBefore>0</NumberOfDaysBefore>
                                    <NumberOfDaysAfter>0</NumberOfDaysAfter>
                                    <LanguageCode>1</LanguageCode>
                                    <TicketPackageID>1</TicketPackageID>
                                    <FareQuoteRequestInfos>';
                                    // foreach ($params['PassengerTypeID'] as $PassengerType => $pTypeId) {
                                    //     if ($params[$PassengerType . "No"] > 0) {
                                    //         $FareQuoteDetail .= '<FareQuoteRequestInfo>
                                    //             <PassengerTypeID>' . $pTypeId . '</PassengerTypeID>
                                    //             <TotalSeatsRequired>' . $params[$PassengerType . "No"] . '</TotalSeatsRequired>
                                    //         </FareQuoteRequestInfo>';
                                    //     }
                                    // }
                                    if($flights['outbound']->travelers->AdultNo){
                                        $FareQuoteDetailOutbound .= '<FareQuoteRequestInfo><PassengerTypeID>'.$params['PassengerTypeID']['Adult'].'</PassengerTypeID><TotalSeatsRequired>'.$flights['outbound']->travelers->AdultNo.'</TotalSeatsRequired></FareQuoteRequestInfo>';
                            
                                    }
                                    if($flights['outbound']->travelers->ChildNo){
                                        $FareQuoteDetailOutbound .= '<FareQuoteRequestInfo><PassengerTypeID>'.$params['PassengerTypeID']['Child'].'</PassengerTypeID><TotalSeatsRequired>'.$flights['outbound']->travelers->ChildNo.'</TotalSeatsRequired></FareQuoteRequestInfo>';
                            
                                    }
                                    if($flights['outbound']->travelers->InfantNo){
                                        $FareQuoteDetailOutbound .= '<FareQuoteRequestInfo><PassengerTypeID>'.$params['PassengerTypeID']['Infant'].'</PassengerTypeID><TotalSeatsRequired>'.$flights['outbound']->travelers->InfantNo.'</TotalSeatsRequired></FareQuoteRequestInfo>';
                            
                                    }
                            

                                $FareQuoteDetailOutbound .='</FareQuoteRequestInfos>
                                    <OverrideEffectiveDate>2023-08-22T13:30:00</OverrideEffectiveDate>
                                    <!-- Optional -->
                                    <FareTypeCategories>
                                        <!--<int xmlns="http://schemas.microsoft.com/2003/10/Serialization/Arrays">1</int>-->
                                    </FareTypeCategories>
                                </FareQuoteDetail>';
                            }

                            $FareQuoteDetailReturn  = '';
                            if(!empty($flights['inbound'])){
                                $FareQuoteDetailReturn .= '<FareQuoteDetail>
                                    <Origin>' . $params['Destination'] . '</Origin>
                                    <Destination>' . $params['Origin'] . '</Destination>
                                    <UseAirportsNotMetroGroups>false</UseAirportsNotMetroGroups>
                                    <UseAirportsNotMetroGroupsAsRule>false</UseAirportsNotMetroGroupsAsRule>
                                    <UseAirportsNotMetroGroupsForFrom>false</UseAirportsNotMetroGroupsForFrom>
                                    <UseAirportsNotMetroGroupsForTo>false</UseAirportsNotMetroGroupsForTo>
                                    <DateOfDeparture>' . $params['Returning'] . '</DateOfDeparture>
                                    <FareTypeCategory>1</FareTypeCategory>
                                    <FareClass>'.$INRFQS->FCCode.'</FareClass> <!--Get from RetrieveFareQuoteShop-->
                                    <FareBasisCode>'.$INRFQS->FBCode.'</FareBasisCode> <!--Get from RetrieveFareQuoteShop-->
                                    <Cabin>'.$INRFQS->Cabin.'</Cabin> <!--Get from RetrieveFareQuoteShop-->
                                    <LFID>'.$INRFQSF.'</LFID> <!--Get from RetrieveFareQuoteShop-->

                                    <OperatingCarrierCode></OperatingCarrierCode>
                                    <MarketingCarrierCode></MarketingCarrierCode>
                                    <NumberOfDaysBefore>0</NumberOfDaysBefore>
                                    <NumberOfDaysAfter>0</NumberOfDaysAfter>
                                    <LanguageCode>1</LanguageCode>
                                    <TicketPackageID>1</TicketPackageID>
                                    <FareQuoteRequestInfos>';
                                    if($flights['inbound']->travelers->AdultNo){
                                        $FareQuoteDetailReturn .= '<FareQuoteRequestInfo><PassengerTypeID>'.$params['PassengerTypeID']['Adult'].'</PassengerTypeID><TotalSeatsRequired>'.$flights['inbound']->travelers->AdultNo.'</TotalSeatsRequired></FareQuoteRequestInfo>';
                            
                                    }
                                    if($flights['inbound']->travelers->ChildNo){
                                        $FareQuoteDetailReturn .= '<FareQuoteRequestInfo><PassengerTypeID>'.$params['PassengerTypeID']['Child'].'</PassengerTypeID><TotalSeatsRequired>'.$flights['inbound']->travelers->ChildNo.'</TotalSeatsRequired></FareQuoteRequestInfo>';
                            
                                    }
                                    if($flights['inbound']->travelers->InfantNo){
                                        $FareQuoteDetailReturn .= '<FareQuoteRequestInfo><PassengerTypeID>'.$params['PassengerTypeID']['Infant'].'</PassengerTypeID><TotalSeatsRequired>'.$flights['inbound']->travelers->InfantNo.'</TotalSeatsRequired></FareQuoteRequestInfo>';
                            
                                    }

                                $FareQuoteDetailReturn .='</FareQuoteRequestInfos>
                                    <OverrideEffectiveDate>2023-08-22T13:30:00</OverrideEffectiveDate>
                                    <!-- Optional -->
                                    <FareTypeCategories>
                                        <!--<int xmlns="http://schemas.microsoft.com/2003/10/Serialization/Arrays">1</int>-->
                                    </FareTypeCategories>
                                </FareQuoteDetail>';
                            }
                    // dd($FareQuoteDetailReturn);
                    $body .= $FareQuoteDetailOutbound;
                    $body .= $FareQuoteDetailReturn;
                    $body .= '</FareQuoteDetails>
                            <ProfileId xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.FareQuote">0</ProfileId>
                        </RetrieveFareQuoteRequest>
                    </RetrieveFareQuote>
                </Body>
            </Envelope>';
            // dd($body);
            // dump('Re n
            // dump('RetrieveFareQuote',$body);
            // exit;
            // echo '1213';
            
            $referrer = $_SERVER['HTTP_REFERER'];
        
            // Parse the URL to extract the query string
            $queryString = parse_url($referrer, PHP_URL_QUERY);
        
            // Parse the query string to get the parameters as an associative array
            parse_str($queryString, $params);
            
            // Extract the pnr and email parameters
            $pnr = $params['pnr'];
            $email = $params['email'];
            // dd($params['pnr']);
            // exit;
            if($TRAVELERS_INFORMATION['ADULT'] !== []){
                session_start();
                $_SESSION['xml'] = $body;
            }else{
                $lastrow = \App\Booking::where('pnr', $pnr)->first();
                $body = $lastrow['xml'];
            }
            
            
                if(req('c')){
                    // echo 'asd123';
                    // exit;
                    $action = end(explode('/', $headers['SOAPAction']));
                    $RQ = collect(['uri' => 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Pricing.svc'])->merge($headers)->map(function ($val, $key){
                        return "{$key} : {$val}";
                    })->join("\n");
                    $RQ .= "\n-------------------------------------------------------------------------- \n\n";
                    $RQ .= $body;
                    \File::put("{$action}-RQ.xml", $RQ);
                }
                // echo '!12';
                //     exit;
                $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Pricing.svc', [
                    'headers' => $headers,
                    'body' => $body
                ]);
                // echo '!2@as';
                // exit;
                $xml = $response->getBody()->getContents();
                if(req('c')){
                    \File::put( "{$action}-RS.xml", $xml);
                }

                $json_data = self::parseXML($xml);
                // dd($json_data);

        // dump('FAREQUOTE-REQ',$body);
        // dump('FAREQUOTE-response',$json_data);
        // dump('RetrieveFareQuote', $body);
        // exit;
        return $json_data->Body->RetrieveFareQuoteResponse->RetrieveFareQuoteResult;
    }

    public static function RetrieveAARQuote($token = null, $params = [],$flights)
    {
        // echo '4';
        // exit;
        $RFQS = $flights['outbound']->baggage->FARE_PAX_WISE->ADULT;
        $RFQSF = $flights['outbound']->flight->LFID;
        // dd($RFQS->FBCode);
        // exit;

        // if(empty($token)) {
        //     $token = self::makeSession();
        // }
        self::set_credential();

        $default = [
            "Currency" => "PKR",
            "DepartureDate" => date('Y-m-d'),
            "Origin" => "KHI",
            "Destination" => "ISB",
            "Cabin" => 'ECONOMY',
            "Return" => 'false',
            "ArrivalDate" => date('Y-m-d', strtotime('+2 days')),
            "PassengerTypeID" => ['Adult' => 1, 'Child' => 6, 'Infant' => 5],
            "AdultNo" => 1,
            "ChildNo" => 0,
            "InfantNo" => 0,
        ];

        $params = array_merge($default, $params);
        $params['Return'] = (\request('Return') == 'true');
        $params['DepartureDate'] = str_replace(' ', 'T', \Carbon\Carbon::parse($params['DepartureDate'])->format('Y-m-d\TH:i:s'));

        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Pricing/RetrieveAARQuote',
            // 'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];
        $action = end(explode('/', $headers['SOAPAction']));

        $body = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
            <Body>
                <RetrieveAARQuote xmlns="http://tempuri.org/">
                    <!-- Optional -->
                    <RetrieveAARQuoteRequest>
                        <SecurityGUID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'.$token.'</SecurityGUID>
                        <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                            <!-- Optional -->
                            <CarrierCode>
                                <AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</AccessibleCarrierCode>
                            </CarrierCode>
                        </CarrierCodes>
                        <ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'. \request()->ip() .'</ClientIPAddress>
                        <HistoricUserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"></HistoricUserName>
                        <AARQuotes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.Service">
                            <!-- Optional -->
                            <AARQuote>
                                <AARRequestPtcs>';
                                    foreach ($params['PassengerTypeID'] as $PassengerType => $pTypeId) {
                                        if ($params[$PassengerType . "No"] > 0) {
                                            $body .= '<AARRequestPtc>
                                                <PassengerTypeID>' . $pTypeId . '</PassengerTypeID>
                                                <Quantity>' . $params[$PassengerType . "No"] . '</Quantity>
                                                </AARRequestPtc>';
                                        }
                                    }

                                    $body .='
                                </AARRequestPtcs>
                                <AirportCode>' . $params['Origin'] . '</AirportCode>
                                <Cabin>' . $params['Cabin'] . '</Cabin>
                                <Category></Category>
                                <Currency>' . $params['Currency'] . '</Currency>
                                <DepartureDate>' . $params['DepartureDate'] . '</DepartureDate>
                                <DestinationAirportCode>' . $params['Destination'] . '</DestinationAirportCode>
                                <FareBasisCode>'.$RFQS->FBCode.'</FareBasisCode>
                                <FareClass></FareClass>
                                <LogicalFlightID>' . $params['LFID'] . '</LogicalFlightID>
                                <MarketingCarrierCode></MarketingCarrierCode>
                                <OperatingCarrierCode></OperatingCarrierCode>
                                <ServiceCode></ServiceCode>
                                <!-- Optional -->
                                <ServiceTypes>
                                    <int xmlns="http://schemas.microsoft.com/2003/10/Serialization/Arrays">1</int>
                                    <int xmlns="http://schemas.microsoft.com/2003/10/Serialization/Arrays">3</int>
                                </ServiceTypes>
                                <UTCOffset>0</UTCOffset>
                            </AARQuote>
                        </AARQuotes>
                        <IsRoundTrip xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Pricing.Request.Service">false</IsRoundTrip>

                    </RetrieveAARQuoteRequest>
                </RetrieveAARQuote>
            </Body>
        </Envelope>';
        // dump('RetrieveAARQuote',$body);
        // exit;
        /*echo "<pre>"; print_r($params); echo "</pre>";
        die($body);*/
        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Pricing.svc', [
            'headers' => $headers,
            'body' => $body
        ]);
        $xml = $response->getBody()->getContents();

        $json_data = self::parseXML($xml);
        // dump('RetrieveAARQuote-REQ',$body);
        // dump('RetrieveAARQuote-response',$json_data);
        // exit;
        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};
    }

// test hide this column RetrieveFlightSeatMAP YOU HAVE TO FETCH THE RESPONSE FROM IT IN ORDER TO COMPLETE SUMMARY PNR
    public static function asdfgRetrieveFlightSeatMap($token = null, $params = [])
    {
        if(empty($token)) {
            $token = self::makeSession();
        }

        $default = [
            'currency' => 'PKR',
            'LFID' => 0,
            'fareFilterMethod' => 'NoCombinabilityRoundtripLowestFarePerFareType',
            'Origin' => 'KHI',
            'Destination' => 'ISB',
            'Departure' => date('Y-m-d'),
            'CabinName' => 'ECONOMY',
            ];
        $params = array_merge($default, $params);

        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Flight/RetrieveFlightSeatMap'
        ];
        $action = end(explode('/', $headers['SOAPAction']));

        $body = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
            <Body>
                <RetrieveFlightSeatMap xmlns="http://tempuri.org/">
                    <!-- Optional -->
                    <RetrieveFlightSeatMapRequest>
                        <SecurityGUID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">' . $token . '</SecurityGUID>
                        <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                            <!-- Optional -->
                            <CarrierCode>
                                <AccessibleCarrierCode>'.self::$credential['CarrierCode'].'</AccessibleCarrierCode>
                            </CarrierCode>
                        </CarrierCodes>
                        <ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'. \request()->ip() .'</ClientIPAddress>
                        <HistoricUserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"></HistoricUserName>
                        <CabinName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">'.$params['CabinName'].'</CabinName>
                        <Currency xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">'.$params['currency'].'</Currency>
                        <DepartureDate xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">'.$params['Departure'].'</DepartureDate>
                        <!--<ExcludePricing xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">[boolean?]</ExcludePricing>
                        <FareBasisCode xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">[string?]</FareBasisCode>-->
                        <LogicalFlightID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">'.$params['LFID'].'</LogicalFlightID>
                        <UTCOffset xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">0</UTCOffset>
                    </RetrieveFlightSeatMapRequest>
                </RetrieveFlightSeatMap>
            </Body>
        </Envelope>';

        if(req('c')){
            $action = end(explode('/', $headers['SOAPAction']));
            $RQ = collect(['URI' => 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Flight.svc'])->merge($headers)->map(function ($val, $key){
                return "{$key} : {$val}";
            })->join("\n");
            $RQ .= "\n-------------------------------------------------------------------------- \n\n";
            $RQ .= $body;
            \File::put("{$action}-RQ.xml", $RQ);
        }

        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Reservation.svc', [
            'headers' => $headers,
            'body' => $body
        ]);

        $xml = $response->getBody()->getContents();
        if(req('c')){
            \File::put( "{$action}-RS.xml", $xml);
        }

        $json_data = self::parseXML($xml);

        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};
        //return $json_data->Body->RetrieveFlightSeatMapResponse->RetrieveFlightSeatMapResult;//->PhysicalFlights
    }

public static function SummaryPNR($token, $params = [], $flights)
{
    self::set_credential();
    // if($flights['inbound']->airline == $flights['outbound']->airline){
    // echo 'asdasd';
    // }
    // $length = 9; // Number of characters
    // $randomNumber = str_pad(mt_rand(0, pow(9, $length) - 1), $length, '0', STR_PAD_LEFT);

    $randomNumber = '147483648';
    
    $default = [
    'currency' => 'PKR',
    'fareFilterMethod' => 'NoCombinabilityRoundtripLowestFarePerFareType' ,
    'Origin' => $flights['outbound']->travelers->LocationDep,
    'Destination' => $flights['outbound']->travelers->LocationArr,
    'Departure' => date('Y-m-d'),
    'IATANum' => "00788302",
    'UserID' => "chalojeota",
    'SeriesNumber' => 299,
    'Country' => "PK",
    'CountryCode' => '92',
    'Address' => 'Medicare Hospital, Bihar Muslim Society, Block 3, Sharfabad, Karachi - Pakistan',
    'City' => 'Karachi',
    'State' => 'Sharfabad Karachi Branch',
    'PostalCode' => '12311',
    'PhoneNumber' => '03134855100',
    'ConfirmationNumber' => 999,
        'Seat' => [
            'PersonOrgID' => '',
            'LogicalFlightID' => '',
            'PhysicalFlightID' => '',
            'DepartureDate' => '',
            'SeatSelected' => '',
            'RowNumber' => '',
        ],
    "PassengerTypeID" => ['Adult' => 1, 'Child' => 6, 'Infant' => 5],
    ];

    $params = array_merge($default, $params);

    // dd($params);
    $TRAVELERS_INFORMATION = $params['TRAVELERS_INFORMATION'];
    // dd($params['TRAVELERS_INFORMATION']);

    //  Random Values
    $randomVal = [
        'CountryCode' => '92' ,
        'ContactID' => '11' ,
        'PersonOrgID' => '-2141' ,
        'ContactType' => 'Email' ,
        'Email' => \request()->email,
        'Extension' => '92' ,
        'AreaCode' => '92',
        'WBCID' => '-2147483648',
        'PTCID' => '1',
        'PTC' => '1',
        'Gender' => 'Male',
        'TravelsWithPersonOrgID' => '-2147483648',
        'Nationality' => 'PK',
        'randomNumVal' => '-2147483648'
    ];

    // dd($TRAVELERS_INFORMATION);
    // dd($params);
    // 'TravelsWithPersonOrgID' if one person => -2147483648 else number of people with
    $client = new Client();
    $headers = [
        'Content-Type' => 'text/xml',
        'SOAPAction' => 'http://tempuri.org/IConnectPoint_Reservation/SummaryPNR',
        'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

    ];
    $action = end(explode('/', $headers['SOAPAction']));



            $body = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
            xmlns:tem="http://tempuri.org/"
            xmlns:rad="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"
            xmlns:rad1="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">
        <soapenv:Header/>
        <soapenv:Body>
        <tem:SummaryPNR>
            <tem:SummaryPnrRequest>
                <rad:SecurityGUID>'.$token.'</rad:SecurityGUID>
                <rad:CarrierCodes>
                <rad:CarrierCode>
                    <rad:AccessibleCarrierCode>'.self::$credential['CarrierCode'].'</rad:AccessibleCarrierCode>
                </rad:CarrierCode>
                </rad:CarrierCodes>
                <rad:HistoricUserName xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                <rad1:ActionType>GetSummary</rad1:ActionType>
                <rad1:ReservationInfo>
                <rad:SeriesNumber>'.$params['SeriesNumber'].'</rad:SeriesNumber>
                <rad:ConfirmationNumber>'.$params['ConfirmationNumber'].'</rad:ConfirmationNumber>
                </rad1:ReservationInfo>
                <rad1:SecurityToken>'.$token.'</rad1:SecurityToken>

                <rad1:CarrierCurrency>'.$params['currency'].'</rad1:CarrierCurrency>
                <rad1:DisplayCurrency>'.$params['currency'].'</rad1:DisplayCurrency>
                <rad1:IATANum xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">00788302</rad1:IATANum>
                <rad1:User>'.$params['UserID'].'</rad1:User>
                <rad1:ReceiptLanguageID>1</rad1:ReceiptLanguageID>
                <rad1:PromoCode></rad1:PromoCode>
                <rad1:ExternalBookingID></rad1:ExternalBookingID>
                <rad1:Address>
                <rad1:Address1>'.$params['Address'].'</rad1:Address1>
                <rad1:Address2>'.$params['City'].'</rad1:Address2>
                <rad1:City>'.$params['City'].'</rad1:City>
                <rad1:State>'.$params['State'].'</rad1:State>
                <rad1:Postal>'.$params['PostalCode'].'</rad1:Postal>
                <rad1:Country>'.$params['Country'].'</rad1:Country>
                <rad1:CountryCode>'.$params['CountryCode'].'</rad1:CountryCode>
                <rad1:AreaCode>'.$params['CountryCode'].'</rad1:AreaCode>
                <rad1:PhoneNumber>'.$params['PhoneNumber'].'</rad1:PhoneNumber>
                <rad1:Display></rad1:Display>
                </rad1:Address>
                <rad1:ContactInfos>
                <rad1:ContactInfo>
                    <rad1:ContactID>'.$randomVal['ContactID'].'</rad1:ContactID>
                    <rad1:PersonOrgID>'.$randomVal['PersonOrgID'].'</rad1:PersonOrgID>
                    <rad1:ContactField>'.\request()->email.'</rad1:ContactField>
                    <rad1:ContactType>'.$randomVal['ContactType'].'</rad1:ContactType>
                    <rad1:Extension>'.$randomVal['Extension'].'</rad1:Extension>
                    <rad1:CountryCode>'.$randomVal['CountryCode'].'</rad1:CountryCode>
                    <rad1:AreaCode>'.$randomVal['AreaCode'].'</rad1:AreaCode>
                    <rad1:PhoneNumber>'.$params['PhoneNumber'].'</rad1:PhoneNumber>
                    <rad1:Display></rad1:Display>
                    <rad1:PreferredContactMethod>true</rad1:PreferredContactMethod>
                </rad1:ContactInfo>
                </rad1:ContactInfos>
                <rad1:Passengers>
                ';
                $orgId = 0;

            foreach ($TRAVELERS_INFORMATION as $k => $items) {
                // dump($TRAVELERS_INFORMATION);
                foreach ($items as $i => $item) {
                    // dd($item);
                    // dd($k);
                    $orgId++;

                    $body .= '<rad1:Person>
        <rad1:PersonOrgID>-214'.$orgId.'</rad1:PersonOrgID>
        <rad1:FirstName>' . $item['Firstname'] . '</rad1:FirstName>
        <rad1:LastName>' . $item['Lastname'] . '</rad1:LastName>
        <rad1:MiddleName></rad1:MiddleName>
        <rad1:Age>40</rad1:Age>
        <rad1:DOB>' . $item['Dob'] . '</rad1:DOB>';
        if($item['Title'] == 'MR'){
            $body .= '<rad1:Gender>Male</rad1:Gender>';
        }
        if($item['Title'] == 'MS' || $item['Title'] == 'MRS' ||  $item['Title'] == 'MISS'){
            $body .= '<rad1:Gender>Female</rad1:Gender>';
        }

        $body .= '<rad1:Title>' . $item['Title'] . '</rad1:Title>
        <rad1:NationalityLaguageID>1</rad1:NationalityLaguageID>
        <rad1:RelationType>Self</rad1:RelationType>
        <rad1:WBCID>-2' . $randomNumber . '</rad1:WBCID>';
        
        if($k == 'ADULT'){
            $body .= '<rad1:PTCID>1</rad1:PTCID>
                    <rad1:PTC>1</rad1:PTC>';
        }
        if($k == 'CHILD'){
            $body .= '<rad1:PTCID>6</rad1:PTCID>
                    <rad1:PTC>6</rad1:PTC>';        
        }
        if($k == 'INFANT'){
            $body .= '<rad1:PTCID>5</rad1:PTCID>
                    <rad1:PTC>5</rad1:PTC>';        
        }

        if($k == 'INFANT'){
            $body .= '<rad1:TravelsWithPersonOrgID>-2141</rad1:TravelsWithPersonOrgID>';        
        }else{
            $body .= '<rad1:TravelsWithPersonOrgID>-2'.$randomNumber.'</rad1:TravelsWithPersonOrgID>';  
        }


        $body .= '<rad1:RedressNumber></rad1:RedressNumber>
        <rad1:KnownTravelerNumber></rad1:KnownTravelerNumber>
        <rad1:MarketingOptIn>true</rad1:MarketingOptIn>
        <rad1:UseInventory>false</rad1:UseInventory>
        <rad1:Address>
            <rad1:Address1>' . $params['Address'] . '</rad1:Address1>
            <rad1:Address2></rad1:Address2>
            <rad1:City>' . $params['City'] . '</rad1:City>
            <rad1:State>' . $params['State'] . '</rad1:State>
            <rad1:Postal>' . $params['PostalCode'] . '</rad1:Postal>
            <rad1:Country>' . $params['Country'] . '</rad1:Country>
            <rad1:CountryCode>' . $params['CountryCode'] . '</rad1:CountryCode>
            <rad1:AreaCode>' . $params['CountryCode'] . '</rad1:AreaCode>
            <rad1:PhoneNumber>' . $params['PhoneNumber'] . '</rad1:PhoneNumber>
            <rad1:Display></rad1:Display>
        </rad1:Address>
        <rad1:Company></rad1:Company>
        <rad1:Comments></rad1:Comments>
        <rad1:Passport>123456</rad1:Passport>
        <rad1:Nationality>' . $randomVal['Nationality'] . '</rad1:Nationality>
        <rad1:ProfileId>-2' . $randomNumber . '</rad1:ProfileId>
        <rad1:IsPrimaryPassenger>true</rad1:IsPrimaryPassenger>
        <rad1:ContactInfos>
            <rad1:ContactInfo>
                <rad1:ContactID>' . $randomVal['ContactID'] . '</rad1:ContactID>
                <rad1:PersonOrgID>-214' . $orgId . '</rad1:PersonOrgID>
                <rad1:ContactField>' . \request()->email . '</rad1:ContactField>
                <rad1:ContactType>' . $randomVal['ContactType'] . '</rad1:ContactType>
                <rad1:Extension>' . $randomVal['Extension'] . '</rad1:Extension>
                <rad1:CountryCode>' . $randomVal['CountryCode'] . '</rad1:CountryCode>
                <rad1:AreaCode>' . $randomVal['AreaCode'] . '</rad1:AreaCode>
                <rad1:PhoneNumber>' . $params['PhoneNumber'] . '</rad1:PhoneNumber>
                <rad1:Display></rad1:Display>
                <rad1:PreferredContactMethod>false</rad1:PreferredContactMethod>
            </rad1:ContactInfo>
            <rad1:ContactInfo>
                <rad1:ContactID>' . $randomVal['ContactID'] . '</rad1:ContactID>
                <rad1:PersonOrgID>-214' . $orgId . '</rad1:PersonOrgID>
                <rad1:ContactField>' . $params['PhoneNumber'] . '</rad1:ContactField>
                <rad1:ContactType>MobilePhone</rad1:ContactType>
                <rad1:Extension>' . $randomVal['Extension'] . '</rad1:Extension>
                <rad1:CountryCode>' . $randomVal['CountryCode'] . '</rad1:CountryCode>
                <rad1:AreaCode>' . $randomVal['AreaCode'] . '</rad1:AreaCode>
                <rad1:PhoneNumber>' . $params['PhoneNumber'] . '</rad1:PhoneNumber>
                <rad1:Display></rad1:Display>
                <rad1:PreferredContactMethod>false</rad1:PreferredContactMethod>
            </rad1:ContactInfo>
        </rad1:ContactInfos>
        <rad1:FrequentFlyerNumber></rad1:FrequentFlyerNumber>
        <rad1:Suffix></rad1:Suffix>
        </rad1:Person>';
                }
            }

                $body .='</rad1:Passengers>
                <rad1:Segments>
                    <rad1:Segment>
                        <rad1:PersonOrgID>-2141</rad1:PersonOrgID>
                        <rad1:FareInformationID>1</rad1:FareInformationID>
                        <rad1:MarketingCode></rad1:MarketingCode>
                        <rad1:StoreFrontID></rad1:StoreFrontID>
                        <rad1:RecordLocator></rad1:RecordLocator>
                        <rad1:SpecialServices xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                        <rad1:Seats xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                        <rad1:CRSCode>0</rad1:CRSCode>
                    </rad1:Segment>';
                    if($flights['inbound']->airline == $flights['outbound']->airline){
                        $body .='<rad1:Segment>
                        <rad1:PersonOrgID>-2141</rad1:PersonOrgID>';
                        if(!empty($params['TRAVELERS_INFORMATION']['ADULT'])  && (!empty($params['TRAVELERS_INFORMATION']['CHILD']))  && (!empty($params['TRAVELERS_INFORMATION']['INFANT']))){
                            $body .='<rad1:FareInformationID>4</rad1:FareInformationID>';
                        }else if(!empty($params['TRAVELERS_INFORMATION']['ADULT'])  && (!empty($params['TRAVELERS_INFORMATION']['CHILD']))){
                            $body .='<rad1:FareInformationID>3</rad1:FareInformationID>';
                        }else if(!empty($params['TRAVELERS_INFORMATION']['ADULT'])  && (!empty($params['TRAVELERS_INFORMATION']['INFANT']))){
                            $body .='<rad1:FareInformationID>3</rad1:FareInformationID>';
                        }else if(!empty($params['TRAVELERS_INFORMATION']['ADULT'])){
                            $body .='<rad1:FareInformationID>2</rad1:FareInformationID>';
                        }
                        $body .='<rad1:MarketingCode></rad1:MarketingCode>
                        <rad1:StoreFrontID></rad1:StoreFrontID>
                        <rad1:RecordLocator></rad1:RecordLocator>
                        <rad1:SpecialServices xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                        <rad1:Seats xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                        <rad1:CRSCode>0</rad1:CRSCode>
                        </rad1:Segment>';   
                    }
                $body .='</rad1:Segments>
                <rad1:Payments xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                <rad1:Comment></rad1:Comment>
                <rad1:ReferralID></rad1:ReferralID>
            </tem:SummaryPnrRequest>
            </tem:SummaryPNR>
        </soapenv:Body>
        </soapenv:Envelope>';

        // dd($body);
        // exit;   

        // dump('FAREQUOTE', $REQFARE);
        // dump('SUMMARY-PNR-RQ' , $body);
        //dump('SUMMARY-PNR-RQ-DUMMY' , $_body);
        
        

        if(req('c')){
            $action = end(explode('/', $headers['SOAPAction']));
            $RQ = collect(['URI' => 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Reservation.svc'])->merge($headers)->map(function ($val, $key){
                return "{$key} : {$val}";
            })->join("\n");
            $RQ .= "\n-------------------------------------------------------------------------- \n\n";
            $RQ .= $body;
            \File::put("{$action}-RQ.xml", $RQ);
        }
        // dd($body);
        // GUZZEL METHOD
            $response = $client->request('POST','https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Reservation.svc', [
                'headers' => $headers,
                'body' => $body
            ]);

            // HTTP METHOD
            // $response = Http::post('https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Reservation.svc', [
            //     'headers' => $headers,
            //     'body' => $body
            // ]);
        // dd($response);
        $xml = $response->getBody()->getContents();
        if(req('c')){
            \File::put( "{$action}-RS.xml", $xml);
        }

        $json_data = self::parseXML($xml);
        // dump('summary-REQ',$body);
        // dump('summary-response',$json_data);
        // exit;
        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};
}


    public static function InsertExternalProcessedPayment($token, $params = [],$RetrieveFareQuote = [],$CommitSummary = [])
    {
        $FareInfo = $RetrieveFareQuote->FlightSegments->FlightSegment->FareTypes->FareType->FareInfos->FareInfo;
        $AirlinePerson = $CommitSummary->Airlines->Airline->LogicalFlight->LogicalFlight->PhysicalFlights->PhysicalFlight->Customers->Customer->AirlinePersons->AirlinePerson;
        
        if($AirlinePerson->Gender == 'M'){
            $AirlinePerson->Gender = 'Male';
            
        }else{
            $AirlinePerson->Gender = 'Female';
        }

        $default = [
            'ActionType' => 'CommitSummary',
            'SeriesNumber' => 299,
            'ConfirmationNumber' => $CommitSummary->ConfirmationNumber,
            "PassengerTypeID" => ['Adult' => 1, 'Child' => 6, 'Infant' => 5],
            'currency' => 'PKR',
        ];
        $params = array_merge($default, $params);
        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Fulfillment/InsertExternalProcessedPayment',
            'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];
        // dd($params['ConfirmationNumber']);
        // exit;
        $action = end(explode('/', $headers['SOAPAction']));

        $body = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/" xmlns:rad="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Fulfillment.Request" xmlns:rad1="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request" xmlns:rad2="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">
        <soapenv:Header/>
        <soapenv:Body>
           <tem:InsertExternalProcessedPayment>
              <!--Optional:-->
              <tem:ExternalProcessedPaymentRequest>
                 <rad:TransactionInfo>
                    <rad1:SecurityGUID>'.$token.'</rad1:SecurityGUID>
                    <rad1:CarrierCodes>
                       <!--Zero or more repetitions:-->
                       <rad1:CarrierCode>
                          <rad1:AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</rad1:AccessibleCarrierCode>
                       </rad1:CarrierCode>
                    </rad1:CarrierCodes>
                    <!--Optional:-->
                    <rad1:ClientIPAddress xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                    <!--Optional:-->
                    <rad1:HistoricUserName xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                 </rad:TransactionInfo>
                 <rad:ReservationInfo>
                    <rad1:SeriesNumber>299</rad1:SeriesNumber>
                    <rad1:ConfirmationNumber>'.$params['ConfirmationNumber'].'</rad1:ConfirmationNumber>
                 </rad:ReservationInfo>
                 <rad:ExternalPayments>
                    <!--Zero or more repetitions:-->
                    <rad:InsertExternalProcessedPayment>
                       <rad:BaseAmount>'.$FareInfo->FareAmtInclTax.'</rad:BaseAmount>
                       <rad:BaseCurrency>PKR</rad:BaseCurrency>
                       <rad:CardHolder>Dilawar</rad:CardHolder>
                       <rad:CardNumber>4111111111111111</rad:CardNumber>
                       <rad:CheckNumber>123</rad:CheckNumber>
                       <rad:CurrencyPaid>PKR</rad:CurrencyPaid>
                       <rad:CVCode>123</rad:CVCode>
                       <rad:DatePaid>'.$FareInfo->ExchangeDate.'</rad:DatePaid>
                       <rad:DocumentReceivedBy>Dilawar</rad:DocumentReceivedBy>
                       <rad:ExpirationDate>'.$FareInfo->ExchangeDate.'</rad:ExpirationDate>
                       <rad:ExchangeRate>'.$FareInfo->ExchangeRate.'</rad:ExchangeRate>
                       <rad:ExchangeRateDate>'.$FareInfo->ExchangeDate.'</rad:ExchangeRateDate>
                       <rad:FFNumber>123</rad:FFNumber>
                       <rad:PaymentComment>Production</rad:PaymentComment>
                       <rad:PaymentAmount>'.$FareInfo->FareAmtInclTax.'</rad:PaymentAmount>
                       <rad:PaymentMethod>VISA</rad:PaymentMethod>
                       <rad:PaymentMethodType></rad:PaymentMethodType>
                       <rad:Reference>Production</rad:Reference>
                       <rad:TerminalID>2</rad:TerminalID>
                       <rad:UserData>Production</rad:UserData>
                       <rad:UserID>CHALOJE_ER_P</rad:UserID>
                       <rad:IataNumber xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">00788302</rad:IataNumber>
                       <rad:ValueCode>123</rad:ValueCode>
                       <rad:VoucherNumber>-214</rad:VoucherNumber>
                       <rad:IsTACreditCard>true</rad:IsTACreditCard>
                       <rad:GcxID>1</rad:GcxID>
                       <rad:GcxOptOption>1</rad:GcxOptOption>
                       <rad:OriginalCurrency>PKR</rad:OriginalCurrency>
                       <rad:OriginalAmount>'.$FareInfo->FareAmtInclTax.'</rad:OriginalAmount>
                       <rad:TransactionStatus>APPROVED</rad:TransactionStatus>
                       <rad:AuthorizationCode>t1</rad:AuthorizationCode>
                       <rad:PaymentReference>t2</rad:PaymentReference>
                       <rad:ResponseMessage>t3</rad:ResponseMessage>
                       <rad:CardCurrency>PKR</rad:CardCurrency>
                       <rad:BillingCountry>586</rad:BillingCountry>
                       <rad:FingerPrintingSessionID>840</rad:FingerPrintingSessionID>
                       <rad:Payor>
                          <rad2:PersonOrgID>-'.$AirlinePerson->PersonOrgID.'</rad2:PersonOrgID>
                          <rad2:FirstName>'.$AirlinePerson->FirstName.'</rad2:FirstName>
                          <rad2:LastName>'.$AirlinePerson->LastName.'</rad2:LastName>
                          <rad2:MiddleName>A</rad2:MiddleName>
                          <rad2:Age>'.$AirlinePerson->Age.'</rad2:Age>
                          <rad2:DOB>'.$AirlinePerson->DOB.'</rad2:DOB>
                          <rad2:Gender>'.$AirlinePerson->Gender.'</rad2:Gender>
                          <rad2:Title>'.$AirlinePerson->Title.'</rad2:Title>
                          <rad2:NationalityLaguageID>'.$AirlinePerson->NationalityLaguageID.'</rad2:NationalityLaguageID>
                          <rad2:RelationType>'.$AirlinePerson->RelationType.'</rad2:RelationType>
                          <rad2:WBCID>'.$AirlinePerson->WBCID.'</rad2:WBCID>
                          <rad2:PTCID>'.$AirlinePerson->PTCID.'</rad2:PTCID>
                          <rad2:PTC>'.$AirlinePerson->PTCID.'</rad2:PTC>
                          <rad2:TravelsWithPersonOrgID>-'.$AirlinePerson->PersonOrgID.'</rad2:TravelsWithPersonOrgID>
                          <rad2:RedressNumber>'.$AirlinePerson->Address.'</rad2:RedressNumber>
                          <rad2:KnownTravelerNumber>di</rad2:KnownTravelerNumber>
                          <rad2:MarketingOptIn>true</rad2:MarketingOptIn>
                          <rad2:UseInventory>false</rad2:UseInventory>
                          <rad2:Address>
                             <rad2:Address1>'.$AirlinePerson->Address.'</rad2:Address1>
                             <rad2:Address2 xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                             <rad2:City>'.$AirlinePerson->City.'</rad2:City>
                             <rad2:State>'.$AirlinePerson->State.'</rad2:State>
                             <rad2:Postal>'.$AirlinePerson->Postal.'</rad2:Postal>
                             <rad2:Country>'.$AirlinePerson->Country.'</rad2:Country>
                             <rad2:CountryCode xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                             <rad2:AreaCode xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                             <rad2:PhoneNumber xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                             <rad2:Display xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                          </rad2:Address>
                         <rad2:Company>Chaloje</rad2:Company>
                          <rad2:Comments xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                          <rad2:Passport xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                          <rad2:Nationality xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                          <rad2:ProfileId>'.$CommitSummary->ProfileID.'</rad2:ProfileId>
                          <rad2:IsPrimaryPassenger>true</rad2:IsPrimaryPassenger>
                          <rad2:ContactInfos></rad2:ContactInfos>
                          <!--Optional:-->
                          <rad2:FrequentFlyerNumber>di</rad2:FrequentFlyerNumber>
                       </rad:Payor>
                       <!--Optional:-->
                       <rad:Result xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                         <!--Optional:-->
                       <rad:TransactionID xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                         <!--Optional:-->
                       <rad:ResponseCode xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                         <!--Optional:-->
                       <rad:AncillaryData01 xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                         <!--Optional:-->
                       <rad:AncillaryData02 xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                         <!--Optional:-->
                       <rad:AncillaryData03 xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                         <!--Optional:-->
                       <rad:AncillaryData04 xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                         <!--Optional:-->
                       <rad:AncillaryData05 xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                         <!--Optional:-->
                       <rad:ProcessorID xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                         <!--Optional:-->
                         <rad:MerchantID>chalojeota</rad:MerchantID>
                         <!--Optional:-->
                       <rad:ProcessorName xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                       <!--Optional:-->
                    </rad:InsertExternalProcessedPayment>
                 </rad:ExternalPayments>
              </tem:ExternalProcessedPaymentRequest>
           </tem:InsertExternalProcessedPayment>
        </soapenv:Body>
     </soapenv:Envelope>';

        if(req('c')){
            $action = end(explode('/', $headers['SOAPAction']));
            $RQ = collect(['URI' => 'https://srn.app.radixxhost.com/SRN/Radixx.Connectpoint/ConnectPoint.Fulfillment.svc'])->merge($headers)->map(function ($val, $key){
                return "{$key} : {$val}";
            })->join("\n");
            $RQ .= "\n-------------------------------------------------------------------------- \n\n";
            $RQ .= $body;
            \File::put("{$action}-RQ.xml", $RQ);
        }

        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.Connectpoint/ConnectPoint.Fulfillment.svc', [
            'headers' => $headers,
            'body' => $body
        ]);

        $xml = $response->getBody()->getContents();
        if(req('c')){
            \File::put( "{$action}-RS.xml", $xml);
        }

        $json_data = self::parseXML($xml);
        dd($json_data);
        exit;
        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};

    }

    public static function UpdateExternalProcessedPaymentDetails($token, $params = [])
    {
        echo '8';
        exit;
        if (empty($token)) {
            $token = self::makeSession();
        }

        $default = [
            'ActionType' => 'CommitSummary',
            'SeriesNumber' => 299,
            'ConfirmationNumber' => 299,
            "PassengerTypeID" => ['Adult' => 1, 'Child' => 6, 'Infant' => 5],
            'currency' => 'PKR',
        ];
        $params = array_merge($default, $params);

        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Fulfillment/UpdateExternalProcessedPaymentDetails',
            'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];
        $action = end(explode('/', $headers['SOAPAction']));

        $body = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
            <Body>
                <UpdateExternalProcessedPaymentDetails xmlns="http://tempuri.org/">
                    <!-- Optional -->
                    <UpdateExternalProcessedPaymentDetailsRequest>
                        <SecurityGUID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">[string]</SecurityGUID>
                        <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                            <!-- Optional -->
                            <CarrierCode>
                                <AccessibleCarrierCode>[string]</AccessibleCarrierCode>
                            </CarrierCode>
                        </CarrierCodes>
                        <ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">[string?]</ClientIPAddress>
                        <HistoricUserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">[string?]</HistoricUserName>
                        <ReservationInfo xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Fulfillment.Request">
                            <SeriesNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">[string]</SeriesNumber>
                            <ConfirmationNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">[string]</ConfirmationNumber>
                        </ReservationInfo>
                        <UpdatePayments xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Fulfillment.Request">
                            <AuthorizationCode>[string?]</AuthorizationCode>
                            <CVCode>[string?]</CVCode>
                            <CardCurrency>[string?]</CardCurrency>
                            <CardHolder>[string?]</CardHolder>
                            <CardNumber>[string?]</CardNumber>
                            <CurrencyPaid>[string]</CurrencyPaid>
                            <DatePaid>[dateTime?]</DatePaid>
                            <ExpirationDate>[dateTime?]</ExpirationDate>
                            <MerchantID>[string?]</MerchantID>
                            <PaymentAmount>[decimal?]</PaymentAmount>
                            <PaymentMethod>[string]</PaymentMethod>
                            <PaymentReference>[string?]</PaymentReference>
                            <ProcessorID>[string?]</ProcessorID>
                            <ProcessorName>[string?]</ProcessorName>
                            <Reference>[string?]</Reference>
                            <ResPaymentId>[int]</ResPaymentId>
                            <ResponseCode>[string?]</ResponseCode>
                            <ResponseMessage>[string?]</ResponseMessage>
                            <Result>[string?]</Result>
                            <TransactionID>[string?]</TransactionID>
                            <TransactionStatus>[string]</TransactionStatus>
                        </UpdatePayments>
                    </UpdateExternalProcessedPaymentDetailsRequest>
                </UpdateExternalProcessedPaymentDetails>
            </Body>
        </Envelope>';

        if(req('c')){
            $action = end(explode('/', $headers['SOAPAction']));
            $RQ = collect(['URI' => 'https://srn.app.radixxhost.com/SRN/Radixx.Connectpoint/ConnectPoint.Fulfillment.svc'])->merge($headers)->map(function ($val, $key){
                return "{$key} : {$val}";
            })->join("\n");
            $RQ .= "\n-------------------------------------------------------------------------- \n\n";
            $RQ .= $body;
            \File::put("{$action}-RQ.xml", $RQ);
        }

        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.Connectpoint/ConnectPoint.Fulfillment.svc', [
            'headers' => $headers,
            'body' => $body
        ]);

        $xml = $response->getBody()->getContents();
        if(req('c')){
            \File::put( "{$action}-RS.xml", $xml);
        }

        $json_data = self::parseXML($xml);

        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};
    }

    public static function ProcessPNRPayment($token, $params = [],$RetrieveFareQuote = [],$CommitSummary = [])
    {
        if(request()->has('inboundFlight')) {
            $FareTypesOutbound = $RetrieveFareQuote->FlightSegments->FlightSegment[0];
            $FareTypesInbound = $RetrieveFareQuote->FlightSegments->FlightSegment[1];

            $FareInfoOutbound = $FareTypesOutbound->FareTypes->FareType->FareInfos->FareInfo;
            $FareInfoInbound = $FareTypesInbound->FareTypes->FareType->FareInfos->FareInfo;

            $FareAmtInclTax = $FareInfoOutbound->FareAmtInclTax + $FareInfoInbound->FareAmtInclTax;

            if(empty($FareInfoOutbound->ExchangeDate)){
                $ExchangeDate = $FareInfoInbound->ExchangeDate;
            }else{
                $ExchangeDate = $FareInfoOutbound->ExchangeDate;
            }
            if(empty($FareInfoOutbound->ExchangeRate)){
                $ExchangeRate = $FareInfoInbound->ExchangeRate;
            }else{
                $ExchangeRate = $FareInfoOutbound->ExchangeRate;
            }

            $AirlinePersonOutbound = $CommitSummary->Airlines->Airline->LogicalFlight->LogicalFlight[0];
            $AirlinePersonInbound = $CommitSummary->Airlines->Airline->LogicalFlight->LogicalFlight[1];

            $AirlinePersonOutbound = $AirlinePersonOutbound->PhysicalFlights->PhysicalFlight->Customers->Customer->AirlinePersons->AirlinePerson;
            $AirlinePersonInbound = $AirlinePersonInbound->PhysicalFlights->PhysicalFlight->Customers->Customer->AirlinePersons->AirlinePerson;
            
            if(empty($AirlinePersonOutbound)){
                $AirlinePerson = $AirlinePersonInbound;
            }else {
                $AirlinePerson = $AirlinePersonOutbound;
            }
           
        }else{
            $FareInfo = $RetrieveFareQuote->FlightSegments->FlightSegment->FareTypes->FareType->FareInfos->FareInfo;
            $AirlinePerson = $CommitSummary->Airlines->Airline->LogicalFlight->LogicalFlight->PhysicalFlights->PhysicalFlight->Customers->Customer->AirlinePersons->AirlinePerson;    
        }
        $FareAmtInclTax = $FareInfo->FareAmtInclTax + $FareAmtInclTax;
        
        if($AirlinePerson->Gender == 'M'){
            $AirlinePerson->Gender = 'Male';
            
        }else{
            $AirlinePerson->Gender = 'Female';
        }
        $default = [
            'ActionType' => 'CommitSummary',
            'SeriesNumber' => 299,
            'ConfirmationNumber' => $CommitSummary->ConfirmationNumber,

            'currency' => 'PKR',
        ];
        $params = array_merge($default, $params);
        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Fulfillment/ProcessPNRPayment',
            'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];
        $action = end(explode('/', $headers['SOAPAction']));
        //MOST OF THE DATA HERE CAN BE FOUND IN AARQUOTE , FARESHOPQUOTE and FAREQUOTE and SUMMARYPNR

        $body = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
                <Body>
                    <ProcessPNRPayment xmlns="http://tempuri.org/">
                        <!-- Optional -->
                        <PNRPaymentRequest>
                            <TransactionInfo xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Fulfillment.Request">
                                <SecurityGUID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'.$token.'</SecurityGUID>
                                <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                                    <!-- Optional -->
                                    <CarrierCode>
                                        <AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</AccessibleCarrierCode>
                                    </CarrierCode>
                                </CarrierCodes>
                                <ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"></ClientIPAddress>
                                <HistoricUserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"></HistoricUserName>
                            </TransactionInfo>
                            <ReservationInfo xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Fulfillment.Request">
                                <SeriesNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">299</SeriesNumber>
                                <ConfirmationNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'.$params['ConfirmationNumber'].'</ConfirmationNumber>
                            </ReservationInfo>
                            <PNRPayments xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Fulfillment.Request">
                                <!-- Optional -->
                                <ProcessPNRPayment>
                                    <BaseAmount>'.$FareAmtInclTax.'</BaseAmount>
                                    <BaseCurrency>PKR</BaseCurrency>
                                    <CardHolder>Dilawar</CardHolder>
                                    <CardNumber>4111111111111111</CardNumber>
                                    <CheckNumber>123</CheckNumber>
                                    <CurrencyPaid>PKR</CurrencyPaid>
                                    <CVCode>123</CVCode>
                                    <DatePaid>'.$FareInfo->ExchangeDate.$ExchangeDate.'</DatePaid>
                                    <DocumentReceivedBy>Dilawar</DocumentReceivedBy>
                                    <ExpirationDate>'.$FareInfo->ExchangeDate.$ExchangeDate.'</ExpirationDate>
                                    <ExchangeRate>'.$FareInfo->ExchangeRate.$ExchangeRate.'</ExchangeRate>
                                    <ExchangeRateDate>'.$FareInfo->ExchangeDate.$ExchangeDate.'</ExchangeRateDate>
                                    <FFNumber>123</FFNumber>
                                    <PaymentComment>Production</PaymentComment>
                                    <PaymentAmount>'.$FareAmtInclTax.'</PaymentAmount>
                                    <PaymentMethod>INVC</PaymentMethod>
                                    <PaymentMethodType></PaymentMethodType>
                                    <Reference>Production</Reference>
                                    <TerminalID>2</TerminalID>
                                    <UserData>Production</UserData>
                                    <UserID>CHALOJE_ER_P</UserID>
                                    <IataNumber>00788302</IataNumber>
                                    <ValueCode>123</ValueCode>
                                    <VoucherNumber>-214</VoucherNumber>
                                    <IsTACreditCard>true</IsTACreditCard>
                                    <GcxID>1</GcxID>
                                    <GcxOptOption>1</GcxOptOption>
                                    <OriginalCurrency>PKR</OriginalCurrency>
                                    <OriginalAmount>'.$FareAmtInclTax.'</OriginalAmount>
                                    <TransactionStatus>APPROVED</TransactionStatus>
                                    <AuthorizationCode>t1</AuthorizationCode>
                                    <PaymentReference>t2</PaymentReference>
                                    <ResponseMessage>t3</ResponseMessage>
                                    <CardCurrency>PKR</CardCurrency>
                                    <BillingCountry>586</BillingCountry>
                                    <FingerPrintingSessionID>840</FingerPrintingSessionID>
                                    <Payor>
                                        <PersonOrgID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">-'.$AirlinePerson->PersonOrgID.'</PersonOrgID>
                                        <FirstName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$AirlinePerson->FirstName.'</FirstName>
                                        <LastName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$AirlinePerson->LastName.'</LastName>
                                        <MiddleName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">A</MiddleName>
                                        <Age xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$AirlinePerson->Age.'</Age>
                                        <DOB xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$AirlinePerson->DOB.'</DOB>
                                        <Gender xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$AirlinePerson->Gender.'</Gender>
                                        <Title xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$AirlinePerson->Title.'</Title>
                                        <NationalityLaguageID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$AirlinePerson->NationalityLaguageID.'</NationalityLaguageID>
                                        <RelationType xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$AirlinePerson->RelationType.'</RelationType>
                                        <WBCID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$AirlinePerson->WBCID.'</WBCID>
                                        <PTCID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$AirlinePerson->PTCID.'</PTCID>
                                        <PTC xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$AirlinePerson->PTCID.'</PTC>
                                        <TravelsWithPersonOrgID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">-'.$AirlinePerson->PersonOrgID.'</TravelsWithPersonOrgID>
                                        <RedressNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$AirlinePerson->Address.'</RedressNumber>
                                        <KnownTravelerNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">di</KnownTravelerNumber>
                                        <MarketingOptIn xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">true</MarketingOptIn>
                                        <UseInventory xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">false</UseInventory>
                                        <Address xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">
                                            <Address1>'.$AirlinePerson->Address.'</Address1>
                                            <Address2></Address2>
                                            <City>'.$AirlinePerson->City.'</City>
                                            <State>'.$AirlinePerson->State.'</State>
                                            <Postal>'.$AirlinePerson->Postal.'</Postal>
                                            <Country>'.$AirlinePerson->Country.'</Country>
                                            <CountryCode></CountryCode>
                                            <AreaCode></AreaCode>
                                            <PhoneNumber></PhoneNumber>
                                            <Display></Display>
                                        </Address>
                                        <Company xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">Chaloje</Company>
                                        <Comments xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request"></Comments>
                                        <Passport xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request"></Passport>
                                        <Nationality xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request"></Nationality>
                                        <ProfileId xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$CommitSummary->ProfileID.'</ProfileId>
                                        <IsPrimaryPassenger xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">true</IsPrimaryPassenger>
                                        <ContactInfos xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request"></ContactInfos>
                                        <FrequentFlyerNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">di</FrequentFlyerNumber>
                                    </Payor>
                                    <Result xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                                    <TransactionID xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                                    <ResponseCode xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                                    <AncillaryData01 xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                                    <AncillaryData02 xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                                    <AncillaryData03 xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                                    <AncillaryData04 xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                                    <AncillaryData05 xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                                    <ProcessorID xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                                    <MerchantID>chalojeota</MerchantID>
                                    <ProcessorName></ProcessorName>
                                    <!-- Optional -->
                                    <MetaData>
                                    </MetaData>
                                </ProcessPNRPayment>
                            </PNRPayments>
                        </PNRPaymentRequest>
                    </ProcessPNRPayment>
                </Body>
            </Envelope>';
        if(req('c')){
            $action = end(explode('/', $headers['SOAPAction']));
            $RQ = collect(['URI' => 'https://srn.app.radixxhost.com/SRN/Radixx.Connectpoint/ConnectPoint.Fulfillment.svc'])->merge($headers)->map(function ($val, $key){
                return "{$key} : {$val}";
            })->join("\n");
            $RQ .= "\n-------------------------------------------------------------------------- \n\n";
            $RQ .= $body;
            \File::put("{$action}-RQ.xml", $RQ);
        }

        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.Connectpoint/ConnectPoint.Fulfillment.svc', [
            'headers' => $headers,
            'body' => $body
        ]);

        $xml = $response->getBody()->getContents();
        if(req('c')){
            \File::put( "{$action}-RS.xml", $xml);
        }

        $json_data = self::parseXML($xml);
        // echo 'sdasds';
        // dd($json_data);
        // exit;
        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};
    }

    public static function CreatePNR($token, $params = [])
    {
        self::set_credential();


        $default = [
            'ActionType' => $params['ActionType'],
            'SeriesNumber' => 299,
            'ConfirmationNumber' => $params['ConfirmationNumber']
        ];

            //  dd($default);
        $params = array_merge($default, $params);

        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Reservation/CreatePNR',
            // 'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];
        $action = end(explode('/', $headers['SOAPAction']));

        $body = '<soapenv:Envelope
        xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
        xmlns:tem="http://tempuri.org/"
        xmlns:rad="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"
        xmlns:rad1="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">
        <soapenv:Header/>
        <soapenv:Body>
            <tem:CreatePNR>
                <!--Optional:-->
                <tem:CreatePnrRequest>
                    <rad:SecurityGUID>' . $token . '</rad:SecurityGUID>
                    <rad:CarrierCodes>
                        <!--Zero or more repetitions:-->
                        <rad:CarrierCode>
                            <rad:AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</rad:AccessibleCarrierCode>
                        </rad:CarrierCode>
                    </rad:CarrierCodes>
                    <!--Optional:-->
                    <rad:ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'. \request()->ip() .' </rad:ClientIPAddress>
                    <!--Optional:-->
                    <rad:HistoricUserName xsi:nil="true"
                        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                        <rad1:ActionType>'.$params['ActionType'].'</rad1:ActionType>
                        <rad1:ReservationInfo>
                            <rad:SeriesNumber>'.$params['SeriesNumber'].'</rad:SeriesNumber>
                            <rad:ConfirmationNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'.$params['ConfirmationNumber'].'</rad:ConfirmationNumber>
                            </rad1:ReservationInfo>
                        </tem:CreatePnrRequest>
                    </tem:CreatePNR>
                </soapenv:Body>
            </soapenv:Envelope>';
            // dd($body);
        // dump('CreatePNR(CommitSummary)' , $body);

        if(req('c')){
            $action = end(explode('/', $headers['SOAPAction']));
            $RQ = collect(['URI' => 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Reservation.svc'])->merge($headers)->map(function ($val, $key){
                return "{$key} : {$val}";
            })->join("\n");
            $RQ .= "\n-------------------------------------------------------------------------- \n\n";
            $RQ .= $body;
            \File::put("{$action}-RQ.xml", $RQ);
        }

        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Reservation.svc', [
            'headers' => $headers,
            'body' => $body
        ]);

        $xml = $response->getBody()->getContents();
        if(req('c')){
            \File::put( "{$action}-RS.xml", $xml);
        }

        $json_data = self::parseXML($xml);
        // dump($params['ActionType'],$body);
        // dump($params['ActionType'],$json_data);
        // exit;
        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};

    }

    public static function CancelPNR($token = null, $params = [])
    {
        if(empty($token)) {
            $token = self::makeSession();
        }
        $default = [
            'ActionType' => 'CancelReservation',
            'SeriesNumber' => '299',
            'ConfirmationNumber' => '299'
        ];
         $params = array_merge($default, $params);

        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Reservation/CancelPNR',
            'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];
        $action = end(explode('/', $headers['SOAPAction']));

        $body = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
            <Body>
                <CancelPNR xmlns="http://tempuri.org/">
                    <!-- Optional -->
                    <CancelPnrRequest>
                        <SecurityGUID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'.$token.'</SecurityGUID>
                        <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                            <!-- Optional -->
                            <CarrierCode>
                                <AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</AccessibleCarrierCode>
                            </CarrierCode>
                        </CarrierCodes>
                        <ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'. \request()->ip() .'</ClientIPAddress>
                        <HistoricUserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"></HistoricUserName>
                        <ActionType xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">'.$params['ActionType'].'</ActionType>
                        <ReservationInfo xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">
                            <SeriesNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'.$params['SeriesNumber'].'</SeriesNumber>
                            <ConfirmationNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'.$params['ConfirmationNumber'].'</ConfirmationNumber>
                        </ReservationInfo>
                        <IsFlightDisruptionCancel xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">false</IsFlightDisruptionCancel>
                    </CancelPnrRequest>
                </CancelPNR>
            </Body>
        </Envelope>';

        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Reservation.svc', [
            'headers' => $headers,
            'body' => $body
        ]);

        $xml = $response->getBody()->getContents();

        $json_data = self::parseXML($xml);

        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};
    }

    public static function LoginTravelAgent($token = null, $params = [])
    {
        if(empty($token)) {
            $token = self::makeSession();
        }
        $default = [
            //'ActionType' => 'CancelReservation',
        ];
         $params = array_merge($default, $params);

        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_TravelAgents/LoginTravelAgent',
            'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];

        $action = end(explode('/', $headers['SOAPAction']));

        $body = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
            <Body>
                <LoginTravelAgent xmlns="http://tempuri.org/">
                    <!-- Optional -->
                    <LoginTravelAgentRequest>
                        <SecurityGUID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">' . $token . '</SecurityGUID>
                        <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                            <!-- Optional -->
                            <CarrierCode>
                                <AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</AccessibleCarrierCode>
                            </CarrierCode>
                        </CarrierCodes>
                        <ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'. \request()->ip() .'</ClientIPAddress>
                        <HistoricUserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"></HistoricUserName>
                        <IATANumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.TravelAgents.Request">' . self::$credential['IATANum'] . '</IATANumber>
                        <UserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.TravelAgents.Request">chalojeota</UserName>
                        <Password xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.TravelAgents.Request">June@2024</Password>
                    </LoginTravelAgentRequest>
                </LoginTravelAgent>
            </Body>
        </Envelope>';

        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.travelAgents.svc', [
            'headers' => $headers,
            'body' => $body
        ]);

        $xml = $response->getBody()->getContents();
        
        $json_data = self::parseXML($xml);

        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};
    }

    public static function RetrieveAllConfirmations($token = null, $params = [])
    {
        if($token == null) {
            $token = self::makeSession();
        }
        $default = [
            //'ActionType' => 'CancelReservation',
        ];
         $params = array_merge($default, $params);

        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Flight/RetrieveAllConfirmations',
            'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];

        $action = end(explode('/', $headers['SOAPAction']));

        $body = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
            <Body>
                <RetrieveAllConfirmations xmlns="http://tempuri.org/">
                    <!-- Optional -->
                    <RetrieveAllConfirmationsRequest>
                        <SecurityGUID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'.$token.'</SecurityGUID>
                        <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                            <!-- Optional -->
                            <CarrierCode>
                                <AccessibleCarrierCode>'.self::$credential['CarrierCode'].'</AccessibleCarrierCode>
                            </CarrierCode>
                        </CarrierCodes>
                        <ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'. \request()->ip() .'</ClientIPAddress>
                        <HistoricUserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">guest</HistoricUserName>
                        <SearchType xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">Standard</SearchType>
                        <!-- Optional -->
                        <GetBookingsForSpecificFlight xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">
                            <Origin>KHI</Origin>
                            <Destination>ISB</Destination>
                            <FlightNumber>1</FlightNumber>
                            <DepartureDate>'. date('Y-m-d') .'</DepartureDate>
                            <ActiveOnly>true</ActiveOnly>
                        </GetBookingsForSpecificFlight>
                        <!-- Optional -->
                        <GetBookingsForSpecificDateRange xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Request">
                            <!--<BookingType>[string]</BookingType>
                            <StartSearchDate>[dateTime]</StartSearchDate>
                            <EndSearchDate>[dateTime]</EndSearchDate>
                            <Origin>[string?]</Origin>
                            <Destination>[string?]</Destination>-->
                        </GetBookingsForSpecificDateRange>
                    </RetrieveAllConfirmationsRequest>
                </RetrieveAllConfirmations>
            </Body>
        </Envelope>';
        // die($body);
        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Flight.svc', [
            'headers' => $headers,
            'body' => $body
        ]);

        $xml = $response->getBody()->getContents();

        $json_data = self::parseXML($xml);

        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};
    }

    public static function RetrievePNR($token = null, $params = [])
    {
        if($token == null) {
            $token = self::makeSession();
        }
        $default = [
            'ActionType' => 'GetReservation',
            'SeriesNumber' => 299,
            'ConfirmationNumber' => random_int(100000, 999999),
        ];
         $params = array_merge($default, $params);

        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Reservation/RetrievePNR',
            'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];

        $action = end(explode('/', $headers['SOAPAction']));

        $body = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
            <Body>
                <RetrievePNR xmlns="http://tempuri.org/">
                    <!-- Optional -->
                    <RetrievePnrRequest>
                        <SecurityGUID xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'.$token.'</SecurityGUID>
                        <CarrierCodes xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">
                            <!-- Optional -->
                            <CarrierCode>
                                <AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</AccessibleCarrierCode>
                            </CarrierCode>
                        </CarrierCodes>
                        <ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'. \request()->ip() .'</ClientIPAddress>
                        <HistoricUserName xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">guest</HistoricUserName>
                        <ActionType xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">' . $params['ActionType'] . '</ActionType>
                        <ReservationInfo xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">
                            <SeriesNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">' . $params['SeriesNumber'] . '</SeriesNumber>
                            <ConfirmationNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">' . $params['ConfirmationNumber'] . '</ConfirmationNumber>
                        </ReservationInfo>
                    </RetrievePnrRequest>
                </RetrievePNR>
            </Body>
        </Envelope>';

        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Reservation.svc', [
            'headers' => $headers,
            'body' => $body
        ]);

        $xml = $response->getBody()->getContents();

        $json_data = self::parseXML($xml);

        return $json_data->Body->{"{$action}Response"}->{"{$action}Result"};
    }

    public static function getSingleFlightMUl()
    {
        self::set_credential();

        // echo 'asd';
        // exit;
        $params = [
            'currency' => 'PKR',
            'Origin' => req('LocationArr'),
            'Destination' => req('LocationDep'),
            'Departure' => \Carbon\Carbon::parse(req('ReturningOn'))->format('Y-m-d'),
            "Return" => false,
            "Returning" => date('Y-m-d', strtotime('+2 days')),
            //"Returning" => \Carbon\Carbon::parse(req('ReturningOn', date('Y-m-d', strtotime('+2 days'))))->format('Y-m-d'),
            "AdultNo" => 1,
            "ChildNo" => 0,
            "InfantNo" => 0,
            ];
        // dd($params);    

        $params['Return'] = (\request('Return') == 'true');
        if($params['Return']){
            $params['Returning'] = \Carbon\Carbon::parse(req('ReturningOn'))->format('Y-m-d');
        }

        // $token = self::RetrieveSecurityToken();
        // $FlightSchedules = self::GetFlightScheduleInformation($token, $params);

        
        // $FareQuoteShop = self::RetrieveFareQuoteShop($params);
        // dd($FareQuoteShop->SegmentDetails->SegmentDetail);
        // dd($FareQuoteShop->SegmentDetails->SegmentDetail->);
        // $params['LFID'] = $FareQuoteShop->SegmentDetails->SegmentDetail[0]->LFID;
        // $params['LFID'] = $FareQuoteShop->SegmentDetails->SegmentDetail->LFID;
        // $params['Departure'] = $FareQuoteShop->SegmentDetails->SegmentDetail[0]->DepartureDate;
        // $params['Departure'] = $FareQuoteShop->SegmentDetails->SegmentDetail->DepartureDate;
        // dd($params);

      
        // dd($FareQuote);
        $FareQuote = self::RetrieveFareQuoteShopMul($params);
        // dump($FareQuoteShop);
        // dd($params);
        // dd($FareQuote);
        // dd($FareQuote->FlightSegments->FlightSegment);
        // $a = $FareQuoteShop->SegmentDetails;
        // dd($a);

        // $FareQuoteShop = self::RetrieveFareQuote($token, $params, $FareQuote);
        // echo 'asdasd';
        // exit;
        // dd($FareQuoteShop);
        // dd($FareQuote->FlightSegments->FlightSegment);

        //dd($FareQuote);
        // $AARQuote = self::RetrieveAARQuote($token, [
        //     'Origin' => $FareQuote->SegmentDetails->SegmentDetail->Origin,
        //     'Destination' => $FareQuote->SegmentDetails->SegmentDetail->Destination,
        //     'DepartureDate' => $FareQuote->SegmentDetails->SegmentDetail->DepartureDate,
        //     'LFID' => $FareQuote->SegmentDetails->SegmentDetail->LFID
        // ]);

        // dump($FareQuote->FlightSegments);
        // dd($FareQuote, $FareQuote->SegmentDetails->SegmentDetail);
        $FLIGHTS = [];
        if(count($FareQuote->SegmentDetails->SegmentDetail) > 0){
            // dd($FareQuote->SegmentDetails->SegmentDetail);
            foreach ($FareQuote->SegmentDetails->SegmentDetail as $k => $SegmentDetail) {
                // dd($SegmentDetail);
                    // dd($FareQuote->FlightSegments->FlightSegment);
                if(count($FareQuote->SegmentDetails->SegmentDetail) == 1){
                    $SegmentDetail = $FareQuote->SegmentDetails->SegmentDetail;
                }
                // dd($SegmentDetail);
                $FlightSegment = (is_array($FareQuote->FlightSegments->FlightSegment) ? $FareQuote->FlightSegments->FlightSegment[$k] : $FareQuote->FlightSegments->FlightSegment);
                // dd($FlightSegment);
                $FareInfosTypes = $FlightSegment->FareTypes->FareType;
                // dd($FareInfosTypes);
                // dd($SegmentDetail);

                $TYPE = 'inbound';
                $FLIGHT = [
                    'AIRLINE' => 'Air Serene',
                    'AIRLINE_CODE' => 'ER',
                    'TYPE' => $TYPE,
                    "FLIGHT_NO" => $SegmentDetail->FlightNum,
                    "DEPARTURE_DATE" => \Carbon\Carbon::parse($SegmentDetail->DepartureDate)->format('Y-m-d'),
                    "DEPARTURE_TIME" => \Carbon\Carbon::parse($SegmentDetail->DepartureDate)->format('H:i:s'),
                    "ARRIVAL_DATE" => \Carbon\Carbon::parse($SegmentDetail->ArrivalDate)->format('Y-m-d'),
                    "ARRIVAL_TIME" => \Carbon\Carbon::parse($SegmentDetail->ArrivalDate)->format('H:i:s'),
                    "JOURNEY_CODE" => $SegmentDetail->FlightNum,
                    "ORGN" => $SegmentDetail->Origin,
                    "DEST" => $SegmentDetail->Destination,
                    "CURRENCY" => $SegmentDetail->OriginalCurrency ?? 'PKR',
                    "STOPS" => $SegmentDetail->Stops,
                    "FLIGHT_TIME" => $SegmentDetail->FlightTime,
                    "DURATION" => \Carbon\Carbon::parse('00:00:00')->addMinutes($SegmentDetail->FlightTime)->format('H\h i\m'),
                    //"DURATION" => str_pad(($SegmentDetail->FlightTime / 60), 2, '0', STR_PAD_LEFT) . "h",
                    "STATUS" => "ONTIME",
                    "LFID" => $SegmentDetail->LFID
                ];
                // dd($FareQuote);
                // dd($FareQuote->FlightSegments->FlightSegment);
                // $FareInfosTypes = $FareQuote->FlightSegments->FlightSegment->FareTypes->FareType;
                // $a = json_decode($FareInfosTypes);
                // dd($a);
                // dd($FareInfosTypes);
                // if(count($FareInfosTypes) > 0){
                //     dd($FareInfosTypes);
                // }else{
                //     echo 'else';
                //     dd($FareInfosTypes);
                //     // exit;
                // }
                if(count($FareInfosTypes) > 0){
                    foreach ($FareInfosTypes as $fareInfosType) {
                        // dd($fareInfosType);
                        // echo 'as';
                        // dump($fareInfosType);
                        // dd($fareInfosType);
                        // dd($fareInfosType->FareInfos->FareInfo);
                        $all_baggage = $fareInfosType->FareInfos->FareInfo;
                        // dd($all_baggage);
                        $adult_bag = collect($all_baggage)->where('PTCID', 1)->all();
                        $child_bag = collect($all_baggage)->where('PTCID', 6)->all();
                        $infant_bag = collect($all_baggage)->where('PTCID', 5)->all();
                        // dd($as);
                        // dd($free_baggage);
                        $adult_info = end($adult_bag);
                        // dd($adult_info);
                        $child_info = end($child_bag);
                        $infant_info = end($infant_bag);
                        // dd()
                        // dd($last_free_baggage);

                        $FareInfos = $fareInfosType->FareInfos->FareInfo;
                        // dump('fare',$FareInfos);
                        // continue;
                        $_FARES[] = collect($FareInfos)->where('PTCID', 1)->reverse()->first();
                        // dd($_FARES);
                        $_FARES[] = collect($FareInfos)->where('PTCID', 6)->reverse()->first();
                        // dd($_FARES);
                        $_FARES[] = collect($FareInfos)->where('PTCID', 5)->reverse()->first();
                        // dd($_FARES[1]);
                        $FARES = [
                            'title' => $fareInfosType->FareTypeName,
                            'no_of_bags' => ($fareInfosType->FareTypeName == 'Free Baggage' ? 0 : ('bundledServiceName' == 'Extra' ? 2 : 1)),
                            'weight' => ($fareInfosType->FareTypeName == 'Free Baggage' ? '0 KG' : ('bundledServiceName' == 'Extra' ? 2 : '20 KG')),
                            "FareTypeID" => $fareInfosType->FareTypeID,
                            "sub_class_desc" => $fareInfosType->FareTypeName,
                            "FilterRemove" => $fareInfosType->FilterRemove,
                            "TOTAL_BASIC_FARE" =>$adult_info->BaseFareAmtNoTaxes + $child_info->BaseFareAmtNoTaxes + $infant_info->BaseFareAmtNoTaxes,
                            'FARE_PAX_WISE' => [
                                'ADULT' => [
                                    // "BASIC_FARE" => $_FARES[0]->BaseFareAmtNoTaxes,
                                    // "TAX" => ($_FARES[0]->BaseFareAmtInclTax - $_FARES[0]->BaseFareAmtNoTaxes),
                                    // "TOTAL" => $_FARES[0]->BaseFareAmtInclTax,
                                    // "FEES" => 0,
                                    // "SURCHARGE" => 0,
                                    "BASIC_FARE" =>$adult_info->BaseFareAmtNoTaxes,
                                    "TAX" => ($adult_info->BaseFareAmtInclTax - $adult_info->BaseFareAmtNoTaxes),
                                    "TOTAL" => $adult_info->BaseFareAmtInclTax,
                                    "FEES" => 0,
                                    "SURCHARGE" => 0,
                                    "FCCode" => $adult_info->FCCode,
                                    "FBCode" => $adult_info->FBCode,
                                ],
                                'CHILD' => [
                                    // "BASIC_FARE" => $_FARES[1]->BaseFareAmtNoTaxes,
                                    // "TAX" => ($_FARES[1]->BaseFareAmtInclTax - $_FARES[1]->BaseFareAmtNoTaxes),
                                    // "TOTAL" => $_FARES[1]->BaseFareAmtInclTax,
                                    // "FEES" => 0,
                                    // "SURCHARGE" => 0
                                    "BASIC_FARE" =>$child_info->BaseFareAmtNoTaxes,
                                    "TAX" => ($child_info->BaseFareAmtInclTax - $child_info->BaseFareAmtNoTaxes),
                                    "TOTAL" => $child_info->BaseFareAmtInclTax,
                                    "FEES" => 0,
                                    "SURCHARGE" => 0,
                                    "FCCode" => $child_info->FCCode,
                                    "FBCode" => $child_info->FBCode,


                                ],
                                'INFANT' => [
                                    // "BASIC_FARE" => $_FARES[2]->BaseFareAmtNoTaxes,
                                    // "TAX" => ($_FARES[2]->BaseFareAmtInclTax - $_FARES[2]->BaseFareAmtNoTaxes),
                                    // "TOTAL" => $_FARES[2]->BaseFareAmtInclTax,
                                    // "FEES" => 0,
                                    // "SURCHARGE" => 0
                                    "BASIC_FARE" =>$infant_info->BaseFareAmtNoTaxes,
                                    "TAX" => ($infant_info->BaseFareAmtInclTax - $infant_info->BaseFareAmtNoTaxes),
                                    "TOTAL" => $infant_info->BaseFareAmtInclTax,
                                    "FEES" => 0,
                                    "SURCHARGE" => 0,
                                    "FCCode" => $infant_info->FCCode,
                                    "FBCode" => $infant_info->FBCode,

                                ]
                            ]
                        ];
                        // dd($FARES);

                        $FARES['FARE_PAX_WISE']['ADULT'] = collect($FARES['FARE_PAX_WISE']['ADULT'])->merge($adult_info)->toArray();
                        $FARES['FARE_PAX_WISE']['CHILD'] = collect($FARES['FARE_PAX_WISE']['CHILD'])->merge($child_info)->toArray();
                        $FARES['FARE_PAX_WISE']['INFANT'] = collect($FARES['FARE_PAX_WISE']['INFANT'])->merge($infant_info)->toArray();
                        $FARES['TOTAL'] = (\request('AdultNo') * $FARES['FARE_PAX_WISE']['ADULT']['TOTAL'] +
                            \request('ChildNo') * $FARES['FARE_PAX_WISE']['CHILD']['TOTAL'] +
                            \request('InfantNo') * $FARES['FARE_PAX_WISE']['INFANT']['TOTAL']);
                        // dd($FARES);
                        // dd($FARES['TOTAL']);
                        $FLIGHT['BAGGAGE_FARE'][] = $FARES;
                    }
                }
                //$FLIGHTS['outbound'][] = $FLIGHT;
                $FLIGHTS[$TYPE][$FLIGHT['FLIGHT_NO']] = $FLIGHT;
                // dd($FLIGHTS[$TYPE][$FLIGHT['FLIGHT_NO']]);
                //array_push($FLIGHTS, $FLIGHT);
            }
        }

        //$DURATION = \Carbon\Carbon::parse($FareQuote->SegmentDetails->SegmentDetail->DepartureDate)->diff(\Carbon\Carbon::parse($FareQuote->SegmentDetails->SegmentDetail->ArrivalDate));
        //$response['DURATION'] = $DURATION->format('H i');
        // dd($FLIGHTS);
        if(empty($FLIGHTS)){
            $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'UnSuccess';
        }else{
            $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'Success';
        }
        return array_map('array_values', $FLIGHTS);
    }
    public static function getSingleFlight()
    {
        self::set_credential();

        // echo 'asd';
        // exit;
        $params = [
            'currency' => 'PKR',
            'Origin' => req('LocationDep'),
            'Destination' => req('LocationArr'),
            'Departure' => \Carbon\Carbon::parse(req('DepartingOn'))->format('Y-m-d'),
            "Return" => false,
            "Returning" => date('Y-m-d', strtotime('+2 days')),
            //"Returning" => \Carbon\Carbon::parse(req('ReturningOn', date('Y-m-d', strtotime('+2 days'))))->format('Y-m-d'),
            "AdultNo" => 1,
            "ChildNo" => 0,
            "InfantNo" => 0,
            ];
        // dd($params);    

        $params['Return'] = (\request('Return') == 'true');
        if($params['Return']){
            $params['Returning'] = \Carbon\Carbon::parse(req('ReturningOn'))->format('Y-m-d');
        }

        // $token = self::RetrieveSecurityToken();
        // $FlightSchedules = self::GetFlightScheduleInformation($token, $params);

        
        // $FareQuoteShop = self::RetrieveFareQuoteShop($params);
        // dd($FareQuoteShop->SegmentDetails->SegmentDetail);
        // dd($FareQuoteShop->SegmentDetails->SegmentDetail->);
        // $params['LFID'] = $FareQuoteShop->SegmentDetails->SegmentDetail[0]->LFID;
        // $params['LFID'] = $FareQuoteShop->SegmentDetails->SegmentDetail->LFID;
        // $params['Departure'] = $FareQuoteShop->SegmentDetails->SegmentDetail[0]->DepartureDate;
        // $params['Departure'] = $FareQuoteShop->SegmentDetails->SegmentDetail->DepartureDate;
        // dd($params);

      
        // dd($FareQuote);
        $FareQuote = self::RetrieveFareQuoteShop($params);
        // dump($FareQuoteShop);
        // dd($params);
        // dd($FareQuote);
        // dd($FareQuote->FlightSegments->FlightSegment);
        // $a = $FareQuoteShop->SegmentDetails;
        // dd($a);

        // $FareQuoteShop = self::RetrieveFareQuote($token, $params, $FareQuote);
        // echo 'asdasd';
        // exit;
        // dd($FareQuoteShop);
        // dd($FareQuote->FlightSegments->FlightSegment);

        //dd($FareQuote);
        // $AARQuote = self::RetrieveAARQuote($token, [
        //     'Origin' => $FareQuote->SegmentDetails->SegmentDetail->Origin,
        //     'Destination' => $FareQuote->SegmentDetails->SegmentDetail->Destination,
        //     'DepartureDate' => $FareQuote->SegmentDetails->SegmentDetail->DepartureDate,
        //     'LFID' => $FareQuote->SegmentDetails->SegmentDetail->LFID
        // ]);

        // dump($FareQuote->FlightSegments);
        // dd($FareQuote, $FareQuote->SegmentDetails->SegmentDetail);
        $FLIGHTS = [];
        if(count($FareQuote->SegmentDetails->SegmentDetail) > 0){
            // dd($FareQuote->SegmentDetails->SegmentDetail);
            foreach ($FareQuote->SegmentDetails->SegmentDetail as $k => $SegmentDetail) {
                // dd($SegmentDetail);
                    // dd($FareQuote->FlightSegments->FlightSegment);
                if(count($FareQuote->SegmentDetails->SegmentDetail) == 1){
                    $SegmentDetail = $FareQuote->SegmentDetails->SegmentDetail;
                }
                // dd($SegmentDetail);
                $FlightSegment = (is_array($FareQuote->FlightSegments->FlightSegment) ? $FareQuote->FlightSegments->FlightSegment[$k] : $FareQuote->FlightSegments->FlightSegment);
                // dd($FlightSegment);
                $FareInfosTypes = $FlightSegment->FareTypes->FareType;
                // dd($FareInfosTypes);
                // dd($SegmentDetail);

                $TYPE = 'outbound';
                $FLIGHT = [
                    'AIRLINE' => 'Air Serene',
                    'AIRLINE_CODE' => 'ER',
                    'TYPE' => $TYPE,
                    "FLIGHT_NO" => $SegmentDetail->FlightNum,
                    "DEPARTURE_DATE" => \Carbon\Carbon::parse($SegmentDetail->DepartureDate)->format('Y-m-d'),
                    "DEPARTURE_TIME" => \Carbon\Carbon::parse($SegmentDetail->DepartureDate)->format('H:i:s'),
                    "ARRIVAL_DATE" => \Carbon\Carbon::parse($SegmentDetail->ArrivalDate)->format('Y-m-d'),
                    "ARRIVAL_TIME" => \Carbon\Carbon::parse($SegmentDetail->ArrivalDate)->format('H:i:s'),
                    "JOURNEY_CODE" => $SegmentDetail->FlightNum,
                    "ORGN" => $SegmentDetail->Origin,
                    "DEST" => $SegmentDetail->Destination,
                    "CURRENCY" => $SegmentDetail->OriginalCurrency ?? 'PKR',
                    "STOPS" => $SegmentDetail->Stops,
                    "FLIGHT_TIME" => $SegmentDetail->FlightTime,
                    "DURATION" => \Carbon\Carbon::parse('00:00:00')->addMinutes($SegmentDetail->FlightTime)->format('H\h i\m'),
                    //"DURATION" => str_pad(($SegmentDetail->FlightTime / 60), 2, '0', STR_PAD_LEFT) . "h",
                    "STATUS" => "ONTIME",
                    "LFID" => $SegmentDetail->LFID
                ];
                // dd($FareQuote);
                // dd($FareQuote->FlightSegments->FlightSegment);
                // $FareInfosTypes = $FareQuote->FlightSegments->FlightSegment->FareTypes->FareType;
                // $a = json_decode($FareInfosTypes);
                // dd($a);
                // dd($FareInfosTypes);
                // if(count($FareInfosTypes) > 0){
                //     dd($FareInfosTypes);
                // }else{
                //     echo 'else';
                //     dd($FareInfosTypes);
                //     // exit;
                // }
                if(count($FareInfosTypes) > 0){
                    foreach ($FareInfosTypes as $fareInfosType) {
                        // dd($fareInfosType);
                        // echo 'as';
                        // dump($fareInfosType);
                        // dd($fareInfosType);
                        // dd($fareInfosType->FareInfos->FareInfo);
                        $all_baggage = $fareInfosType->FareInfos->FareInfo;
                        // dd($all_baggage);
                        $adult_bag = collect($all_baggage)->where('PTCID', 1)->all();
                        $child_bag = collect($all_baggage)->where('PTCID', 6)->all();
                        $infant_bag = collect($all_baggage)->where('PTCID', 5)->all();
                        // dd($as);
                        // dd($free_baggage);
                        $adult_info = end($adult_bag);
                        // dd($adult_info);
                        $child_info = end($child_bag);
                        $infant_info = end($infant_bag);
                        // dd()
                        // dd($last_free_baggage);

                        $FareInfos = $fareInfosType->FareInfos->FareInfo;
                        // dump('fare',$FareInfos);
                        // continue;
                        $_FARES[] = collect($FareInfos)->where('PTCID', 1)->reverse()->first();
                        // dd($_FARES);
                        $_FARES[] = collect($FareInfos)->where('PTCID', 6)->reverse()->first();
                        // dd($_FARES);
                        $_FARES[] = collect($FareInfos)->where('PTCID', 5)->reverse()->first();
                        // dd($_FARES[1]);
                        $FARES = [
                            'title' => $fareInfosType->FareTypeName,
                            'no_of_bags' => ($fareInfosType->FareTypeName == 'Free Baggage' ? 0 : ('bundledServiceName' == 'Extra' ? 2 : 1)),
                            'weight' => ($fareInfosType->FareTypeName == 'Free Baggage' ? '0 KG' : ('bundledServiceName' == 'Extra' ? 2 : '20 KG')),
                            "FareTypeID" => $fareInfosType->FareTypeID,
                            "sub_class_desc" => $fareInfosType->FareTypeName,
                            "FilterRemove" => $fareInfosType->FilterRemove,
                            "TOTAL_BASIC_FARE" =>$adult_info->BaseFareAmtNoTaxes + $child_info->BaseFareAmtNoTaxes + $infant_info->BaseFareAmtNoTaxes,
                            'FARE_PAX_WISE' => [
                                'ADULT' => [
                                    // "BASIC_FARE" => $_FARES[0]->BaseFareAmtNoTaxes,
                                    // "TAX" => ($_FARES[0]->BaseFareAmtInclTax - $_FARES[0]->BaseFareAmtNoTaxes),
                                    // "TOTAL" => $_FARES[0]->BaseFareAmtInclTax,
                                    // "FEES" => 0,
                                    // "SURCHARGE" => 0,
                                    "BASIC_FARE" =>$adult_info->BaseFareAmtNoTaxes,
                                    "TAX" => ($adult_info->BaseFareAmtInclTax - $adult_info->BaseFareAmtNoTaxes),
                                    "TOTAL" => $adult_info->BaseFareAmtInclTax,
                                    "FEES" => 0,
                                    "SURCHARGE" => 0,
                                    "FCCode" => $adult_info->FCCode,
                                    "FBCode" => $adult_info->FBCode,
                                ],
                                'CHILD' => [
                                    // "BASIC_FARE" => $_FARES[1]->BaseFareAmtNoTaxes,
                                    // "TAX" => ($_FARES[1]->BaseFareAmtInclTax - $_FARES[1]->BaseFareAmtNoTaxes),
                                    // "TOTAL" => $_FARES[1]->BaseFareAmtInclTax,
                                    // "FEES" => 0,
                                    // "SURCHARGE" => 0
                                    "BASIC_FARE" =>$child_info->BaseFareAmtNoTaxes,
                                    "TAX" => ($child_info->BaseFareAmtInclTax - $child_info->BaseFareAmtNoTaxes),
                                    "TOTAL" => $child_info->BaseFareAmtInclTax,
                                    "FEES" => 0,
                                    "SURCHARGE" => 0,
                                    "FCCode" => $child_info->FCCode,
                                    "FBCode" => $child_info->FBCode,


                                ],
                                'INFANT' => [
                                    // "BASIC_FARE" => $_FARES[2]->BaseFareAmtNoTaxes,
                                    // "TAX" => ($_FARES[2]->BaseFareAmtInclTax - $_FARES[2]->BaseFareAmtNoTaxes),
                                    // "TOTAL" => $_FARES[2]->BaseFareAmtInclTax,
                                    // "FEES" => 0,
                                    // "SURCHARGE" => 0
                                    "BASIC_FARE" =>$infant_info->BaseFareAmtNoTaxes,
                                    "TAX" => ($infant_info->BaseFareAmtInclTax - $infant_info->BaseFareAmtNoTaxes),
                                    "TOTAL" => $infant_info->BaseFareAmtInclTax,
                                    "FEES" => 0,
                                    "SURCHARGE" => 0,
                                    "FCCode" => $infant_info->FCCode,
                                    "FBCode" => $infant_info->FBCode,

                                ]
                            ]
                        ];
                        // dd($FARES);

                        $FARES['FARE_PAX_WISE']['ADULT'] = collect($FARES['FARE_PAX_WISE']['ADULT'])->merge($adult_info)->toArray();
                        $FARES['FARE_PAX_WISE']['CHILD'] = collect($FARES['FARE_PAX_WISE']['CHILD'])->merge($child_info)->toArray();
                        $FARES['FARE_PAX_WISE']['INFANT'] = collect($FARES['FARE_PAX_WISE']['INFANT'])->merge($infant_info)->toArray();
                        $FARES['TOTAL'] = (\request('AdultNo') * $FARES['FARE_PAX_WISE']['ADULT']['TOTAL'] +
                            \request('ChildNo') * $FARES['FARE_PAX_WISE']['CHILD']['TOTAL'] +
                            \request('InfantNo') * $FARES['FARE_PAX_WISE']['INFANT']['TOTAL']);
                        // dd($FARES);
                        // dd($FARES['TOTAL']);
                        $FLIGHT['BAGGAGE_FARE'][] = $FARES;
                    }
                }
                //$FLIGHTS['outbound'][] = $FLIGHT;
                $FLIGHTS[$TYPE][$FLIGHT['FLIGHT_NO']] = $FLIGHT;
                // dd($FLIGHTS[$TYPE][$FLIGHT['FLIGHT_NO']]);
                //array_push($FLIGHTS, $FLIGHT);
            }
        }

        //$DURATION = \Carbon\Carbon::parse($FareQuote->SegmentDetails->SegmentDetail->DepartureDate)->diff(\Carbon\Carbon::parse($FareQuote->SegmentDetails->SegmentDetail->ArrivalDate));
        //$response['DURATION'] = $DURATION->format('H i');
        // dd($FLIGHTS);
        if(empty($FLIGHTS)){
            $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'UnSuccess';
        }else{
            $FLIGHTS['FLIGHT_AirSerene_STATUS'][] = 'Success';
        }
        return array_map('array_values', $FLIGHTS);
    }


}
