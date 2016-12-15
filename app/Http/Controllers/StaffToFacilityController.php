<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStaffToFacilityRequest;
use Illuminate\Http\Request;
use App\Staffcategories;
use App\County;
use App\Http\Requests\CreateStaffCategoryRequest;
use Illuminate\Support\Facades\Input;
use App\StaffToFacility;
class StaffToFacilityController extends Controller
{
    //
    public function index(){

        $staffcategory= Staffcategories::pluck('cadre','id');
        $county= County::pluck('county_name','id');
        return view('stafftofacility')->with(['staffcategory' => $staffcategory,'county' =>$county]);
    }

    public function store(CreateStaffToFacilityRequest $request)
    {

        $StaffToFacility = new StaffToFacility();
        $StaffToFacility->no_of_cadres = Input::get('no_of_employees');
        $StaffToFacility->staff_category_id=Input::get('staffcategory');
        $StaffToFacility->county_id = Input::get('county');
        $StaffToFacility->facility_id = Input::get('facility_id');
        $StaffToFacility->save();

        //redirect
        \Session::flash('message', 'Successfully added!');
        return redirect()->action('StaffToFacilityController@index');
    }
}
