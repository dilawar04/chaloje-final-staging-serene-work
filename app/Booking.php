<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $table = 'booking';
    //public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];


    public function booking()
    {
        return $this->hasOne('App\booking', 'id', 'airline');
    }


    public function details()
    {
        return $this->hasMany(BookingDetail::class);
    }

    function pdf_invoice($order_id, $invoice_file = 'invoice')
    {
        $booking = \App\Booking::find($order_id);
        $detail = \DB::table('booking_details')->where(['booking_id' => $order_id])->first();
        $payment = \DB::table('payment_details')->where(['order_number' => $order_id])->orderBy('id', 'DESC')->first();

        $HTML = \View::make("admin.booking.{$invoice_file}", compact('booking', 'detail', 'payment'))->render();
        //die($HTML);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($HTML);
        return $pdf->stream();

    }

}
