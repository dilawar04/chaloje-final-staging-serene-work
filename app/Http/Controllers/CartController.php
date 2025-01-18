<?php

namespace App\Http\Controllers;

use App\ProjectProperty;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $row = \App\Project::where(['status' => 'Active'])->limit(1)->first();
        $blocks = \App\ProjectBlock::where(['project_id' => $row->id, 'status' => 'Active'])->get();

        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('projects.index', compact('row', 'blocks'));
    }

    public function add($id)
    {
        $user_id = \Auth::id();
        $exists = \App\OrderDetail::where(['property_id' => $id])->first();
        if(!$exists){
            if(\Session::exists('order_id')){
                $order_id = \Session::get('order_id');
            } else {
                $order_data = ['customer_id' => $user_id, 'created_by' => $user_id];
                $order = \App\Order::create($order_data);
                $order_id = $order->id;
                \Session::put('order_id', $order_id);
            }
            $property = \App\ProjectProperty::find($id);
            $featuers = \App\ProjectProperty::featuers($id);
            $property->total_cost = $property->price + array_sum(array_column($featuers, 'amount'));

            $nominee = \Session::get('nominee');
            \App\OrderDetail::updateOrInsert(['order_id' => $order_id, 'property_id' => $id], ['price' => $property->total_cost, 'nominee' => json_encode($nominee)]);
            \Session::forget('nominee');
            return ['status' => true, 'message' => 'Thanks for Booking!'];
        } else {
            return ['status' => false, 'message' => 'Already Booked!'];
        }

        $row = \App\Project::where(['status' => 'Active'])->limit(1)->first();
        $blocks = \App\ProjectBlock::where(['project_id' => $row->id, 'status' => 'Active'])->get();

        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('projects.index', compact('row', 'blocks'));
    }

}
