<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    public function addItem($request)
    {
        try {
            $item = new usersModel();
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
            return false;
        }
    }

    public function editItem($request, $id){
        try{
            $item = User::find($id);
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
            return false;
        }
    }

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
}
