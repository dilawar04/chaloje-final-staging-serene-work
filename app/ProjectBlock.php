<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectBlock extends Model
{

    //protected $table = 'project_blocks';
    public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];


    public function projects()
    {
        return $this->hasOne('App\project', 'id', 'project_id');
    }

    public function block_properties($block_id){
        $properties = \App\ProjectBlock::where(['id' => $block_id])
            ->join('project_properties', 'project_properties.block_id', '=', 'project_blocks.id')
            ->get();
        $json = [];
        if(count($properties) > 0){
            foreach ($properties as $property) {
                $featuers = \App\ProjectProperty::featuers($property->id);
                $property->extra_cost = array_sum(array_column($featuers, 'amount'));
                $property->total_cost = $property->price + $property->extra_cost;
                $row = ["plotstatus" => $property->status,
                    "plotno" => $property->plot,
                    "size" => $property->area,
                    "type" => $property->type,
                    "sector" => $property->block,
                    "category" => number_format($property->area, 0, '', ''),
                    "costofunit" => $property->price,
                    "totalexrtracharges" => $property->extra_cost,
                    "totalcostofunit" => $property->total_cost];
                $row = array_merge($row, array_column($featuers, 'amount', 'feature'));
                $json[] = $row;
            }
        }
        return $json;
    }

}
