<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{

    protected $table = 'income';
    public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];


    public function income()
    {
        return $this->hasOne('App\income', 'id', 'user_id');
    }

    public function orders()
    {
        return $this->hasOne('App\order', 'id', 'rel_id');
    }

    public function creator()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function received($order_id)
    {
        $rows = \DB::table('income')->where(['income.rel_id' => $order_id])->get();
        $data = collect($rows)->mapWithKeys(function ($item) {
            return [$item->key => $item];
        })->toArray();
        return $data;
    }

}