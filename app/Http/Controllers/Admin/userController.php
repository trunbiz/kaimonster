<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function listAll(){
        $data['users'] = User::all();
        return view('admin.users', $data);
    }

    public function addItem(Request $request){
        $this->user->addItem($request);
        return back();
    }

    public function updateItem(Request $request, $id){
        $this->user->editItem($request, $id);
        return back();
    }

    public function deleteItem(Request $request){
        $id = $request->id;
        User::destroy($id);
        return back();
    }

}
