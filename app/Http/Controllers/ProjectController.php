<?php

namespace App\Http\Controllers;

use App\ProjectProperty;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\_parse_request_uri;

class ProjectController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function eoi()
    {
        $id = end(explode('-', $slug));
        $property = \App\ProjectProperty::where(['id' => $id])->first();
        $blocks = \App\ProjectBlock::where(['project_id' => $property->project_id, 'status' => 'Active'])->get();
        $features = \App\Feature::get();

        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('projects.eoi', compact('blocks', 'features', 'property'));
    }

    public function listing()
    {
        $config = collect(['sort' => 'project_properties.id', 'dir' => 'desc', 'limit' => 25, 'group' => 'project_properties.id'])->merge(request()->query())->toArray();

        /** -------- Query */
        $select = "project_properties.id
, project_properties.title
, projects.title as project
, project_blocks.title as block
, project_properties.street
, project_properties.plot
, project_properties.area
, project_properties.area_unit
, project_properties.price
, project_properties.status

    ";
        $SQL = \App\ProjectProperty::select(\DB::raw($select));

        $SQL = $SQL->leftJoin('projects', 'projects.id', '=', 'project_properties.project_id');
        $SQL = $SQL->leftJoin('project_blocks', 'project_blocks.id', '=', 'project_properties.block_id');
        /*$SQL = $SQL->leftJoin('users', function ($join){
            $join->on('project_properties.dealer_id', '=', 'users.id')->where(['users.user_type_id' => 6]);
        });*/
        //$SQL = $SQL->leftJoin('property_types', 'property_types.id', '=', 'project_properties.type_id');
        /** -------- WHERE */
        $where = " 1 ";

        $where .= getWhereClause($select);
        if (!empty($where)) {
            $SQL = $SQL->whereRaw($where);
        }

        $SQL = $SQL->orderBy($config['sort'], $config['dir'])->groupBy($config['group']);

        $data = $SQL->paginate($config['limit']);

        \App\Theme::template($page->template ?? 'default');

        return \App\Theme::view('projects.listing', compact('data'));
    }

    public function block($slug)
    {
        $id = end(explode('-', $slug));

        $block = \App\ProjectBlock::where(['id' => $id, 'status' => 'Active'])->first();

        if (!$block) {
            dd("404");
        }
        $project = \App\Project::where(['id' => $block->project_id, 'status' => 'Active'])->limit(1)->first();

        \App\Theme::template($page->template ?? 'map');
        return \App\Theme::view('projects.block', compact('project', 'block'));
    }

    public function booking($slug)
    {
        $id = end(explode('-', $slug));
        $property = \App\ProjectProperty::where(['id' => $id])->first();
        if(!in_array($property->status, ['Vacant'])){
            set_notification('Already Booked or reserve!');
            return redirect()->back();
        }
        $user = [];
        if(\Auth::check() && \Auth::user()->user_type_id == 5) {
            $user = \App\User::user_row(\Auth::id(), 'customer_rel');
        }

        if(\request()->isMethod('POST') && req('agree')){

            if($user->id == 0) {
                req('first_name', null, req('name'));
                req('phone', null, req('mobile'));
                $validate_inputs = [
                    'first_name' => "required",
                    'email' => "required|email",
                    'phone' => "required",
                    'password' => "required"
                ];
                $validator = \Validator::make(request()->all(), $validate_inputs);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $DB_data = DB_FormFields('users')['data'];
                $password = $DB_data['password'] ?? \Str::random(8);

                $DB_data['username'] = req('email');
                $DB_data['password'] = \Hash::make($password);
                $DB_data['api_token'] = \Str::random(60);
                $DB_data['verification_token'] = \Str::random(40);
                $DB_data['user_type_id'] = 5;
                $DB_data['status'] = 'Active';
                $user = \App\User::create($DB_data);

                $rel_DB_data = DB_FormFields('customer_rel', [], \request()->input('rel'))['data'];
                \DB::table('customer_rel')->updateOrInsert(['user_id' => $user->id], $rel_DB_data);

                /*$__user__ = ['password' => $password];
                $_user = collect($user)->merge($__user__)->all();
                $mail_temp = \App\EmailTemplate::template($_user, 'New Account');
                if ($mail_temp->status == 'Active') {
                    $mail_data = [
                        'to' => $user->email,
                        //'cc' => opt('admin_cc_email'),
                        'subject' => $mail_temp->subject,
                        'message' => $mail_temp->message,
                    ];
                    send_mail($mail_data);
                }*/
            } else {
                $DB_data = DB_FormFields('users')['data'];
                \App\User::where(['id' => $user->id])->update($DB_data);
            }

            $validator_rules = [
                'photo' => "image|mimes:gif,jpg,jpeg,png",//|max:2048
                'cnic_photo' => "image|mimes:gif,jpg,jpeg,png",
                'passport_photo' => "image|mimes:gif,jpg,jpeg,png",
                'photographs' => "image|mimes:gif,jpg,jpeg,png",
                'nominee_cnic_photo' => "image|mimes:gif,jpg,jpeg,png",
            ];
            $validator = \Validator::make(request()->all(), $validator_rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $nominee_data = [];
            foreach (req('nominee') as $key => $val) {
                $nominee_data["nominee_{$key}"] = $val;
            }
            foreach (req('rel') as $key => $val) {
                $nominee_data[$key] = $val;
            }
            $post_data = \request()->merge($nominee_data)->toArray();
            $order_member_data = DB_FormFields('order_members', [], $post_data)['data'];
            $files = upload_files(['photo'], "assets/front/users/");
            if($files['photo']->status){
                $photo = $files['photo']->getFilename();
                \Auth::user()->update(['photo' => $photo]);
            }

            $files = upload_files(['photo', 'cnic_photo', 'passport_photo', 'photographs', 'nominee_cnic_photo'], "assets/front/order_members/");
            if(count($files) > 0){
                foreach ($files as $field => $file) {
                    if($file->status) {
                        $order_member_data[$field] = $file->getFilename();
                    }
                }
            }
            $order_member_id = \DB::table('order_members')->insertGetId($order_member_data);

            \Session::put('customer_id', $user->id);
            \Session::put('order_member_id', $order_member_id);
            $currency = req('currency') ?? 'GBP';
            $payment_type = req('payment_type') ?? 'Payment Plan';
            return \redirect()->to("/cart/add/{$id}?c={$currency}&p={$payment_type}");
        }

        $block = \App\ProjectBlock::find($property->block_id);
        $type = \App\PropertyType::find($property->type_id);
        $property->type = $type->type;
        $property->block = $block->title;

        $featuers = \App\ProjectProperty::featuers($property->id);
        $property->features = $featuers;
        $property->extra_cost = (array_sum(array_column($featuers, 'amount')));
        $property->total_cost = ($property->price + floatval(array_sum(array_column($featuers, 'amount'))));

        if (!$property) {
            dd("404");
        }

        \App\Theme::template($page->template ?? 'full_width');
        return \App\Theme::view('projects.booking', compact('property', 'block', 'user'));
    }

    function ajax($action, $id = null){

        switch ($action){
            case 'project_block_categories':
                $_where = '';
                $type_id = req('id');
                if(!empty($type_id)){
                    $SQL = "SELECT category, category as _type FROM project_block_categories WHERE type_id='{$type_id}' {$_where} GROUP BY category";
                    $SQL = "SELECT category, category as _type FROM project_properties WHERE `type`='{$type_id}' AND project_properties.status='Vacant' {$_where}  GROUP BY category";

                    echo '<option value="">- Size -</option>';
                    echo selectBox($SQL);
                }
                break;
            case 'project_blocks':
                $_where = '';
                $type = req('type');
                $category = req('category');
                if(!empty($type)){
                    //$SQL = "SELECT id, title FROM project_blocks WHERE status='Active' GROUP BY category {$_where}";
                    $SQL = "SELECT project_blocks.id, project_blocks.title FROM project_properties 
INNER JOIN project_blocks ON (project_blocks.id = project_properties.block_id)
        WHERE 1 AND project_properties.type='{$type}'";
           if(!empty($category)){
               $SQL .= " AND `category`='{$category}'";
           }
 $SQL .= " AND project_properties.status='Vacant'
GROUP BY block_id {$_where}";

                    echo '<option value="">- Sector -</option>';
                    echo selectBox($SQL);
                }
                break;
            case 'plots':
                $_where = '';
                $type = req('type');
                $category = req('category');
                $block_id = req('block');

                $SQL = "SELECT plot, plot as _plot FROM project_properties WHERE status='Vacant' {$_where}";
                if($block_id > 0) {
                    $SQL .= " AND block_id='{$block_id}'";
                }if(!empty($type)) {
                    $SQL .= " AND type='{$type}'";
                }if(!empty($category)) {
                    $SQL .= " AND category='{$category}'";
                }

                echo '<option value="">- Plot -</option>';
                echo selectBox($SQL);
                break;
            case 'property_status':
                $project_id = req('project_id');
                $block_id = req('block_id');
                $street = req('street');
                $plot = req('plot');
                $ghz = req('ghz');
                $currency = req('currency') ?? 'GBP';

                $property = \App\ProjectProperty::where(['project_id' => $project_id, 'block_id' => $block_id/*, 'street' => $street*/, 'plot' => $plot, 'category' => $ghz])
                    ->first();

                if($property->id > 0){
                    /*$booking = \DB::table('order_detail')->where(['property_id' => $property->id])->join('orders', 'orders.id', '=', 'order_detail.order_id')
                        ->first('orders.id', 'customer_id', 'payment_status', 'status');*/

                    $status = str_replace(['kt-', '--'], ['', '-'], status_field($property->status, $property, 'status', []));
                    $block = \App\ProjectBlock::find($block_id);
                    //$type = \App\PropertyType::find($property->type_id);
                    //$property->type = $type->type;
                    $property->block = $block->title;
                    $featuers = \App\ProjectProperty::featuers($property->id);
                    $property->features = $featuers;
                    $property->extra_cost = (array_sum(array_column($featuers, 'amount')));
                    $property->total_cost = ($property->price + floatval(array_sum(array_column($featuers, 'amount'))));

                    $discounts = [];
                    $_coupon = \App\Coupon::validate('cash');
                    if($_coupon['status']){
                        $coupon = $_coupon['coupon'];
                        $discounts[$coupon->coupon_code] = ['discount' => $coupon->discount, 'type' => $coupon->discount_type, 'type_sign' => ($coupon->discount_type == 'Percentage' ? '%' : ''), 'name' => $coupon->coupon_name];
                        $property->cash_discount = $discounts[$coupon->coupon_code]['amount'] = ($coupon->discount_type == 'Percentage' ? ($property->total_cost * $coupon->discount /100) : $coupon->discount);
                    }
                    $user = \Auth::user();
                    if(\Auth::user()->country == 'United Kingdom'){
                        //$currency = 'GBP';
                        $property->form = \View::make("themes.broadway.projects.eoi", compact('property', 'block', 'user'))->render();
                    }else {
                        //$currency = 'PKR';
                        $property->form = \View::make("themes.broadway.projects.booking_popup", compact('property', 'block', 'user'))->render();
                    }

                    $property->table_HTML = \View::make("themes.broadway.projects.property_status_popup", compact('property', 'status', 'currency', 'block', 'discounts'))->render();

                    return $property;
                } else {
                    return ['status' => false, 'message' => 'Record not exist'];
                }
                break;
        }
    }

    public function team($slug)
    {
        $id = end(explode('-', $slug));
        $row = \App\Team::where(['id' => $id, 'status' => 'Active'])->first();
        if (!$row) {
            dd("404");
        }

        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('teams.detail', compact('row'));
    }

    public function pdf($order_id)
    {
        $order = \App\Order::find($order_id);

        if($order->customer_id == \Auth::id()) {
            return \App\Order::pdf_invoice($order_id);
        } else {
            return \redirect('/');
        }
    }

    public function agreement($order_id)
    {

        $data = \App\Order::pdf_invoice($order_id, 'invoice', true);
        return $HTML = \View::make("admin.orders.pdf.agreement", compact('data'))->render();

//        $pdf = \App::make('dompdf.wrapper');
//        $pdf->loadHTML($HTML);
//        return $pdf->stream();

    }

    public function plan($order_id)
    {
        $data = \App\Order::pdf_invoice($order_id, 'invoice', true);
        $data['HTML'] = '';
        return $HTML = \View::make("admin.orders.pdf.plan", compact('data'))->render();

        /*$pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($HTML);
        return $pdf->stream();*/
    }

    public function upload($order_id)
    {
        $customer_id = \Auth::id();
        $order = \App\Order::find($order_id);
        $filename = "";

        if($order->id > 0 && $customer_id == $order->customer_id){
            $files = upload_files(['photo', 'cnic_photo', 'passport_photo'], "assets/front/order_members/");
            $name = array_key_first($files);
            $file = $files[$name];
            if ($file->status) {
                $filename = $data[$name] = $file->getFilename();
                \App\OrderMember::where(['order_id' => $order_id])->update($data);

                return ['status' => true, 'message' => 'File has been uploaded!', 'filename' => $filename, 'file' => _img($file->getPathname(), 150, 150)];
            } else {
                return ['status' => false, 'message' => $file->error];
            }
        } else {
            return ['status' => false, 'message' => "Access denied"];
        }
    }

    public function json($sector = 1)
    {
        $JSON = json_decode(file_get_contents(__DIR__ . "/../../../resources/views/sector{$sector}.json"), true);

        $features = \App\Feature::all();
        foreach ($JSON as $row) {
            $row['corner'] = trim(str_replace([',', '-'], '', $row['cornercharges']));
            $row['park_facing'] = trim(str_replace([',', '-'], '', $row['parkfacing']));
            $row['road_facing'] = trim(str_replace([',', '-'], '', $row['roadfacing']));
            $row['west_open'] = trim(str_replace([',', '-'], '', $row['westopen']));

            $_data = [
                'project_id' => '1',
                'block_id' => $sector,
                'type_id' => $row['type'] ?? ($row['type'] == 'Residential' ? 1 : 2),
                'type' => $row['type'],
                'title' => "{$row['category']} - {$row['plotno']}",
                'plot' => $row['plotno'],
                'street' => $row['street'],
                'category' => $row['category'],
                'area' =>  $row['size'],
                'permitted_height' =>  $row['permittedheight'],
                'price' => str_replace(',', '', $row['costofunit']),
                'currency' => $row['currency'] ?? 'PKR',
                'status' => $row['plotstatus'] ?? 'Active'
            ];

            $property = new ProjectProperty($_data);
            $property->save();

            foreach ($features as $feature) {
                $pro_feature = \Str::slug($feature->feature, '_');
                $feature_amount = floatval(trim(str_replace(',', '', $row[$pro_feature])));
                if($feature_amount > 0) {
                    $features_data = [
                        'property_id' => $property->id,
                        'feature_id' => $feature->id,
                        'amount' => $feature_amount,
                        'type' => 'Fixed',
                    ];
                    \DB::table('property_features')->insert($features_data);
                }
            }

        }
        die('Done - ' . $sector);
    }
    
}
