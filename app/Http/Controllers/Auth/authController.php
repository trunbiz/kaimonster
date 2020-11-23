<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            dd(123);
        }
    }
}
