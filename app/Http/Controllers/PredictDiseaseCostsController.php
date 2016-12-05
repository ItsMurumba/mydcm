<?php

namespace App\Http\Controllers;

use App\PredictDiseaseCosts;
use Illuminate\Http\Request;
use App\Diseases;
use App\DiseaseCosts;
use App\Services;
use App\Distributions;
use Illuminate\Support\Facades\DB;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class PredictDiseaseCostsController extends Controller
{
    //
    //function used to populate dropdown
    public function index(){
        global $DataSet;
        $DataSet=Input::get('home');
        Session::set('DataSet', $DataSet);
        $user= Session::get('user');
        $diseases=DB::select(DB::raw("SELECT ds.name, pds.disease_id FROM projected_data_sets pds JOIN disease ds ON ds.id=pds.disease_id WHERE pds.user_id='$user' AND pds.data_set_id='$DataSet' "),array(
            'user' =>$user,),array(
            'DataSet' =>$DataSet,));
        $services = Services::pluck('name', 'cost');
        $distributions= Distributions::pluck('age_group','id');
        return view('predictdiseasecosts')->with(['diseases' => $diseases,'services' => $services,'distributions' => $distributions]);
    }


    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'diseases'    =>'required|unique',
            'distributions'   =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //function for getting the total units per drugs based on the dosage and calculate the total cost
        $user= Session::get('user');
        $DataSet=Session::get('DataSet');
        $county= Session::get('county');
        $facility= Session::get('facility');
        $distributions_id=Input::get('distributions');
        $disease_id=Input::get('diseases');
        $DrugCosts = DB::select(DB::raw("SELECT pds.data_set_id,pds.distributions_id,pds.year,pds.projected_population,pds.projected_services_cost,pds.projected_consultation_fee,pds.projected_drugs_fee,pds.county_id FROM projected_data_sets pds WHERE pds.data_set_id='$DataSet' AND pds.disease_id='$disease_id' AND pds.distributions_id='$distributions_id'"), array(
            'DataSet' => $DataSet,
        ), array(
            'disease_id' => $disease_id,
        ), array(
            'distributions_id' => $distributions_id,
        ));
        global $Subtotal;
        $Subtotal=0;
        global $GrandTotal;
        $GrandTotal=0;
        foreach ($DrugCosts as $row){

            global $ProjectedPopuplation;
            $ProjectedPopuplation= $row->projected_population;

            global $ProjectedServices;
            $ProjectedServices=$row->projected_services_cost;

            global $ProjectedConsultation;
            $ProjectedConsultation=$row->projected_consultation_fee;

            global $ProjectedDrugs;
            $ProjectedDrugs=$row->projected_drugs_fee;

            $Subtotal=$ProjectedDrugs+$ProjectedConsultation+$ProjectedServices;

            $GrandTotal=$Subtotal*$ProjectedPopuplation;


        }

        $PredictDiseaseCosts = new PredictDiseaseCosts;
        $PredictDiseaseCosts->disease_id = Input::get('diseases');
        $PredictDiseaseCosts->distributions_id=$distributions_id;
        $PredictDiseaseCosts->services_total_cost = $ProjectedServices;
        $PredictDiseaseCosts->consultation_fee = $ProjectedConsultation;
        $PredictDiseaseCosts->drugs_total_cost = $ProjectedDrugs;
        $PredictDiseaseCosts->total = $GrandTotal;
        $PredictDiseaseCosts->user_id=$user;
        $PredictDiseaseCosts->county_id=$county;
        $PredictDiseaseCosts->facility_id=$facility;
        $PredictDiseaseCosts->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return redirect()->action('HomeController@index');
    }
}
