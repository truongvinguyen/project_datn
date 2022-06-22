<?php
  
// namespace App\Http\Controllers\Client\Auth;
namespace App\Http\Controllers\Client;
  
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

// use Socialite;
use Auth;
use Exception;
use App\Models\Client\Customer_User;
  
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
    public function handleGoogleCallback(){
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = Customer_User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
                $user_info = $user->user;
                // return redirect()->route('dashboard')->with("user_info"=>$this->user_info);
                return $user_info;
     
            }else{
                $newUser = Customer_User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'profile_photo_path'=> $user->picture,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::login($newUser);
                $user_info = $user->user;
                // return redirect('/dashboard');
                return $user_info;
            }
    
        } catch (Exception $e) {
            // dd($e->getMessage());
            return view('client.err');
        }
    }
}