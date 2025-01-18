<?php

namespace App\Http\Controllers\Api;

use App\Airport;
use CodeDredd\Soap\Facades\Soap;
use HTTP_Request2;
use Illuminate\Support\Facades\Http;
use function App\Airsial;


class FlightController extends Controller
{
    var $endpoints = ["airsial" => "http://demo.airsial.com.pk/starter/asmis/booking"];

    /**
     * Create a new controller instance.
     * @url https://laravel.com/docs/8.x/http-client
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function airport($IATA_code = '')
    {
        $rows = \App\Airport::where(['status' => 'Active'])->whereIn('IATA_code', explode(',', $IATA_code))->get(['id', 'IATA_code as iataname', 'city as name', 'airport']);
        return api_response($rows, 200);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function cities($IATA_code = '')
    {
        if (empty($IATA_code)) {
            $rows = \App\Airport::where(['status' => 'Active'])->get(['id', 'IATA_code as iataname', 'city as name', 'airport']);
            return api_response($rows, 200);
        }

        $params = [["Caller" => "sectors", "Departure" => $IATA_code]];
        $response = Http::withHeaders(['Content-Type' => 'application/json'])->post($this->endpoints['airsial'], $params);

        if ($response->ok()) {
            $json = $response->json();
            if ($json['Success']) {
                return api_response($json['Response']['Data'], 200);
            } else {
                return api_response($json, 200);
            }
        } else {
            dd($response->serverError(), $response->clientError());
        }
    }

    public function getFlights()
    {
        // dd(request('f'));
        // if(request('f')){
        //     return \App\FlyJinnah::OTA_AirAvailRQ();
        // }
        // if(request('a')){
        //     return \App\Airsial::getSingleFlight();
        // }
        // if(request('as')){
        //     if(empty(request('ReturningOn'))){
        //         return  \App\AirSerene::getSingleFlight();
        //     }else{
        //         return  \App\AirSerene::getSingleFlightMUl();
        //         return  \App\AirSerene::getSingleFlight();    
        //     }
        // }
        // if(request('b')){
        //     return \App\AirBlue::airLowFareSearch();
        // }

        $origin = Airport::where('IATA_code', req('LocationDep'))->select('IATA_code', 'airport', 'city', 'country')->first();
        $destination = Airport::where('IATA_code', req('LocationArr'))->select('IATA_code', 'airport', 'city', 'country')->first();

        if(empty(request('ReturningOn'))){
            $_airserene_response = \App\AirSerene::getSingleFlight();
        }else{
            $_airserenemul_response = \App\AirSerene::getSingleFlightMUl();
            $_airserene_response = \App\AirSerene::getSingleFlight();  
        }
       
        $_airsial_response = \App\Airsial::getSingleFlight();
        $_airblue_response = \App\AirBlue::airLowFareSearch();
        $_flyJinnah_response = \App\FlyJinnah::OTA_AirAvailRQ();
        // dump($_airsial_response);
        // dump($_airblue_response);
        // dump($_flyJinnah_response);
        // exit();

        // if(empty(request('ReturningOn'))){
        //     $merge_flights = array_merge_recursive( $_airsial_response,  $_airblue_response, $_flyJinnah_response , $_airserene_response);
        // }else{
        //     $merge_flights = array_merge_recursive( $_airsial_response,  $_airblue_response, $_flyJinnah_response , $_airserene_response , $_airserenemul_response);
        // }
        if(empty(request('ReturningOn'))){
            $merge_flights = array_merge_recursive($_airsial_response,$_flyJinnah_response);
        }else{
            $merge_flights = array_merge_recursive($_airsial_response,$_flyJinnah_response);
        }
        // $merge_flights = array_merge_recursive( $_airsial_response,  $_airblue_response, $_flyJinnah_response , $_airserene_response , $_airserenemul_response);
        // dd($merge_flights);
        if(req('c')){
            dd($merge_flights);
        }
        // $airblue_flights['outbound'] = array_merge($_airblue_response['outbound'], $_airserene_response);
        // $merge_flights = array_merge_recursive($_airsial_response, $airblue_flights, $_flyJinnah_response );

        $merge_flights['origin'] = $origin;
        $merge_flights['destination'] = $destination;

        // dd($merge_flights);
        return $merge_flights;
        // foreach($merge_flights as $merge_flights){
        //     foreach($merge_flights as $merge_flight){
        //         // dump($key++,$merge_flight);
        //                 return $merge_flight;
        //     }
        // }
        // exit;


        

    }

    public static function GetFlightsAirsial()
    {

        $origin = Airport::where('IATA_code', req('LocationDep'))->select('IATA_code', 'airport', 'city', 'country')->first();
        $destination = Airport::where('IATA_code', req('LocationArr'))->select('IATA_code', 'airport', 'city', 'country')->first();
       
        $_airsial_response = \App\Airsial::getSingleFlight();

        $_airsial_response['origin'] = $origin;
        $_airsial_response['destination'] = $destination;
        // dd($merge_flights);
        // dump($_airsial_response);
        return $_airsial_response;
    }


    public static function GetFlightsFlyJinnah()
    {

        $origin = Airport::where('IATA_code', req('LocationDep'))->select('IATA_code', 'airport', 'city', 'country')->first();
        $destination = Airport::where('IATA_code', req('LocationArr'))->select('IATA_code', 'airport', 'city', 'country')->first();
       
        if(empty(request('ReturningOn'))){
            $_flyJinnah_response = \App\FlyJinnah::OTA_AirAvailRQ();
        }else{
            $_flyJinnah_response = \App\FlyJinnah::OTA_AirAvailRQ();
            $Inbound_flyJinnah_response = \App\FlyJinnah::OTA_AirAvailInBoundRQ();
        }

        
        if(empty(request('ReturningOn'))){
            $merge_flights = array_merge_recursive($_flyJinnah_response);
        }else{
            $merge_flights = array_merge_recursive($_flyJinnah_response, $Inbound_flyJinnah_response);
        }


        $merge_flights['origin'] = $origin;
        $merge_flights['destination'] = $destination;
        // dd($merge_flights);
        return $merge_flights;  
    }

   
    public static function GetFlightsAirSerene()
    {

        $origin = Airport::where('IATA_code', req('LocationDep'))->select('IATA_code', 'airport', 'city', 'country')->first();
        $destination = Airport::where('IATA_code', req('LocationArr'))->select('IATA_code', 'airport', 'city', 'country')->first();
       
        if(empty(request('ReturningOn'))){
            $_flyJinnah_response = \App\AirSerene::getSingleFlight();
        }else{
            $_flyJinnah_response = \App\AirSerene::getSingleFlight();
            // $Inbound_flyJinnah_response = \App\AirSerene::OTA_AirAvailInBoundRQ();
        }

        
        if(empty(request('ReturningOn'))){
            $merge_flights = array_merge_recursive($_flyJinnah_response);
        }else{
            $merge_flights = array_merge_recursive($_flyJinnah_response, $Inbound_flyJinnah_response);
        }


        $merge_flights['origin'] = $origin;
        $merge_flights['destination'] = $destination;
        // dd($merge_flights);
        return $merge_flights;  
    }

    // old seren code
    // public static function GetFlightsAirserene()
    // {

    //     $origin = Airport::where('IATA_code', req('LocationDep'))->select('IATA_code', 'airport', 'city', 'country')->first();
    //     $destination = Airport::where('IATA_code', req('LocationArr'))->select('IATA_code', 'airport', 'city', 'country')->first();
       
    //     if(empty(request('ReturningOn'))){
    //         $_airserene_response = \App\AirSerene::getSingleFlight();
    //     }else{
    //         $_airserenemul_response = \App\AirSerene::getSingleFlightMUl();
    //         $_airserene_response = \App\AirSerene::getSingleFlight();  
    //     }

    //     if(empty(request('ReturningOn'))){
    //         $merge_flights = array_merge_recursive($_airserene_response);
    //     }else{
    //         $merge_flights = array_merge_recursive($_airserene_response , $_airserenemul_response);
    //     }


    //     $merge_flights['origin'] = $origin;
    //     $merge_flights['destination'] = $destination;
    //     // dd($merge_flights);
    //     // dd($_airsial_response);
    //     return $merge_flights;
    // }

    public static function GetFlightsAirblue()
    {
        $_session = self::GetFlightsAirsial();

        $origin = Airport::where('IATA_code', req('LocationDep'))->select('IATA_code', 'airport', 'city', 'country')->first();
        $destination = Airport::where('IATA_code', req('LocationArr'))->select('IATA_code', 'airport', 'city', 'country')->first();
       
        if(empty(request('ReturningOn'))){
        $_airblue_response = \App\AirBlue::airLowFareSearch();
        }else{
            $_airblue_response = \App\AirBlue::airLowFareSearch();
            $Inbound_airblue_response = \App\AirBlue::airLowFareSearchInbound();
        }

        if(empty(request('ReturningOn'))){
            $merge_flights = array_merge_recursive($_airblue_response);
        }else{
            $merge_flights = array_merge_recursive($_airblue_response, $Inbound_airblue_response);
        }

        $merge_flights['origin'] = $origin;
        $merge_flights['destination'] = $destination;
        // dd($merge_flights);
        // dd($_airsial_response);
        // if($_airblue_response['inbound']){
            // dd(request());
            // dump($merge_flights['outbound']['0']['BAGGAGE_FARE'][0]['TOTAL']); 
        // }
        return $merge_flights;
    }

    public function GetAllFlights() {

        session()->forget('outbound');
        session()->forget('inbound');
        session()->forget('flyjinnahoutbound');
        session()->forget('flyjinnahinbound');
        session()->forget('outboundflyjinnahseatavailablity');
        session()->forget('outboundflyjinnahMealavailablity');
        session()->forget('inboundflyjinnahseatavailablity');
        session()->forget('inboundflyjinnahMealavailablity');


        
        $AirLine['GetFlightsFlyJinnah'] = self::GetFlightsFlyJinnah();
        $AirLine['GetFlightsAirsial'] = self::GetFlightsAirsial();
        $AirLine['GetFlightsAirserene'] = self::GetFlightsAirserene();
        $AirLine['GetFlightsAirblue'] = self::GetFlightsAirblue();

        return $AirLine;

    }


    public function bookSeat(){
        $BookingOrderID = \App\Booking::latest()->pluck('order_id')->first();
        
        function incrementOrderID($orderID) {
            return sprintf('%05d', $orderID + 1);
        }
        
        $currentOrderID = "00000".$BookingOrderID;
        $newOrderID = incrementOrderID($currentOrderID);

        // dump($flights['inbound']);
        // exit;
        // dd(json_decode(base64_decode(request('inboundFlight'))));
        $Outboundflights['outbound'] = json_decode(base64_decode(request('flight')));
        
        if(request()->has('inboundFlight')) {
            $Inboundflights['inbound'] = json_decode(base64_decode(request('inboundFlight')));
        }
        // dd();
        // dd($Outboundflights['outbound']->airline);
        if($Inboundflights['inbound']->airline == $Outboundflights['outbound']->airline){
            $flights['outbound'] = json_decode(base64_decode(request('flight')));
            if(request()->has('inboundFlight')) {
                $flights['inbound'] = json_decode(base64_decode(request('inboundFlight')));
            }
            $flight = $flights['outbound'];
            
            $adult = arrange_array(request('adult'));
                    $child = arrange_array(request('child'));
                    $infant = arrange_array(request('infant'));

                    $adult = collect($adult)->map(function ($item, $key) {
                        $item['FullName'] = trim($item['Firstname'] . " " . $item['Lastname']);
                        return $item;
                    })->toArray();
                    $child = collect($child)->map(function ($item, $key) {
                        $item['FullName'] = trim($item['Firstname'] . " " . $item['Lastname']);
                        return $item;
                    })->toArray();
                    $infant = collect($infant)->map(function ($item, $key) {
                        $item['FullName'] = trim($item['Firstname'] . " " . $item['Lastname']);
                        return $item;
                    })->toArray();

                    $airline = $flight->flight->AIRLINE;

                    $FARE = $flight->baggage->FARE_PAX_WISE;
                    $TAX = ($flight->travelers->AdultNo * $FARE->ADULT->TAX) + ($flight->travelers->ChildNo * $FARE->CHILD->TAX) + ($flight->travelers->InfantNo * $FARE->INFANT->TAX);
                    $AMOUNT = ($flight->travelers->AdultNo * $FARE->ADULT->BASIC_FARE) + ($flight->travelers->ChildNo * $FARE->CHILD->BASIC_FARE) + ($flight->travelers->InfantNo * $FARE->INFANT->BASIC_FARE);
                    $TOTAL_AMOUNT = $flight->baggage->TOTAL;

                    $_FARE['ADULT']['TOTAL'] = $FARE->ADULT->TOTAL;
                    $_FARE['CHILD']['TOTAL'] = $FARE->CHILD->TOTAL;
                    $_FARE['INFANT']['TOTAL'] = $FARE->INFANT->TOTAL;

                    if(isset($flights['inbound'])){
                        $INB_FARE = $flights['inbound']->baggage->FARE_PAX_WISE;

                        $TAX += ($flight->travelers->AdultNo * $INB_FARE->ADULT->TAX) + ($flight->travelers->ChildNo * $INB_FARE->CHILD->TAX) + ($flight->travelers->InfantNo * $INB_FARE->INFANT->TAX);
                        $AMOUNT += ($flight->travelers->AdultNo * $INB_FARE->ADULT->BASIC_FARE) + ($flight->travelers->ChildNo * $INB_FARE->CHILD->BASIC_FARE) + ($flight->travelers->InfantNo * $INB_FARE->INFANT->BASIC_FARE);
                        $TOTAL_AMOUNT += $flights['inbound']->baggage->TOTAL;

                        $_FARE['ADULT']['TOTAL'] += $INB_FARE->ADULT->TOTAL;
                        $_FARE['CHILD']['TOTAL'] += $INB_FARE->CHILD->TOTAL;
                        $_FARE['INFANT']['TOTAL'] += $INB_FARE->INFANT->TOTAL;
                    }

                    $booking = new \App\Booking();
                    $booking->order_id = $newOrderID;
                    $booking->airline = $airline;
                    $booking->tax = $TAX;
                    $booking->amount = $AMOUNT;
                    $booking->total_amount = $TOTAL_AMOUNT;
                    $booking->travelers = $flight->travelers;
                    $booking->flight_type = ($flight->travelers->flightType ?? (empty($flight->travelers->ReturningOn) ? 'One Way' : 'Round Trip'));
                    $booking->itinerary = "{$flight->travelers->LocationDep} - {$flight->travelers->LocationArr}";
                    $booking->flight_summary = json_encode($flights);
                    // dd($booking);
                    //[{"label":"ADULT","quantity":"1","price":"18125"},{"label":"ADULT","quantity":"1","price":"19535"}]
                    $booking->summary = json_encode([
                        ['label' => 'ADULT', 'quantity' => $flight->travelers->AdultNo, 'price' => $_FARE['ADULT']['TOTAL']],
                        ['label' => 'CHILD', 'quantity' => $flight->travelers->ChildNo, 'price' => $_FARE['CHILD']['TOTAL']],
                        ['label' => 'INFANT', 'quantity' => $flight->travelers->InfantNo, 'price' => $_FARE['INFANT']['TOTAL']]
                    ]);
                    $booking->travelers = json_encode(['ADULT' => count($adult), 'CHILD' => count($child), 'INFANT' => count($infant)]);
                    // dd($booking);
                    // dump($airline, $flight, request()->all());
                    switch ($airline){
                        case 'Airsial':
                            // echo 'asdasd';
                            // exit;
                            if($flights['inbound']->airline == $flights['outbound']->airline){
                                if(request()->has('inboundFlight')){
                                    $return = true;
                                }else{
                                    $return = false;
                                }
                            }
                            
                            $params = [
                                "DepartureJourney" => $flight->flight->JOURNEY_CODE,
                                "DepartureFareType" => $flight->baggage->sub_class_id,
                                "DepartureClass" => $flight->flight->CLASS_CODE,
                                "DepartureFlight" => $flight->flight->FLIGHT_NO,
                                "LocationDep" => $flight->travelers->LocationDep,
                                "LocationArr" => $flight->travelers->LocationArr,
                                "Return" => $return,
                                "TotalSeats" => ($flight->travelers->AdultNo + $flight->travelers->ChildNo + $flight->travelers->InfantNo)
                            ];
                            if($flights['inbound']->airline == $flights['outbound']->airline){
                                if(\request()->inboundFlight){
                                    $inboundParams = [
                                        "ReturningOn" => $flights['inbound']->travelers->ReturningOn,
                                        "ReturningJourney" => $flights['inbound']->flight->JOURNEY_CODE,
                                        "ReturningClass" => $flights['inbound']->flight->CLASS_CODE,
                                        "ReturningFlight" => $flights['inbound']->flight->FLIGHT_NO,
                                        "ReturningFareType" => $flights['inbound']->baggage->sub_class_id,
                                    ];
                                    // Merge the arrays if inboundFlight exists
                                    $params = array_merge($params, $inboundParams);
                                }
                            }
                            // dd($params);
                            // exit;
                            $DepartureDateCron = $flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME;
                            // dd($params);
                            $PNR = \App\Airsial::bookSeat($params,$flights);
                            // dd($PNR);
                            if(empty($PNR)){
                                return ['status' => false, 'message' => $PNR['clientError']];
                            }
                            $params = [
                                'PNR' => $PNR,
                                'adult' => $adult,
                                'child' => $child,
                                'infant' => $infant,
                                'PrimaryCell' => request('mobile'),
                                'EmailAddress' => request('email'),
                                'CNIC' => (request()->has('cnic') ? request('cnic') : $adult[0]['Cnic']),
                            ];
                            $detail = \App\Airsial::passengerInsertion($params);
                            // dd($detail);
                            //$booking->booking_summary = json_encode($detail);
                            $booking->departuretime = $DepartureDateCron;
                            $booking->pnr = $PNR;
                            $booking->save();
                            break;
                        case 'Airblue':
                        case 'airblue':
                                for ($x = 0; $x <= 1; $x++) {
                                    if($x == 0){
                                        $params = json_decode(json_encode($flight->flight), 1);
                                        // dd($params);
                                        // dd($flight->travelers);
                                        // $params['inbound'] = json_decode(json_encode($flights['inbound'], 1));
                                        $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                                        $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];
                                        $DepartureDateCron = $params['DEPARTURE_DATE'].'T'.$params['DEPARTURE_TIME'];
                                        // dd($DepartureDateCron);
                                        // dd($params);
                                        // dd($RES);
                                        $RES = \App\AirBlue::bookSeat($params);
                                        if(!$RES['status']){
                                            return ['status' => false, 'message' => $RES['data']];
                                        }   

                                        $BookingReferenceID = $RES['data']['AirReservation']['BookingReferenceID'][1];
                                        
                                        $PNR = $BookingReferenceID['_ID'];
                                        $detail = $BookingReferenceID['_Instance'];
                                        $booking->booking_summary = json_encode($RES);
                                        $booking->departuretime = $DepartureDateCron;
                                        $booking->pnr = $PNR;
                                        // dump($PNR);
                                        $booking->save();
                                    }elseif($x == 1){
                                        // dd($booking);
                                        // dd($params);
                                        // $params = json_decode(json_encode($flight->flight), 1);
                                        // $params = json_decode(json_encode($flights['inbound']->flight, true));
                                        $params = json_decode(json_encode($flights['inbound']->flight), true);
                                        // dd($params);
                                        // dd($params['DEPARTURE_DATE']);
                                        $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                                        $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];
                                        
                                        $DepartureDateCron = $params['DEPARTURE_DATE'].'T'.$params['DEPARTURE_TIME'];
                                        // dd($DepartureDateCron);
                                        // dd($params);
                                        // dd($RES);
                                        // dd($flight->travelers);
                                        $RES = \App\AirBlue::bookSeat($params);

                                        if(!$RES['status']){
                                            return ['status' => false, 'message' => $RES['data']];
                                        }   

                                        $BookingReferenceID = $RES['data']['AirReservation']['BookingReferenceID'][1];
                                        // dd($BookingReferenceID);
                                        $PNR = $BookingReferenceID['_ID'];
                                        $detail = $BookingReferenceID['_Instance'];
                                        $booking = new \App\Booking();
                                        $booking->airline = $airline;
                                        $booking->order_id = $newOrderID;
                                        $booking->tax = $TAX;
                                        $booking->amount = $AMOUNT;
                                        $booking->total_amount = $TOTAL_AMOUNT;
                                        $booking->travelers = json_encode($flight->travelers);
                                        $booking->flight_type = ($flight->travelers->flightType ?? (empty($flight->travelers->ReturningOn) ? 'One Way' : 'Round Trip'));
                                        $booking->itinerary = "{$flight->travelers->LocationArr} - {$flight->travelers->LocationDep}";
                                        $booking->flight_summary = json_encode($flights);
                                        $booking->booking_summary = json_encode($RES);
                                        $booking->departuretime = $DepartureDateCron;
                                        $booking->pnr = $PNR;
                                        $booking->save();
                                    }
                                
                                }
                            
                            break;
                        case 'Air Serene':
                        case 'air-serene':
                            
                            $referrer = $_SERVER['HTTP_REFERER'];
                            $queryString = parse_url($referrer, PHP_URL_QUERY);
                            parse_str($queryString, $params);
                            $pnr = $params['pnr'];

                            $lastrow = \App\Booking::where('pnr', $pnr)->first();
                            $wherexml = $lastrow['xml'];
                            
                            $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];

                            $token = \App\AirSerene::RetrieveSecurityToken();
                            // dd($token);
                            $LoginTravelAgent = \App\AirSerene::LoginTravelAgent($token);
                            // $params['SeriesNumber'] = random_int(100000, 999999);
                            // $params['ConfirmationNumber'] = random_int(100000, 999999);
                            // $var = \App\AirSerene::SummaryPNR($token, $params);
                            // dd($var);
                            // dd($flights);
                            $RetrieveFareQuote = \App\AirSerene::RetrieveFareQuote($token, $params, $flights);
                            // dd($RetrieveFareQuote);
                            // $RetrieveAARQuote = \App\AirSerene::RetrieveAARQuote($token, $params, $flights);
                            
                            $DepartureDateCron = $RetrieveFareQuote->FlightSegments->FlightSegment->DepartureDate;
                            
                            $SummaryPNR = \App\AirSerene::SummaryPNR($token, $params, $flights);
                            // dd($SummaryPNR);
                            $params['ActionType'] = 'CommitSummary';
                            $CommitSummary = \App\AirSerene::CreatePNR($token, $params);
                            // dd($CommitSummary);
                            // $ProcessPNRPayment = \App\AirSerene::ProcessPNRPayment($token, $params,$RetrieveFareQuote,$CommitSummary);
                            // $InsertExternalProcessedPayment = \App\AirSerene::InsertExternalProcessedPayment($token, $params,$RetrieveFareQuote,$CommitSummary);
                            // dd($ProcessPNRPayment);
                            $ConfirmationNumber = $CommitSummary->ConfirmationNumber;
                            $params['ConfirmationNumber'] = $ConfirmationNumber;
                            // $as = \App\AirSerene::CreatePNR($token, $params);
                            
                            // $params['ActionType'] = 'SaveReservation';
                            // $PNR_RES = \App\AirSerene::CreatePNR($token, $params);

                            // $PNR = $PNR_RES['pnr'];
                            // dd($DepartureDateCron);
                            // exit;
                            // $PNR = $PNR_RES->ConfirmationNumber; old
                            $PNR = $CommitSummary->ConfirmationNumber;
                            $booking->pnr = $PNR;
                            $booking->serene_token = $token;
                            $booking->departuretime = $DepartureDateCron;
                            $booking->save();
                            // exit;
                            session_start();
                                $lastrow = \App\Booking::latest()->first();
                                // dd($lastrow);exit;
                                $id = $lastrow['id'];
                                // dd($id);
                                // exit;
                                $booking = \App\Booking::find($id);
                                // dd($_SESSION);
                                // exit;
                                if($_SESSION['xml'] == ''){
                                    $booking->update([
                                        'xml' => $wherexml,
                                    ]);
                                }else{
                                    $xml = $_SESSION['xml'];
                                    $xml = str_replace('"', "'", $xml);
                                    $booking->update([
                                        'xml' => $xml,
                                    ]);
                                }
                                // dd($_SESSION);
                                // exit;
                            session_destroy();
                            
                            break;
                        case 'Fly Jinnah':
                            dd($flights);
                            foreach($flights as $flight){

                                if($flight->flight->TYPE == 'outbound'){
                                    $flight->travelers->LocationDep = $flight->flight->ORGN;
                                    $flight->travelers->LocationArr = $flight->flight->DEST;
                                }
                                    $TAX = ($flight->travelers->AdultNo * $FARE->ADULT->TAX) + ($flight->travelers->ChildNo * $FARE->CHILD->TAX) + ($flight->travelers->InfantNo * $FARE->INFANT->TAX);
                                    // dd($TAX);
                                    $AMOUNT = ($flight->travelers->AdultNo * $FARE->ADULT->BASIC_FARE) + ($flight->travelers->ChildNo * $FARE->CHILD->BASIC_FARE) + ($flight->travelers->InfantNo * $FARE->INFANT->BASIC_FARE);
                                    dd($AMOUNT);
                                    $TOTAL_AMOUNT = $flight->baggage->TOTAL;

                                    $booking = new \App\Booking();
                                    $booking->airline = $airline;
                                    $booking->order_id = $newOrderID;
                                    $booking->tax = $TAX;
                                    $booking->amount = $AMOUNT;
                                    $booking->total_amount = $TOTAL_AMOUNT;
                                    $booking->travelers = $flight->travelers;
                                    $booking->flight_type = ($flight->travelers->flightType ?? (empty($flight->travelers->ReturningOn) ? 'One Way' : 'Round Trip'));
                                    $booking->itinerary = "{$flight->travelers->LocationDep} - {$flight->travelers->LocationArr}";
                                    $booking->flight_summary = json_encode($flights);
                                    //[{"label":"ADULT","quantity":"1","price":"18125"},{"label":"ADULT","quantity":"1","price":"19535"}]
                                    $booking->summary = json_encode([
                                        ['label' => 'ADULT', 'quantity' => $flight->travelers->AdultNo, 'price' => $_FARE['ADULT']['TOTAL']],
                                        ['label' => 'CHILD', 'quantity' => $flight->travelers->ChildNo, 'price' => $_FARE['CHILD']['TOTAL']],
                                        ['label' => 'INFANT', 'quantity' => $flight->travelers->InfantNo, 'price' => $_FARE['INFANT']['TOTAL']]
                                    ]);
                                    $booking->travelers = json_encode(['ADULT' => count($adult), 'CHILD' => count($child), 'INFANT' => count($infant)]);

                                    $params = json_decode(json_encode($flight), 1);
                                    $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                                    $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant];
                                    $params['form'] = request()->all();

                                    $priceRS = \App\FlyJinnah::OTA_AirPriceRQ($params);

                                    $params['flight']['AirPrice'] = $priceRS;
                                    $RES = \App\FlyJinnah::OTA_AirBookRQ($params);
                                    if(!$RES['status']){
                                        return ['status' => false, 'message' => $RES['data']];
                                    }

                                    $PNR = $RES['data']['AirReservation']['BookingReferenceID']['@attributes']['ID'];

                                    $booking->booking_summary = json_encode($RES);
                                    $booking->pnr = $PNR;
                                    $booking->save();
                            }
                            break;
                    }

                    if($booking->id > 0){
                        $bookingDTL = new \App\BookingDetail();
                        $bookingDTL->booking_id = $booking->id;
                        $bookingDTL->order_id = $newOrderID;
                        $bookingDTL->adult = json_encode($adult);
                        $bookingDTL->child = json_encode($child);
                        $bookingDTL->infant = json_encode($infant);
                        $bookingDTL->cnic = (request()->has('cnic') ? request('cnic') : $adult[0]['Cnic']);
                        $bookingDTL->email = request('email');
                        $bookingDTL->mobile = request('mobile');
                        $bookingDTL->comments = request('comments');
                        $bookingDTL->save();
                    }


        }   elseif(request()->has('inboundFlight') && $Outboundflights['outbound']->airline != $Inboundflights['inbound']->airline){
                $Multipleflights = array_merge($Outboundflights,$Inboundflights);
                // dd($Multipleflights);
                // foreach($Multipleflights as $key => $flight){
                //     dump($key,$flight);
                // }
                // exit;

                foreach($Multipleflights as $key => $flight){
                    if($flight->type == 'outbound'){
                        $flights['outbound'] = json_decode(base64_decode(request('flight')));
                        $flight = $flights['outbound'];

                    }elseif($flight->type == 'inbound'){
                        $flights['outbound'] = [];
                        $flight = $flights['outbound'];

                        $flights['inbound'] = json_decode(base64_decode(request('inboundFlight')));
                        
                        $flight = $flights['inbound'];

                        // $flight = $flights['inbound'];


                        // dd($flights['outbound']);
                        // dd($flights['outbound']);
                        // dd($flight);

                    }
                    // dump($flights);
                    // exit;
                
                    // dd($flight->flight->AIRLINE);
                    // dump($flights['outbound']);
                    // dd($flights['inbound']);

                    // $flight = $flights['outbound'];
                    // dd($flight);

                    $adult = arrange_array(request('adult'));
                    $child = arrange_array(request('child'));
                    $infant = arrange_array(request('infant'));

                    $adult = collect($adult)->map(function ($item, $key) {
                        $item['FullName'] = trim($item['Firstname'] . " " . $item['Lastname']);
                        return $item;
                    })->toArray();
                    $child = collect($child)->map(function ($item, $key) {
                        $item['FullName'] = trim($item['Firstname'] . " " . $item['Lastname']);
                        return $item;
                    })->toArray();
                    $infant = collect($infant)->map(function ($item, $key) {
                        $item['FullName'] = trim($item['Firstname'] . " " . $item['Lastname']);
                        return $item;
                    })->toArray();

                    $airline = $flight->flight->AIRLINE;

                    $FARE = $flight->baggage->FARE_PAX_WISE;
                    $TAX = ($flight->travelers->AdultNo * $FARE->ADULT->TAX) + ($flight->travelers->ChildNo * $FARE->CHILD->TAX) + ($flight->travelers->InfantNo * $FARE->INFANT->TAX);
                    $AMOUNT = ($flight->travelers->AdultNo * $FARE->ADULT->BASIC_FARE) + ($flight->travelers->ChildNo * $FARE->CHILD->BASIC_FARE) + ($flight->travelers->InfantNo * $FARE->INFANT->BASIC_FARE);
                    $TOTAL_AMOUNT = $flight->baggage->TOTAL;

                    $_FARE['ADULT']['TOTAL'] = $FARE->ADULT->TOTAL;
                    $_FARE['CHILD']['TOTAL'] = $FARE->CHILD->TOTAL;
                    $_FARE['INFANT']['TOTAL'] = $FARE->INFANT->TOTAL;

                    if(isset($flights['inbound'])){
                        $INB_FARE = $flights['inbound']->baggage->FARE_PAX_WISE;

                        $TAX += ($flight->travelers->AdultNo * $INB_FARE->ADULT->TAX) + ($flight->travelers->ChildNo * $INB_FARE->CHILD->TAX) + ($flight->travelers->InfantNo * $INB_FARE->INFANT->TAX);
                        $AMOUNT += ($flight->travelers->AdultNo * $INB_FARE->ADULT->BASIC_FARE) + ($flight->travelers->ChildNo * $INB_FARE->CHILD->BASIC_FARE) + ($flight->travelers->InfantNo * $INB_FARE->INFANT->BASIC_FARE);
                        $TOTAL_AMOUNT += $flights['inbound']->baggage->TOTAL;

                        $_FARE['ADULT']['TOTAL'] += $INB_FARE->ADULT->TOTAL;
                        $_FARE['CHILD']['TOTAL'] += $INB_FARE->CHILD->TOTAL;
                        $_FARE['INFANT']['TOTAL'] += $INB_FARE->INFANT->TOTAL;
                    }

                    $booking = new \App\Booking();
                    $booking->airline = $airline;
                    $booking->order_id = $newOrderID;
                    $booking->tax = $TAX;
                    $booking->amount = $AMOUNT;
                    $booking->total_amount = $TOTAL_AMOUNT;
                    $booking->travelers = $flight->travelers;
                    $booking->flight_type = ($flight->travelers->flightType ?? (empty($flight->travelers->ReturningOn) ? 'One Way' : 'Round Trip'));
                    $booking->itinerary = "{$flight->travelers->LocationDep} - {$flight->travelers->LocationArr}";
                    $booking->flight_summary = json_encode($flights);
                    //[{"label":"ADULT","quantity":"1","price":"18125"},{"label":"ADULT","quantity":"1","price":"19535"}]
                    $booking->summary = json_encode([
                        ['label' => 'ADULT', 'quantity' => $flight->travelers->AdultNo, 'price' => $_FARE['ADULT']['TOTAL']],
                        ['label' => 'CHILD', 'quantity' => $flight->travelers->ChildNo, 'price' => $_FARE['CHILD']['TOTAL']],
                        ['label' => 'INFANT', 'quantity' => $flight->travelers->InfantNo, 'price' => $_FARE['INFANT']['TOTAL']]
                    ]);
                    $booking->travelers = json_encode(['ADULT' => count($adult), 'CHILD' => count($child), 'INFANT' => count($infant)]);
                    // dump($airline, $flight, request()->all());
                    switch ($airline){
                        case 'Airsial':
                            // echo 'asdasd';
                            // exit;
                            if($flights['inbound']->airline == $flights['outbound']->airline){
                                if(request()->has('inboundFlight')){
                                    $return = true;
                                }else{
                                    $return = false;
                                }
                            }

                            if($flights['inbound']->airline == $flights['outbound']->airline){
                                $LocationDep = $flight->travelers->LocationDep;
                                $LocationArr = $flight->travelers->LocationArr;
                            }else if($flights['inbound']->airline){
                                $LocationDep = $flight->travelers->LocationArr;
                                $LocationArr = $flight->travelers->LocationDep;
                            }else{
                                $LocationDep = $flight->travelers->LocationDep;
                                $LocationArr = $flight->travelers->LocationArr;
                            }
                            $params = [
                                "DepartureJourney" => $flight->flight->JOURNEY_CODE,
                                "DepartureFareType" => $flight->baggage->sub_class_id,
                                "DepartureClass" => $flight->flight->CLASS_CODE,
                                "DepartureFlight" => $flight->flight->FLIGHT_NO,
                                "LocationDep" => $LocationDep,
                                "LocationArr" => $LocationArr,
                                "Return" => $return,
                                "TotalSeats" => ($flight->travelers->AdultNo + $flight->travelers->ChildNo + $flight->travelers->InfantNo)
                            ];
                            if($flights['inbound']->airline == $flights['outbound']->airline){
                                if(\request()->inboundFlight){
                                    $inboundParams = [
                                        "ReturningOn" => $flights['inbound']->travelers->ReturningOn,
                                        "ReturningJourney" => $flights['inbound']->flight->JOURNEY_CODE,
                                        "ReturningClass" => $flights['inbound']->flight->CLASS_CODE,
                                        "ReturningFlight" => $flights['inbound']->flight->FLIGHT_NO,
                                        "ReturningFareType" => $flights['inbound']->baggage->sub_class_id,
                                    ];
                                    // Merge the arrays if inboundFlight exists
                                    $params = array_merge($params, $inboundParams);
                                }
                            }
                            // dd($params);
                            // exit;
                            $DepartureDateCron = $flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME;
                            // dd($DepartureDateCron);
                            $PNR = \App\Airsial::bookSeat($params,$flights);
                            // dd($PNR);
                            // exit;
                            if(empty($PNR)){
                                return ['status' => false, 'message' => $PNR['clientError']];
                            }
                            $params = [
                                'PNR' => $PNR,
                                'adult' => $adult,
                                'child' => $child,
                                'infant' => $infant,
                                'PrimaryCell' => request('mobile'),
                                'EmailAddress' => request('email'),
                                'CNIC' => (request()->has('cnic') ? request('cnic') : $adult[0]['Cnic']),
                            ];
                            $detail = \App\Airsial::passengerInsertion($params);
                            // dd($detail);
                            $booking->booking_summary = json_encode($detail);
                            $booking->departuretime = $DepartureDateCron;
                            $booking->pnr = $PNR;
                            // dump($PNR);
                            $booking->save();
                            break;
                        case 'Airblue':
                        case 'airblue':
                            $referrer = $_SERVER['HTTP_REFERER'];
                            $queryString = parse_url($referrer, PHP_URL_QUERY);
                            parse_str($queryString, $params);
                            $pnr = $params['pnr'];
                            $lastrow = \App\Booking::where('pnr', $pnr)->first();
                            $wherexml = $lastrow['xml'];

                                $params = json_decode(json_encode($flight->flight), 1);
                                // dd($params);
                                if($flights['inbound']->airline == $flights['outbound']->airline){
                                    $params['inbound'] = json_decode(json_encode($flights['inbound'], 1));
                                }else{
                                    $params['inbound'] = null;
                                }
                                // dd($params['inbound']);
                                $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                                // dd($params['TRAVELERS']);
                                $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];
                                // dd($params['TRAVELERS_INFORMATION']['ADULT']);
                                $DepartureDateCron = $params['DEPARTURE_DATE'].'T'.$params['DEPARTURE_TIME'];
                                // dd($DepartureDateCron);
                                $RES = \App\AirBlue::bookSeat($params);
                                // dd($RES);
                                // exit;
                                if(!$RES['status']){
                                    return ['status' => false, 'message' => $RES['data']];
                                }   

                                $BookingReferenceID = $RES['data']['AirReservation']['BookingReferenceID'][1];
                                // dd($BookingReferenceID);
                                // exit;

                                // $params['BookingReferenceID'] = $BookingReferenceID;
                                // $AirDemandTicket = \App\AirBlue::AirDemandTicket($params);
                                
                                $PNR = $BookingReferenceID['_ID'];
                                $detail = $BookingReferenceID['_Instance'];
                                $booking->booking_summary = json_encode($RES);
                                $booking->departuretime = $DepartureDateCron;
                                $booking->pnr = $PNR;
                                // dd($PNR);
                                $booking->save();
                                // session_start();
                                // $lastrow = \App\Booking::latest()->first();
                                // $id = $lastrow['id'];
                
                                // $booking = \App\Booking::find($id);
                                
                                // if($_SESSION['xml'] == ''){
                                //     $booking->update([
                                //         'xml' => $wherexml,
                                //     ]);
                                // }else{
                                //     $xml = $_SESSION['xml'];
                                //     $xml = str_replace('"', "'", $xml);
                                //     $booking->update([
                                //         'xml' => $xml,
                                //     ]);
                                // }
                                // session_destroy();
                            
                            break;
                            // old
                            // $params = json_decode(json_encode($flight->flight), 1);
                            // $params['inbound'] = json_decode(json_encode($flights['inbound'], 1));
                            // $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                            // $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];

                            // $RES = \App\AirBlue::bookSeat($params);
                            // if(!$RES['status']){
                            //     return ['status' => false, 'message' => $RES['data']];
                            // }

                            // $BookingReferenceID = $RES['data']['AirReservation']['BookingReferenceID'][1];
                            // $PNR = $BookingReferenceID['_ID'];
                            // $detail = $BookingReferenceID['_Instance'];

                            // $booking->booking_summary = json_encode($RES);
                            // $booking->pnr = $PNR;
                            // $booking->save();
                            // break;
                        case 'Air Serene':
                        case 'air-serene':
                            

                            $referrer = $_SERVER['HTTP_REFERER'];
                            $queryString = parse_url($referrer, PHP_URL_QUERY);
                            parse_str($queryString, $params);
                            // unset($params['ReturningOn']); 
                            // dd(http_build_query($queryArray));

                            $pnr = $params['pnr'];

                            $lastrow = \App\Booking::where('pnr', $pnr)->first();
                            $wherexml = $lastrow['xml'];
                            
                            $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];

                            $token = \App\AirSerene::RetrieveSecurityToken();
                            // dd($token);
                            $LoginTravelAgent = \App\AirSerene::LoginTravelAgent($token);
                            // $params['SeriesNumber'] = random_int(100000, 999999);
                            // $params['ConfirmationNumber'] = random_int(100000, 999999);
                            // $var = \App\AirSerene::SummaryPNR($token, $params);
                            // dd($var);
                            // dd($flights);
                            $RetrieveFareQuote = \App\AirSerene::RetrieveFareQuote($token, $params, $flights);
                            // dd($RetrieveFareQuote);
                            // $RetrieveAARQuote = \App\AirSerene::RetrieveAARQuote($token, $params, $flights);
                            
                            $DepartureDateCron = $RetrieveFareQuote->FlightSegments->FlightSegment->DepartureDate;
                            
                            $SummaryPNR = \App\AirSerene::SummaryPNR($token, $params, $flights);
                            // dd($SummaryPNR);
                            $params['ActionType'] = 'CommitSummary';
                            $CommitSummary = \App\AirSerene::CreatePNR($token, $params);
                            // dd($CommitSummary);
                            // $ProcessPNRPayment = \App\AirSerene::ProcessPNRPayment($token, $params,$RetrieveFareQuote,$CommitSummary);
                            // $InsertExternalProcessedPayment = \App\AirSerene::InsertExternalProcessedPayment($token, $params,$RetrieveFareQuote,$CommitSummary);
                            // dd($ProcessPNRPayment);
                            $ConfirmationNumber = $CommitSummary->ConfirmationNumber;
                            $params['ConfirmationNumber'] = $ConfirmationNumber;
                            // $as = \App\AirSerene::CreatePNR($token, $params);
                            
                            // $params['ActionType'] = 'SaveReservation';
                            // $PNR_RES = \App\AirSerene::CreatePNR($token, $params);

                            // $PNR = $PNR_RES['pnr'];
                            // dd($DepartureDateCron);
                            // exit;
                            // $PNR = $PNR_RES->ConfirmationNumber; old
                            $PNR = $CommitSummary->ConfirmationNumber;
                            $booking->pnr = $PNR;
                            $booking->serene_token = $token;
                            $booking->departuretime = $DepartureDateCron;
                            $booking->save();
                            // exit;
                            session_start();
                                $lastrow = \App\Booking::latest()->first();
                                // dd($lastrow);exit;
                                $id = $lastrow['id'];
                                // dd($id);
                                // exit;
                                $booking = \App\Booking::find($id);
                                // dd($_SESSION);
                                // exit;
                                if($_SESSION['xml'] == ''){
                                    $booking->update([
                                        'xml' => $wherexml,
                                    ]);
                                }else{
                                    $xml = $_SESSION['xml'];
                                    $xml = str_replace('"', "'", $xml);
                                    $booking->update([
                                        'xml' => $xml,
                                    ]);
                                }
                                // dd($_SESSION);
                                // exit;
                            session_destroy();
                            
                            break;
                        case 'Fly Jinnah':
                            // echo 'asdsadsadas';
                            // exit;
                            // exit;
                            // dd($flight);
                            if($flight->flight->TYPE == 'inbound'){
                                $flight->travelers->LocationDep = $flight->flight->ORGN;
                                $flight->travelers->LocationArr = $flight->flight->DEST;
                            }
                            // dd($flight);
                            $params = json_decode(json_encode($flight), 1);
                            $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                            $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant];
                            $params['form'] = request()->all();

                            $priceRS = \App\FlyJinnah::OTA_AirPriceRQ($params);

                            $params['flight']['AirPrice'] = $priceRS;
                            $RES = \App\FlyJinnah::OTA_AirBookRQ($params);
                            if(!$RES['status']){
                                return ['status' => false, 'message' => $RES['data']];
                            }

                            $PNR = $RES['data']['AirReservation']['BookingReferenceID']['@attributes']['ID'];

                            $booking->booking_summary = json_encode($RES);
                            $booking->pnr = $PNR;
                            // dump($PNR);
                            // exit;
                            $booking->save();
                            break;
                    }
                }  
            } else {
                    $flights['outbound'] = json_decode(base64_decode(request('flight')));
                    if(request()->has('inboundFlight')) {
                        $flights['inbound'] = json_decode(base64_decode(request('inboundFlight')));
                    }
                    $flight = $flights['outbound'];
                    $adult = arrange_array(request('adult'));
                            $child = arrange_array(request('child'));
                            $infant = arrange_array(request('infant'));
        
                            $adult = collect($adult)->map(function ($item, $key) {
                                $item['FullName'] = trim($item['Firstname'] . " " . $item['Lastname']);
                                return $item;
                            })->toArray();
                            $child = collect($child)->map(function ($item, $key) {
                                $item['FullName'] = trim($item['Firstname'] . " " . $item['Lastname']);
                                return $item;
                            })->toArray();
                            $infant = collect($infant)->map(function ($item, $key) {
                                $item['FullName'] = trim($item['Firstname'] . " " . $item['Lastname']);
                                return $item;
                            })->toArray();
        
                            $airline = $flight->flight->AIRLINE;
        
                            $FARE = $flight->baggage->FARE_PAX_WISE;
                            $TAX = ($flight->travelers->AdultNo * $FARE->ADULT->TAX) + ($flight->travelers->ChildNo * $FARE->CHILD->TAX) + ($flight->travelers->InfantNo * $FARE->INFANT->TAX);
                            $AMOUNT = ($flight->travelers->AdultNo * $FARE->ADULT->BASIC_FARE) + ($flight->travelers->ChildNo * $FARE->CHILD->BASIC_FARE) + ($flight->travelers->InfantNo * $FARE->INFANT->BASIC_FARE);
                            $TOTAL_AMOUNT = $flight->baggage->TOTAL;
        
                            $_FARE['ADULT']['TOTAL'] = $FARE->ADULT->TOTAL;
                            $_FARE['CHILD']['TOTAL'] = $FARE->CHILD->TOTAL;
                            $_FARE['INFANT']['TOTAL'] = $FARE->INFANT->TOTAL;
        
                            if(isset($flights['inbound'])){
                                $INB_FARE = $flights['inbound']->baggage->FARE_PAX_WISE;
        
                                $TAX += ($flight->travelers->AdultNo * $INB_FARE->ADULT->TAX) + ($flight->travelers->ChildNo * $INB_FARE->CHILD->TAX) + ($flight->travelers->InfantNo * $INB_FARE->INFANT->TAX);
                                $AMOUNT += ($flight->travelers->AdultNo * $INB_FARE->ADULT->BASIC_FARE) + ($flight->travelers->ChildNo * $INB_FARE->CHILD->BASIC_FARE) + ($flight->travelers->InfantNo * $INB_FARE->INFANT->BASIC_FARE);
                                $TOTAL_AMOUNT += $flights['inbound']->baggage->TOTAL;
        
                                $_FARE['ADULT']['TOTAL'] += $INB_FARE->ADULT->TOTAL;
                                $_FARE['CHILD']['TOTAL'] += $INB_FARE->CHILD->TOTAL;
                                $_FARE['INFANT']['TOTAL'] += $INB_FARE->INFANT->TOTAL;
                            }
                            $booking = new \App\Booking();
                            $booking->airline = $airline;
                            $booking->order_id = $newOrderID;                            
                            $booking->tax = $TAX;
                            $booking->amount = $AMOUNT;
                            $booking->total_amount = $TOTAL_AMOUNT;
                            $booking->travelers = $flight->travelers;
                            $booking->flight_type = ($flight->travelers->flightType ?? (empty($flight->travelers->ReturningOn) ? 'One Way' : 'Round Trip'));
                            $booking->itinerary = "{$flight->travelers->LocationDep} - {$flight->travelers->LocationArr}";
                            $booking->flight_summary = json_encode($flights);
                            // dd($booking);
                            //[{"label":"ADULT","quantity":"1","price":"18125"},{"label":"ADULT","quantity":"1","price":"19535"}]
                            $booking->summary = json_encode([
                                ['label' => 'ADULT', 'quantity' => $flight->travelers->AdultNo, 'price' => $_FARE['ADULT']['TOTAL']],
                                ['label' => 'CHILD', 'quantity' => $flight->travelers->ChildNo, 'price' => $_FARE['CHILD']['TOTAL']],
                                ['label' => 'INFANT', 'quantity' => $flight->travelers->InfantNo, 'price' => $_FARE['INFANT']['TOTAL']]
                            ]);
                            $booking->travelers = json_encode(['ADULT' => count($adult), 'CHILD' => count($child), 'INFANT' => count($infant)]);
                            // dump($airline, $flight, request()->all());
                            switch ($airline){
                                case 'Airsial':
                                    // echo 'asdasd';
                                    // exit;
                                    if($flights['inbound']->airline == $flights['outbound']->airline){
                                        if(request()->has('inboundFlight')){
                                            $return = true;
                                        }else{
                                            $return = false;
                                        }
                                    }
                                    
                                    $params = [
                                        "DepartureJourney" => $flight->flight->JOURNEY_CODE,
                                        "DepartureFareType" => $flight->baggage->sub_class_id,
                                        "DepartureClass" => $flight->flight->CLASS_CODE,
                                        "DepartureFlight" => $flight->flight->FLIGHT_NO,
                                        "LocationDep" => $flight->travelers->LocationDep,
                                        "LocationArr" => $flight->travelers->LocationArr,
                                        "Return" => $return,
                                        "TotalSeats" => ($flight->travelers->AdultNo + $flight->travelers->ChildNo + $flight->travelers->InfantNo)
                                    ];
                                    if($flights['inbound']->airline == $flights['outbound']->airline){
                                        if(\request()->inboundFlight){
                                            $inboundParams = [
                                                "ReturningOn" => $flights['inbound']->travelers->ReturningOn,
                                                "ReturningJourney" => $flights['inbound']->flight->JOURNEY_CODE,
                                                "ReturningClass" => $flights['inbound']->flight->CLASS_CODE,
                                                "ReturningFlight" => $flights['inbound']->flight->FLIGHT_NO,
                                                "ReturningFareType" => $flights['inbound']->baggage->sub_class_id,
                                            ];
                                            // Merge the arrays if inboundFlight exists
                                            $params = array_merge($params, $inboundParams);
                                        }
                                    }
                                    // dd($params);
                                    // exit;
                                    $DepartureDateCron = $flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME;
                                    // dd($params);
                                    $PNR = \App\Airsial::bookSeat($params,$flights);
                                    // dd($PNR);
                                    if(empty($PNR)){
                                        return ['status' => false, 'message' => $PNR['clientError']];
                                    }
                                    $params = [
                                        'PNR' => $PNR,
                                        'adult' => $adult,
                                        'child' => $child,
                                        'infant' => $infant,
                                        'PrimaryCell' => request('mobile'),
                                        'EmailAddress' => request('email'),
                                        'CNIC' => (request()->has('cnic') ? request('cnic') : $adult[0]['Cnic']),
                                    ];
                                    $detail = \App\Airsial::passengerInsertion($params);
                                    // dd($detail);
                                    //$booking->booking_summary = json_encode($detail);
                                    $booking->departuretime = $DepartureDateCron;
                                    $booking->pnr = $PNR;
                                    $booking->save();
                                    break;
                                case 'Airblue':
                                case 'airblue':
                                    $referrer = $_SERVER['HTTP_REFERER'];
                                    $queryString = parse_url($referrer, PHP_URL_QUERY);
                                    parse_str($queryString, $params);
                                    $pnr = $params['pnr'];
                                    $lastrow = \App\Booking::where('pnr', $pnr)->first();
                                    $wherexml = $lastrow['xml'];
        
                                        $params = json_decode(json_encode($flight->flight), 1);
                                        // dd($params);
                                        $params['inbound'] = json_decode(json_encode($flights['inbound'], 1));
                                        // dd($params['inbound']);
                                        $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                                        // dd($params['TRAVELERS']);
                                        $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];
                                        // dd($params['TRAVELERS_INFORMATION']['ADULT']);
                                        $DepartureDateCron = $params['DEPARTURE_DATE'].'T'.$params['DEPARTURE_TIME'];
                                        $RES = \App\AirBlue::bookSeat($params);
                                        // dd($RES);
                                        // exit;
                                        if(!$RES['status']){
                                            return ['status' => false, 'message' => $RES['data']];
                                        }   
        
                                        $BookingReferenceID = $RES['data']['AirReservation']['BookingReferenceID'][1];
                                        // dd($BookingReferenceID);
                                        // exit;
        
                                        // $params['BookingReferenceID'] = $BookingReferenceID;
                                        // $AirDemandTicket = \App\AirBlue::AirDemandTicket($params);
                                        
                                        $PNR = $BookingReferenceID['_ID'];
                                        $detail = $BookingReferenceID['_Instance'];
                                        $booking->booking_summary = json_encode($RES);
                                        $booking->departuretime = $DepartureDateCron;
                                        $booking->pnr = $PNR;
                                        $booking->save();
                                        // session_start();
                                        // $lastrow = \App\Booking::latest()->first();
                                        // $id = $lastrow['id'];
                        
                                        // $booking = \App\Booking::find($id);
                                        
                                        // if($_SESSION['xml'] == ''){
                                        //     $booking->update([
                                        //         'xml' => $wherexml,
                                        //     ]);
                                        // }else{
                                        //     $xml = $_SESSION['xml'];
                                        //     $xml = str_replace('"', "'", $xml);
                                        //     $booking->update([
                                        //         'xml' => $xml,
                                        //     ]);
                                        // }
                                        // session_destroy();
                                    
                                    break;
                                    // old
                                    // $params = json_decode(json_encode($flight->flight), 1);
                                    // $params['inbound'] = json_decode(json_encode($flights['inbound'], 1));
                                    // $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                                    // $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];
        
                                    // $RES = \App\AirBlue::bookSeat($params);
                                    // if(!$RES['status']){
                                    //     return ['status' => false, 'message' => $RES['data']];
                                    // }
        
                                    // $BookingReferenceID = $RES['data']['AirReservation']['BookingReferenceID'][1];
                                    // $PNR = $BookingReferenceID['_ID'];
                                    // $detail = $BookingReferenceID['_Instance'];
        
                                    // $booking->booking_summary = json_encode($RES);
                                    // $booking->pnr = $PNR;
                                    // $booking->save();
                                    // break;
                                case 'Air Serene':
                                case 'air-serene':
                                    
                                    $referrer = $_SERVER['HTTP_REFERER'];
                                    $queryString = parse_url($referrer, PHP_URL_QUERY);
                                    parse_str($queryString, $params);
                                    $pnr = $params['pnr'];
        
                                    $lastrow = \App\Booking::where('pnr', $pnr)->first();
                                    $wherexml = $lastrow['xml'];
                                    
                                    $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];
        
                                    $token = \App\AirSerene::RetrieveSecurityToken();
                                    // dd($token);
                                    $LoginTravelAgent = \App\AirSerene::LoginTravelAgent($token);
                                    // $params['SeriesNumber'] = random_int(100000, 999999);
                                    // $params['ConfirmationNumber'] = random_int(100000, 999999);
                                    // $var = \App\AirSerene::SummaryPNR($token, $params);
                                    // dd($var);
                                    // dd($flights);
                                    $RetrieveFareQuote = \App\AirSerene::RetrieveFareQuote($token, $params, $flights);
                                    // dd($RetrieveFareQuote);
                                    // $RetrieveAARQuote = \App\AirSerene::RetrieveAARQuote($token, $params, $flights);
                                    
                                    $DepartureDateCron = $RetrieveFareQuote->FlightSegments->FlightSegment->DepartureDate;
                                    
                                    $SummaryPNR = \App\AirSerene::SummaryPNR($token, $params, $flights);
                                    // dd($SummaryPNR);
                                    $params['ActionType'] = 'CommitSummary';
                                    $CommitSummary = \App\AirSerene::CreatePNR($token, $params);
                                    // dd($CommitSummary);
                                    // $ProcessPNRPayment = \App\AirSerene::ProcessPNRPayment($token, $params,$RetrieveFareQuote,$CommitSummary);
                                    // $InsertExternalProcessedPayment = \App\AirSerene::InsertExternalProcessedPayment($token, $params,$RetrieveFareQuote,$CommitSummary);
                                    // dd($ProcessPNRPayment);
                                    $ConfirmationNumber = $CommitSummary->ConfirmationNumber;
                                    $params['ConfirmationNumber'] = $ConfirmationNumber;
                                    // $as = \App\AirSerene::CreatePNR($token, $params);
                                    
                                    // $params['ActionType'] = 'SaveReservation';
                                    // $PNR_RES = \App\AirSerene::CreatePNR($token, $params);
        
                                    // $PNR = $PNR_RES['pnr'];
                                    // dd($DepartureDateCron);
                                    // exit;
                                    // $PNR = $PNR_RES->ConfirmationNumber; old
                                    $PNR = $CommitSummary->ConfirmationNumber;
                                    $booking->pnr = $PNR;
                                    $booking->serene_token = $token;
                                    $booking->departuretime = $DepartureDateCron;
                                    $booking->save();
                                    // exit;
                                    session_start();
                                        $lastrow = \App\Booking::latest()->first();
                                        // dd($lastrow);exit;
                                        $id = $lastrow['id'];
                                        // dd($id);
                                        // exit;
                                        $booking = \App\Booking::find($id);
                                        // dd($_SESSION);
                                        // exit;
                                        if($_SESSION['xml'] == ''){
                                            $booking->update([
                                                'xml' => $wherexml,
                                            ]);
                                        }else{
                                            $xml = $_SESSION['xml'];
                                            $xml = str_replace('"', "'", $xml);
                                            $booking->update([
                                                'xml' => $xml,
                                            ]);
                                        }
                                        // dd($_SESSION);
                                        // exit;
                                    session_destroy();
                                    
                                    break;
                                case 'Fly Jinnah':
                                    // exit;
                                    // dd($flight->type);
                                    // seatbooking gets price
                                    $SeatDestination = $flight->flight->ORGN.'-'.$flight->flight->DEST;
                                    $FormSeatAvailablity = request()->seatbooking[$SeatDestination];
                                    // dd($FormSeatAvailablity);
                                    $seatavailablity = $flight->flight->{$flight->type . 'flyjinnahseatavailablity'};
                                    $AirRow = $seatavailablity->Body->OTA_AirSeatMapRS->SeatMapResponses->SeatMapResponse->SeatMapDetails->CabinClass->AirRows->AirRow;                                    
                                    // dd($AirRow);
                                    foreach($AirRow as $AirRowkey => $AirRow){
                                        $AirRowkey++;
                                        $AirSeat = $AirRow->AirSeats->AirSeat;
                                        foreach($AirSeat as $key => $AirSeat){
                                            foreach($AirSeat as $key => $AirSeat){
                                                $SeatNumber = $AirRowkey . $AirSeat->SeatNumber;
                                                foreach ($FormSeatAvailablity as $passengerType => $seats) {
                                                    foreach ($seats as $seat) {
                                                        if ($SeatNumber == $seat) {
                                                            if($flight->baggage->title == 'Basic'){
                                                                $totalseatprice += $AirSeat->SeatCharacteristics;
                                                            }
                                                            elseif($flight->baggage->title == 'Value'){
                                                                if($AirRowkey <= 7 || $AirRowkey == 11 || $AirRowkey == 12){
                                                                    $totalseatprice += $AirSeat->SeatCharacteristics;
                                                                }
                                                            }else{
                                                                $totalseatprice = 0;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    // Meal Get Price
                                    $MealDestination = $flight->flight->ORGN.'-'.$flight->flight->DEST;
                                    $FormMealAvailablity = request()->mealbooking[$MealDestination];
                                    
                                    $Mealavailablity = $flight->flight->{$flight->type . 'flyjinnahMealavailablity'};
                                    $mealavail = $Mealavailablity->Body->AA_OTA_AirMealDetailsRS->MealDetailsResponses->MealDetailsResponse->Meal;

                                    foreach($mealavail as $mealRowkey => $mealavail){
                                        // dd($mealavail->mealCode);
                                        $mealavail++;
                                        foreach ($FormMealAvailablity as $passengerType => $meals) {
                                            foreach ($meals as $meal) {
                                                // dd($meal);
                                                if ($mealavail->mealCode == $meal) {
                                                    $totalmealprice += $mealavail->mealCharge;
                                                }
                                            }
                                        }
                                    }

                                    $TotalExtrasPrice = $totalmealprice + $totalseatprice;
                                    // $booking->total_amount = $booking->total_amount + $TotalExtrasPrice;
                                    $params = json_decode(json_encode($flight), 1);
                                    $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                                    $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant];
                                    $params['form'] = request()->all();
        
                                    $priceRS = \App\FlyJinnah::OTA_AirPriceRQ($params);
                                    // dump('aa',$priceRS);
                                    $params['flight']['AirPrice'] = $priceRS;
                                    $RES = \App\FlyJinnah::OTA_AirBookRQ($params);
                                    // dd($RES);
                                    if(!$RES['status']){
                                        return ['status' => false, 'message' => $RES['data']];
                                    }
        
                                    $PNR = $RES['data']['AirReservation']['BookingReferenceID']['@attributes']['ID'];
                                    // dd($PNR);
                                    $booking->booking_summary = json_encode($RES);
                                    $booking->pnr = $PNR;
                                    $booking->save();
                                    break;
                            }
        
                            if($booking->id > 0){
                                $bookingDTL = new \App\BookingDetail();
                                $bookingDTL->booking_id = $booking->id;
                                $bookingDTL->order_id = $newOrderID;
                                $bookingDTL->adult = json_encode($adult);
                                $bookingDTL->child = json_encode($child);
                                $bookingDTL->infant = json_encode($infant);
                                $bookingDTL->cnic = (request()->has('cnic') ? request('cnic') : $adult[0]['Cnic']);
                                $bookingDTL->email = request('email');
                                $bookingDTL->mobile = request('mobile');
                                $bookingDTL->comments = request('comments');
                                $bookingDTL->save();
                            }
        
            }       
        if($booking->id > 0){
            $bookingDTL = new \App\BookingDetail();
            $bookingDTL->booking_id = $booking->id;
            $bookingDTL->order_id = $newOrderID;
            $bookingDTL->adult = json_encode($adult);
            $bookingDTL->child = json_encode($child);
            $bookingDTL->infant = json_encode($infant);
            $bookingDTL->cnic = (request()->has('cnic') ? request('cnic') : $adult[0]['Cnic']);
            $bookingDTL->email = request('email');
            $bookingDTL->mobile = request('mobile');
            $bookingDTL->comments = request('comments');
            $bookingDTL->save();
        }

        return ['status' => true, 'PNR' => $PNR, 'id' => $booking->id, 'detail' => $detail];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewTicket($pnr)
    {
        $_session = \App\Airsial::makeSession();

        $params = [collect(["Caller" => "viewTicket",
            "token" => $_session['token'],
            "PNR" => $pnr,
        ])->merge(\request()->input())->toArray()];

        $response = Http::withHeaders(['Content-Type' => 'application/json'])->post($this->endpoints['airsial'], $params);

        if ($response->ok()) {
            $json = $response->json();
            if ($json['Success']) {
                return api_response($json['Response']['Data'], 200);
            } else {
                return api_response($json, 200);
            }
        } else {
            dd($response->serverError(), $response->clientError());
        }
    }


    public function findTicket()
    {

        $email = \req('email');
        $order_id = \req('orderId');

        $is_valid = \DB::table('booking_details')->where(['email' => $email, 'booking_id' => $order_id])->exists();

        if ($is_valid) {
            $data = \DB::table('booking')->where('id', $order_id)->select('pnr', 'airline')->first();


            switch ($data->airline) {
                case 'Airsial':
                    $result = \App\Airsial::viewTicket($data->pnr);
                    //$result = $this->viewTicket($data->pnr);
                    $is_valid_response = $result['Success'];

                    if ($is_valid_response) {
                        return $result;
                    } else {
                        return api_response(['error' => 'Invalid email or order id', 'status' => false], 422);
                    }
                    break;
                case 'Airblue':
                    dd('Airblue', $data->pnr);
                    break;
                default:
                    break;
            }

        } else {
            dd('NO');
        }
    }
}

