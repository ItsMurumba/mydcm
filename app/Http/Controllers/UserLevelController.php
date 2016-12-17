<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiseaseCosts;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use App\County;
use Illuminate\Support\Facades\DB;

class UserLevelController extends Controller
{
    //

    public function listdiseasecosts() {
        $user= Session::get('user');
        $diseasescosts = DiseaseCosts::join('disease','disease_costs.diseases_id','=','disease.id')
            ->join('population_distribution','population_distribution.id','=','disease_costs.distributions_id')
            ->join('facility','facility.id','=','disease_costs.facility_id')
            ->select(['disease_costs.year','facility.facility_name','population_distribution.age_group','disease.disease_name', 'disease_costs.population','disease_costs.salaries' ,'disease_costs.services_total_cost', 'disease_costs.consultation_fee', 'disease_costs.drugs_total_cost','disease_costs.nhif_relief','disease_costs.total','disease_costs.total_less_nhif_relief'])
            ->where('disease_costs.user_id','=',$user)
            ->orderby('disease.disease_name');
        return Datatables::of($diseasescosts)->make();
    }

    public function index(){
        $user= Session::get('user');
//        $county = County::pluck('county_name', 'id');
        $diseases = DB::select(DB::raw("SELECT d.disease_name,d.id as id FROM disease_costs dc JOIN disease d ON d.id=dc.diseases_id WHERE dc.user_id='$user'"),
            array(
                'user' => $user,
            ));


        return view('userlevel', ['diseases'=> $diseases]);
    }
}
