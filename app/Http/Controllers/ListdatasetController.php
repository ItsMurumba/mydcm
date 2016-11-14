<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
class ListdatasetController extends Controller
{
    //
    public function index(){
//        $home = Home::pluck('name', 'id')->where('user_id', '4');

//        $user=Auth::user()->id;
        $home = DB::table('data_sets')->where('user_id', '4')->pluck('name','id');

        return view('listdataset', ['home'=> $home]);
    }
}
