<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\County;

class FacilitiesController extends Controller
{
    //

    //function used to populate dropdown
    public function index(){
        $county = County::pluck('name', 'id');

        return view('facility', ['county'=> $county]);
    }
}
