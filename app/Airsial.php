<?php
namespace App;
use Http;

class Airsial {

    public static $endpoint = "http://demo.airsial.com.pk/starter/asmis/booking";

    public static function makeSession()
    {
        $params = [["Caller" => "login", "Username" => "chalojeapi", 'Password' => '88A4S21ia2L']];
        $OPT = json_decode(opt('airsial'), 1);
        $mode = $OPT['mode'];

        self::$endpoint = $OPT[$mode]['URL'];
        $params[0]['Username'] = $OPT[$mode]['Username'];
        $params[0]['Password'] = $OPT[$mode]['Password'];


        $response = Http::withHeaders(['Content-Type' => 'application/json'])->post(self::$endpoint, $params);
        if ($response->ok()) {
            $json = $response->json();
            if ($json['Success']) {
                return $json['Response']['Data'];
            } else {
                return $json;
            }
        } else {
            return ['status' => false, 'response' => ['serverError' => $response->serverError(), 'clientError' => $response->clientError()]];
        }
    }


    public static function getSingleFlight()
    {
        $_session = self::makeSession();

        $params = [collect(["Caller" => "getSingleflight",
            "token" => $_session['token'],
            "DepartingOn" => "06-01-2021",
            "LocationDep" => "KHI",
            "LocationArr" => "ISB",
            "Return" => false,
            "ReturningOn" => !empty(\request('ReturningOn')) ? \request('ReturningOn') : '',
            "AdultNo" => 1,
            "ChildNo" => 0,
            "InfantNo" => 0
        ])->merge(\request()->input())->toArray()];
        // dd($params);
        // exit;
        $params[0]['Return'] = (!empty(\request('ReturningOn')) ? true : false);
        // dd(\request('ReturningOn'));
        // exit;
        $response = Http::withHeaders(['Content-Type' => 'application/json'])->post(self::$endpoint, $params);
        // if(empty($FLIGHTS)){
                    // $FLIGHTS['AIRLINE'][] = 'Airsial';
                    // $FLIGHTS['FLIGHT_STATUS'][] = 1;
                // }
        // exit;
        if ($response->ok()) {
            $json = $response->json();
            // dd($json['Success']);
            // exit;

            if ($json['Success']) {
                $data = $json['Response']['Data'];
                $FLIGHTS['outbound'] = collect($data['outbound'])->map(function ($item, $key) use ($data) {
                    $item['AIRLINE'] = 'Airsial';
                    $item['AIRLINE_CODE'] = 'PF';
                    $item['TYPE'] = 'outbound';
                    $item['STOPS'] = $item['STOPS'] ?? 0;
                    $item['DEPARTURE_DATE'] = \Carbon\Carbon::parse($item['DEPARTURE_DATE'])->format('Y-m-d');
                    $item['ARRIVAL_DATE'] = \Carbon\Carbon::parse((!empty($item['ARRIVAL_DATE']) ? $item['ARRIVAL_DATE'] : $item['DEPARTURE_DATE']))->format('Y-m-d');
                    $item['ARRIVAL_TIME'] = \Carbon\Carbon::parse($item['ARRIVAL_TIME'])->format('H:i:s');
                    $item['DEPARTURE_TIME'] = \Carbon\Carbon::parse($item['DEPARTURE_TIME'])->format('H:i:s');
                    $item['BAGGAGE_FARE'] = collect($item['BAGGAGE_FARE'])->map(function ($bag, $key) use ($data){

                        $bag_info = collect($data['availableFareTypes'])->where('SUB_CLASS_ID', '=', $bag['sub_class_id'])->first();

                        $bag['title'] = $bag['sub_class_desc'];
                        $bag['description'] = $bag_info['DESCRIPTION'];
                        $bag['weight'] = $bag_info['DESCRIPTION'];

                        //$bag['no_of_bags'] = $bag['FARE_PAX_WISE']['no_of_bags'];
                        //$bag['amount'] = $bag['FARE_PAX_WISE']['amount'];
                        //$bag['weight'] = ($bag['no_of_bags'] * 20) . " KG";

                        $bag['TOTAL'] = (\request('AdultNo') * $bag['FARE_PAX_WISE']['ADULT']['TOTAL'] +
                            \request('ChildNo') * $bag['FARE_PAX_WISE']['CHILD']['TOTAL'] +
                            \request('InfantNo') * $bag['FARE_PAX_WISE']['INFANT']['TOTAL']);

                        $bag['TOTAL_BASIC_FARE'] = (\request('AdultNo') * $bag['FARE_PAX_WISE']['ADULT']['BASIC_FARE'] +
                            \request('ChildNo') * $bag['FARE_PAX_WISE']['CHILD']['BASIC_FARE'] +
                            \request('InfantNo') * $bag['FARE_PAX_WISE']['INFANT']['BASIC_FARE']);

                        return $bag;
                    });

                    return $item;
                })->toArray();
                /*---------------------------------------------------------------------------------------*/
                $FLIGHTS['inbound'] = collect($data['inbound'])->map(function ($item, $key) use ($data) {
                    $item['AIRLINE'] = 'Airsial';
                    $item['AIRLINE_CODE'] = 'PF';
                    $item['TYPE'] = 'inbound';
                    $item['STOPS'] = $item['STOPS'] ?? 0;
                    $item['DEPARTURE_DATE'] = \Carbon\Carbon::parse($item['DEPARTURE_DATE'])->format('Y-m-d');
                    $item['ARRIVAL_DATE'] = \Carbon\Carbon::parse((!empty($item['ARRIVAL_DATE']) ? $item['ARRIVAL_DATE'] : $item['DEPARTURE_DATE']))->format('Y-m-d');
                    $item['ARRIVAL_TIME'] = \Carbon\Carbon::parse($item['ARRIVAL_TIME'])->format('H:i:s');
                    $item['DEPARTURE_TIME'] = \Carbon\Carbon::parse($item['DEPARTURE_TIME'])->format('H:i:s');
                    $item['BAGGAGE_FARE'] = collect($item['BAGGAGE_FARE'])->map(function ($bag, $key) use ($data){

                        $bag_info = collect($data['availableFareTypes'])->where('SUB_CLASS_ID', '=', $bag['sub_class_id'])->first();
                        $bag['title'] = $bag['sub_class_desc'];
                        $bag['description'] = $bag_info['DESCRIPTION'];
                        $bag['weight'] = $bag_info['DESCRIPTION'];

                        //$bag['no_of_bags'] = $bag['FARE_PAX_WISE']['no_of_bags'];
                        //$bag['amount'] = $bag['FARE_PAX_WISE']['amount'];
                        //$bag['weight'] = ($bag['no_of_bags'] * 20) . " KG";

                        $bag['TOTAL'] = (\request('AdultNo') * $bag['FARE_PAX_WISE']['ADULT']['TOTAL'] +
                            \request('ChildNo') * $bag['FARE_PAX_WISE']['CHILD']['TOTAL'] +
                            \request('InfantNo') * $bag['FARE_PAX_WISE']['INFANT']['TOTAL']);

                        $bag['TOTAL_BASIC_FARE'] = (\request('AdultNo') * $bag['FARE_PAX_WISE']['ADULT']['BASIC_FARE'] +
                            \request('ChildNo') * $bag['FARE_PAX_WISE']['CHILD']['BASIC_FARE'] +
                            \request('InfantNo') * $bag['FARE_PAX_WISE']['INFANT']['BASIC_FARE']);
                            
                        return $bag;
                    });

                    return $item;
                })->toArray();
                
                // dd($FLIGHTS);
                // exit;
                $FLIGHTS['FLIGHT_Airsial_STATUS'][] = 'Success';
                return $FLIGHTS;
                //return api_response($json['Response']['Data'], 200);
            } else {
                if(empty($FLIGHTS)){
                    $FLIGHTS['FLIGHT_Airsial_STATUS'][] = 'UnSuccess';
                    // $FLIGHTS['FLIGHT_STATUS'][] = 1;
                    // session(['FLIGHT_Airsial_STATUS' => 'UnSuccess']);
                }
                return $FLIGHTS;
            
                // print_r(session()->all());
                // exit;
                // return $json;
                // return api_response($json, 200);
            }
        } else {
            return ['status' => false, 'response' => ['serverError' => $response->serverError(), 'clientError' => $response->clientError()]];
        }
    }


