<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Diseases;
use App\Drugs;
use App\drug_disease;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateDiseasesRequest;


class DiseasesController extends Controller
{
    //

    public function store(CreateDiseasesRequest $request)
    {
        //store
        $Diseases = new Diseases;
        $Diseases->disease_name = Input::get('name');
        $Diseases->description = Input::get('description');;
        $Diseases->save();

        //redirect
        \Session::flash('message', 'Successfully added!');
        return view('diseases');;
    }
}
