<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectBlockCategory extends Model
{

    //protected $table = 'project_block_categories';
    public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];

    
                    public function project_blocks() {
                    return $this->hasOne('App\project_block', 'id', 'block_id');
                }
                
}