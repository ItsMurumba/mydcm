<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMyProfileRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class MyProfileController extends Controller
{
    //
    public function index(){
        $user= Session::get('user');
        $MyProfile = DB::select(DB::raw("SELECT * FROM users where id= '$user'"), array(
            'user' => $user,
        ));
        $MyProfile2 = DB::select(DB::raw("SELECT * FROM users where id= '$user'"), array(
            'user' => $user,
        ));

        $MyProfile3 = DB::select(DB::raw("SELECT * FROM users where id= '$user'"), array(
            'user' => $user,
        ));


        return view('profile')->with(['MyProfile'=>$MyProfile,'MyProfile2'=>$MyProfile2,'MyProfile3'=>$MyProfile3]);

    }
    public function store(CreateMyProfileRequest $request)
    {
        //store
        $user= Session::get('user');
        $obj_user = User::find($user);
        $obj_user->password = bycrpt(Input::get('password'));
        $obj_user->save();

        //redirect
        \Session::flash('message', 'Successfully saved!');
        return redirect()->action('MyProfileController@index');
    }
}
