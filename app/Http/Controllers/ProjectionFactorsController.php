<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProjectionFactors;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ProjectionFactorsController extends Controller
{
    //
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'factor'    =>'required',
            'description'   =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $ProjectFactor = new ProjectionFactors;
        $ProjectFactor->factor = Input::get('factor');
        $ProjectFactor->description = Input::get('description');
        $ProjectFactor->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return view('projectionfactors');
    }
}
