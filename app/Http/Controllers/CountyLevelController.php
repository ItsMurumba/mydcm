<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiseaseCosts;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use App\County;
use Illuminate\Support\Facades\DB;

class CountyLevelController extends Controller
{
    //
    public function listdiseasecosts() {

        $diseasescosts = DiseaseCosts::join('disease','disease_costs.diseases_id','=','disease.id')
            ->join('population_distribution','population_distribution.id','=','disease_costs.distributions_id')
            ->join('facility','facility.id','=','disease_costs.facility_id')
            ->join('county','county.id','=','disease_costs.county_id')
            ->join('data_sets','data_sets.disease_id','=','disease_costs.diseases_id')
            ->select(['disease_costs.year','county.county_name','facility.facility_name','population_distribution.age_group','disease.name','data_sets.population' ,'disease_costs.services_total_cost', 'disease_costs.consultation_fee', 'disease_costs.drugs_total_cost','disease_costs.total'])
            ->orderby('disease_costs.county_id');
        return Datatables::of($diseasescosts)->make();
    }
    public function index(){
//        $county = County::pluck('county_name', 'id');
        $user= Session::get('user');
        $county = DB::select(DB::raw("SELECT DISTINCT c.county_name,dc.county_id as id FROM disease_costs dc JOIN county c ON c.id=dc.county_id"));

        return view('countylevel', ['county'=> $county]);
    }
}
