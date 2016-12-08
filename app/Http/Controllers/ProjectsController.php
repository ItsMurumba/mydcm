<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PredictDiseaseCosts;
use Illuminate\Support\Facades\Session;

class ProjectsController extends Controller
{
    //

    /**
     * Display a the chart for projects.
     * GET /projects/chart/data
     *
     * @return Response
     */

    public function projectChartData()
    {
        $user= Session::get('user');
        $devlist = PredictDiseaseCosts::join('disease','projected_disease_costs.disease_id','=','disease.id')
            ->join('population_distribution','population_distribution.id','=','projected_disease_costs.distributions_id')
            ->join('facility','facility.id','=','projected_disease_costs.facility_id')
            ->select(['disease.name','projected_disease_costs.projected_population','projected_disease_costs.total','projected_disease_costs.year'])
            ->where('projected_disease_costs.user_id','=',$user)
            ->orderby('projected_disease_costs.year')
            ->get();

        return $devlist;
    }
}
