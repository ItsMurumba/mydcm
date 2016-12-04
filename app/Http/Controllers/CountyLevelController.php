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
            ->join('population_distribution','population_distribution.id','=','disease_costs.distributions_id')
            ->join('facility','facility.id','=','disease_costs.facility_id')
            ->join('county','county.id','=','disease_costs.county_id')
            ->select(['county.county_name','facility.facility_name','population_distribution.age_group','disease.name', 'disease_costs.services_total_cost', 'disease_costs.consultation_fee', 'disease_costs.drugs_total_cost','disease_costs.total'])
            ->orderby('disease_costs.county_id');
        return Datatables::of($diseasescosts)->make();
    }
}
