<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Drugs;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateDrugsRequest;
use App\Http\Requests\CreateDrugsEditRequest;
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
    public function editdrug(CreateDrugsEditRequest $request){
        $DrugName=Input::get('name');
        $PackSize=Input::get('pack_size');
        $NoOfPacks=Input::get('no_of_packs');
        $PricePerpack=Input::get('price_per_pack');

//        echo $CountyId;
//        die();

        //calculations done
        $total_units= Input::get('pack_size')*Input::get('no_of_packs');
        $total= Input::get('price_per_pack')*Input::get('no_of_packs');
        $price_per_unit= $total/$total_units;

        Drugs::where('id', $DrugName)->update(array(
            'pack_size'    =>  $PackSize,
            'no_of_packs' =>  $NoOfPacks,
            'price_per_pack' => $PricePerpack,
            'total' => $total,
            'total_units' => $total_units,
            'price_per_unit' => $price_per_unit
        ));

        \Session::flash('message', 'Successfully Updated!');
        return redirect()->action('DrugsController@getIndex');
    }
}
