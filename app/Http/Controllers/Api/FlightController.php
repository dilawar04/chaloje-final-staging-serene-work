<?php

namespace App\Http\Controllers\Api;

use App\Airport;
use CodeDredd\Soap\Facades\Soap;
use HTTP_Request2;
use Illuminate\Support\Facades\Http;
use function App\Airsial;
use Session;


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
            $_airserene_response = \App\AirSerene::getSingleFlight();
        }else{
            $_airserene_response = \App\AirSerene::getSingleFlightOutBound();
            $Inbound_airserene_response = \App\AirSerene::getSingleFlightInBound($_airserene_response);
        }

        
        if(empty(request('ReturningOn'))){
            $merge_flights = array_merge_recursive($_airserene_response);
        }else{
            $merge_flights = array_merge_recursive($_airserene_response, $Inbound_airserene_response);
        }


        $merge_flights['origin'] = $origin;
        $merge_flights['destination'] = $destination;
        // dd($merge_flights);
        return $merge_flights;  
    }

    public static function GetFlightsAirblue()
    {
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
        session()->forget('outboundBundlerServiceId');
        session()->forget('inboundBundlerServiceId');


        
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
        $Outboundflights['outbound'] = json_decode(base64_decode(request('flight')));
        
        if(request()->has('inboundFlight')) {
            $Inboundflights['inbound'] = json_decode(base64_decode(request('inboundFlight')));
        }
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
            $booking->summary = json_encode([
                ['label' => 'ADULT', 'quantity' => $flight->travelers->AdultNo, 'price' => $_FARE['ADULT']['TOTAL']],
                ['label' => 'CHILD', 'quantity' => $flight->travelers->ChildNo, 'price' => $_FARE['CHILD']['TOTAL']],
                ['label' => 'INFANT', 'quantity' => $flight->travelers->InfantNo, 'price' => $_FARE['INFANT']['TOTAL']]
            ]);
            $booking->travelers = json_encode(['ADULT' => count($adult), 'CHILD' => count($child), 'INFANT' => count($infant)]);
            switch ($airline){
                case 'Airsial':
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
                            $params = array_merge($params, $inboundParams);
                        }
                    }
                    $DepartureDateCron = $flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME;
                    $PNR = \App\Airsial::bookSeat($params,$flights);
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
                    $booking->departuretime = $DepartureDateCron;
                    $booking->pnr = $PNR;
                    $booking->save();

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
                break;
                case 'Airblue':
                case 'airblue':
                    for ($x = 0; $x <= 1; $x++) {
                        if($x == 0){
                            $params = json_decode(json_encode($flight->flight), 1);
                            $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                            $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];
                            $DepartureDateCron = $params['DEPARTURE_DATE'].'T'.$params['DEPARTURE_TIME'];
                            
                            $FARE = $flight->baggage->FARE_PAX_WISE;
                            $TAX = ($flight->travelers->AdultNo * $FARE->ADULT->TAX) + ($flight->travelers->ChildNo * $FARE->CHILD->TAX) + ($flight->travelers->InfantNo * $FARE->INFANT->TAX);
                            $AMOUNT = ($flight->travelers->AdultNo * $FARE->ADULT->BASIC_FARE) + ($flight->travelers->ChildNo * $FARE->CHILD->BASIC_FARE) + ($flight->travelers->InfantNo * $FARE->INFANT->BASIC_FARE);
                            $TOTAL_AMOUNT = $flight->baggage->TOTAL;

                            $_FARE['ADULT']['TOTAL'] = $FARE->ADULT->TOTAL;
                            $_FARE['CHILD']['TOTAL'] = $FARE->CHILD->TOTAL;
                            $_FARE['INFANT']['TOTAL'] = $FARE->INFANT->TOTAL;

                            $RES = \App\AirBlue::bookSeat($params);
                            if(!$RES['status']){
                                return ['status' => false, 'message' => $RES['data']];
                            }   

                            $BookingReferenceID = $RES['data']['AirReservation']['BookingReferenceID'][1];
                            
                            $PNR = $BookingReferenceID['_ID'];
                            $detail = $BookingReferenceID['_Instance'];
                            $booking->tax = $TAX;
                            $booking->amount = $AMOUNT;
                            $booking->total_amount = $TOTAL_AMOUNT;
                            $booking->summary = json_encode([
                                ['label' => 'ADULT', 'quantity' => $flight->travelers->AdultNo, 'price' => $_FARE['ADULT']['TOTAL']],
                                ['label' => 'CHILD', 'quantity' => $flight->travelers->ChildNo, 'price' => $_FARE['CHILD']['TOTAL']],
                                ['label' => 'INFANT', 'quantity' => $flight->travelers->InfantNo, 'price' => $_FARE['INFANT']['TOTAL']]
                            ]);
                            $booking->itinerary = "{$flight->travelers->LocationDep} - {$flight->travelers->LocationArr}";
                            $booking->flight_summary = json_encode($flights);
                            $booking->booking_summary = json_encode($RES);
                            $booking->departuretime = $DepartureDateCron;
                            $booking->pnr = $PNR;
                            $booking->save();
                        }elseif($x == 1){
                            $params = json_decode(json_encode($flights['inbound']->flight), true);
                            $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                            $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];
                            $DepartureDateCron = $params['DEPARTURE_DATE'].'T'.$params['DEPARTURE_TIME'];
                            
                            $INB_FARE = $flights['inbound']->baggage->FARE_PAX_WISE;

                            $TAX = ($flight->travelers->AdultNo * $INB_FARE->ADULT->TAX) + ($flight->travelers->ChildNo * $INB_FARE->CHILD->TAX) + ($flight->travelers->InfantNo * $INB_FARE->INFANT->TAX);
                            $AMOUNT = ($flight->travelers->AdultNo * $INB_FARE->ADULT->BASIC_FARE) + ($flight->travelers->ChildNo * $INB_FARE->CHILD->BASIC_FARE) + ($flight->travelers->InfantNo * $INB_FARE->INFANT->BASIC_FARE);
                            $TOTAL_AMOUNT = $flights['inbound']->baggage->TOTAL;

                            $_FARE['ADULT']['TOTAL'] = $INB_FARE->ADULT->TOTAL;
                            $_FARE['CHILD']['TOTAL'] = $INB_FARE->CHILD->TOTAL;
                            $_FARE['INFANT']['TOTAL'] = $INB_FARE->INFANT->TOTAL;
                            
                            $RES = \App\AirBlue::bookSeat($params);
                            if(!$RES['status']){
                                return ['status' => false, 'message' => $RES['data']];
                            }   
                            $BookingReferenceID = $RES['data']['AirReservation']['BookingReferenceID'][1];
                            $PNR = $BookingReferenceID['_ID'];
                            $detail = $BookingReferenceID['_Instance'];
                            $booking = new \App\Booking();
                            $booking->order_id = $newOrderID;
                            $booking->airline = $airline;                
                            $booking->tax = $TAX;
                            $booking->amount = $AMOUNT;
                            $booking->total_amount = $TOTAL_AMOUNT;
                            $booking->summary = json_encode([
                                ['label' => 'ADULT', 'quantity' => $flight->travelers->AdultNo, 'price' => $_FARE['ADULT']['TOTAL']],
                                ['label' => 'CHILD', 'quantity' => $flight->travelers->ChildNo, 'price' => $_FARE['CHILD']['TOTAL']],
                                ['label' => 'INFANT', 'quantity' => $flight->travelers->InfantNo, 'price' => $_FARE['INFANT']['TOTAL']]
                            ]);
                            $booking->itinerary = "{$flight->travelers->LocationArr} - {$flight->travelers->LocationDep}";
                            $booking->flight_summary = json_encode($flights);
                            $booking->booking_summary = json_encode($RES);
                            $booking->departuretime = $DepartureDateCron;
                            $booking->pnr = $PNR;
                            $booking->save();
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
                break;
                case 'Air Serene':
                case 'air-serene':
                    $DepartureDateCron = $flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME;
                    $params = ['MOBILE' => request()->mobile, 'EMAIL' => request()->email];
                    $params['TRAVELERS_INFORMATION'] = ['ADT' => $adult, 'CHD' => $child, 'INF' => $infant];
                    
                    $makeSigningKeyOrderCreateRQ = \App\AirSerene::makeSigningKeyOrderCreateRQReturn($params, $flights);
                    
                    $OrderCreateRQ = \App\AirSerene::OrderCreateRQReturn($params, $flights, $makeSigningKeyOrderCreateRQ);

                    $PNR = $OrderCreateRQ['data']->Response->Order->OrderID;
                    $detail = $OrderCreateRQ;
                    $booking->order_ref_id = $OrderCreateRQ['data']->Response->Order->OrderID;
                    $booking->departuretime = $DepartureDateCron;
                    $booking->booking_summary = json_encode($OrderCreateRQ);
                    $booking->pnr = $OrderCreateRQ['data']->Response->Order->OrderID;
                    $booking->save();                
                break;
                case 'Fly Jinnah':
                    foreach($flights as $flight){
                        if($flight->flight->TYPE == 'outbound'){
                            $flight->travelers->LocationDep = $flight->flight->ORGN;
                            $flight->travelers->LocationArr = $flight->flight->DEST;
                        }
                        if($flight->flight->TYPE == 'inbound'){
                            $flight->travelers->LocationDep = $flight->flight->ORGN;
                            $flight->travelers->LocationArr = $flight->flight->DEST;
                        }
                        $booking->itinerary = "{$flight->flight->ORGN} - {$flight->flight->DEST}";

                        // Total Seat Price Code Start
                        $Seatavailablities = json_decode(request()->get($flight->type.'flyjinnahseatavailablity'));
                        $Seatavailablities = $Seatavailablities->Body->OTA_AirSeatMapRS->SeatMapResponses->SeatMapResponse->SeatMapDetails->CabinClass->AirRows->AirRow;
                        $seatbookings = request()->get('seatbooking')[$flight->flight->ORGN . '-' . $flight->flight->DEST];
                        $SeattotalPrice = 0;

                        foreach ($Seatavailablities as $RowNumberkey => $Seatavailablity) {
                            $AirSeats = $Seatavailablity->AirSeats->AirSeat;
                            foreach ($AirSeats as $AirSeat) {
                                foreach ($AirSeat as $AirSeat) {
                                    $SeatNumber = ($RowNumberkey + 1) . $AirSeat->SeatNumber;
                                    foreach ($seatbookings as $passenger => $bookedSeats) {
                                        if (in_array($SeatNumber, $bookedSeats)) {
                                            // echo "Matched Seat: " . $SeatNumber . " - Characteristics: " . $AirSeat->SeatCharacteristics . "<br>";
                                            $SeattotalPrice += floatval($AirSeat->SeatCharacteristics); 
                                        }
                                    }
                                }
                            }
                        }
                        // End Seat Code

                        // Total Meal Price Code Start
                        $flyjinnahMealavailablity = json_decode(request()->get($flight->type.'flyjinnahMealavailablity'));
                        $flyjinnahMealavailablity = $flyjinnahMealavailablity->Body->AA_OTA_AirMealDetailsRS->MealDetailsResponses->MealDetailsResponse->Meal;    
                        $mealbookings = request()->get('mealbooking')[$flight->flight->ORGN . '-' . $flight->flight->DEST];
                        $mealtotalPrice = 0;

                        foreach ($mealbookings as $person => $meals) {
                            foreach ($meals as $meal) {
                                foreach ($flyjinnahMealavailablity as $detail) {
                                    if ($detail->mealCode === $meal) {
                                        $mealtotalPrice += (float) $detail->mealCharge;
                                    }
                                }
                            }
                        }
                        // End Meal Code 

                        $totalMealNSeat_amount = $SeattotalPrice + $mealtotalPrice;


                        $TAX = ($flight->travelers->AdultNo * $FARE->ADULT->TAX) + ($flight->travelers->ChildNo * $FARE->CHILD->TAX) + ($flight->travelers->InfantNo * $FARE->INFANT->TAX);
                        $AMOUNT = ($flight->travelers->AdultNo * $FARE->ADULT->BASIC_FARE) + ($flight->travelers->ChildNo * $FARE->CHILD->BASIC_FARE) + ($flight->travelers->InfantNo * $FARE->INFANT->BASIC_FARE);
                        $TOTAL_AMOUNT = $flight->baggage->TOTAL;

                        $booking = new \App\Booking();
                        $booking->airline = $airline;
                        $booking->order_id = $newOrderID;
                        $booking->tax = $TAX;
                        $booking->amount = $AMOUNT;
                        $booking->total_amount = $TOTAL_AMOUNT + $totalMealNSeat_amount;
                        $booking->flight_type = ($flight->travelers->flightType ?? (empty($flight->travelers->ReturningOn) ? 'One Way' : 'Round Trip'));
                        $booking->itinerary = "{$flight->travelers->LocationDep} - {$flight->travelers->LocationArr}";
                        $booking->flight_summary = json_encode($flights);
                        $booking->summary = json_encode([
                            ['label' => 'ADULT', 'quantity' => $flight->travelers->AdultNo, 'price' => $_FARE['ADULT']['TOTAL']],
                            ['label' => 'CHILD', 'quantity' => $flight->travelers->ChildNo, 'price' => $_FARE['CHILD']['TOTAL']],
                            ['label' => 'INFANT', 'quantity' => $flight->travelers->InfantNo, 'price' => $_FARE['INFANT']['TOTAL']]
                        ]);

                        $params = json_decode(json_encode($flight), 1);
                        $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                        $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant];
                        $params['form'] = request()->all();

                        $priceRS = \App\FlyJinnah::OTA_AirPriceRQ($params, $flight);
                        $params['flight']['AirPrice'] = $priceRS;
                        $RES = \App\FlyJinnah::OTA_AirBookRQ($params, $flight);
                        if(!$RES['status']){
                            return ['status' => false, 'message' => $RES['data']];
                        }

                        $PNR = $RES['data']['AirReservation']['BookingReferenceID']['@attributes']['ID'];

                        $booking->booking_summary = json_encode($RES);
                        $booking->totalseats_amount = $SeattotalPrice;
                        $booking->totalmeals_amount = $mealtotalPrice;
                        $booking->pnr = $PNR;
                        $booking->save();
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
                break;
            }
        }   
        elseif(request()->has('inboundFlight') && $Outboundflights['outbound']->airline != $Inboundflights['inbound']->airline){
            $Multipleflights = array_merge($Outboundflights,$Inboundflights);
            foreach($Multipleflights as $key => $flight){
                if($flight->type == 'outbound'){
                    $flights['outbound'] = json_decode(base64_decode(request('flight')));
                    $flight = $flights['outbound'];

                }elseif($flight->type == 'inbound'){
                    $flights['outbound'] = [];
                    $flight = $flights['outbound'];

                    $flights['inbound'] = json_decode(base64_decode(request('inboundFlight')));
                    
                    $flight = $flights['inbound'];
                }
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

                $booking = new \App\Booking();
                $booking->airline = $airline;
                $booking->order_id = $newOrderID;
                $booking->tax = $TAX;
                $booking->amount = $AMOUNT;
                $booking->total_amount = $TOTAL_AMOUNT;
                $booking->travelers = $flight->travelers;
                $booking->flight_type = ($flight->travelers->flightType ?? (empty($flight->travelers->ReturningOn) ? 'One Way' : 'Round Trip'));
                $booking->itinerary = "{$flight->flight->ORGN} - {$flight->flight->DEST}";
                $booking->flight_summary = json_encode($Multipleflights);
                $booking->summary = json_encode([
                    ['label' => 'ADULT', 'quantity' => $flight->travelers->AdultNo, 'price' => $_FARE['ADULT']['TOTAL']],
                    ['label' => 'CHILD', 'quantity' => $flight->travelers->ChildNo, 'price' => $_FARE['CHILD']['TOTAL']],
                    ['label' => 'INFANT', 'quantity' => $flight->travelers->InfantNo, 'price' => $_FARE['INFANT']['TOTAL']]
                ]);
                $booking->travelers = json_encode(['ADULT' => count($adult), 'CHILD' => count($child), 'INFANT' => count($infant)]);
                switch ($airline){
                    case 'Airsial':
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
                            $params = json_decode(json_encode($flight->flight), 1);
                            if($flights['inbound']->airline == $flights['outbound']->airline){
                                $params['inbound'] = json_decode(json_encode($flights['inbound'], 1));
                            }else{
                                $params['inbound'] = null;
                            }
                            $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                            $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];
                            $DepartureDateCron = $params['DEPARTURE_DATE'].'T'.$params['DEPARTURE_TIME'];
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
                            $booking->save();                        
                        break;
                    case 'Air Serene':
                    case 'air-serene':
                        
                        $DepartureDateCron = $flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME;
                        $params = ['MOBILE' => request()->mobile, 'EMAIL' => request()->email];
                        $params['TRAVELERS_INFORMATION'] = ['ADT' => $adult, 'CHD' => $child, 'INF' => $infant];
                        
                        $getSingleFlight = \App\AirSerene::IfNotSamegetSingleFlight($flight);
                        $makeSigningKeyOrderCreateRQ = \App\AirSerene::makeSigningKeyOrderCreateIfNotRQReturn($params, $getSingleFlight);


                        $OrderCreateRQ = \App\AirSerene::OrderCreateIfNotRQReturn($params, $getSingleFlight, $makeSigningKeyOrderCreateRQ);

                        $PNR = $OrderCreateRQ['data']->Response->Order->OrderID;
                        $detail = $OrderCreateRQ;
                        $booking->order_ref_id = $OrderCreateRQ['data']->Response->Order->OrderID;
                        $booking->departuretime = $DepartureDateCron;
                        $booking->booking_summary = json_encode($OrderCreateRQ);
                        $booking->pnr = $OrderCreateRQ['data']->Response->Order->OrderID;
                        $booking->save();
                        break;
                    case 'Fly Jinnah':
                        $DepartureDateCron = $flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME;
                        if($flight->flight->TYPE == 'outbound'){
                            $flight->travelers->LocationDep = $flight->flight->ORGN;
                            $flight->travelers->LocationArr = $flight->flight->DEST;
                        }
                        if($flight->flight->TYPE == 'inbound'){
                            $flight->travelers->LocationDep = $flight->flight->ORGN;
                            $flight->travelers->LocationArr = $flight->flight->DEST;
                        }
                        $booking->itinerary = "{$flight->flight->ORGN} - {$flight->flight->DEST}";

                        // Total Seat Price Code Start
                        $Seatavailablities = json_decode(request()->get($flight->type.'flyjinnahseatavailablity'));
                        $Seatavailablities = $Seatavailablities->Body->OTA_AirSeatMapRS->SeatMapResponses->SeatMapResponse->SeatMapDetails->CabinClass->AirRows->AirRow;
                        $seatbookings = request()->get('seatbooking')[$flight->flight->ORGN . '-' . $flight->flight->DEST];
                        $SeattotalPrice = 0;

                        foreach ($Seatavailablities as $RowNumberkey => $Seatavailablity) {
                            $AirSeats = $Seatavailablity->AirSeats->AirSeat;
                            foreach ($AirSeats as $AirSeat) {
                                foreach ($AirSeat as $AirSeat) {
                                    $SeatNumber = ($RowNumberkey + 1) . $AirSeat->SeatNumber;
                                    foreach ($seatbookings as $passenger => $bookedSeats) {
                                        if (in_array($SeatNumber, $bookedSeats)) {
                                            // echo "Matched Seat: " . $SeatNumber . " - Characteristics: " . $AirSeat->SeatCharacteristics . "<br>";
                                            $SeattotalPrice += floatval($AirSeat->SeatCharacteristics); 
                                        }
                                    }
                                }
                            }
                        }
                        // End Seat Code

                        // Total Meal Price Code Start
                        $flyjinnahMealavailablity = json_decode(request()->get($flight->type.'flyjinnahMealavailablity'));
                        $flyjinnahMealavailablity = $flyjinnahMealavailablity->Body->AA_OTA_AirMealDetailsRS->MealDetailsResponses->MealDetailsResponse->Meal;    
                        $mealbookings = request()->get('mealbooking')[$flight->flight->ORGN . '-' . $flight->flight->DEST];
                        $mealtotalPrice = 0;

                        foreach ($mealbookings as $person => $meals) {
                            foreach ($meals as $meal) {
                                foreach ($flyjinnahMealavailablity as $detail) {
                                    if ($detail->mealCode === $meal) {
                                        $mealtotalPrice += (float) $detail->mealCharge;
                                    }
                                }
                            }
                        }
                        // End Meal Code 

                        $totalMealNSeat_amount = $SeattotalPrice + $mealtotalPrice;
                        $booking->total_amount = $TOTAL_AMOUNT + $totalMealNSeat_amount;

                        $params = json_decode(json_encode($flight), 1);
                        $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                        $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant];
                        $params['form'] = request()->all();

                        $priceRS = \App\FlyJinnah::OTA_AirPriceRQ($params, $flight);
                        $params['flight']['AirPrice'] = $priceRS;
                        $RES = \App\FlyJinnah::OTA_AirBookRQ($params, $flight);
                        if(!$RES['status']){
                            return ['status' => false, 'message' => $RES['data']];
                        }
                        $PNR = $RES['data']['AirReservation']['BookingReferenceID']['@attributes']['ID'];
                        $booking->booking_summary = json_encode($RES);
                        $booking->totalseats_amount = $SeattotalPrice;
                        $booking->totalmeals_amount = $mealtotalPrice;
                        $booking->departuretime = $DepartureDateCron;
                        $booking->pnr = $PNR;
                        $booking->save();
                    break;
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
              
        } 
        else {
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
            $booking->summary = json_encode([
                ['label' => 'ADULT', 'quantity' => $flight->travelers->AdultNo, 'price' => $_FARE['ADULT']['TOTAL']],
                ['label' => 'CHILD', 'quantity' => $flight->travelers->ChildNo, 'price' => $_FARE['CHILD']['TOTAL']],
                ['label' => 'INFANT', 'quantity' => $flight->travelers->InfantNo, 'price' => $_FARE['INFANT']['TOTAL']]
            ]);
            $booking->travelers = json_encode(['ADULT' => count($adult), 'CHILD' => count($child), 'INFANT' => count($infant)]);
            switch ($airline){
                case 'Airsial':
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
                            $params = array_merge($params, $inboundParams);
                        }
                    }
                    $DepartureDateCron = $flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME;
                    $PNR = \App\Airsial::bookSeat($params,$flights);
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
                    $booking->departuretime = $DepartureDateCron;
                    $booking->pnr = $PNR;
                    $booking->save();
                    break;
                case 'Airblue':
                case 'airblue':
                    $params = json_decode(json_encode($flight->flight), 1);
                    $params['inbound'] = json_decode(json_encode($flights['inbound'], 1));
                    $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                    $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant,];
                    $DepartureDateCron = $params['DEPARTURE_DATE'].'T'.$params['DEPARTURE_TIME'];
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
                    $booking->save();
                break;
                case 'Air Serene':
                case 'air-serene':
                    $DepartureDateCron = $flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME;
                    $params = ['MOBILE' => request()->mobile, 'EMAIL' => request()->email];
                    $params['TRAVELERS_INFORMATION'] = ['ADT' => $adult, 'CHD' => $child, 'INF' => $infant];
                    
                    $makeSigningKeyOrderCreateRQ = \App\AirSerene::makeSigningKeyOrderCreateRQ($params, $flights);
                    
                    $OrderCreateRQ = \App\AirSerene::OrderCreateRQ($params, $flights, $makeSigningKeyOrderCreateRQ);

                    $PNR = $OrderCreateRQ['data']->Response->Order->OrderID;
                    $detail = $OrderCreateRQ;
                    $booking->order_ref_id = $OrderCreateRQ['data']->Response->Order->OrderID;
                    $booking->departuretime = $DepartureDateCron;
                    $booking->booking_summary = json_encode($OrderCreateRQ);
                    $booking->pnr = $OrderCreateRQ['data']->Response->Order->OrderID;
                    
                    $booking->save();

                break;
                case 'Fly Jinnah':
                    $DepartureDateCron = $flight->flight->DEPARTURE_DATE.'T'.$flight->flight->DEPARTURE_TIME;
                    if($flight->flight->TYPE == 'outbound'){
                        $flight->travelers->LocationDep = $flight->flight->ORGN;
                        $flight->travelers->LocationArr = $flight->flight->DEST;
                    }
                    if($flight->flight->TYPE == 'inbound'){
                        $flight->travelers->LocationDep = $flight->flight->ORGN;
                        $flight->travelers->LocationArr = $flight->flight->DEST;
                    }
                    $booking->itinerary = "{$flight->flight->ORGN} - {$flight->flight->DEST}";

                    // Total Seat Price Code Start
                    $Seatavailablities = json_decode(request()->get($flight->type.'flyjinnahseatavailablity'));
                    $Seatavailablities = $Seatavailablities->Body->OTA_AirSeatMapRS->SeatMapResponses->SeatMapResponse->SeatMapDetails->CabinClass->AirRows->AirRow;
                    $seatbookings = request()->get('seatbooking')[$flight->flight->ORGN . '-' . $flight->flight->DEST];
                    $SeattotalPrice = 0;

                    foreach ($Seatavailablities as $RowNumberkey => $Seatavailablity) {
                        $AirSeats = $Seatavailablity->AirSeats->AirSeat;
                        foreach ($AirSeats as $AirSeat) {
                            foreach ($AirSeat as $AirSeat) {
                                $SeatNumber = ($RowNumberkey + 1) . $AirSeat->SeatNumber;
                                foreach ($seatbookings as $passenger => $bookedSeats) {
                                    if (in_array($SeatNumber, $bookedSeats)) {
                                        // echo "Matched Seat: " . $SeatNumber . " - Characteristics: " . $AirSeat->SeatCharacteristics . "<br>";
                                        $SeattotalPrice += floatval($AirSeat->SeatCharacteristics); 
                                    }
                                }
                            }
                        }
                    }
                    // End Seat Code

                    // Total Meal Price Code Start
                    $flyjinnahMealavailablity = json_decode(request()->get($flight->type.'flyjinnahMealavailablity'));
                    $flyjinnahMealavailablity = $flyjinnahMealavailablity->Body->AA_OTA_AirMealDetailsRS->MealDetailsResponses->MealDetailsResponse->Meal;    
                    $mealbookings = request()->get('mealbooking')[$flight->flight->ORGN . '-' . $flight->flight->DEST];
                    $mealtotalPrice = 0;

                    foreach ($mealbookings as $person => $meals) {
                        foreach ($meals as $meal) {
                            foreach ($flyjinnahMealavailablity as $detail) {
                                if ($detail->mealCode === $meal) {
                                    $mealtotalPrice += (float) $detail->mealCharge;
                                }
                            }
                        }
                    }
                    // End Meal Code 

                    $totalMealNSeat_amount = $SeattotalPrice + $mealtotalPrice;
                    $booking->total_amount = $TOTAL_AMOUNT + $totalMealNSeat_amount;

                    $params = json_decode(json_encode($flight), 1);
                    $params['TRAVELERS'] = json_decode($booking->travelers, 1);
                    $params['TRAVELERS_INFORMATION'] = ['ADULT' => $adult, 'CHILD' => $child, 'INFANT' => $infant];
                    $params['form'] = request()->all();

                    $priceRS = \App\FlyJinnah::OTA_AirPriceRQ($params, $flight);
                    $params['flight']['AirPrice'] = $priceRS;
                    $RES = \App\FlyJinnah::OTA_AirBookRQ($params, $flight);
                    if(!$RES['status']){
                        return ['status' => false, 'message' => $RES['data']];
                    }
                    $PNR = $RES['data']['AirReservation']['BookingReferenceID']['@attributes']['ID'];
                    $booking->booking_summary = json_encode($RES);
                    $booking->totalseats_amount = $SeattotalPrice;
                    $booking->totalmeals_amount = $mealtotalPrice;
                    $booking->departuretime = $DepartureDateCron;
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
        return ['status' => true, 'PNR' => $PNR, 'id' => $booking->id, 'detail' => $detail, 'order_id' => $newOrderID];
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

