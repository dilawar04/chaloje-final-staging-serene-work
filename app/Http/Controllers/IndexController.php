<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Validator;


class IndexController extends Controller
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
        $pages = \request()->segments();
        $page_name = end($pages);

        if (!empty($page_name) && $page_name != 'index') {
            $method = str_replace('-', '_', $page_name);
            $_method = [\App\Http\Controllers\IndexController::class, $method];
            if (method_exists(\App\Http\Controllers\IndexController::class, $method) && is_callable($_method)) {
                return call_user_func($_method);
            } else {
                return $this->page($page_name);
            }
        } else {
            return $this->home();
        }
    }

    private function home(){

        $front_id = opt('front_page');
        $page = \App\Theme::page($front_id);

        \App\Theme::setMetaTags($page->meta_title, $page->meta_keywords, $page->meta_description, $page->thumbnail);

        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('index', compact('page'));
    }

    private function page($slug){

        $where = " AND pages.slug=" . dbEscape($slug);
        $page = \App\Theme::page(null, $where);

        \App\Theme::setMetaTags($page->meta_title, $page->meta_keywords, $page->meta_description, $page->thumbnail);

        \App\Theme::template($page->template ?? 'default');
        return \App\Theme::view('page', compact('page'));
    }


    public function do_contact()
    {
        // dd(request()->all());
        // $watches = \App\Enquiry::get();
        // dd($watches);
        $validator = \Validator::make(request()->all(), [
            'name' => "required",
            'email' => "required|email",
            //'phone' => "required",
            'subject' => "required",
            'phone' => "required",
            'message' => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = req('name');
        $email = req('email');
        $subject = req('subject');
        $phone = req('phone');
        $message = req('message');

        $Enquiry = new \App\Enquiry();
        $Enquiry->name = $name;
        $Enquiry->email = $email;
        $Enquiry->subject = $subject;
        $Enquiry->phone = $phone;
        $Enquiry->message = $message;
        // dd($booking);
        $Enquiry->save();

        // \App\Enquiry::create([
        //     'name' => req('name'),
        //     'email' => req('email'),
        //     'subject' => req('subject'),
        //     'phone' => req('phone'),
        //     'message' => req('message'),
        // ]);
        // dd($a);

        // \App\Enquiry::create(request()->all());

        // $mail_data = [
        //     'to' => opt('contact_email'),
        //     'from' => [$email, $name],
        //     'cc' => opt('admin_cc_email'),
        //     'subject' => 'Contact - From',
        //     'message' => "Name: {$name}<br/>Email: {$email}<br/>Phone: {$phone}<br/><br/>{$message}",
        // ];
        // if (send_mail($mail_data)) {
        //     $JSON['status'] = true;
        //     set_notification('Email has been sent!', 'success');
        //     //$JSON['message'] = 'Email has been sent!';
        // } else {
        //     $JSON['status'] = false;
        //     set_notification('Email sending failed!', 'error');
        //     //$JSON['message'] = 'Email sending failed!';
        // }

        return redirect()->back()->withSuccess('IT WORKS!');
        // return \redirect()->back();
        //return $JSON;
    }

    function subscribers($action = 'subscribe')
    {
        $validator = \Validator::make(request()->all(), [
            'email' => "required|email",
        ]);
        if ($validator->fails()) {
            return api_response(['status' => false, 'errors' => $validator->errors()]);
        }

        $email = req('email');
        if($action == 'subscribe') {
            $subscriber = \App\Subscriber::create(['email' => $email]);
            $JSON = ['status' => true, 'message' => 'Thanks for subscribing'];
            set_notification('Thanks for subscribing!', 'success');
        } else if($action == 'unsubscribe') {
            $subscriber = \App\Subscriber::where(['email' => $email])->first();
            \App\Subscriber::where(['email' => $email])->softDeletes();
            $JSON = ['status' => true, 'message' => 'Unsubscribe successfully'];
            set_notification('Unsubscribe successfully!', 'success');
        }

        $mail_temp = \App\EmailTemplate::template($subscriber, $action);
        if ($mail_temp->status == 'Active') {

            $mail_data = [
                'to' => $email,
                'from' => [opt('from_email'), opt('from')],
                //'cc' => opt('admin_cc_email'),
                'subject' => $mail_temp->subject,
                'message' => $mail_temp->message,
            ];
            if (send_mail($mail_data)) {
                $JSON['status'] = true;
                $JSON['message'] = 'Email has been sent!';
            } else {
                $JSON['status'] = false;
                $JSON['message'] = 'Email sending failed!';
            }
        }

        //return $JSON;
        return \redirect()->back();
    }

}
