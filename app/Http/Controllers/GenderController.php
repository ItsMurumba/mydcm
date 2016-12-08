<?php

namespace App\Http\Controllers;
use App\Gender;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
Use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateGenderRequest;

class GenderController extends Controller
{

    public function store(CreateGenderRequest $request)
    {
        //store
        $gender = new Gender();
        $gender->gender_name = Input::get('gender');
        $gender->save();

        //redirect
        \Session::flash('message', 'Successfully Saved!');
        return view('gender');
    }
}
