<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Distributions;
use App\County;
use App\Estimates;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class EstimatesController extends Controller
{
    //
    //projection factors and county drop down
    public function index(){
        $distributions = Distributions::pluck('age_group', 'id');
        $county = County::pluck('name', 'id');

        $distributions= ['distributions' => $distributions];
        $county= ['county'=> $county];

        return view('estimates',  $distributions, $county);

    }


    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'population'    =>'required',
            'distributions'   =>'required',
            'county'       =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $Estimates = new Estimates;
        $Estimates->population = Input::get('population');
        $Estimates->population_distribution_id = Input::get('distributions');
        $Estimates->county_id = Input::get('county');
        $Estimates->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return redirect()->action('EstimatesController@index');

    }
}
