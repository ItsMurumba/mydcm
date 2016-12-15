<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diseases;
use App\Projections;
use App\Projected_data_sets;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Dotenv\Validator;



class PredictionsController extends Controller
{
    //

    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'diseases'    =>'required',
            'growthrate'   =>'required',
            'consultationInc' =>'required',
            'inflation'       =>'required'

        ]);
    }
    public function store(Request $request)
    {
        $Projected_Data_Set = new Projected_data_sets;
        $DSet= Session::get('DataSet');

        $user= Session::get('user');
        $county= Session::get('county');
        $inflation=Input::get('inflation');
        $growthrate=Input::get('growthrate');
        $consultationinc=Input::get('consultationInc');


        $dataS = DB::select(DB::raw("SELECT dc.diseases_id,dc.facility_id, dc.services_total_cost, dc.consultation_fee, dc.drugs_total_cost, ds.population,dc.distributions_id FROM disease_costs dc JOIN data_sets ds ON ds.disease_id=dc.diseases_id WHERE dc.user_id='$user'"), array(
            'user' => $user,
        ));
        global $year;
        $year =2012;
        $no_years=5;
        global $sum;
        $sum=0;

        foreach ($dataS as $row){

            global $s;
            $s= $row->services_total_cost;
            $s=(($inflation/100)*$s)+$s;

            global $c;
            $c= $row->consultation_fee;
            $c=(($consultationinc/100)*$c)+$c;

            global $d;
            $d= $row->drugs_total_cost;
            $d=(($inflation/100)*$d)+$d;

            global $p;
            $p= $row->population;
            $p= (($growthrate/100)*$p)+$p;

            $facility=$row->facility_id;

            global $distributions;
            $distributions=$row->distributions_id;


        }
        for($i=0;$i<5;$i++){
            $s=(($inflation/100)*$s)+$s;
            $s= number_format($s, 2, '.', '');
            $c=(($consultationinc/100)*$c)+$c;
            $c=number_format($c, 2, '.', '');
            $d=(($inflation/100)*$d)+$d;
            $d=number_format($d, 2, '.', '');
            $p= (($growthrate/100)*$p)+$p;
            $p= number_format($p, 0, '.', '');
            $year++;
            $Projected_Data_Set = new Projected_data_sets;
            $Projected_Data_Set->data_set_id = $DSet;
            $Projected_Data_Set->distributions_id=$distributions;
            $Projected_Data_Set->disease_id = Input::get('diseases');
            $Projected_Data_Set->projected_population = $p;
            $Projected_Data_Set->projected_services_cost = $s;
            $Projected_Data_Set->projected_consultation_fee = $c;
            $Projected_Data_Set->projected_drugs_fee = $d;
            $Projected_Data_Set->user_id = $user;
            $Projected_Data_Set->county_id=$county;
            $Projected_Data_Set->year=$year;
            $Projected_Data_Set->facility_id=$facility;
            $Projected_Data_Set->save();
        }
//
        //redirect
        Session::flash('message', 'Successfully added!');
//        return view('services');
        return redirect()->action('HomeController@index');
//        return redirect()->action('PredictDiseaseCostsController@store');
    }


    public function index(){

        $DataSet=Input::get('home');
        Session::set('DataSet', $DataSet);
        $user= Session::get('user');

        $diseases  = DB::select(DB::raw("SELECT ds.disease_id, d.disease_name as name FROM data_sets ds JOIN disease d ON d.id=ds.disease_id where ds.user_id='$user' AND ds.id='$DataSet'"), array(
            'user' => $user,
        ),array(
            'DataSet' => $DataSet,
        ));
//        $inflation = Projections::pluck('rate', 'id')->where('projection_factor_id', '1');

        $inflation=DB::select(DB::raw("SELECT id, rate FROM `projections` WHERE projection_factor_id=1 "));

        $growthrate = DB::select(DB::raw("SELECT id, rate FROM `projections` WHERE projection_factor_id=4 "));

        $consultationInc = DB::select(DB::raw("SELECT id, rate FROM `projections` WHERE projection_factor_id=5 "));

       

        return view('predictions')->with(['diseases' => $diseases,'growthrate' => $growthrate,'consultationInc' => $consultationInc,'inflation' => $inflation]);
    }

}
