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


class DrugDiseasesController extends Controller
{
    //

    public function index(){
        $drugs = Drugs::pluck('name', 'id');
        $drugs = ['drugs' => $drugs];
        $diseases = Diseases::pluck('disease_name', 'id');
        $diseases = ['diseases' => $diseases];;

        return view('drugdisease',  $drugs, $diseases);
    }
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'diseases'    =>'required|unique',
            'drugs[]'   =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $data =Input::get();
        foreach ($data['drugs'] as $selected_id) {
            $new_drug = array(
                'drug_id' => $selected_id,
                'disease_id' => Input::get('diseases')
            );
            $post = new drug_disease($new_drug);
            $post->save();

        }
        //redirect
        Session::flash('message', 'Successfully added!');
        return redirect()->action('DrugDiseasesController@index');
    }

}
