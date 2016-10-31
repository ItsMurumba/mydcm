<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Distributions;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class DistributionsController extends Controller
{
    //
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'age_group'    =>'required|unique',
            'gender'   =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $Distributions = new Distributions;
        $Distributions->age_group = Input::get('age_group');
        $Distributions->gender = Input::get('gender');
        $Distributions->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return view('distribution');
    }
}
