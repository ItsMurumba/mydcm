<?php

namespace App\Http\Controllers;

use App\County;
use Dotenv\Validator;
use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CountiesController extends Controller
{
    //



    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'county'    =>'required',
            'address'   =>'required',
            'tel'       =>'required'
            
            
        ]);
    }
    public function store(Request $request)
    {
        //store
        $county = new County;
        $county->county_name = Input::get('county');
        $county->address = Input::get('address');
        $county->tel_no = Input::get('tel');
        $county->save();

        //redirect
        Session::flash('message', 'Successfully added county!');
        return view('county');
    }
}
