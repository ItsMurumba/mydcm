<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diseases;
use App\Projections;

class PredictionsController extends Controller
{
    //

    public function index(){
        $diseases = Diseases::pluck('name','id');

        $growthrate = Projections::pluck('rate', 'id');

        $consultationInc = Projections::pluck('rate','id');

        return view('predictions')->with(['diseases' => $diseases,'growthrate' => $growthrate,'consultationInc' => $consultationInc]);
    }
}
