<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Equipments;
use App\Services;
use App\Diseases;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateServicesRequest;

class ServicesController extends Controller
{
    //
    public function index(){
        $equipments = equipments::pluck('name', 'id');
        $diseases=Diseases::pluck('disease_name','id');

        return view('services', ['equipments'=> $equipments,'diseases'=>$diseases]);
    }

    public function store(CreateServicesRequest $request)
    {
        //store
        $Services = new Services;
        $Services->service_name = Input::get('service');
        $Services->cost = Input::get('cost');
        $Services->disease_id=Input::get('diseases');
        $Services->save();

        //redirect
        \Session::flash('message', 'Successfully added!');
//        return view('services');
        return redirect()->action('ServicesController@index');
    }


}
