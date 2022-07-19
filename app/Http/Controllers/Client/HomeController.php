<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\UserClient;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        return view();
    }

    public function profile()
    {
        return view('client.account.profile');
    }

    public function getRegister()
    {
        if (Session::has('userId')) {
            return redirect()->route('home_client');
        }
        return view('client.account.register');
    }

    public function postRegister(Request $request)
    {

        $rules = [
            "fullname" => "required|min:3|max:255",
            "address" => "required|min:15|max:255",
            "phone" => "required|min:10|max:10",
            "email" => "required|min:10|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",
            "password" => "min:8|max:255|required",
            "cf_password" => "required|min:8|max:255|same:password",
            "file" => "required|mimes:jpeg,png,jpg|max:1024"
        ];
        $messages = [
            "fullname.required" => ":attribute là bắt buộc.",
            "fullname.min" => ":attribute tối thiểu :min ký tự.",
            "fullname.max" => ":attribute tối đa :max ký tự",
            // "fullname.regex" => ":attribute không hợp lệ.",
            "address.required" => ":attribute là bắt buộc.",
            "address.min" => ":attribute tối thiểu :min ký tự.",
            "address.max" => ":attribute tối đa :max ký tự.",
            "phone.required" => ":attribute là bắt buộc.",
            "phone.min" => ":attribute tối thiểu :min ký tự.",
            "phone.max" => ":attribute tối đa :max ký tự",
            "email.required" => ":attribute là bắt buộc.",
            "email.min" => ":attribute tối thiểu :min ký tự.",
            "email.max" => ":attribute tối đa :max ký tự.",
            "email.regex" => ":attribute không đúng định dạng.",
            "email.unique" => ":attribute đã tồn tại.",
            // "code" => "required|size:6|regex:[0-9]",
            "password.required" => ":attribute là bắt buộc.",
            "password.required_with" => ":attribute yêu cầu với xác thực mật khẩu.",
            "password.min" => ":attribute tối thiểu :min ký tự.",
            "password.max" => ":attribute tối đa :max ký tự",
            "password.same" => ":attribute không khớp.",
            "cf_password.required" => ":attribute là bắt buộc.",
            "cf_password.min" => ":attribute tối thiểu :min ký tự.",
            "cf_password.max" => ":attribute tối đa :max ký tự",
            "cf_password.same" => ":attribute không khớp.",
            "code.required" => ":attribute là bắt buộc.",
            "code.size" => ":attribute không hợp lệ.",
            "code.regex" => ":attribute không hợp lệ.",
            // "code" => "Mã Code",
            "file.required" => "::attribute là bắt buộc.",
            // "file.image" => "::attribute phải là ảnh.",
            "file.mimes" => "::attribute phải là png, jpeg, jpg.",
            "file.max" => "::attribute tối đa 1MB."
        ];
        $attributes = [
            "fullname" => "Họ và tên",
            "address" => "Địa chỉ",
            "phone" => "Số điện thoại",
            "email" => "Email",
            "password" => "Mật khẩu",
            "cf_password" => "Xác thực mật khẩu",
            "file" => "Ảnh đại diện"
        ];
        $request->validate($rules, $messages, $attributes);
        // dd($request->email);
        $email = $request->email;
        $pass = $request->password;
        $fullname = $request->fullname;
        $address = $request->address;
        $phone = $request->phone;
        $image = $request->file('file')->getClientOriginalName();
        $emailDB = UserClient::checkIssetEmail($email);
        // $emailDB = true;
        if (!$emailDB) {
            session()->flash('msgErr', 'Đăng ký không thành công. Email đã tồn tại.');
            return redirect()->back();
        } else {
            $isAddSuccsess = UserClient::addUser($email, $pass, $fullname, $address, $phone, $image);
            // $isAddSuccsess = true;
            if ($isAddSuccsess) {
                $code = UserClient::createCode($email);
                Mail::send('client.account.mailUpdatePass', [
                    'email' => $request->email,
                    'code' => $code,

                ], function ($mail) use ($request) {
                    $mail->to($request->email);
                    $mail->from($request->email);
                    $mail->subject('Mã kích hoạt tài khoản.');
                });
                $request->file('file')->move(public_path('public/upload/client/user'), $image);
                // dd($image);
                session()->flash('msg', 'Đăng ký thành công. Nhập mã code được gửi vào tài khoản để kích hoạt.');
                session()->flash('emailActive', $email);
                // return redirect('/kich-hoat')->with(['email', $email]);
                return view('client.account.active');
            } else {
                session()->flash('msgErr', 'Đăng ký không thành công. Đã có lỗi xảy ra. Vui lòng thử lại sau.');
                return redirect()->back();
            }
        }
    }

    public function postActive(Request $request)
    {
        $errEmail = "";
        $errCode = "";
        $patternEmail = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
        if (strlen($request->emailActive) == 0 || preg_match($patternEmail, $request->emailActive)) {
            $errEmail = "Vui lòng kiểm tra lại email.";
        }

        if (strlen($request->code) != 6) {
            $errCode = "Vui lòng kiểm tra lại mã code.";
        }

        if ($errCode != "" && $errEmail != "") {
            return view('client.account.active', compact('errCode', 'errEmail'));
        } else {
            $email = $request->emailActive;
            $code = $request->code;
            $info = UserClient::getCode($email);
            if ($info == null) {
                $errActive = "Kích hoạt không thành công. Vui lòng kiểm tra lại.";
                return view('client.account.active', compact('errActive'));
            }
            $date = date('Y-m-d H:i:s');
            if (strtotime($date) >= strtotime($info->code_expried)) {
                // dd(strtotime($date), strtotime($info->code_expried));
                // session()->flash('msg', "Mã kích hoạt đã hết hạn.");
                // session()->flash('type', 'danger');
                $errActive = "Mã kích hoạt hết hạn.";
                return view('client.account.active', compact('errActive')); //, compact('errActive'));
            }
            // dd($info); 944954
            if ($info->email == $email && md5($code) == $info->code) {
                $msg = "Kích hoạt thành công.";
                $result = UserClient::updateApprovedUser($email);
                if ($result) {
                    UserClient::deleteCode($email);
                    return view('client.account.notice', compact('msg'));
                }
                $errActive = "Kích hoạt không thành công. Vui lòng thử lại sau.";
                return view('client.account.active', compact('errActive'));
            } else {
                $errActive = "Kích hoạt không thành công. Vui lòng kiểm tra lại.";
                return view('client.account.active', compact('errActive'));
            }
            dd($info);
        }
    }

    public function getLogin()
    {
        if (Session::has('userId')) {
            return redirect()->route('home_client');
        }
        return view('client.account.login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            "email" => "required|min:10|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",
            "password" => "required|min:8|max:255",
        ];
        $messages = [
            "email.required" => ":attribute là bắt buộc.",
            "email.min" => ":attribute tối thiểu :min ký tự.",
            "email.max" => ":attribute tối đa :max ký tự.",
            "email.regex" => ":attribute không đúng định dạng.",
            "password.required" => ":attribute là bắt buộc.",
            "password.min" => ":attribute tối thiểu :min ký tự.",
            "password.max" => ":attribute tối đa :max ký tự",
        ];
        $attributes = [
            "email" => "Email",
            "password" => "Mật khẩu"
        ];
        $request->validate($rules, $messages, $attributes);
        $email = $request->email;
        $pass = $request->password;
        $user = UserClient::login($email, $pass);
        if ($user == null) {
            return view('client.account.login')->with('msgErr', 'Tài khoản không tồn tại.');
        }
        if ($user->email == $email && $user->password == md5($pass)) {
            Session::put('userId', $user->id);
            Session::put('userEmail', $user->email);
            Session::put('userFullname', $user->fullname);
            Session::put('userImage', $user->image);
            Session::put('userPhone', $user->phone);
            Session::put('userAddress', $user->address);
            // dd($user);
            // return view('client.account.dcm');
            return redirect()->route('home_client')->with('success', "Đăng nhập thành công.");
        } else {
            return view('client.account.login')->with('msgErr', 'Đăng nhập không thành công. Vui lòng kiểm tra lại.');
        }
        dd($user);
    }

    public function getForgotPass()
    {
        return view('client.account.emailForgotPass');
    }

    public function postForgotPass(Request $request)
    {
        $rules = [
            'email' => ['required', 'min:10', 'max:255', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'code' => ['required', 'min:6', 'max:6'],
            'password' => ['required', 'min:8', 'max:255']
        ];
        $messages = [
            'required' => ':attribute là bắt buộc.',
            'min' => ':attribute tối thiểu :min ký tự.',
            'max' => ':attribute tối đa :max ký tự.',
            'regex' => ':attribute không đúng định dạng.'
        ];
        $attributes = [
            "email" => "Email",
            "code" => "Mã xác thực",
            "password" => "Mật khẩu"
        ];
        // $rst = $request->validate($rules,$messages);
        // return response()->json($rst);
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        // $validator->validate();
        if ($validator->fails()) {
            return response()->json(['err' => $validator->errors()->all()]);
        } else {
            $email = $request->email;
            $code = $request->code;
            $codeForgotPass = UserClient::getCuFogotPass($email, $code);

            if ($codeForgotPass == null) {
                return response()->json([
                    'codeErr' => 1,
                    'msg' => "Mã xác thức không đúng. Vui lòng kiểm tra lại."
                ]);
            }
            $date = date('Y-m-d H:i:s');
            $dateExpired = $codeForgotPass->code_expired;
            if (strtotime($date) >= strtotime($dateExpired)) {
                return response()->json([
                    'codeErr' => 1,
                    'msg' => "Mã xác thực đã hết hạn."
                ]);
            }
            UserClient::updatePass($email, $request->password);
            // UserClient::find($email)->updatePass(['password'=> md5($request->password)]);
            Mail::send('client.account.mailUpdatePass', [
                'email' => $request->email,
                'code' => $code,

            ], function ($mail) use ($request) {
                $mail->to($request->email);
                $mail->from($request->email);
                $mail->subject('Cập nhật mật khẩu thành công.');
            });
            UserClient::deleteCodeForgotPass($request->email);
            return response()->json([
                'codeErr' => 0,
                'email' => $request->email,
                'code' => $request->code,
                'pass' => $request->password
            ]);
        }
        // $request->validate($rules, $messages);
        // return response()->json('cc');
        // $email = $request->email;
        // $issetEmail = UserClient::checkIssetEmail($email);
        // if (!$issetEmail){
        //     $data = [
        //         'msg' => 'Email does not exist',
        //     ];
        //     return response()->json($data, 400);
        // return view('client.account.emailForgotPass')->with('msgErr', 'Email không tồn tại.');
        // }
        // $code = UserClient::createCodeForgotPass($email);

    }

    public function postGetCodeForgotPass(Request $request)
    {
        $rules = [
            'email' => ['required', 'min:10', 'max:255', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix']
        ];
        $messages = [
            'required' => ':attribute là bắt buộc.',
            'min' => ':attribute tối thiểu :min ký tự.',
            'max' => ':attribute tối đa :max ký tự.',
            'regex' => ':attribute không đúng định dạng.'
        ];
        $attributes = [
            "email" => "Email"
        ];
        // // $rst = $request->validate($rules,$messages);
        // // return response()->json($rst);
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        // $validator->validate();
        try {
            if ($validator->fails()) {
                return response()->json(['err' => $validator->errors()->all()], 400);
            }
            $emailDB = UserClient::checkIssetEmail($request->email);
            if ($emailDB) {
                return response()->json([
                    'codeErr' => 1,
                    'msg' => 'Email ko ton tai.',
                ]);
            }
            // $code = 12345;
            // $code = UserClient::createCodeForgotPass($request->email);
            Mail::send('client.account.mailUpdatePass', [
                'email' => $request->email,
                'code' => UserClient::createCodeForgotPass($request->email)

            ], function ($mail) use ($request) {
                $mail->to($request->email);
                $mail->from($request->email);
                $mail->subject('Mã xác thực đặt lại mật khẩu.');
            });
            return response()->json(
                [
                    'code' => UserClient::createCodeForgotPass($request->email),
                    'codeErr' => 0,
                    'msg' => "Mã xác thực đã được gửi về email."
                ]
            );
        } catch (\Exception $e) {
            return response()->json(['code' => 500, 'error' => $e->getMessage()], 500);
        }
    }

    public function getLogout()
    {
        Session::forget('userId');
        Session::forget('userEmail');
        Session::forget('userFullname');
        Session::forget('userPhone');
        Session::forget('userAddress');
        return redirect()->route('home_client');
    }

    public function postReview(Request $request)
    {
        $user = Auth::user();
        dd($user);
    }
}
