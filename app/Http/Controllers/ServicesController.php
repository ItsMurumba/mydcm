<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Equipments;
use App\Services;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ServicesController extends Controller
{
    //
    public function index(){
        $equipments = equipments::pluck('name', 'id');

        return view('services', ['equipments'=> $equipments]);
    }

    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'service'    =>'required|unique',
            'equipments'   =>'required',
            'cost'       =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $Services = new Services;
        $Services->name = Input::get('service');
        $Services->equipment_id = Input::get('equipments');
        $Services->cost = Input::get('cost');
        $Services->save();

        //redirect
        Session::flash('message', 'Successfully added!');
//        return view('services');
        return redirect()->action('ServicesController@index');
    }


}
