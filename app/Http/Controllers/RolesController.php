<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dotenv\Validator;
use App\Http\Requests;
use App\Role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class RolesController extends Controller
{
    //
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'role'    =>'required'
        ]);
    }
    public function store(Request $request)
    {
        //store
        $role = new Role;
        $role->role = Input::get('role');
        $role->save();

        //redirect
        Session::flash('message', 'Successfully added role!');
        return view('role');
    }
}
