<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{

    //protected $table = 'property_types';
    public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];

    
                    public function property_types() {
                    return $this->hasOne('App\property_type', 'id', 'parent_id');
                }
                
}