    public static function bookSeat($_params = [],$flights)
    {
            // dd($_params);
            // exit;
        $_session = self::makeSession();

        $params = [collect(["Caller" => "bookSeat",
            "token" => $_session['token'],
            "Return" => false,
            "ReturningOn" => "07-01-2021",
            "DepartureJourney" => "180195",
            "DepartureFareType" => 2,
            "DepartureClass" => "1010",
            "DepartureFlight" => "PF121",
            "ReturningJourney" => "",
            "ReturningClass" => "",
            "ReturningFlight" => "",
            "ReturningFareType" => 1,
            "LocationDep" => "KHI",
            "LocationArr" => "ISB",
            "ftype" => "dom",
            "TotalSeats" => 1,
            "totalInfant" => 0,
            "totalAdult" => 1,
            "totalChild" => 0
        ])->merge(\request()->input())->merge($_params)->toArray()];
        // dd($params);
        // exit;
        // $params[0]['Return'] = (\request('Return') == 'true');
        // dd($flights);
        if($flights['inbound']->airline == $flights['outbound']->airline){
                $Return = true;
        }else{
            $Return = false;
        }
        
        $params[0]['Return'] = $Return;

        // dd($params);
        // exit;
        $response = Http::withHeaders(['Content-Type' => 'application/json'])->post(self::$endpoint, $params);
        // dd($response);
        if ($response->ok()) {
            $json = $response->json();
            if ($json['Success']) {
                return $json['Response']['Data'];
                return api_response($json['Response']['Data'], 200);
            } else {
                return $json;
                return api_response($json, 200);
            }
        } else {
            return ['status' => false, 'response' => ['serverError' => $response->serverError(), 'clientError' => $response->clientError()]];
        }
    }


