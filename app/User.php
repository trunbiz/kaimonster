<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addItem($request)
    {
        try {
            $this->username = $request->username;
            $this->fullname = $request->fullname;
            $this->email = $request->email;
            $this->phone = $request->phone;
            $this->address = $request->address;
            $this->description = $request->description;
            $this->password = bcrypt($request->password);
            $this->group_id = isset($request->group_id) ? $request->group_id : 5;
            if ($request->hasFile('avatar')) {
                $filename = $request->avatar->getClientOriginalName();
                $this->avatar = $filename;
                $request->avatar->move(public_path('\media'), $filename);
            }
            $this->save();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function checkDuplicateData($request) {
        $data = DB::table('users')->where('username', $request->username)->first();
        if (empty($data))
            return true;
        return false;
    }

    public function editItem($request){
        try{
            $item = User::find($request->id);
            $item->username = $request->username;
            $item->fullname = $request->fullname;
            $item->email = $request->email;
            $item->phone = $request->phone;
            $item->address = $request->address;
            $item->description = $request->description;
            $item->password = bcrypt($request->password);
            if ($request->hasFile('img')) {
                $filename = $request->img->getClientOriginalName();
                $item->img = $filename;
                $request->img->move('public/media', $filename);
            }
            $item->save();
            return true;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public static function getInfoUser($user_id = null, $username = null){
        $item = User::where('id', $user_id)
            ->join('groups', 'groups.id', '=', 'users.group_id')
            ->get();
        return $item;
    }

    public static function getAllUser(){
        $item = User::join('groups', 'groups.id', '=', 'users.group_id')
            ->select('users.*', 'groups.name as group_name')
            ->get();
        return $item;
    }
}
