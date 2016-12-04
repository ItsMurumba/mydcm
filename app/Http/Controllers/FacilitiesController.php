<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\County;
use App\Facilities;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class FacilitiesController extends Controller
{
    //

    //function used to populate dropdown
    public function index(){
        $county = County::pluck('county_name', 'id');

        return view('facility', ['county'=> $county]);
    }


    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name'    =>'required|unique',
            'address'   =>'required|unique',
            'bed_capacity'       =>'required',
            'county'       =>'required',
            'level'       =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $Facilities = new Facilities;
        $Facilities->facility_name = Input::get('name');
        $Facilities->address = Input::get('address');
        $Facilities->bedcapacity = Input::get('bed_capacity');
        $Facilities->county_id = Input::get('county');
        $Facilities->level = Input::get('level');
        $Facilities->save();

        //redirect
        Session::flash('message', 'Successfully added!');
//        return view('facility');
        return redirect()->action('FacilitiesController@index');
    }
}
