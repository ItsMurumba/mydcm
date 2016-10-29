<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//added
use App\Staffcategories;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class StaffCategoriesController extends Controller
{
    //
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'cadre'    =>'required',
            'basic_salary'   =>'required',
            'allowances'       =>'required',
            'reimbursement'       =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //store
        $staffcat = new Staffcategories;
        $staffcat->cadre = Input::get('cadre');
        $staffcat->basic_salary = Input::get('basic_salary');
        $staffcat->allowances = Input::get('allowances');
        $staffcat->reimbursement = Input::get('reimbursement');
        $staffcat->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return view('staffcategories');
    }
}
