<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConsultationFeeRequest;
use Illuminate\Http\Request;
use App\FacilityLevels;
use App\ConsultationFee;
use Illuminate\Support\Facades\Input;


class ConsultationFeeController extends Controller
{
    //
    public function index(){
        $levels = FacilityLevels::pluck('level_name', 'id');

        return view('consultationfee', ['levels'=> $levels]);
    }
    public function store(CreateConsultationFeeRequest $request)
    {
        //store
        $consultationfee = new ConsultationFee();
        $consultationfee->level_id = Input::get('levels');
        $consultationfee->consultation_amount = Input::get('consultationfee');
        $consultationfee->save();

        //redirect
        \Session::flash('message', 'Successfully Saved!');
        return redirect()->action('ConsultationFeeController@index');
    }
}
