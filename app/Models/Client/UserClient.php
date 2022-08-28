<?php

namespace App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class UserClient extends Model{
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

    static function addUser($email, $pass, $fullname, $address, $phone, $image){
        $id = DB::table('customer_user')->insertGetId([
                'email' => $email,
                'password' => md5($pass),
                'address' => $address,
                'phone' => $phone,
                'fullname' => $fullname,
                'image'=> $image
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
        $date = date('Y-m-d H:i:s',strtotime('+2 minutes',strtotime($start)));
        // dd($start,$date);
        // echo $code;
       DB::table('cu_code')->insert([
            'email' => $email,
            'code' => md5($code),
            'code_expried' => $date
        ]);
        return $code;
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
        ->select('*')
        ->where('email', $email, null, 'and', 'password', md5($pass))
        ->first();
        return $user;
    }

    static function createCodeForgotPass($email){
        $code = mt_rand(100000,999999);
        $start = date('Y-m-d H:i:s');
        $date = date('Y-m-d H:i:s',strtotime('+2 minutes',strtotime($start)));
        // dd($start,$date);
        // echo $code;
        DB::table('cu_forgotpass')->insert([
            'email' => $email,
            'code' => $code ,//md5($code),
            'code_expired' => $date
        ]);
        return $code;
    }

    static function getCuFogotPass($email, $code){
        $rst = DB::table('cu_forgotpass')
        ->select('email','code', 'code_expired')
        ->where('email', $email)
        ->where('code', $code)
        ->first();
        return $rst;
    }

    static function updatePass($email, $pass){
        DB::table('customer_user')
        ->where('email', $email)
        ->update(['password'=>md5($pass)]);
    }

    static function deleteCodeForgotPass($email){
        DB::table('cu_forgotpass')
        ->where('email', $email)
        ->delete();
    }

    static function addRating($userId, $idPr, $rating, $content){
        DB::table('rating')->insert([
            'user' => $userId,
            'product' => $idPr,
            'start' => $rating,
            'content' => $content
        ]);
    }
    static function updateRating($userId, $idPr, $rating, $content){
        DB::table('rating')->update([
            'user' => $userId,
            'product' => $idPr,
            'start' => $rating,
            'content' => $content
        ]);
    }

    static function checkRating($userId, $idPr){
        $isRated = DB::table('rating')
        ->select('user', 'product')
        ->where('user', $userId)
        ->where('product', $idPr)
        ->first();
        if($isRated == null){
            return false;
        }else{
            return true;
        }
    }

    static function getRating($idPr){
        $rating = DB::table('rating')
        ->select('rating.start', 'rating.content', 'rating.create_at',
            'customer_user.email', 'product.product_name', 'product.product_image')
        ->join('customer_user', 'rating.user', '=','customer_user.id')
        ->join('product', 'rating.product','=', 'product.id')
        ->where('product', $idPr)
        ->get();
        return $rating;
    }

    static function findUserGg($email){
        $user = DB::table('customer_user')
        ->select('*')
        ->where('email', $email)
        ->first();
        return $user;
    }

    static function addGGUser($email, $image, $fullname, $google_id){
        $id_user = DB::table("customer_user")->insertGetId([
            'email' => $email,
            'password' => md5('123456bnctl'),
            'image' => $image,
            'approved'  => 1,
            'fullname' => $fullname,
            'google_id' => $google_id
        ]);
        return $id_user;
    }
}
