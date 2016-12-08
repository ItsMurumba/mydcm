<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiseaseTypeRequest;
use Illuminate\Http\Request;
use App\Diseases;
use App\Gender;
use Illuminate\Support\Facades\Input;
use App\DiseaseType;

class DiseaseTypeController extends Controller
{
    //
    public function index(){
        $Diseasename = Diseases::pluck('name', 'id');

        $Gender = Gender::pluck('gender_name', 'id');
        return view('diseasetype')->with( ['Diseasename'=> $Diseasename,'Gender'=> $Gender]);
    }
    public function store(CreateDiseaseTypeRequest $request)
    {
        //store
        $diseasetype = new DiseaseType();
        $diseasetype->disease_id = Input::get('diseasename');
        $diseasetype->gender_id = Input::get('gender');
        $diseasetype->disease_type = Input::get('diseasetype');
        $diseasetype->save();

        //redirect
        \Session::flash('message', 'Successfully Saved!');
        return redirect()->action('DiseaseTypeController@index');
    }
}
