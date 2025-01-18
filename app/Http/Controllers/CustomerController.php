<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
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
        if(!\Auth::check()) return redirect()->to('/customer/login');

        return $this->account();
    }

    public function login()
    {
        if(\request()->method() == 'POST'){
            $validate_inputs = [
                'email' => "required|email",
                'password' => "required|min:8|max:16",
            ];
            $validator = \Validator::make(request()->all(), $validate_inputs);
            if ($validator->fails()) {
                return api_response(['status' => false, 'errors' => $validator->errors()]);
            }
            req('username', null, req('email'));
            $credentials = request()->only('username', 'password');
            //$credentials['status'] = 'Active';
            if (\Auth::attempt($credentials, intval(req('remember')))) {
                $user = \Auth::user();
                if (!in_array($user->status, ['Active'])) {
                    $res = ['status' => false, 'message' => "Your account has been {$user->status}"];
                    switch ($user->status) {
                        case 'Pending':
                            $res['message'] = "Kindly check your email and verify your account!";
                            $res['message'] = "Your account has been under review!";
                            break;
                    }
                    set_notification($res['message']);
                    return redirect()->back();
                    return api_response($res);
                }
                $id = $user->id;
                $user_type_id = $user->usertype->id;
                $user->full_name = trim("$user->first_name} {$user->last_name}");

                activity_log('login', 'users', $id, $id);
                $redirect = str_replace(url(''), '', redirect()->intended(url('customer/account'))->getTargetUrl());

                set_notification('Successfully login!', 'success');
                return redirect()->to($redirect);

                return api_response(['status' => true, 'message' => 'Successfully login!', 'redirect' => $redirect, 'data' => $user]);
            } else {
                set_notification('Incorrect username or password. Please try again!');
                return redirect()->back();
                return api_response(['status' => false, 'message' => 'Incorrect username or password. Please try again!']);
            }


        }

        $page = [];
        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('customer/login', compact('page'));
    }

    public function registration()
    {
        if(\request()->method() == 'POST'){

            $JSON = ['status' => false];
            $id = \Auth::id();
            $validate_inputs = [
                'first_name' => "required",
                'email' => "required|email",
                'password' => "required|min:8|max:16",
                'phone' => "required",
            ];
            $validator = \Validator::make(request()->all(), $validate_inputs);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            req('username', null, req('email'));

            $DB_data = DB_FormFields('users')['data'];
            $DB_data['password'] = \Hash::make($DB_data['password']);
            $DB_data['api_token'] = \Str::random(60);
            $DB_data['verification_token'] = \Str::random(40);
            $DB_data['user_type_id'] = 5;
            $DB_data['status'] = 'Active';

            $user = \App\User::updateOrCreate(['id' => $id], $DB_data);
            $user->verification_link = url("verify?token={$user->verification_token}&id={$user->id}");

            if ($user->id > 0) {
                $JSON = ['status' => true
                    //, 'message' => 'Account has been created. Kindly check your e-mail for verified account'
                    , 'message' => 'Account has been created.'
                    , 'redirect' => '/customer/login'];
                set_notification($JSON['message'], 'success');

                $__user__ = ['password' => req('password')];
                $_user = collect($user)->merge($__user__)->all();
                $mail_temp = \App\EmailTemplate::template($_user, 'New Account');
                if ($mail_temp->status == 'Active') {
                    $mail_data = [
                        'to' => $user->email,
                        //'cc' => opt('admin_cc_email'),
                        'subject' => $mail_temp->subject,
                        'message' => $mail_temp->message,
                    ];
                    if (send_mail($mail_data)) {
                        $JSON['mail'] = true;
                        $JSON['mail_message'] = 'Email has been sent to: ' . $mail_data['to'];
                    } else {
                        $JSON['mail'] = false;
                        $JSON['mail_message'] = 'Email sending failed!';
                    }
                }
                return redirect()->to($JSON['redirect']);
            }
        }
        $page = [];
        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('customer/register', compact('page'));
    }

    function logout()
    {
        activity_log('logout', 'users', \Auth::id(), \Auth::id());
        \Auth::logout();
        \Session::forget('user_type_id');
        return \Redirect::to(url('customer/login'));
    }

    function edit_profile()
    {
        if(!\Auth::check()) return redirect()->to('/customer/login');
        $user = \Auth::user();
        if($user->id > 0 && $user->user_type_id == 5) {

            if(\request()->isMethod('POST')){
                $validate_inputs = [
                    'first_name' => "required",
                    'email' => "required|email|unique:{$user->getTable()},email,{$user->id},id",
                    'phone' => "required",
                ];
                $validator = \Validator::make(request()->all(), $validate_inputs);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                req('username', null, req('email'));
                $DB_data = DB_FormFields($user->getTable())['data'];

                if(\Hash::check(req('current_password'), $user->password)) {
                    $DB_data['password'] = \Hash::make($DB_data['password']);
                }
                $files = upload_files(['photo'], "assets/front/{$user->getTable()}/");
                if (count($files) > 0) {
                    foreach ($files as $name => $file) {
                        if ($file) {
                            $DB_data[$name] = $file->getFilename();
                        }
                    }
                }

                $affected = $user->update($DB_data);

                $rel_DB_data = DB_FormFields('customer_rel', [], \request()->input('rel'))['data'];
                \DB::table('customer_rel')->updateOrInsert(['user_id' => $user->id], $rel_DB_data);
                if($affected) {
                    set_notification('Profile has been updated!', 'success');
                }
                return redirect()->back();
            }

            $rel = \DB::table('customer_rel')->where(['user_id' => $user->id])->first();
            $user = json_decode(collect($user)->merge($rel)->toJson());

            \App\Theme::template($page->template ?? 'default');
            return \App\Theme::view('customer/edit_profile', compact('user'));
        }
    }

    function forgot()
    {
        $user = \App\User::where('email', '=', request()->email)->first();

        if (count($user) < 1) {
            return api_response(['status' => false, 'message' => trans('User does not exist')]);
        }

        //Create Password Reset Token
        $db_data = [
            'email' => request()->email,
            'token' => \Str::random(60),
            'created_at' => \Carbon\Carbon::now()
        ];
        \DB::table('password_resets')->insert($db_data);

        //Get the token just created above
        //$tokenData = \DB::table('password_resets')->where('email', request()->email)->first();
        $link = url("reset?token={$db_data['token']}&id=" . $user->id);

        $_user = collect($user)->merge(['link' => $link])->all();
        $mail_temp = \App\EmailTemplate::template($_user, 'Forgot Password');
        if ($mail_temp->status == 'Active') {
            $mail_data = [
                'to' => $user->email,
                //'cc' => opt('admin_cc_email'),
                'subject' => $mail_temp->subject,
                'message' => $mail_temp->message,
            ];

            if (send_mail($mail_data)) {
                $JSON['status'] = true;
                $JSON['message'] = trans('A reset link has been sent to your email address.');
                $JSON['redirect'] = '';
            } else {
                $JSON['status'] = false;
                $JSON['message'] = trans('A Network Error occurred. Please try again.');
                $JSON['redirect'] = '';
            }
        }

        return api_response($JSON);
    }


    public function account(){
        if(!\Auth::check()) return redirect()->to('/customer/login');

        $page = [];
        $user = \App\User::user_row(\Auth::id(), 'customer_rel');

        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('customer/dashboard', compact('page', 'user'));
    }

}
