<?php

namespace App\Http\Controllers;

use App\Home;
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
    public function __construct()
    {
        $this->middleware('auth');
    }


    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'dataset'    =>'required|unique',
            'county'   =>'required',
            'facilities'       =>'required',
            'diseaseCosts'       =>'required',
            'distributions'       =>'required',
            'population'       =>'required',
            'user'       =>'required'


        ]);
    }
    public function store(Request $request)
    {
        $sum = '';
        //store

        //total cost fetch query
        $dCosts= Input::get('diseaseCosts');
        $DCosts = DB::select(DB::raw("SELECT total FROM disease_costs where diseases_id= '$dCosts'"), array(
            'dCosts' => $dCosts,
            ));
        foreach ($DCosts as $row){
            global $sum;
            $sum= $row->total;
        }

        //population fetch query
        $disease_id=Input::get('diseaseCosts');
        $population_distribution_id=Input::get('distributions');
        $Population=DB::select(DB::raw("SELECT population FROM population_estimates WHERE disease_id='$disease_id' AND population_distribution_id='$population_distribution_id' "),array(
            'disease_id' => $disease_id,
        ),array(
            'population_distribution_id' => $population_distribution_id,
        ));

        foreach ($Population as $row){
            global $population;
            $population= $row->population;
        }

        //total cost for disease calculated
        $total= ($population * $sum);

        $Home = new Home;
        $Home->name = Input::get('dataset');
        $Home->county_id = Input::get('county');
        $Home->facility_id = Input::get('facilities');
        $Home->disease_id = Input::get('diseaseCosts');
        $Home->distribution_id = Input::get('distributions');
        $Home->population = $population;
        $Home->total = $total;
        $Home->user_id = Input::get('user');
        $Home->save();

        //redirect
        Session::flash('message', 'Successfully added!');
//        return view('services');
        return redirect()->action('HomeController@index');
    }


    public function index(){
        $user= Session::get('user');

        $county = County::pluck('county_name','id');

        $facilities = Facilities::pluck('name', 'id');

        $home = DB::select(DB::raw("SELECT id, name FROM data_sets where user_id='$user'"), array(
            'user' => $user,
        ));

        $diseaseCosts = DB::select(DB::raw('SELECT d.diseases_id, t.name, d.total FROM disease_costs d JOIN disease t ON d.diseases_id =t.id '));
        $distributions = Distributions::pluck('age_group','id');

        return view('index')->with(['home'=> $home,'county' => $county,'facilities' => $facilities,'diseaseCosts' => $diseaseCosts,'distributions' => $distributions]);
    }

}
