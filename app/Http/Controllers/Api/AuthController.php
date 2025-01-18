<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        include_once(theme_dir('includes/shortcodes.php', true));
    }

    function registration()
    {
        req('username', null, req('email'));

        $JSON = ['status' => false];
        $id = \Auth::id();
        $validate_inputs = [
            'email' => "required|email",
            'username' => "required|unique:users,username,{$id},id",
            'password' => "required|min:8|max:16",
            'first_name' => "required",
            'phone' => "required",
            //'gender' => "required",
//            'country' => "required",
//            'city' => "required",
        ];
        $validator = \Validator::make(request()->all(), $validate_inputs);
        if ($validator->fails()) {
            return api_response(['status' => false, 'errors' => $validator->errors()]);
        }

        $DB_data = DB_FormFields('users')['data'];
        $DB_data['password'] = \Hash::make($DB_data['password']);
        $DB_data['api_token'] = \Str::random(60);
        $DB_data['verification_token'] = \Str::random(40);
        $DB_data['user_type_id'] = 5;

        $user = \App\User::updateOrCreate(['id' => $id], $DB_data);

        $user->verification_link = url("verify?token={$user->verification_token}&id={$user->id}");

        if ($user->id > 0) {
            $JSON = ['status' => true
                , 'message' => 'Account has been created. Kindly check your e-mail for verified account'
                , 'redirect' => '/'];

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

            $refer_code = req('code');
            if(!empty($refer_code)) {
                $refer_user = \App\Referral::where(['email' => $user->email, 'code' => $refer_code])->first();
                $refer_user->r_user_id = $user->id;
                $refer_user->update();
            }

            /*$mail_temp = \App\EmailTemplate::template($user, 'Verify Account');
            if ($mail_temp->status == 'Active') {
                $mail_data = [
                    'to' => $user->email,
                    'subject' => $mail_temp->subject,
                    'message' => $mail_temp->message,
                ];
                if (send_mail($mail_data)) {
                    $JSON['mail'] = true;
                    $JSON['mail_message'] = 'Verify email has been sent to: ' . $mail_data['to'];
                } else {
                    $JSON['mail'] = false;
                    $JSON['mail_message'] = 'Verify email sending failed!';
                }
            }*/
        }
        return api_response($JSON);
    }

    function login()
    {
        $validator = \Validator::make(request()->all(), [
            'email' => "required|email",
            'password' => "required|min:8|max:16",
        ]);
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
                return api_response($res);
            }
            $id = $user->id;
            $user_type_id = $user->usertype->id;
            $user->full_name = trim("$user->first_name} {$user->last_name}");

            activity_log('login', 'users', $id, $id);

            $UT_info = user_type_info($user_type_id);
            if ($UT_info['rel_table']) {
                $rel = $UT_info['ORM_object']::where(['user_id' => $id])->first();
                $user = collect($user)->merge($rel)->all();
                $user['id'] = $id;
                $user['socials'] = json_decode($user['socials']);
            }
            //$user['country_short'] = \DB::table('countries')->where(['name' => $user['country']])->selectRaw('LOWER(countries.iso2) as country_short')->first()->country_short;

            $dir = $UT_info['dir'];
            $user['photoURL'] = _img(asset_url("{$dir}/{$user['photo']}"), 200, 200, (empty($user['gender']) ? env('IMG_NA_USER') : env("IMG_NA_" . strtoupper($user['gender']))));

            $hide = ['usertype', 'created_at', 'email_verified_at', 'updated_at', 'username'];
            foreach ($hide as $item) {
                unset($user[$item]);
            }

            $redirect = str_replace(url(''), '', redirect()->intended(url('/'))->getTargetUrl());
            return api_response(['status' => true, 'message' => 'Successfully login!', 'redirect' => $redirect, 'data' => $user]);
        } else {
            return api_response(['status' => false, 'errors' => ['message'=>['Incorrect username or password. Please try again!']]]);
        }
    }

    function logout()
    {
        activity_log('logout', 'users', \Auth::id(), \Auth::id());
        //$user = \Auth::user()->update(['api_token' => \Str::random(60)]);
        //$request->user()->token()->revoke();
        \Auth::logout();

        return api_response(['status' => true, 'message' => 'Successfully logout!', 'redirect' => '/']);
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

    public function resetPassword($token = null)
    {
        $request = \request();
        if($request->method() == 'POST') {
            //Validate input
            $validator = \Validator::make($request->all(), [
                'id' => 'required',
                'password' => "required|min:8|max:16",
                'password_repeat' => "same:password",
            ]);

            if ($validator->fails()) {
                return api_response(['status' => false, 'message' => $validator->errors()]);
            }
        }

        $where = ['id' => req('id')];
        $user = \App\User::where($where)->first();

        $pass_request = \DB::table('password_resets')->where(['token' => $token, 'email' => $user->email])->first();
        if(!$pass_request){
            return api_response(['status' => false, 'message' => 'Invalid request!']);
        }

        $user->password =\Hash::make(req('password'));
        $user->update();
        //Send Email Reset Success Email
        $__user__ = ['password' => req('password')];
        $_user = collect($user)->merge($__user__)->all();
        $mail_temp = \App\EmailTemplate::template($_user, 'Reset Password');

        if ($mail_temp->status == 'Active') {
            $mail_data = [
                'to' => $user->email,
                //'cc' => opt('admin_cc_email'),
                'subject' => $mail_temp->subject,
                'message' => $mail_temp->message,
            ];

            if (send_mail($mail_data)) {
                $JSON['status'] = true;
                $JSON['message'] = 'Email has been sent to: ' . $mail_data['to'];
                $JSON['redirect'] = '/login';
            } else {
                $JSON['status'] = false;
                $JSON['message'] = trans('Email sending failed!');
                $JSON['redirect'] = '/login';
            }
        }
        return api_response($JSON);
    }

    public function verify($resend = false)
    {
        $request = \request();
        //Validate input
        $validator = \Validator::make($request->all(), [
            'id' => 'required',
            'token' => 'required'
        ]);

        //check if payload is valid before moving on
        if ($validator->fails()) {
            return api_response(['status' => false, 'message' => $validator->errors()]);
        };

        $where = ['id' => req('id'), 'verification_token' => req('token')];
        $user = \App\User::where($where)->first();
        if(!$user){
            return api_response(['status' => false, 'message' => 'Invalid request!']);
        }
        if(!empty($user->email_verified_at)){
            return api_response(['status' => true, 'message' => 'Already verified!', 'redirect' => '/login']);
        }
        if(!$resend) {
            $user->email_verified_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            $user->status = 'Active';
            $user->update();


            $refer = \App\Referral::where(['r_user_id' => $user->id])->first();
            $refer_user = \App\User::find($refer->user_id);
            if($refer_user) {
                $packageConfig = $refer_user->packageConfig('points');
                $refer_user = \App\Reward::create([
                    'user_id' => $refer_user->id,
                    'activity' => 'Refer Friend',
                    'point' => $packageConfig->refer_friend,
                    'datetime' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                ]);

                $mail_temp = \App\EmailTemplate::template($refer_user, 'Refer Reward Points');
                if ($mail_temp->status == 'Active') {
                    $mail_data = [
                        'to' => $refer_user->email,
                        //'cc' => opt('admin_cc_email'),
                        'subject' => $mail_temp->subject,
                        'message' => $mail_temp->message,
                    ];
                    send_mail($mail_data);
                }
            }

            //Send Email Reset Success Email
            $mail_temp = \App\EmailTemplate::template($user, 'Verified Account');
        } else {
            $user->verification_link = url("verify?token={$user->verification_token}&id={$user->id}");
            $mail_temp = \App\EmailTemplate::template($user, 'Verify Account');
        }
        if ($mail_temp->status == 'Active') {
            $mail_data = [
                'to' => $user->email,
                //'cc' => opt('admin_cc_email'),
                'subject' => $mail_temp->subject,
                'message' => $mail_temp->message,
            ];

            if (send_mail($mail_data)) {
                $JSON['status'] = true;
                $JSON['message'] = 'Email has been sent to: ' . $mail_data['to'];
                $JSON['redirect'] = '/login';
            } else {
                $JSON['status'] = false;
                $JSON['message'] = trans('Email sending failed!. Please try again.');
            }
        }
        return api_response($JSON);
    }

    public function updateProfile(){

        req('username', null, req('email'));

        $JSON = ['status' => false];

        $id = request()->input('id');

        $DB_data = DB_FormFields('users')['data'];

        $user = \App\User::updateOrCreate(['id' => $id], $DB_data);

        if ($user->id > 0) {
            $JSON = ['status' => true
                , 'message' => 'Account has been successfully updated'
                , 'redirect' => '/'];

            $refer_code = req('code');
            if(!empty($refer_code)) {
                $refer_user = \App\Referral::where(['email' => $user->email, 'code' => $refer_code])->first();
                $refer_user->r_user_id = $user->id;
                $refer_user->update();
            }

            /*$mail_temp = \App\EmailTemplate::template($user, 'Verify Account');
            if ($mail_temp->status == 'Active') {
                $mail_data = [
                    'to' => $user->email,
                    'subject' => $mail_temp->subject,
                    'message' => $mail_temp->message,
                ];
                if (send_mail($mail_data)) {
                    $JSON['mail'] = true;
                    $JSON['mail_message'] = 'Verify email has been sent to: ' . $mail_data['to'];
                } else {
                    $JSON['mail'] = false;
                    $JSON['mail_message'] = 'Verify email sending failed!';
                }
            }*/
        }
        return api_response($JSON);
    }

}
