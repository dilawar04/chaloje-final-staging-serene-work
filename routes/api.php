<?php


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['auth:api'])->group(function () {
    Route::post('/member/update_profile', 'Api\MemberController@update_profile');

});
/*--------------------- Authentication----------------------*/
Route::post('/member/registration', 'Api\AuthController@registration');
Route::post('/member/login', 'Api\AuthController@login');
Route::get('/member/logout', 'Api\AuthController@logout');
Route::post('/member/forgot', 'Api\AuthController@forgot');
Route::match(['get', 'post'], '/password/reset/{token}', 'Api\AuthController@resetPassword');
Route::any('/verify/{resend?}', 'Api\AuthController@verify');
Route::post('/member/updateProfile', 'Api\AuthController@updateProfile');



/*TODO::----------------------- Web API ----------------------------------*/
//http://chaloge.test/api/cities/KHI
Route::get('/cities/{IATA_code?}', 'Api\FlightController@cities');

//http://chaloge.test/api/passengerInsertion?PNR=1C2XSO&adult%5B0%5D%5BTitle%5D=MR&adult%5B0%5D%5BWheelChair%5D=N&adult%5B0%5D%5BFullName%5D=SYED+JAWWAD+ALAM&adult%5B0%5D%5BFirstname%5D=SYED+JAWWAD&adult%5B0%5D%5BLastname%5D=ALAM&child%5B0%5D%5BTitle%5D=MR&child%5B0%5D%5BWheelChair%5D=N&child%5B0%5D%5BFullName%5D=Child+One&child%5B0%5D%5BFirstname%5D=Child&child%5B0%5D%5BLastname%5D=One&infant%5B0%5D%5BTitle%5D=MR&infant%5B0%5D%5BWheelChair%5D=N&infant%5B0%5D%5BFullName%5D=Infant+One&infant%5B0%5D%5BFirstname%5D=Infant&infant%5B0%5D%5BLastname%5D=One&PrimaryCell=%2B92313-7559954&SecondaryCell=%2B92&EmailAddress=jawwad_alam2002%40mail.com&CNIC=&Comments=&ft=dom PNR=1C2XSO&adult%5B0%5D%5BTitle%5D=MR&adult%5B0%5D%5BWheelChair%5D=N&adult%5B0%5D%5BFullName%5D=SYED+JAWWAD+ALAM&adult%5B0%5D%5BFirstname%5D=SYED+JAWWAD&adult%5B0%5D%5BLastname%5D=ALAM&child%5B0%5D%5BTitle%5D=MR&child%5B0%5D%5BWheelChair%5D=N&child%5B0%5D%5BFullName%5D=Child+One&child%5B0%5D%5BFirstname%5D=Child&child%5B0%5D%5BLastname%5D=One&infant%5B0%5D%5BTitle%5D=MR&infant%5B0%5D%5BWheelChair%5D=N&infant%5B0%5D%5BFullName%5D=Infant+One&infant%5B0%5D%5BFirstname%5D=Infant&infant%5B0%5D%5BLastname%5D=One&PrimaryCell=%2B92313-7559954&SecondaryCell=%2B92&EmailAddress=jawwad_alam2002%40mail.com&CNIC=&Comments=&ft=dom
Route::get('/passengerInsertion', 'Api\FlightController@passengerInsertion');
Route::post('/passengerInsertion', 'Api\FlightController@passengerInsertion');


//http://chaloge.test/api/viewTicket/pnrnumber
Route::get('/viewTicket/{pnr}', 'Api\FlightController@viewTicket');

//http://chaloge.test/api/airport/KHI
Route::get('/airport/{IATA_code}', 'Api\FlightController@airport');

/*TODO::----------------------- FLIGHT API ----------------------------------*/
//http://chaloge.test/api/getFlights?LocationDep=KHI&LocationArr=ISB&DepartingOn=2023-01-28&AdultNo=1&ChildNo=0&InfantNo=0
Route::any('/getFlights', 'Api\FlightController@getFlights');
// Route::any('/GetFlightsAirsialandFlyJinnah', 'Api\FlightController@GetFlightsAirsialandFlyJinnah');
Route::any('/GetFlightsFlyJinnah', 'Api\FlightController@GetFlightsFlyJinnah');
Route::any('/GetFlightsAirsial', 'Api\FlightController@GetFlightsAirsial');
Route::any('/GetFlightsAirserene', 'Api\FlightController@GetFlightsAirserene');
Route::any('/GetFlightsAirblue', 'Api\FlightController@GetFlightsAirblue');
Route::any('/GetAllFlights', 'Api\FlightController@GetAllFlights'); 

