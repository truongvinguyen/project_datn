<?php

namespace App\Models\Client;
use Illuminate\Support\Facades\DB;
class UserClient{
    static function checkIssetEmail($email){
        $user = DB::table('customer_user')
        ->where('email',$email)
        ->first();
        if ($user != null){
            if ($user->email == $email){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }

    static function addUser($email, $pass, $fullname, $address, $phone){
        $id = DB::table('customer_user')->insertGetId([
                'email' => $email,
                'password' => md5($pass),
                'address' => $address,
                'phone' => $phone,
                'fullname' => $fullname,
        ]);

        if ($id != 0){
            return true;
        }else{
            return false;
        }
    }

    static function updateApprovedUser($email){
       $result =  DB::table('customer_user')
        ->where('email', $email)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('approved' => 1));  // update the record in the DB. 
        return $result;
    }

    static function createCode($email){
        $code = mt_rand(100000,999999);
        $start = date('Y-m-d H:i:s');
        $date = date('Y-m-d H:i:s',strtotime('+1 minutes',strtotime($start)));
        // dd($start,$date);
        echo $code;
        $flag = DB::table('cu_code')->insert([
            'email' => $email,
            'code' => md5($code),
            'code_expried' => $date
        ]);
        if ($flag != 0){
            return true;
        }else{
            return false;
        }
    }

    static function getCode($email){
        // dd($email);
        $info = DB::table('cu_code')
        ->select('email', 'code', 'code_expried')
        ->where('email', $email)
        ->orderby('create_at', 'desc')
        ->limit(1)
        ->first();
        return $info;
    }

    static function deleteCode($email){
        DB::table('cu_code')
        ->where('email', $email)
        ->delete();
    }

    static function login($email, $pass){
        $user = DB::table('customer_user')
        ->select('email','password')
        ->where('email', $email, null, 'and', 'password', md5($pass))
        ->first();
        return $user;
    }

    static function createCodeForgotPass($email){
        $code = mt_rand(100000,999999);
        $start = date('Y-m-d H:i:s');
        $date = date('Y-m-d H:i:s',strtotime('+1 minutes',strtotime($start)));
        // dd($start,$date);
        echo $code;
        DB::table('cu_forgotpass')->insert([
            'email' => $email,
            'code' => $code ,//md5($code),
            'code_expired' => $date
        ]);
        return $code;
    }
}
