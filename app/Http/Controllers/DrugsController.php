<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Drugs;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class DrugsController extends Controller
{
    //

    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name'    =>'required|unique',
            'generic_name'   =>'required|unique',
            'pack_size'  =>'required',
            'no_of_packs' =>'required',
            'price_per_pack' =>'required',
//            'total'         =>'required',
//            'total_units'  =>'required',
//            'price_per_unit ' =>'required'


        ]);
    }
    public function store(Request $request)
    {
        //calculations done
        $total_units= Input::get('pack_size')*Input::get('no_of_packs');
        $total= Input::get('price_per_pack')*Input::get('no_of_packs');
        $price_per_unit= $total/$total_units;
        //store
        $Drugs = new Drugs;
        $Drugs->name = Input::get('name');
        $Drugs->generic_name = Input::get('generic_name');
        $Drugs->pack_size = Input::get('pack_size');
        $Drugs->no_of_packs = Input::get('no_of_packs');
        $Drugs->price_per_pack = Input::get('price_per_pack');
        $Drugs->total = $total;
        $Drugs->total_units = $total_units;
        $Drugs->price_per_unit = $price_per_unit;
        $Drugs->save();

        //redirect
        Session::flash('message', 'Successfully added!');
        return view('drugs');;
    }
}
