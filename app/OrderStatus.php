<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{

    //protected $table = 'order_statuses';
    public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];


    public function email_templates()
    {
        return $this->hasOne('App\email_template', 'id', 'email_template');
    }

}