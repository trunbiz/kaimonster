<?php

namespace App\Http\Controllers\Admin;

use App\Groups;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class groupsController extends Controller
{
    //
    private $groups;
    public function __construct()
    {
        $this->groups = new Groups();
    }
    public function listAll(){
        $data['groups'] = Groups::all();
        return view('admin.groups', $data);
    }

    public function addItem(Request $request){
        $this->groups->addItem($request);
        return back();
    }

    public function updateItem(Request $request){
        $this->groups->editItem($request);
        return back();
    }

    public function deleteItem(Request $request){
        $id = $request->id;
        Groups::destroy($id);
        return back();
    }
}
