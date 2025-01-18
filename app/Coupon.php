<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    //protected $table = 'coupons';
    public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];


    public function user_types()
    {
        return $this->hasOne('App\user_type', 'id', 'customer_type');
    }

    public function validate($coupon_code){
        $coupon = \App\Coupon::where(['coupon_code' => $coupon_code, 'status' => 'Active'])
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->first();
        if($coupon->id > 0){
            if ($coupon->usage_policy == 'Limited' && $coupon->no_used >= $coupon->usage_limit) {
                return ['status' => false, 'message' => 'Limit Reached!'];
            }
            //$coupon->status = true;
            return ['status' => true, 'coupon' => $coupon];
        } else {
            return ['status' => false, 'message' => 'Invalid or expire this coupon'];
        }
        return $coupon;
    }

    public function used($user_id, $order_id = 0)
    {
        return \DB::table('coupons')
        ->select('coupon_name', 'coupon_code', 'discount_type', 'discount', 'coupon_used.datetime')
        ->join('coupon_used', 'coupons.id', '=', 'coupon_used.coupon_id')
        ->where(['coupon_used.order_id' => $order_id])
        ->get();
    }

}