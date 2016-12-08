<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Distributions;
use App\County;
use App\Estimates;
use App\Facilities;
use App\Diseases;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class EstimatesController extends Controller
{
    //
    //projection factors and county drop down
    public function index(){
        $distributions = Distributions::pluck('age_group', 'id');
        $county = County::pluck('county_name', 'id');
        $facility= Facilities::pluck('facility_name','id');
//        $facility = DB::select(DB::raw("SELECT f.facility_name as name,f.id as id FROM facility f "));
        $diseases= Diseases::pluck('name','id');


//        return view('estimates',  $distributions, $county);

        return view('estimates')->with(['county' => $county,'facility' => $facility,'distributions' => $distributions,'diseases'=>$diseases]);

    }


    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'population'    =>'required',
            'distributions'   =>'required',
            'county'       =>'required',
            'diseases' =>'required',
            'facility' =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $Estimates = new Estimates;
        $Estimates->population = Input::get('population');
        $Estimates->population_distribution_id = Input::get('distributions');
        $Estimates->county_id = Input::get('county');
        $Estimates->disease_id=Input::get('diseases');
        $Estimates->facility_id=Input::get('facility');
        $Estimates->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return redirect()->action('EstimatesController@index');

    }
}
