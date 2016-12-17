<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Drugs;
use App\Diseases;
use App\drug_disease;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Gender;
use App\Http\Requests\CreateDrugDiseaseRequest;

class DrugDiseasesController extends Controller
{
    //

    public function index(){
        $drugs = Drugs::pluck('name', 'id');
        $diseases = Diseases::pluck('disease_name', 'id');
        $gender=Gender::pluck('gender_name','id');
        return view('drugdisease')->with(['gender'=>$gender,'diseases' => $diseases,'drugs'=>$drugs]);

    }
    
    public function store(CreateDrugDiseaseRequest $request)
    {
        //store
        $data =Input::get();
        foreach ($data['drugs'] as $selected_id) {
            $new_drug = array(
                'drug_id' => $selected_id,
                'disease_id' => Input::get('diseases'),
                'gender_id'=>Input::get('gender'),
                 'disease_type_id' =>Input::get('diseasetype')
            );
            $post = new drug_disease($new_drug);
            $post->save();

        }
        //redirect
        \Session::flash('message', 'Successfully added!');
        return redirect()->action('DrugDiseasesController@index');
    }

}
