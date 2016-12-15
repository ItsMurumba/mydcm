<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Home;
use App\Http\Requests\CreateIndexRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\County;
use App\Facilities;
use App\DiseaseCosts;
use App\Distributions;
use App\Diseases;
use App\Http\Controllers\Auth;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function saving(CreateIndexRequest $request)
    {
//
        //total cost fetch query
        $dCosts= Input::get('disease');
        $DCosts = DB::select(DB::raw("SELECT total FROM disease_costs where diseases_id= '$dCosts'"), array(
            'dCosts' => $dCosts,
            ));
        foreach ($DCosts as $row){
            global $sum;
            $sum= $row->total;
        }
        echo $sum;
        die();

        //population fetch query
        $disease_id=Input::get('disease');
        $population_distribution_id=Input::get('distributions');
        $diseasetype=Input::get('diseasetype');
        $Population=DB::select(DB::raw("SELECT population FROM population_estimates WHERE disease_id='$disease_id' AND population_distribution_id='$population_distribution_id' AND disease_type_id='$diseasetype' "),array(
            'disease_id' => $disease_id,
        ),array(
            'population_distribution_id' => $population_distribution_id,
        ),array(
            'diseasetype' => $diseasetype,
        ));

        foreach ($Population as $row){
            global $population;
            $population= $row->population;
        }

        //total cost for disease calculated
        $total= ($population * $sum);


        $Home = new Home;
        $Home->data_set_name = Input::get('dataset');
        $Home->county_id = Input::get('county');
        $Home->facility_id = Input::get('facilities');
        $Home->disease_id = Input::get('disease');
        $Home->disease_type_id = Input::get('diseasetype');
        $Home->distribution_id = Input::get('distributions');
        $Home->population = $population;
        $Home->total = $total;
        $Home->user_id = Input::get('user');
        $Home->save();

        //redirect
       \ Session::flash('message', 'Successfully added!');
//        return view('services');
        return redirect()->action('HomeController@index');
    }


    public function index(){
        $user= Session::get('user');

//        $county = County::pluck('county_name','id');
        $county = DB::select(DB::raw("SELECT c.county_name,u.county_id as id FROM users u JOIN county c ON c.id=u.county_id where u.id='$user'"), array(
            'user' => $user,
        ));

        $facilities = DB::select(DB::raw("SELECT f.facility_name,u.facility_id as id FROM users u JOIN facility f ON f.id=u.facility_id where u.id='$user'"), array(
            'user' => $user,
        ));

        $home = DB::select(DB::raw("SELECT id, data_set_name as name FROM data_sets where user_id='$user'"), array(
            'user' => $user,
        ));

        $gender=Gender::pluck('gender_name','id');
        $disease=Diseases::pluck('disease_name','id');
        $distributions=Distributions::pluck('age_group','id');

        return view('index')->with(['home'=> $home,'county' => $county,'facilities' => $facilities,'disease' => $disease,'gender' =>$gender,'distributions' =>$distributions]);

    }

}