//http://chaloge.test/api/bookSeat?Return=0&DepartureJourney=175023&DepartureFareType=2&DepartureClass=1007&DepartureFlight=PF123&ReturningJourney=&ReturningClass=&ReturningFlight=&ReturningFareType=1&LocationDep=KHI&LocationArr=ISB&ftype=dom&TotalSeats=1&totalInfant=0&totalAdult=1&totalChild=0
Route::get('/bookSeat', 'Api\FlightController@bookSeat');
Route::post('/bookSeat', 'Api\FlightController@bookSeat');

Route::post('/GetSecureKey', 'Api\FlightController@newEncodeSHA');


/*TODO::      *********** Payment API Routes ***********       */
Route::post('/payment', 'Api\PaymentController@hbl');
Route::get('/payment/status/{status?}', 'Api\PaymentController@status');

Route::any('/status/{status}', 'Api\PaymentController@status');


/*-------------------------------------------------------------------*/
Route::post('/conf_booking', 'Api\BookingController@confirm_booking');
Route::post('/confirm_booking', 'Api\BookingController@confirm_booking');

// testing api
Route::get('/testing-new-dev', '\App\AirSerene@parseXML');



Route::any('/serene', function () {
    $params = [
        'Origin' => 'KHI',
        'Destination' => 'ISB',
        'DepartureDate' => date('Y-m-d', strtotime('+2 days')),
    ];

    if(req('c')){
        dump($params);
        //echo "<div style='display: none;'><code>{$body}</code><code>{$xml}</code></div>";
    }
    // 1.
    $res = \App\AirSerene::RetrieveFareQuoteShop($params);
    $info = $res->FlightSegments->FlightSegment;
    $fare_new_type = $info->FareTypes->FareType[0]->FareInfos->FareInfo[0];
    $RFQ_Date = ["LFID" => $info->LFID ,
     "Departure" => $info->DepartureDate,
    "FCCode" => $fare_new_type->FCCode,
    "FBCode" => $fare_new_type->FBCode
];
   $params = array_merge($RFQ_Date , $params);
    // dd('GETTING-INFO',$params);
    // dump("CHECKING-INFO",$fare_new_type);
    dump('RetrieveFareQuoteShop-NEW', $res);

    // 2.
    $token = \App\AirSerene::RetrieveSecurityToken();
    dump('RetrieveSecurityToken', $token);

    // 3.
    //$params['LFID'] = $res->SegmentDetails->SegmentDetail->LFID;
    $res = \App\AirSerene::RetrieveFareQuote($token, $params);
    dump('RetrieveFareQuote-NEW', $res);

    // 4.
    /*$fl_res = \App\AirSerene::RetrieveAARQuote($token, $params);
    dd('RetrieveAARQuote', $fl_res);*/

    $segment = is_array($res->SegmentDetails->SegmentDetail) ? $res->SegmentDetails->SegmentDetail[0] : $res->SegmentDetails->SegmentDetail;
    $params = [
        'LFID' => $segment->LFID,
        'Departure' => \Carbon\Carbon::parse($segment->DepartureDate)->format('Y-m-d'),
        'Origin' => $segment->Origin,
        'Destination' => $segment->Destination,
    ];

    // 5.
    // $fl_res = \App\AirSerene::RetrieveFlightSeatMap($token, $params);
    // dump('RetrieveFlightSeatMap', $fl_res);

    // $seatRow = $fl_res->PhysicalFlights->PhysicalFlightMap->PhysicalFlightSeatMap->SeatConfiguration->Rows->RowDisplay[3];
    // $selectedSeat = collect($seatRow->Seats->SeatDisplay)->where('IsSeatAvailable', true)->first();
    // $params['Seat'] = [
    //     'PersonOrgID' => 1,
    //     'LogicalFlightID' => $segment->LFID,
    //     'PhysicalFlightID' => $fl_res->PhysicalFlights->PhysicalFlightMap->PhysicalFlightID,
    //     'DepartureDate' => $params['Departure'],//$fl_res->PhysicalFlights->PhysicalFlightMap->DepartureDate,
    //     'SeatSelected' => $selectedSeat->SeatId,//$seatRow->Seats->SeatDisplay[5]->SeatId,
    //     'RowNumber' => $seatRow->RowNumber,
    // ];

    // 5.
    $params['SeriesNumber'] = random_int(100000, 999999);
    $params['ConfirmationNumber'] = random_int(100000, 999999);

    $params['TRAVELERS_INFORMATION'][][] = [
        'Firstname' => 'Zayn',
        'Lastname' => 'Khan',
        'Dob' => '1990-01-01',
        'Gender' => 'Male',
        'Title' => 'Mr',
    ];
    // 6.
    $fl_res = \App\AirSerene::SummaryPNR($token, $params);
    dump('SummaryPNR', $fl_res);
    // 8.
    $params['ActionType'] = 'CommitSummary';
    $params['SeriesNumber'] = $fl_res->SeriesNumber;
    $params['ConfirmationNumber'] = '';
    $fl_res = \App\AirSerene::CreatePNR($token, $params);
    dump('CreatePNR - CommitSummary', $fl_res);

    // 9.
//    $fl_res = \App\AirSerene::ProcessPNRPayment($token, $params);
//    dump('ProcessPNRPayment', $fl_res);
//
//    // 10.
//    $fl_res = \App\AirSerene::InsertExternalProcessedPayment($token, $params);
//    dump('InsertExternalProcessedPayment', $fl_res);
//
//    // 12.
//    $fl_res = \App\AirSerene::UpdateExternalProcessedPaymentDetails($token, $params);
//    dump('ProcessPNRPayment', $fl_res);

    // 13.
    $params['ActionType'] = 'SaveReservation';
    $fl_res = \App\AirSerene::CreatePNR($token, $params);
    dd('CreatePNR - Save', $fl_res);
});


