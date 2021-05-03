<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    //
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' =>$request->password
        ];
        if(Auth::attempt($data)){
            return redirect()->intended('admin');
        }
        else{
            return redirect()->intended('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('login');
    }

    public function showSingUp(){
        return redirect()->intended('login#signup');
    }

    public function register(Request $request)
    {
        $user = new User();
        if ($user->checkDuplicateData($request)){
            $user->addItem($request);
            return redirect()->intended('login');
        }
        return redirect()->intended('login#signup')->withInput()->with('messageUser', 'Tài khoản đã tồn tại');
    }
}
