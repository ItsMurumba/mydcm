<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Drugs;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateDrugsRequest;
use Datatable;
use Yajra\Datatables\Datatables;

class DrugsController extends Controller
{
    //

    
    public function store(CreateDrugsRequest $request)
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
        \Session::flash('message', 'Successfully added!');
        return view('drugs');;
    }
    public function getdrugs(){
        $drugs = Drugs::select(['name', 'pack_size', 'no_of_packs', 'price_per_pack']);

        return Datatables::of($drugs)->make();
    }
    public function getIndex()
    {
        $name=Drugs::pluck('name','id');
        return view('viewdrugs')->with(['name'=> $name]);

    }
}
