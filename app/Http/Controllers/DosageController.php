<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Distributions;
use App\Drugs;
use App\Dosage;
use App\Diseases;

use App\Http\Requests;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class DosageController extends Controller
{
    //
    public function index(){
        $drugs = Drugs::pluck('name','id');
        $distributions = Distributions::pluck('age_group','id');
        $diseases=Diseases::pluck('disease_name','id');

        return view('dosage')->with(['drugs' => $drugs,'distributions' => $distributions,'diseases' =>$diseases]);
    }



    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'distributions'    =>'required|unique',
            'drugs'   =>'required',
            'dosage'       =>'required',
            'user'       =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $Dosage = new Dosage();
        $Dosage->distribution_id = Input::get('distributions');
        $Dosage->drug_id = Input::get('drugs');
        $Dosage->dosage = Input::get('dosage');
        $Dosage->user_id = Input::get('user');
        $Dosage->disease_id = Input::get('diseases');
        $Dosage->save();

        //redirect
        Session::flash('message', 'Successfully added county!');
        return redirect()->action('DosageController@index');
    }
}
