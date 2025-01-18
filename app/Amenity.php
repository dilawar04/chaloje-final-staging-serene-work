<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{

    //protected $table = 'amenities';
    public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];


    public function amenities_groups()
    {
        return $this->hasOne('App\amenities_group', 'id', 'group_id');
    }

    function amenities($property_id = 0, $where = '', $for = 'Property', $code = [], $groups = false){
        $_for = strtolower($for);
        $join_where = '';
        //if($property_id > 0)
        {
            $join_where .= " AND {$_for}_amenities.{$_for}_id='{$property_id}' ";
        }
        if(count($code) > 0 ){
            $where .= " AND amenities.code IN('" . join("', '", $code) . "') ";
        }

        $SQL = "SELECT
            amenities.*
            , amenities_groups.title AS group_title
            , amenities_groups.icon AS group_icon
            , {$_for}_amenities.amenity_value AS `value`
        FROM amenities
            LEFT JOIN amenities_groups ON (amenities.group_id = amenities_groups.id)
            LEFT JOIN {$_for}_amenities ON (amenities.id = {$_for}_amenities.amenity_id {$join_where})
        WHERE 1
         AND `for` IN('{$for}', 'All')
        {$where}
        GROUP BY amenities.id
        ORDER BY amenities.input, amenities.ordering, amenities.group_id, amenities.id ASC";

        $_amenities = [];
        $amenities = collect(\DB::select($SQL))->all();
        if (count($amenities) > 0) {
            foreach ($amenities as $amenity) {
                if($groups)
                    $_amenities[$amenity->group_title][$amenity->code] = $amenity;
                else
                $_amenities[$amenity->code] = $amenity;
            }
        }

        return $_amenities;

    }

}
