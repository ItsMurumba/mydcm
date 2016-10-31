<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Diseases;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class DiseasesController extends Controller
{
    //
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name'    =>'required|unique',
            'description'   =>'required|unique'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $Diseases = new Diseases;
        $Diseases->name = Input::get('name');
        $Diseases->description = Input::get('description');;
        $Diseases->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return view('diseases');;
    }
}
