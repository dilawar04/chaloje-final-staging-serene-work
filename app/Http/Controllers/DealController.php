<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DealController extends Controller
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
        $limit = opt('posts_per_page') ?? 12;
        $SQL = \App\Deal::where('status', 'Active')->whereRaw('NOW() BETWEEN date_from AND date_to');
        $rows = $SQL->paginate($limit);

        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('deals.index', compact('rows'));
    }

    public function detail($slug)
    {
        $id = end(explode('-', $slug));
        $row = \App\Deal::where(['id' => $id, 'status' => 'Active'])->first();
        if(!$row){
            abort(404);
        }

        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('deals.form', ['deal' => $row]);
    }

    public function request(){

        $id = req('id');

        $validator_rules = [
            'first_name' => "required",
            'last_name' => "required",
            'phone' => "required",
            'travellers' => "required",
        ];
        $validator = \Validator::make(request()->all(), $validator_rules);
        if ($validator->fails()) {
            if (request()->ajax() || request()->is('api/*')) {
                return api_response(['status' => false, 'message' => join('<br/>', show_validation_errors($validator))]);
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $model=  new \App\DealRequest();
        $data = DB_FormFields($model);
        if ($id > 0) {
            $row = $model->find($id);
            $row = $row->fill($data['data']);
        } else {
            $row = $model->fill($data['data']);
        }

        if ($status = $row->save()) {
            if ($id == 0) {
                $id = $row->id;
                set_notification('Request has been received!', 'success');
                activity_log('Add', $model->getTable(), $id);
            } else {
                set_notification('Request has been updated!', 'success');
                activity_log('Update', $model->getTable(), $id);
            }
        } else {
            set_notification('Some error occurred!', 'error');
        }

        return redirect()->back();
    }
}
