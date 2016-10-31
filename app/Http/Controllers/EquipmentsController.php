<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Dotenv\Validator;
use App\Equipments;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class EquipmentsController extends Controller
{
    //
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'equipment'    =>'required',
            'model'   =>'required',
            'cost'       =>'required',
            'date'       =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $Equipments = new Equipments;
        $Equipments->name = Input::get('equipment');
        $Equipments->model = Input::get('model');
        $Equipments->date_of_delivery = Input::get('date');
        $Equipments->cost = Input::get('cost');
        $Equipments->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return view('equipments');
    }
}
