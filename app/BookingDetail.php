<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{

    protected $table = 'booking_details';
    //public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];


    public function booking()
    {
        return $this->belongsTo('App\booking', 'booking_id', 'id');
    }

}
