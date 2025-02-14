<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\Traits\Airblue;
use App\Traits\Airsial;
use App\Traits\Airserene;
use App\Traits\Flyjinnah;


class PaymentMethodController extends Controller
{
    use Airblue;
    use Airsial;
    use Airserene;
    use Flyjinnah;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function hbl($status)
    {
        $response = Api\PaymentController::hbl_status($status);
        // dd($response);
        if($response['Order_Ref_Number'] > 0){
            $bookings = \DB::table('booking')->where(['order_id' => $response['Order_Ref_Number']])->get();
            // dd($bookings);

            // $booking = Booking::find($response['Order_Ref_Number']);
            // dd($booking);
            $Counter = 1;
            foreach($bookings as $booking) {
                // dd();
                $response['booking_id'] = $booking->id; 
                $BookingParamSave = Booking::find($booking->id);
                // dd($BookingParamSave);
                $BookingParamSave->status = ($response['status']) ? 'paid' : 'unpaid';
                // dd($booking->airline);
                // exit;
                $BookingParamSave->save();
                if($booking->status){
                    if($response['code'] === '100' && $booking->airline == 'Airblue'){
                        $this->AirDemandTicket($response);
                        // return view('themes.chaloge.pages.thankyou')->with(compact('response'));
                    }elseif ($response['code'] === '100' && $booking->airline == 'Airsial') {
                        $this->IssueTicketAPI($response);
                        // return view('themes.chaloge.pages.thankyou')->with(compact('response'));
                    }elseif ($response['code'] === '100' && $booking->airline == 'Air Serene') {
                        $this->SerenePaymentMethod($response);
                        // return view('themes.chaloge.pages.thankyou')->with(compact('response'));
                    }elseif ($response['code'] === '100' && $booking->airline == 'Fly Jinnah') {
                        $this->OTA_AirBookModifyRQ($response);
                        // return view('themes.chaloge.pages.thankyou')->with(compact('response'));
                    }else{
                        return view('themes.chaloge.pages.payment-failed')->with(compact('response'));
                    }
                    if($bookings[1] && $Counter == '2' && $response['code'] === '100') {
                        return view('themes.chaloge.pages.thankyou')->with(compact('response'));
                    }
                    // return view('themes.chaloge.pages.thankyou')->with(compact('response'));
                    // return redirect()->to("thank-you?pnr={$booking->pnr}");
                } else {
                    return redirect()->to("payment-failed?order_id={$response['Order_Ref_Number']}");
                }

                $Counter++;
            }    

        } else {
            return redirect()->to("payment-failed?" . http_build_query($response));
        }
    }
}
