<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function form_add_user(){
        return view('admin.add_new_user');
    }
    public function form_edit_user($id){
        $data = DB::table('users')->select('*')->where('id',$id)->first();
        return view('admin.edit_user',compact('data'));
    }
    public function save_user(Request $data){
        $validate= $data->validate([
            'name'=>['required','min:5'],
            'email'=>['required'],
           
            'password' => ['required', 'min:8',],
            'password_confirmation'=>['required','same:password'],

            'user_img'=>['required'],
            'birthday'=>['required'],
            'user_rule'=>['required'],
        ],[
           'name.required'=>'Họ tên không được bỏ trống', 
           'name.min'=>'Họ tên ít nhất 6 ký tự',   
           'password.required'=>'Mật khẩu không được bỏ trống',
           'password.min'=>'Mật khẩu trên 8 ký tự',
           'password_confirmation.same'=>'Mật khẩu không khớp',
           'email.required'=>'email không được bỏ trống',
           'email.ends_with'=>'email không đúng định dạng ví dụ:(nguyenvana@gmail.com)',
           'user_img.required'=>'Vui lòng chọn ảnh đại diện',
           'birthday.required'=>'vui lòng nhập ngày tháng năm sinh',
           'user_rule required'=>'vui lòng chọn quyền truy cập',

                 
        ]);
           
            $img_product = $data['user_img'];
            $file_name = $img_product->getClientOriginalName();
            $img_product->move(base_path('public/upload/user'),$file_name);

            

            $dupEmail = DB::table('users')->select('email')->where('email',$data['email'])->first();
            if(isset($dupEmail)){
                return redirect()->back()->withError('Email bạn đăng ký đã tồn tại');
            }else{
                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'user_img' => $file_name,
                    'user_rule' =>$data['user_rule'],
                    'gender' =>$data['gender'],
                    'add_member' =>$data['add_member'],
                    'birthday'=>$data['birthday'],
    
                ]);
                // Mail::send('admin.add_user',[
            //     'name' => $data['name'],
            //     'email' => $data['email'],
            //     'password' => $data['password'],
                
            // ],function($mail) use ($data){
            //     $mail->to($data['email'],$data['name']);
            //     $mail->from($data['email']);
            //     $mail->subject('Thành viên mới');
            // });
                return redirect('/users')->withSuccess('Thêm thành viên thành công');
            }

          
    }
    public function update_user(Request $data,$id){
        $validate= $data->validate([
            'name'=>['required','min:5'],
            'user_rule'=>['required'],
        ],[
           'name.required'=>'Họ tên không được bỏ trống', 
           'name.min'=>'Họ tên ít nhất 6 ký tự',        
           'user_img.required'=>'Vui lòng chọn ảnh đại diện',
           'user_rule required'=>'vui lòng chọn quyền truy cập',

                 
        ]);

        if($data->has('user_img')){
            $img_product = $data->user_img;
            $file_name = $img_product->getClientOriginalName();
            $img_product->move(base_path('public/upload/user'),$file_name);
        }else{
            $user = DB::table('users')->select('*')->where('id',$id)->first();
            $file_name=$user->user_img;
        }
       

        User::find($id)->update([
            'name' => $data['name'],
            'user_img' => $file_name,
            'user_rule' =>$data['user_rule'],
            'gender' =>$data['gender'],

        ]);
        // Mail::send('admin.add_user',[
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => $data['password'],
        
    // ],function($mail) use ($data){
    //     $mail->to($data['email'],$data['name']);
    //     $mail->from($data['email']);
    //     $mail->subject('Thành viên mới');
    // });
        return redirect('/users')->withSuccess('Cập nhật thông tin thành công');
           
    }
    public function index(){
        $users=User::all();
        return view('admin.users',compact('users'));
    }
}
