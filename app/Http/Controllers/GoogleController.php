<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\customer_user;
use Illuminate\Support\Facades\Auth;
  
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
    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = customer_user::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                // return redirect()->intended('dashboard_client');
                return view('dashboard_client');
       
            }else{
                $newUser = customer_user::create([
                    'name' => $user->name, 
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
      
                Auth::login($newUser);
      
                // return redirect()->intended('dashboard_client');
                return view('dashboard_client');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}