<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//added
use App\Staffcategories;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateStaffCategoryRequest;

class StaffCategoriesController extends Controller
{
    //
   
    public function store(CreateStaffCategoryRequest $request)
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
