<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Drugs;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class DrugsController extends Controller
{
    //

    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name'    =>'required|unique',
            'generic_name'   =>'required|unique',
            'unit'       =>'required',
            'unit_cost'       =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $Drugs = new Drugs;
        $Drugs->name = Input::get('name');
        $Drugs->generic_name = Input::get('generic_name');
        $Drugs->unit = Input::get('unit');
        $Drugs->unit_cost = Input::get('unit_cost');
        $Drugs->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return view('drugs');;
    }
}
