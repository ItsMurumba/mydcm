<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class PickDataSetController extends Controller
{
    //
    public function index(){
        $user= Session::get('user');


        $home = DB::select(DB::raw("SELECT id, name FROM data_sets where user_id='$user'"), array(
            'user' => $user,
        ));

        return view('pickdataset')->with(['home'=> $home]);
    }
}