//http://chaloge.test/api/getSingleFlight?DepartingOn=18-09-2021&LocationDep=KHI&LocationArr=ISB&Return=false&ReturningOn=07-01-2021&AdultNo=1&ChildNo=0&InfantNo=0
Route::get('/getSingleFlight', 'Api\FlightController@getSingleFlight');

/*TODO::      *********** Air Blue API Routes ***********       */
Route::post('/airLowFareSearch', 'Api\FlightController@airLowFareSearch');
Route::post('/airBook', 'Api\FlightController@airBook');
Route::post('/testing', 'Api\FlightController@testing');
Route::get('/mk', 'Api\FlightController@mk');

Route::any('/createPNR', 'Api\FlightController@createPNR');
Route::post('/bookFlight', 'Api\FlightController@bookFlight');
Route::post('/airDemand', 'Api\FlightController@airDemand');


/*==========    BookingController   ==========*/
Route::post('/create_booking', 'Api\BookingController@create_booking');
Route::post('/booking_details', 'Api\BookingController@booking_details');
Route::post('/fetch_booking', 'Api\BookingController@fetch_booking');
Route::post('/confirm_booking', 'Api\BookingController@confirm_booking');

/*==========    PaymentController   ==========*/
Route::post('/payment_details', 'Api\PaymentController@payment_details');


/*TODO::      *********** Air Serene API Routes ***********       */


Route::any('/findTicket', 'Api\FlightController@findTicket');


Route::any('/airblue/test', function (){

    $client = new Client();
    $headers = [
        'Content-Type' => 'application/xml'
    ];
    $body = '<Envelope xmlns=\'http://schemas.xmlsoap.org/soap/envelope/\'>
    <Body>
        <AirLowFareSearch xmlns=\'http://zapways.com/air/ota/2.0\'>
            <airLowFareSearchRQ EchoToken=\'-8586704355136787339\' Target=\'Test\' Version=\'1.04\'
                                xmlns=\'http://www.opentravel.org/OTA/2003/05\'>
                <POS xmlns=\'http://www.opentravel.org/OTA/2003/05\'>
                    <Source ERSP_UserID=\'1954/CC5107BFF541855CE5A384899E3C029914\'>
                        <RequestorID Type=\'29\' ID=\'chalojeota\' MessagePassword=\'ujFd4euc9Faey3EY\'/>
                    </Source>
                </POS>
                <OriginDestinationInformation xmlns=\'http://www.opentravel.org/OTA/2003/05\'>
                    <DepartureDateTime>2022-09-30</DepartureDateTime>
                    <OriginLocation LocationCode=\'KHI\'></OriginLocation>
                    <DestinationLocation LocationCode=\'ISB\'></DestinationLocation>
                </OriginDestinationInformation>

                <TravelerInfoSummary xmlns=\'http://www.opentravel.org/OTA/2003/05\'>
                    <AirTravelerAvail>
                    <PassengerTypeQuantity Code=\'ADT\' Quantity=\'1\'></PassengerTypeQuantity><PassengerTypeQuantity Code=\'CHD\' Quantity=\'1\'></PassengerTypeQuantity>
                    </AirTravelerAvail>
                </TravelerInfoSummary>
            </airLowFareSearchRQ>
        </AirLowFareSearch>
    </Body>
</Envelope>';

    $response = $client->request('POST', 'https://otatest.zapways.com/v2.0/OTAAPI.asmx', [
        'headers' => $headers,
        'body' => $body,
        'timeout' => 80,
        /*'cert' => public_path('cert.pem'),
        'key' => public_path('key.pem'),*/
        'passphrase' => "123",
        'rejectUnauthorized' => false,
        'cert' => [public_path('cert.pem'), '123'],
        'ssl_key' => public_path('key.pem')
        //'ssl_key' => [public_path('key.pem')],
    ]);
    dd($response);
    echo $xml = $response->getBody()->getContents();
});
