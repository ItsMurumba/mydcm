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
//        $devlist = DB::table('projects')
//            ->select(DB::raw('MONTHNAME(updated_at) as month'), DB::raw("DATE_FORMAT(updated_at,'%Y-%m') as monthNum"), DB::raw('count(*) as projects'))
//            ->groupBy('monthNum')
//            ->get();


        $devlist = PredictDiseaseCosts::join('disease','projected_disease_costs.disease_id','=','disease.id')
            ->join('population_distribution','population_distribution.id','=','projected_disease_costs.distributions_id')
            ->join('facility','facility.id','=','projected_disease_costs.facility_id')
            ->select(['disease.name','projected_disease_costs.projected_population','projected_disease_costs.year'])
            ->where('projected_disease_costs.user_id','=',$user)
            ->orderby('disease.name')
            ->get();

        return $devlist;
    }
}
