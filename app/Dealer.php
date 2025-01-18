<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    //
    protected $table = 'users';

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function usertype() {
        return $this->hasOne('App\UserType', 'id', 'user_type_id');
    }
}
