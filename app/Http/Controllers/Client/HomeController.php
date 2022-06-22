<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Client\GoogleController;

class HomeController extends Controller
{
    public function index(){
        return view('client.login');
    }

    public function dashboard(){
        $user_info = (new GoogleController)->handleGoogleCallback();
        return view('client.dashboard', compact('user_info'));
    }
}
