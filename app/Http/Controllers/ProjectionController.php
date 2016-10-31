<?php

namespace App\Http\Controllers;

use App\ProjectionFactors;

use App\Http\Requests;
use App\County;


class ProjectionController extends Controller
{
    //projection factors
    public function index(){
        $projections = ProjectionFactors::pluck('factor', 'id');
        return view('projections', ['projection_factors'=> $projections]);
       
    }

    //function used to populate dropdown
    public function county(){
        $county = County::pluck('name', 'id');

        return view('projections', ['county'=> $county]);
    }
}
