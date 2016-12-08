<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiseaseCosts;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use App\County;

class UserLevelController extends Controller
{
    //

    public function listdiseasecosts() {
        $user= Session::get('user');
        $diseasescosts = DiseaseCosts::join('disease','disease_costs.diseases_id','=','disease.id')
            ->join('population_distribution','population_distribution.id','=','disease_costs.distributions_id')
            ->join('facility','facility.id','=','disease_costs.facility_id')
            ->join('data_sets','data_sets.disease_id','=','disease_costs.diseases_id')
            ->select(['disease_costs.year','facility.facility_name','population_distribution.age_group','disease.name', 'data_sets.population' ,'disease_costs.services_total_cost', 'disease_costs.consultation_fee', 'disease_costs.drugs_total_cost','disease_costs.total'])
            ->where('disease_costs.user_id','=',$user)
            ->orderby('disease.name');
        return Datatables::of($diseasescosts)->make();
    }

    public function index(){
        $county = County::pluck('county_name', 'id');

        return view('userlevel', ['county'=> $county]);
    }
}
