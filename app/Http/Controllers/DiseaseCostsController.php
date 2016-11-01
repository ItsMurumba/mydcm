<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Diseases;
use App\DiseaseCosts;
use App\Services;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class DiseaseCostsController extends Controller
{
    //
    //function used to populate dropdown
    public function index(){
        $diseases = Diseases::pluck('name', 'id');
        $diseases = ['diseases' => $diseases];
        $services = Services::pluck('name', 'cost');
        $services= ['services' => $services];


        return view('diseasecosts',  $services, $diseases);
    }


    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'diseases'    =>'required',
            'consultation'   =>'required',
            'services'       =>'required',
            'drugsfee'       =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $total= Input::get('consultation')+Input::get('servicesfee')+Input::get('drugsfee');
        $DiseaseCosts = new DiseaseCosts;
        $DiseaseCosts->diseases_id = Input::get('diseases');
        $DiseaseCosts->services_total_cost = Input::get('consultation');
        $DiseaseCosts->consultation_fee = Input::get('services');
        $DiseaseCosts->drugs_total_cost = Input::get('drugsfee');
        $DiseaseCosts->total = $total;
        $DiseaseCosts->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return redirect()->action('DiseaseCostsController@index');
    }
}
