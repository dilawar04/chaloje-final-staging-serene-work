<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AgentController extends Controller
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
        if(!\Auth::check()) return redirect()->to('/dealer/login');
        return \View::make('errors.404');
        //return $this->account();
    }

    public function form($id = 0)
    {
        $dealer_id = \Auth::id();

        if(\request()->method() == 'POST'){
            $JSON = ['status' => false];
            req('username', null, req('email'));
            $validate_inputs = [
                'first_name' => "required",
                'email' => "required|email",
                'username' => "required|unique:users,username,{$id},id",
                //'password' => "required|min:8|max:16",
                'phone' => "required",
            ];
            if($id > 0){
                unset($validate_inputs['password']);
            }
            $validator = \Validator::make(request()->all(), $validate_inputs);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
                //return api_response(['status' => false, 'errors' => $validator->errors()]);
            }

            $DB_data = DB_FormFields('users')['data'];

            if($id > 0){
                if(!empty(req('password'))){
                    $DB_data['password'] = \Hash::make($DB_data['password']);
                }
            } else {
                //$DB_data['password'] = \Hash::make($DB_data['password']);
                $DB_data['password'] = \Hash::make(\Str::random(8));
                $DB_data['api_token'] = \Str::random(60);
                $DB_data['verification_token'] = \Str::random(40);
                $DB_data['user_type_id'] = 7;
            }

            $files = upload_files(['photo'], "assets/front/users/");
            if (count($files) > 0) {
                foreach ($files as $name => $file) {
                    if ($file->status) {
                        $DB_data[$name] = $file->getFilename();
                    } else {
                        set_notification($file->error);
                    }
                }
            }

            $user = \App\User::updateOrCreate(['id' => $id], $DB_data);

            $rel_DB_data = DB_FormFields('agent_rel', [], \request()->input('rel'))['data'];
            $rel_DB_data['dealer_id'] = $dealer_id;
            \DB::table('agent_rel')->updateOrInsert(['user_id' => $user->id], $rel_DB_data);

            $user->verification_link = url("verify?token={$user->verification_token}&id={$user->id}");

            if ($user->id > 0) {
                $JSON = ['status' => true
                    , 'message' => 'Agent has been created'
                    , 'redirect' => '/dealer/login'];
                set_notification($JSON['message'], 'success');

                $__user__ = ['password' => req('password')];
                $_user = collect($user)->merge($__user__)->all();
                $mail_temp = \App\EmailTemplate::template($_user, 'New Agent Account');
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
                //return redirect()->to($JSON['redirect']);
                return redirect()->to('dealer/account');
            }
        }

        $row = $page = [];
        if($id > 0){
            $row = \App\User::user_row($id, 'agent_rel');
        }

        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('dealer/agent_form', compact('page', 'row'));
    }

    public function delete($id){
        $dealer_id = \Auth::id();
        $aff = \App\User::where(['users.id' => $id, 'agent_rel.dealer_id' => $dealer_id])
            ->join('agent_rel', 'agent_rel.user_id', '=', 'users.id')
            ->delete();

        if($aff > 0)
            set_notification('Agent has been deleted', 'success');
        else{
            set_notification('Some error occurred!');
        }
        return redirect()->back();
    }

}
