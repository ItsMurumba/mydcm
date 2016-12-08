<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNhifReliefRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\NhifRelief;

class NhifReliefController extends Controller
{
    //
    public function store(CreateNhifReliefRequest $request)
    {
        //store
        $nhifrelief = new NhifRelief();
        $nhifrelief->patient_type= Input::get('patienttype');
        $nhifrelief->relief_amount = Input::get('reliefamount');
        $nhifrelief->save();

        //redirect
        \Session::flash('message', 'Successfully Saved!');
        return view('nhifrelief');
    }
}
