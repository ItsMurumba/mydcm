<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiseaseCosts;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;

class CountyLevelController extends Controller
{
    //
    public function listdiseasecosts() {
        $user= Session::get('user');
        $diseasescosts = DiseaseCosts::join('disease','disease_costs.diseases_id','=','disease.id')
            ->select(['disease.name', 'disease_costs.services_total_cost', 'disease_costs.consultation_fee', 'disease_costs.drugs_total_cost','disease_costs.total'])
            ->orderby('disease_costs.county_id');
        return Datatables::of($diseasescosts)->make();
    }
}
