<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{

    //protected $table = 'blog_posts';
    public $timestamps = false;
    //const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    //protected $perPage = 15;

    protected $guarded = [];



}
