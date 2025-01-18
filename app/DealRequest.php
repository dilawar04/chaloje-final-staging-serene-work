<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealRequest extends Model
{

    //protected $table = 'deal_requests';
    //public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];


    public function deals()
    {
        return $this->hasOne('App\deal', 'id', 'deal_id');
    }

}
