<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class facebookController extends Controller
{
    //
    public function __construct()
    {
    }

    public function facebook() {
        return Socialite::driver('facebook')->redirect();
//        return Socialite::driver('facebook')->redirect();
//        return view('admin.facebook');
    }

    // quản lý tin nhắn facebook
    public function listAllMessage() {
        return Socialite::driver('facebook')->redirect();
//        return view('admin.managerMessage');
    }

    public function infoFB(){
        $user = Socialite::driver('facebook')->user();
        dd($user);
    }
}
