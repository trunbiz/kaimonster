<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    //
    public function __construct(){
    }

    public function showCheckSocial(Request $request){
        $data = $request->all();

        dd($data);
    }
}
