<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    //
    protected $table = 'groups';

    public function addItem($request)
    {
        try {
            $this->code = $request->code;
            $this->name = $request->name;
            $this->save();
            return true;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function editItem($request){
        try{
            $item = Groups::find($request->id);
            $item->code = $request->code;
            $item->name = $request->name;
            $item->save();
            return true;
        } catch (Exception $ex) {
            return $ex;
        }
    }
}
