<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Distributions;
use App\County;
use App\Estimates;
use App\Facilities;
use App\Diseases;
use App\Gender;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateEstimatesRequest;
class EstimatesController extends Controller
{
    //
    //projection factors and county drop down
    public function index(){
        $distributions = Distributions::pluck('age_group', 'id');
        $county = County::pluck('county_name', 'id');
        $facility= Facilities::pluck('facility_name','id');
        $diseases= Diseases::pluck('disease_name','id');
        $gender=Gender::pluck('gender_name','id');


        return view('estimates')->with(['gender'=>$gender,'county' => $county,'facility' => $facility,'distributions' => $distributions,'diseases'=>$diseases]);

    }

    public function store(CreateEstimatesRequest $request)
    {
        //store
        $Estimates = new Estimates;
        $Estimates->population = Input::get('population');
        $Estimates->population_distribution_id = Input::get('distributions');
        $Estimates->county_id = Input::get('county');
        $Estimates->disease_id=Input::get('diseases');
        $Estimates->gender_id=Input::get('gender');
        $Estimates->disease_type_id=Input::get('diseasetype');
        $Estimates->facility_id=Input::get('facility');
        $Estimates->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return redirect()->action('EstimatesController@index');

    }
}
