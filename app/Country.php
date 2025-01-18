<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    //protected $table = 'countries';
    protected $primaryKey = 'idCountry';
    public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];

    
    
}