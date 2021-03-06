<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\UserClient;
use Illuminate\Support\Str;
// use Mail;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class HomeController extends Controller
{
    public function index()
    {
        return view();
    }

    public function profile()
    {
        if (Session::has('userId')) {
            $users=DB::table('customer_user')
            ->select('*')
            ->where('id',Session::get('userId'))
            ->first();
            $order=DB::table('order')
            ->select('*')
            ->where('customer_id',Session::get('userId'))
            ->orderby('id','desc')
            ->get();
            // if($order){
            $order_detail=DB::table('product_inventory')
            ->join('=order_detail','=order_detail.product_id','=','product_inventory.id')
            ->join('product','product.id','=','product_inventory.product_id')
            ->select('product_inventory.*','=order_detail.product_name','=order_detail.quantity','=order_detail.order_id','product.product_image')
            ->get();
            // }
            return view('client.account.profile',compact('users','order','order_detail'));
        }
        else{
            return redirect()->route('getLogin');
        }

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
            "file" => "mimes:jpeg,png,jpg|max:1024"
        ];
        $messages = [
            "fullname.required" => ":attribute l?? b???t bu???c.",
            "fullname.min" => ":attribute t???i thi???u :min k?? t???.",
            "fullname.max" => ":attribute t???i ??a :max k?? t???",
            // "fullname.regex" => ":attribute kh??ng h???p l???.",
            "address.required" => ":attribute l?? b???t bu???c.",
            "address.min" => ":attribute t???i thi???u :min k?? t???.",
            "address.max" => ":attribute t???i ??a :max k?? t???.",
            "phone.required" => ":attribute l?? b???t bu???c.",
            "phone.min" => ":attribute t???i thi???u :min k?? t???.",
            "phone.max" => ":attribute t???i ??a :max k?? t???",
            "email.required" => ":attribute l?? b???t bu???c.",
            "email.min" => ":attribute t???i thi???u :min k?? t???.",
            "email.max" => ":attribute t???i ??a :max k?? t???.",
            "email.regex" => ":attribute kh??ng ????ng ?????nh d???ng.",
            "email.unique" => ":attribute ???? t???n t???i.",
            // "code" => "required|size:6|regex:[0-9]",
            "password.required" => ":attribute l?? b???t bu???c.",
            "password.required_with" => ":attribute y??u c???u v???i x??c th???c m???t kh???u.",
            "password.min" => ":attribute t???i thi???u :min k?? t???.",
            "password.max" => ":attribute t???i ??a :max k?? t???",
            "password.same" => ":attribute kh??ng kh???p.",
            "cf_password.required" => ":attribute l?? b???t bu???c.",
            "cf_password.min" => ":attribute t???i thi???u :min k?? t???.",
            "cf_password.max" => ":attribute t???i ??a :max k?? t???",
            "cf_password.same" => ":attribute kh??ng kh???p.",
            "code.required" => ":attribute l?? b???t bu???c.",
            "code.size" => ":attribute kh??ng h???p l???.",
            "code.regex" => ":attribute kh??ng h???p l???.",
            // "code" => "M?? Code",
            // "file.image" => "::attribute ph???i l?? ???nh.",
            "file.mimes" => "::attribute ph???i l?? png, jpeg, jpg.",
            "file.max" => "::attribute t???i ??a 1MB."
        ];
        $attributes = [
            "fullname" => "H??? v?? t??n",
            "address" => "?????a ch???",
            "phone" => "S??? ??i???n tho???i",
            "email" => "Email",
            "password" => "M???t kh???u",
            "cf_password" => "X??c th???c m???t kh???u",
            "file" => "???nh ?????i di???n"
        ];
        // $request->file('file')->move(base_path('public/upload/user'), $image);
        if($request->has('file')){
            $image_user = $request->file;
            $file_name = $image_user->getClientOriginalName();
            $image_user->move(base_path('public/upload/user'),$file_name);
        }
        $request->validate($rules, $messages, $attributes);
        // dd($request->email);
        $email = $request->email;
        $pass = $request->password;
        $fullname = $request->fullname;
        $address = $request->address;
        $phone = $request->phone;

        // $image = $request->file('file')->getClientOriginalName();
        // $fileExplode = explode('.', $image);
        // $fileExplode[0] = Str::random(50);
        // $image = implode('.', $fileExplode);
        if($request->has('file'))
        {
        $image = $file_name;
        }
        else
        {
        $image = ""; 
        }
        $emailDB = UserClient::checkIssetEmail($email);
        // $emailDB = true;
        if (!$emailDB) {
            session()->flash('msgErr', '????ng k?? kh??ng th??nh c??ng. Email ???? t???n t???i.');
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
                    $mail->subject('M?? k??ch ho???t t??i kho???n.');
                });
              
                session()->flash('msg', '????ng k?? th??nh c??ng. Nh???p m?? code ???????c g???i v??o t??i kho???n ????? k??ch ho???t.');
                session()->flash('emailActive', $email);
                // return redirect('/kich-hoat')->with(['email', $email]);
                return view('client.account.active');
            } else {
                session()->flash('msgErr', '????ng k?? kh??ng th??nh c??ng. ???? c?? l???i x???y ra. Vui l??ng th??? l???i sau.');
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
            $errEmail = "Vui l??ng ki???m tra l???i email.";
        }

        if (strlen($request->code) != 6) {
            $errCode = "Vui l??ng ki???m tra l???i m?? code.";
        }

        if ($errCode != "" && $errEmail != "") {
            return view('client.account.active', compact('errCode', 'errEmail'));
        } else {
            $email = $request->emailActive;
            $code = $request->code;
            $info = UserClient::getCode($email);
            if ($info == null) {
                $errActive = "K??ch ho???t kh??ng th??nh c??ng. Vui l??ng ki???m tra l???i.";
                return view('client.account.active', compact('errActive'));
            }
            $date = date('Y-m-d H:i:s');
            if (strtotime($date) >= strtotime($info->code_expried)) {
                // dd(strtotime($date), strtotime($info->code_expried));
                // session()->flash('msg', "M?? k??ch ho???t ???? h???t h???n.");
                // session()->flash('type', 'danger');
                $errActive = "M?? k??ch ho???t h???t h???n.";
                return view('client.account.active', compact('errActive')); //, compact('errActive'));
            }
            // dd($info); 944954
            if ($info->email == $email && md5($code) == $info->code) {
                $msg = "K??ch ho???t th??nh c??ng.";
                $result = UserClient::updateApprovedUser($email);
                if ($result) {
                    UserClient::deleteCode($email);
                    return view('client.account.notice', compact('msg'));
                }
                $errActive = "K??ch ho???t kh??ng th??nh c??ng. Vui l??ng th??? l???i sau.";
                return view('client.account.active', compact('errActive'));
            } else {
                $errActive = "K??ch ho???t kh??ng th??nh c??ng. Vui l??ng ki???m tra l???i.";
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
            "email.required" => ":attribute l?? b???t bu???c.",
            "email.min" => ":attribute t???i thi???u :min k?? t???.",
            "email.max" => ":attribute t???i ??a :max k?? t???.",
            "email.regex" => ":attribute kh??ng ????ng ?????nh d???ng.",
            "password.required" => ":attribute l?? b???t bu???c.",
            "password.min" => ":attribute t???i thi???u :min k?? t???.",
            "password.max" => ":attribute t???i ??a :max k?? t???",
        ];
        $attributes = [
            "email" => "Email",
            "password" => "M???t kh???u"
        ];
        $request->validate($rules, $messages, $attributes);
        $email = $request->email;
        $pass = $request->password;
        $user = UserClient::login($email, $pass);
        if ($user == null) {
            return view('client.account.login')->with('msgErr', 'T??i kho???n kh??ng t???n t???i.');
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
            return redirect()->route('home_client')->with('success', "????ng nh???p th??nh c??ng.");
        } else {
            return view('client.account.login')->with('msgErr', '????ng nh???p kh??ng th??nh c??ng. Vui l??ng ki???m tra l???i.');
        }
        dd($user);
    }
    public function loginCheckout(Request $request){
        $rules = [
            "email" => "required|min:10|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",
            "password" => "required|min:8|max:255",
        ];
        $messages = [
            "email.required" =>":attribute l?? b???t bu???c.",
            "email.min" =>":attribute t???i thi???u :min k?? t???.",
            "email.max" =>":attribute t???i ??a :max k?? t???.",
            "email.regex" =>":attribute kh??ng ????ng ?????nh d???ng.",
            "password.required" => ":attribute l?? b???t bu???c.",
            "password.min" =>":attribute t???i thi???u :min k?? t???.",
            "password.max" =>":attribute t???i ??a :max k?? t???",
        ];
        $attributes = [
            "email" => "Email",
            "password" => "M???t kh???u"
        ];
        $request->validate($rules,$messages,$attributes);
        $email = $request->email;
        $pass = $request->password;
        $user = UserClient::login($email, $pass);
        if ($user == null) {
            return view('client.account.login')->with('msgErr', 'T??i kho???n kh??ng t???n t???i.');
        }
        if ($user->email == $email && $user->password == md5($pass)){
            Session::put('userId',$user->id);
            Session::put('userEmail',$user->email);
            Session::put('userFullname',$user->fullname);
            Session::put('userImage',$user->image);
            Session::put('userPhone',$user->phone);
            Session::put('userAddress',$user->address);
            // dd($user);
            // return view('client.account.dcm');
            return redirect()->route('checkout')->with('success',"????ng nh???p th??nh c??ng.");
        }else{
            return view('client.checkout.checkout')->with('msgErr', '????ng nh???p kh??ng th??nh c??ng. Vui l??ng ki???m tra l???i.');
        }
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
            'required' => ':attribute l?? b???t bu???c.',
            'min' => ':attribute t???i thi???u :min k?? t???.',
            'max' => ':attribute t???i ??a :max k?? t???.',
            'regex' => ':attribute kh??ng ????ng ?????nh d???ng.'
        ];
        $attributes = [
            "email" => "Email",
            "code" => "M?? x??c th???c",
            "password" => "M???t kh???u"
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
                    'msg' => "M?? x??c th???c kh??ng ????ng. Vui l??ng ki???m tra l???i."
                ]);
            }
            $date = date('Y-m-d H:i:s');
            $dateExpired = $codeForgotPass->code_expired;
            if (strtotime($date) >= strtotime($dateExpired)) {
                return response()->json([
                    'codeErr' => 1,
                    'msg' => "M?? x??c th???c ???? h???t h???n."
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
                $mail->subject('C???p nh???t m???t kh???u th??nh c??ng.');
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
        // return view('client.account.emailForgotPass')->with('msgErr', 'Email kh??ng t???n t???i.');
        // }
        // $code = UserClient::createCodeForgotPass($email);

    }

    public function postGetCodeForgotPass(Request $request)
    {
        $rules = [
            'email' => ['required', 'min:10', 'max:255', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix']
        ];
        $messages = [
            'required' => ':attribute l?? b???t bu???c.',
            'min' => ':attribute t???i thi???u :min k?? t???.',
            'max' => ':attribute t???i ??a :max k?? t???.',
            'regex' => ':attribute kh??ng ????ng ?????nh d???ng.'
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
                $mail->subject('M?? x??c th???c ?????t l???i m???t kh???u.');
            });
            return response()->json(
                [
                    'code' => UserClient::createCodeForgotPass($request->email),
                    'codeErr' => 0,
                    'msg' => "M?? x??c th???c ???? ???????c g???i v??? email."
                ]
            );
        } catch (\Exception $e) {
            return response()->json(['code' => 500, 'error' => $e->getMessage()], 500);
        }
    }

    public function getLogout(Request $request){
        // dd($request->header('referer'));
        $prePath = $request->header('referer');
        Session::forget('userId');
        Session::forget('userEmail');
        Session::forget('userFullname');
        Session::forget('userPhone');
        Session::forget('userAddress');
        return redirect($prePath);
    }


    public function postReview(Request $request){
        if(!Session::has('userId')){
            return response()->json([
                'code' => 1,
                'msg' => "B???n ph???i ????ng nh???p ????? b??nh lu???n."
            ]);
        }
        $rules = [
            "rating" => ['required', 'min:1', 'max:5'],
            "content" => ['required', 'min:3', 'max:1024']
        ];
        $messages = [
            "rating.required" =>"Vui l??ng ki???m tra s??? sao :attribute.",
            "rating.min" =>"Vui l??ng ki???m tra s??? sao :attribute.",
            "rating.max" =>"Vui l??ng ki???m tra s??? sao :attribute.",
            "content.required" =>"Vui l??ng ki???m tra :attribute ????nh gi??.",
            "content.min" =>"Vui l??ng ki???m tra :attribute ????nh gi??. T???i thi???u 3 k?? t???, t???i ??a 1024 k?? t???.",
            "content.max" => "Vui l??ng ki???m tra :attribute ????nh gi??. T???i thi???u 3 k?? t???, t???i ??a 1024 k?? t???."
        ];
        $attributes = [
            "rating" => "????nh gi??.",
            "content" => "n???i dung"
        ];

        $validator = Validator::make($request->all(),$rules, $messages, $attributes);
        if ($validator->fails()){
            return response()->json(['err'=>$validator->errors()->all()], 400);
        }
        $userId = Session::get('userId');
        $idPr = $request->idProduct;
        $rating = $request->rating;
        $content = $request->content;
        $isRated = UserClient::checkRating($userId, $idPr);
        if (!$isRated){
            UserClient::addRating($userId, $idPr, $rating, $content);
            return response()->json([
                'code' => 0,
                'msg' => "????nh gi?? th??nh c??ng."
            ]);
        }else{
            return response()->json([
                'code' => 2,
                'msg' => "B???n ???? ????nh gi?? s???n ph???m n??y r???i ^.^"
            ]);
        }
    }


    public function postRating(Request $request){
        if(!Session::has('userId')){
            return response()->json([
                'code' => 1,
                'msg' => "B???n ph???i ????ng nh???p ????? b??nh lu???n."
            ]);
        }
    }

    // public function getRating(Request $request){
    //     $idPr = $request->
    // }
}
