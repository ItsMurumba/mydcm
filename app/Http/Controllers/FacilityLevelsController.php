<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFacilityLevelRequest;
use Illuminate\Http\Request;
use App\FacilityLevels;
use Illuminate\Support\Facades\Input;

class FacilityLevelsController extends Controller
{
    //
    public function store(CreateFacilityLevelRequest $request)
    {
        //store
        $facilitylevels = new FacilityLevels();
        $facilitylevels->level_name = Input::get('level');
        $facilitylevels->save();

        //redirect
        \Session::flash('message', 'Successfully Saved!');
        return view('facilitylevels');
    }
}
