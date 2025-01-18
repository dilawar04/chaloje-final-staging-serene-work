<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    //protected $table = 'projects';
    public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];


    public function countries()
    {
        return $this->hasOne('App\country', 'id', 'country');
    }

    public function cities()
    {
        return $this->hasOne('App\city', 'id', 'city_id');
    }

    public function areas()
    {
        return $this->hasOne('App\area', 'id', 'area_id');
    }

    public function users()
    {
        return $this->hasOne('App\user', 'id', 'developer_id');
    }

    public function creator()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

}
