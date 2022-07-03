<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\UserClient;

class HomeController extends Controller
{
    public function getRegister(){
        return view('client.account.register');
    }

    public function postRegister(Request $request){

        $rules = [
            "fullname" => "required|min:3|max:255",
            "address" => "required|min:15|max:255",
            "phone" => "required|min:10|max:10",
            "email" => "required|min:10|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",
            "password" => "min:8|max:255|required",
            "cf_password" => "required|min:8|max:255|same:password",
        ];
        $messages = [
            "fullname.required" =>":attribute là bắt buộc.",
            "fullname.min" =>":attribute tối thiểu :min ký tự.",
            "fullname.max" =>":attribute tối đa :max ký tự",
            // "fullname.regex" => ":attribute không hợp lệ.",
            "address.required" =>":attribute là bắt buộc.",
            "address.min" =>":attribute tối thiểu :min ký tự.",
            "address.max" =>":attribute tối đa :max ký tự.",
            "phone.required" =>":attribute là bắt buộc.",
            "phone.min" =>":attribute tối thiểu :min ký tự.",
            "phone.max" =>":attribute tối đa :max ký tự",
            "email.required" =>":attribute là bắt buộc.",
            "email.min" =>":attribute tối thiểu :min ký tự.",
            "email.max" =>":attribute tối đa :max ký tự.",
            "email.regex" =>":attribute không đúng định dạng.",
            "email.unique" =>":attribute đã tồn tại.",
            "code" => "required|size:6|regex:[0-9]",
            "password.required" => ":attribute là bắt buộc.",
            "password.required_with" => ":attribute yêu cầu với xác thực mật khẩu.",
            "password.min" =>":attribute tối thiểu :min ký tự.",
            "password.max" =>":attribute tối đa :max ký tự",
            "password.same" =>":attribute không khớp.",
            "cf_password.required" => ":attribute là bắt buộc.",
            "cf_password.min" =>":attribute tối thiểu :min ký tự.",
            "cf_password.max" =>":attribute tối đa :max ký tự",
            "cf_password.same" => ":attribute không khớp.",
            "code.required" => ":attribute là bắt buộc.",
            "code.size" => ":attribute không hợp lệ.",
            "code.regex" => ":attribute không hợp lệ.",
            "code" => "Mã Code",
        ];
        $attributes = [
            "fullname" => "Họ và tên",
            "address" => "Địa chỉ",
            "phone" => "Số điện thoại",
            "email" => "Email",
            "password" => "Mật khẩu",
            "cf_password" => "Xác thực mật khẩu",
        ];
        $request->validate($rules, $messages, $attributes );
        // dd($request->email);
        $email = $request->email;
        $pass = $request->password;
        $fullname = $request->fullname;
        $address = $request->address;
        $phone = $request->phone;
        // $emailDB = UserClient::checkIssetEmail($email);
        $emailDB = true;
        if (!$emailDB){
            session()->flash('msgErr','Đăng ký không thành công. Email đã tồn tại.');
            return redirect()-> back();
        }else{
            // $isAddSuccsess = UserClient::addUser($email,$pass,$fullname,$address,$phone);
            $isAddCodeSuccess = UserClient::createCode($email);
            $isAddSuccsess = true;
            $isAddCodeSuccess = true;
            if ($isAddSuccsess && $isAddCodeSuccess){
                session()->flash('msg','Đăng ký thành công. Nhập mã code được gửi vào tài khoản để kích hoạt.');
                session()->flash('emailActive',$email);
                // return redirect('/kich-hoat')->with(['email', $email]);
                return view('client.account.active');
            }
            // else{
            //     session()->flash('msgErr','Đăng ký không thành công. Đã có lỗi xảy ra. Vui lòng thử lại sau.');
            //     return redirect()-> back();
            // }
        }
    }

    public function postActive(Request $request){
        $errEmail = "";
        $errCode = "";
        $patternEmail = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
        if (strlen($request->emailActive) == 0 || preg_match($patternEmail, $request->emailActive)) {
            $errEmail = "Vui lòng kiểm tra lại email.";
        }

        if (strlen($request->code) != 6){
            $errCode = "Vui lòng kiểm tra lại mã code.";
        }

        if($errCode != "" && $errEmail !=""){
            return view('client.account.active', compact('errCode', 'errEmail'));
        }else{
            $email = $request->emailActive;
            $code = $request->code;
            $info = UserClient::getCode($email);
            if($info == null){
                $errActive = "Kích hoạt không thành công. Vui lòng kiểm tra lại.";
                return view('client.account.active', compact('errActive'));
            }
            // dd($info); 944954
            if ($info->email != $email || md5($code) != $info->code){
                $errActive = "Kích hoạt không thành công. Vui lòng kiểm tra lại.";
                return view('client.account.active', compact('errActive'));
            }else{
                $msg = "Kích hoạt thành công.";
                $result = UserClient::updateApprovedUser($email);
                if($result){
                    return view('client.account.notice', compact('msg'));
                }
                $errActive = "Kích hoạt không thành công. Vui lòng thử lại sau.";
                return view('client.account.active', compact('errActive'));
            }
            dd($info);
        }
    }
}
