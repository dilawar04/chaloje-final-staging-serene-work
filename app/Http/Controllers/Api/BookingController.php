<?php

namespace App\Http\Controllers\Api;


class BookingController extends Controller
{

    public $model = null; // Model Object

    public function __construct()
    {
        //$model = 'App\\' . \Str::studly(\Str::singular('booking'));
        $this->model = new \App\Booking;
    }

    public function create_booking()
    {
        //$data = \request()->input();
//        $data['summary'] = json_encode($data['summary']);
//        $data['travelers'] = json_encode($data['travelers']);
//        $table = 'booking';
//        return save($table, $data);

        $data = DB_FormFields($this->model);
        $row = $this->model->fill($data['data']);
        $row->save();
        return $row->id;

    }

    public function booking_details()
    {

        $data = \request()->input();
        $table = 'booking_details';
        $user = null;

        if (\request()->has('user')) {
            $user = \req('user');

            $id = \DB::table('users')->where('email', $user['email'])->first();


            if (empty($id)) {
                \DB::table('users')->insert([
                    'first_name' => $user['fullName'],
                    'email' => $user['email'],
                    'password' => \Hash::make($user['password']),
                    'phone' => $user['mobile'],
                    'username' => $user['email'],
                    'status' => 'Active',
                    'user_type_id' => 5
                ]);
            }

            unset($data['user']);
        }

        if (\request()->has('adult'))
            $data['adult'] = json_encode($data['adult']);
        if (\request()->has('child'))
            $data['child'] = json_encode($data['child']);
        if (\request()->has('infant'))
            $data['infant'] = json_encode($data['infant']);
        if (\request()->has('TRAVELERS_XML')) {
            $data['travelers_xml'] = $data['TRAVELERS_XML'];
            unset($data['TRAVELERS_XML']);
        }
        if (\request()->has('OriginDestination_XML')) {
            $data['origin_destination_xml'] = $data['OriginDestination_XML'];
            unset($data['OriginDestination_XML']);
        }

        return save($table, $data);
    }

    public function fetch_booking()
    {

        $id = \req('id');

        $PNR = \DB::table('booking')->where(['id' => $id])->pluck('pnr')->first();

        return $PNR;
    }

    public function confirm_booking()
    {
        $id = \req('id');

        $booking_data = \DB::table('booking')->where(['id' => $id])->first();
        $booking_details = \DB::table('booking_details')->where(['booking_id' => $id])->first();


        $airline = $booking_data->airline;

        switch ($airline) {
            case 'Airsial':
                $PNR = $booking_data->pnr;

                $params = [
                    'PNR' => $PNR,
                    'PrimaryCells' => $booking_details->mobile,
                    'EmailAddress' => $booking_details->email,
                    'CNIC' => $booking_details->cnic,
                    'Comments' => $booking_details->comments,
                ];

                $adult = json_decode($booking_details->adult);
                $child = json_decode($booking_details->child);
                $infant = json_decode($booking_details->infant);

                if (count($adult) > 0) {
                    $params['adult'] = $adult;
                }
                if (count($child) > 0) {
                    $params['child'] = $child;
                }
                if (count($infant) > 0) {
                    $params['infant'] = $infant;
                }


                /*Dummy Data*/
                $adult = [
                    'Firstname' => 'Dorian',
                    'Lastname' => 'Stuart',
                    'Cnic' => '12312-3123123-1',
                    'Dob' => '11-18-2010',
                    'Title' => 'MRS',
                    'WheelChair' => 'Yes',
                    'FullName' => 'Dorian Stuart'
                ];
                $child = [
                    'Firstname' => 'Emerson',
                    'Lastname' => 'Leblanc',
                    'Cnic' => '12312-3123131-2',
                    'Dob' => '09-09-1981',
                    'Title' => 'MISS',
                    'WheelChair' => 'No',
                    'FullName' => 'Emerson Leblanc'
                ];

                $dummy = [
                    'PNR' => '1SMUTS',
                    'PrimaryCells' => 16561868709,
                    'EmailAddress' => 'kiwicurom@mailinator.com',
                    'CNIC' => '12312-3123123-1',
                    'Comments' => 'Id suscipit ad aut',
                    'adult' => [
                        0 => (object) $adult
                    ],
                    'child' => [
                        0 => (object) $child
                    ],
                ];

                // $response = \Http::post(url('api/passengerInsertion'), $dummy);

                $response = \Http::post(url('api/passengerInsertion'), $params);



                $isValidResponse = array_key_exists('PNR', $response->json());

                if ($isValidResponse) {
                    \DB::table('booking')->where(['id' => $id])->update(['status' => 'paid']);
                    return $response->json();
                } else {
                    return api_response($response->json(), 500);
                }

                break;
            case 'Airblue':
                $params = [
                    'TRAVELERS_XML' => $booking_details->travelers_xml,
                    'OriginDestination_XML' => $booking_details->origin_destination_xml,
                    'TRAVELERS' => json_decode($booking_data->travelers),
                    'TRAVELERS_INFORMATION' => [
                        'ADULT' => json_decode($booking_details->adult),
                        'CHILD' => json_decode($booking_details->child),
                        'INFANT' => json_decode($booking_details->infant)
                    ]
                ];


                $response = \Http::post(url('api/airBook'), $params);



                $isValidResponse = $response->json()['status'];

                if ($isValidResponse) {
                    $res = [
                        'PNR' => $response->json()['data']['AirReservation']['BookingReferenceID'][0]['_ID']
                    ];

                    return $res;
                } else {
                    return $response->json();
                }


            default:
                dd('Error Airline name is invalid', $airline);
        }


        dd($booking_data, $booking_details, $airline);
    }
}
