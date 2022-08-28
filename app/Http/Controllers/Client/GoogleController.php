<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\UserClient;
use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback(Request  $request)
    {
        try {
            $user = Socialite::driver('google')->user();
            // dd($user);
            $finduser = UserClient::findUserGg($user->email, $user->id);
            // dd($finduser);
            if($finduser != null){
                if ($user->email == $finduser->email && $user->id != $finduser->google_id){
                    // return response()->json([
                    //     'code'=> 1,
                    //     'msg'=> 'Email của bạn đã được đăng ký. Vui lòng sử dụng tài khoản khác.'
                    // ]);
                    return view('client.account.login')->with('msgErr', 'Email của bạn đã được đăng ký. Vui lòng sử dụng tài khoản khác.');
                }
                if ($user->email == $finduser->email && $user->id == $finduser->google_id){
                    Session::put('userId',$finduser->id);
                    Session::put('userEmail',$finduser->email);
                    Session::put('userFullname',$finduser->fullname);
                    Session::put('userImage',$finduser->image);
                    Session::put('userPhone',$finduser->phone);
                    Session::put('userAddress', $finduser->address);
      
                return redirect()->route('home_client')->with('success',"Đăng nhập thành công.");
                }
                // dd($user->email, $finduser);
                // Auth::login($finduser);
      
                // return redirect()->intended('dashboard');
       
            }else{
                // dd($user->user);
                $imageContent = file_get_contents($user->user["picture"]);
                $image = Str::random(50).'.jpg';
                Storage::disk('store_image')->put($image, $imageContent);
                // Storage::put($image, $imageContent);
                // dd('here');
                // Storage::disk();
                // $newUser = User::create([
                //     'name' => $user->name,
                //     'email' => $user->email,
                //     'google_id'=> $user->id,
                //     'password' => encrypt('123456dummy')
                // ]);
                $id_user = UserClient::addGGUser($user->user["email"], $image, $user->user["name"], $user->user["id"]);
                // Auth::login($newUser);
                Session::put('userId',$id_user);
                Session::put('userEmail',$user->user["email"]);
                Session::put('userFullname',$user->user["name"]);
                Session::put('userImage',$image);
                Session::put('userPhone',"");
                Session::put('userAddress',"");
      
                return redirect()->route('home_client')->with('success',"Đăng nhập thành công.");
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
?>