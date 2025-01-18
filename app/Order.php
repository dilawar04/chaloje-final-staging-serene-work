<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    //protected $table = 'orders';
    //public $timestamps = false;
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';
    //protected $perPage = 15;

    protected $guarded = [];


    public function order_statuses()
    {
        return $this->hasOne('App\order_status', 'id', 'status');
    }

    public function creator()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }
    public function items()
    {
        return $this->hasMany('App\OrderDetail', 'id', 'order_id');
    }

    function pdf_invoice($order_id, $invoice_file = 'invoice')
    {
        $order = \App\Order::find($order_id);
        $order_detail = \App\OrderDetail::where(['order_id' => $order_id])->first();
        $customer = \App\Customer::find($order->customer_id);
        //$customer = \App\OrderMember::where(['order_id' => $order->id])->first();

        $property = \App\ProjectProperty::find($order_detail->property_id);

        $block = \App\ProjectBlock::find($property->block_id);
        $type = \App\PropertyType::find($property->type_id);
        $property->type = $type->type;
        $property->block = $block->title;
        $features = json_decode($order_detail->features, true);

        //$features = \App\ProjectProperty::features($property->id);
        //$property->extra_cost = (array_sum(array_column($features, 'amount')));
        $property->extra_cost = $order_detail->extra_cost;
        $property->features = $features;
        //$property->total_cost = ($property->price + floatval(array_sum(array_column($features, 'amount'))));
        $order->price = ($order_detail->price);
        $order->extra_cost = ($order_detail->extra_cost);
        $order->total_cost = ($order_detail->price + $order_detail->extra_cost);

        $HTML = \View::make("admin.orders.{$invoice_file}", compact('order', 'order_detail', 'customer', 'property', 'features', 'block'))->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($HTML);
        return $pdf->stream();

    }

}
