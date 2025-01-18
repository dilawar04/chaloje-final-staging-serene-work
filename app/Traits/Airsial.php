<?php

namespace App\Traits;
use App\Booking;
use Illuminate\Http\Request;
use Http;

trait Airsial
{    
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

    public  function IssueTicketAPI($response = [])
    {
        $_session = self::makeSession();
        $booking = Booking::find($response['Order_Ref_Number']);

        $params = [collect([
            "Caller" => "makePayment",
            "token" => $_session['token'],
            "PNR" => $booking->pnr,            
        ])->merge(\request()->input())->merge($_params)->toArray()];
        
        $response = Http::withHeaders(['Content-Type' => 'application/json'])->post(self::$endpoint, $params);
    }
}