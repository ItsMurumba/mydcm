<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatable;
use Yajra\Datatables\Datatables;
use App\MyDataSets;
use Illuminate\Support\Facades\Session;

class MyDataSetsController extends Controller
{
    //
    public function listdatasets() {
        $user= Session::get('user');
        $datasets = MyDataSets::join('county','county.id','=','data_sets.county_id')
            ->join('facility','facility.id','=','data_sets.facility_id')
            ->join('population_distribution','population_distribution.id','=','data_sets.distribution_id')
            ->join('disease','disease.id','=','data_sets.disease_id')
            ->select(['data_sets.data_set_name', 'county.county_name', 'facility.facility_name', 'disease.disease_name','population_distribution.age_group'])
            ->where('data_sets.user_id','=',$user);

        return Datatables::of($datasets)->make();
    }
}
