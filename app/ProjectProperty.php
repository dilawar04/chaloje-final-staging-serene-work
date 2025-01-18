<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectProperty extends Model
{

    //protected $table = 'project_properties';
    public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];


    public function featuers($property_id)
    {
        $_rows = [];
        $rows = \DB::table('property_features')
            ->leftJoin('features', 'features.id', '=', 'property_features.feature_id')
            ->where(['property_features.property_id' => $property_id])->get(['features.feature','property_features.feature_id','property_features.property_id','property_features.amount','property_features.type']);
        if (count($rows) > 0){
            foreach ($rows as $row) {
                $_rows[$row->feature_id]['feature'] = $row->feature;
                $_rows[$row->feature_id]['amount'] = $row->amount;
                $_rows[$row->feature_id]['type'] = $row->type;
            }
        }
        return $_rows;
    }

    public function projects()
    {
        return $this->hasOne('App\project', 'id', 'project_id');
    }

    public function property_types()
    {
        return $this->hasOne('App\property_type', 'id', 'type_id');
    }

    public function property_features()
    {
        return $this->hasOne('App\property_type', 'id', 'type_id');
    }

}
