<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function contact(){
        return view('client.others.contact');
    }

    public function send_mail(Request $data){
        $validate= $data->validate([
            'name'=>['required','min:5'],
            'email'=>['required'],
            'phone'=>['required'],
            'comment'=>['required'],
        ],
        
        [
           'name.required'=>'Họ tên không được trống', 
           'name.min'=>'Họ tên ít nhất 6 ký tự',   
           'email.required'=>'Email không được trống',
           'email.ends_with'=>'Email không đúng định dạng ví dụ:(nguyenvana@gmail.com)',
           'phone.required'=>'Số điện thoại không được trống',
           'phone.ends_with'=>'Số điện thoại không đúng định dạng ví dụ:(0988888888)',
           'comment.required'=>'Lời nhắn không được trống'
        ]);

            Mail::send('client.default.feedback-mail',[
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'comment' => $data['comment']

            ],function($mail) use ($data){
                $mail->to($data['email']);
                $mail->subject('THƯ GÓP Ý CỦA KHÁCH HÀNG');
            });

            return redirect()->route('contact')->withSuccess('Gửi liên hệ thành công.Chúng tôi sẽ phản hồi bạn sớm nhất có thể.');

            // Mail::send('client.default.feedback-mail',[
            //     'name' => $data['name'],
            //     'email' => $data['email'],
            //     'phone' => $data['phone'],
            //     'comment' => $data['comment']

            // ],function($mail) use ($data){
            //     $mail->to($data->email);
            //     $mail->subject('THƯ GÓP Ý CỦA KHÁCH HÀNG');
            // });

            // echo 'Okie';
    }

}
