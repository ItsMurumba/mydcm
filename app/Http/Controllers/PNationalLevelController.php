<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PredictDiseaseCosts;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;


class PNationalLevelController extends Controller
{
    //
    public function listdiseasecosts() {
        $county= Session::get('county');
        $diseasescosts = PredictDiseaseCosts::join('disease','projected_disease_costs.disease_id','=','disease.id')
            ->join('population_distribution','population_distribution.id','=','projected_disease_costs.distributions_id')
            ->join('facility','facility.id','=','projected_disease_costs.facility_id')
            ->join('county','county.id','=','projected_disease_costs.county_id')
            ->select(['projected_disease_costs.year','county.county_name','facility.facility_name','population_distribution.age_group','disease.disease_name','projected_disease_costs.projected_population','projected_disease_costs.projected_salaries', 'projected_disease_costs.services_total_cost', 'projected_disease_costs.consultation_fee', 'projected_disease_costs.drugs_total_cost','projected_disease_costs.nhif_relief','projected_disease_costs.total_less_nhif','projected_disease_costs.total'])
            ->where('projected_disease_costs.county_id','=',$county)
            ->orderby('projected_disease_costs.county_id');
        return Datatables::of($diseasescosts)->make();
    }
}
