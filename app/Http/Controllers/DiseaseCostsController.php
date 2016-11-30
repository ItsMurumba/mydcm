<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Diseases;
use App\DiseaseCosts;
use App\Services;
use App\Distributions;
use Illuminate\Support\Facades\DB;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class DiseaseCostsController extends Controller
{
    //
    //function used to populate dropdown
    public function index(){
        $diseases = Diseases::pluck('name', 'id');
        $services = Services::pluck('name', 'cost');
        $distributions= Distributions::pluck('age_group','id');
        return view('diseasecosts')->with(['diseases' => $diseases,'services' => $services,'distributions' => $distributions]);
    }


    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'diseases'    =>'required|unique',
            'consultation'   =>'required',
            'services'       =>'required',
            'drugsfee'       =>'required',
            'distributions'   =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //function for getting the total units per drugs based on the dosage and calculate the total cost
        $user= Session::get('user');
        $county= Session::get('county');
        $distributions_id=Input::get('distributions');
        $disease_id=Input::get('diseases');
        $DrugCosts = DB::select(DB::raw("SELECT ds.dosage, d.price_per_unit FROM dosage ds JOIN drug d ON d.id=ds.drug_id where ds.distribution_id='$distributions_id' AND ds.disease_id='$disease_id'"), array(
            'distributions_id' => $distributions_id,
        ), array(
            'disease_id' => $disease_id,
        ));
        global $sum;
        $sum=0;
        foreach ($DrugCosts as $row){

            global $dosage;
            $dosage= $row->dosage;

            global $price;
            $price=$row->price_per_unit;

            global $product;
            $product=$dosage*$price;
            $sum=$sum+$product;

        }
       

        $total= Input::get('consultation')+Input::get('servicesfee')+$sum;
        $DiseaseCosts = new DiseaseCosts;
        $DiseaseCosts->diseases_id = Input::get('diseases');
        $DiseaseCosts->services_total_cost = Input::get('consultation');
        $DiseaseCosts->consultation_fee = Input::get('services');
        $DiseaseCosts->drugs_total_cost = $sum;
        $DiseaseCosts->total = $total;
        $DiseaseCosts->user_id=$user;
        $DiseaseCosts->county_id=$county;
        $DiseaseCosts->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return redirect()->action('DiseaseCostsController@index');
    }
}
