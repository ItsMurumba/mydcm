<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ProjectionFactors;
use App\Http\Requests;
use App\County;
use App\Projections;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ProjectionController extends Controller
{
    //projection factors and county drop down
    public function index(){
        $projectionfactors = ProjectionFactors::pluck('factor', 'id');
        $county = County::pluck('county_name', 'id');

       $projectionfactors= ['projectionfactors' => $projectionfactors];
        $county= ['county'=> $county];

        return view('projections',  $projectionfactors, $county);

    }


    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'rate'    =>'required',
            'county'   =>'required',
            'projectionfactors'       =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $Projections = new Projections;
        $Projections->rate = Input::get('rate');
        $Projections->projection_factor_id = Input::get('projectionfactors');
        $Projections->county_id = Input::get('county');
        $Projections->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return redirect()->action('ProjectionController@index');

    }

}
