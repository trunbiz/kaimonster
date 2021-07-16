<?php

namespace App\Http\Controllers\Admin;

use App\Groups;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public $user, $group;
    public function __construct()
    {
        $this->user = new User();
        $this->group = new Groups();
    }

    public function listAll(){
//        $data['users'] = User::all();
        $data['groups'] = Groups::all();
        $data['users'] = User::getAllUser();
        return view('admin.users', $data);
    }

    public function addItem(Request $request){
        $this->user->addItem($request);
//        return back();
    }

    public function updateItem(Request $request){
        $this->user->editItem($request);
        return back();
    }

    public function deleteItem(Request $request){
        $id = $request->id;
        User::destroy($id);
        return back();
    }

}
