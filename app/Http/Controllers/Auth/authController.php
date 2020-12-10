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

    public function register(Request $request)
    {
        $data = [
          'username' => $request->username,
          'fullname' => $request->fullname,
          'password' => bcrypt($request->password),
          'birthday' => $request->birthday,
          'description' => $request->description,
          'address' => $request->address,
          'email' => $request->email,
        ];
        $user = new User();
        $this->$user->save();
    }
}