    public static function passengerInsertion($_params = [])
    {

        $_session = self::makeSession();

        $params = [collect(['Caller' => 'passengerInsertion',
            'token' => $_session['token'],
            'PNR' => '1C2XSO',
            'adult' => [
                [
                    'Title' => 'MR',
                    'WheelChair' => 'N',
                    'FullName' => 'SYED JAWWAD ALAM',
                    'Firstname' => 'SYED JAWWAD',
                    'Lastname' => 'ALAM'
                ]
            ],
            'child' => [
                [
                    'Title' => 'MR',
                    'WheelChair' => 'N',
                    'FullName' => 'Child One',
                    'Firstname' => 'Child',
                    'Lastname' => 'One'
                ]
            ],
            'infant' => [
                [
                    'Title' => 'MR',
                    'WheelChair' => 'N',
                    'FullName' => 'Infant One',
                    'Firstname' => 'Infant',
                    'Lastname' => 'One'
                ]
            ],
            'PrimaryCell' => '+92313-7559954',
            'SecondaryCell' => '+92',
            'EmailAddress' => 'jawwad_alam2002@mail.com',
            'CNIC' => '',
            'Comments' => '',
            'ft' => 'dom'
        ])->merge(\request()->input())->merge($_params)->toArray()];
        // dd($params);
        // exit;

        $params[0]['adult'] = collect($params[0]['adult'])->map(function ($item, $key) {
            $item['Dob'] = \Carbon\Carbon::parse($item['Dob'])->format('d-m-Y');
            return $item;
        })->toArray();
        $params[0]['child'] = collect($params[0]['child'])->map(function ($item, $key) {
            $item['Dob'] = \Carbon\Carbon::parse($item['Dob'])->format('d-m-Y');
            return $item;
        })->toArray();
        $params[0]['infant'] = collect($params[0]['infant'])->map(function ($item, $key) {
            $item['Dob'] = \Carbon\Carbon::parse($item['Dob'])->format('d-m-Y');
            return $item;
        })->toArray();

        if (!\request()->has('child')) {
            unset($params[0]['child']);
        }
        if (!\request()->has('infant')) {
            unset($params[0]['infant']);
        }

        $response = Http::withHeaders(['Content-Type' => 'application/json'])->post(self::$endpoint, $params);

        if ($response->ok()) {
            $json = $response->json();
            if ($json['Success']) {
                return $json['Response']['Data'];
                return api_response($json['Response']['Data'], 200);
            } else {
                return $json;
                return api_response($json, 200);
            }
        } else {
            return ['status' => false, 'response' => ['serverError' => $response->serverError(), 'clientError' => $response->clientError()]];
        }
    }

    public static function viewTicket($pnr)
    {
        $_session = self::makeSession();

        $params = [collect(["Caller" => "viewTicket",
            "token" => $_session['token'],
            "PNR" => $pnr,
        ])->merge(\request()->input())->toArray()];

        $response = Http::withHeaders(['Content-Type' => 'application/json'])->post(self::$endpoint, $params);

        if ($response->ok()) {
            $json = $response->json();
            if ($json['Success']) {
                return $json['Response']['Data'];
                return api_response($json['Response']['Data'], 200);
            } else {
                return $json;
                return api_response($json, 200);
            }
        } else {
            return ['status' => false, 'response' => ['serverError' => $response->serverError(), 'clientError' => $response->clientError()]];
        }
    }


}
