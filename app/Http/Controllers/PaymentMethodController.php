<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\Traits\Airblue;
use App\Traits\Airsial;
use App\Traits\Airserene;


class PaymentMethodController extends Controller
{
    use Airblue;
    use Airsial;
    use Airserene;

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
        if($response['Order_Ref_Number'] > 0){
            $booking = Booking::find($response['Order_Ref_Number']);
            $booking->status = ($response['status']) ? 'paid' : 'unpaid';
            // dd($booking->airline);
            // exit;
            $booking->save();

            if($booking->status){
                if($response['code'] === '100' && $booking->airline == 'Airblue'){
                    $this->AirDemandTicket($response);
                    return view('themes.chaloge.pages.thankyou')->with(compact('response'));
                }elseif ($response['code'] === '100' && $booking->airline == 'Airsial') {
                    $this->IssueTicketAPI($response);
                    return view('themes.chaloge.pages.thankyou')->with(compact('response'));
                }elseif ($response['code'] === '100' && $booking->airline == 'Air Serene') {
                    $this->SaveReservation($response);
                    return view('themes.chaloge.pages.thankyou')->with(compact('response'));
                }else{
                    return view('themes.chaloge.pages.payment-failed')->with(compact('response'));
                }
                // return view('themes.chaloge.pages.thankyou')->with(compact('response'));
                // return redirect()->to("thank-you?pnr={$booking->pnr}");
            } else {
                return redirect()->to("payment-failed?pnr={$booking->pnr}");
            }
        } else {
            return redirect()->to("payment-failed?" . http_build_query($response));
        }
    }
}
