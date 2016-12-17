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

        $devlist = DB::select(DB::raw("SELECT year,SUM(total) AS total FROM `projected_disease_costs` GROUP BY year "));
        return $devlist;
    }

    public function projectChartData1()
    {
        $user= Session::get('user');

        $devlist = DB::select(DB::raw("SELECT year,SUM(total_less_nhif) AS total FROM `projected_disease_costs` GROUP BY year "));
        return $devlist;
    }

    public function projectChartData2()
    {
        $user= Session::get('user');

        $devlist = DB::select(DB::raw("SELECT d.disease_name,SUM(total_less_nhif_relief) AS total FROM disease_costs dc JOIN disease d ON d.id=dc.diseases_id GROUP BY d.disease_name "));
        return $devlist;
    }

    public function projectChartData3()
    {
        $user= Session::get('user');

        $devlist = DB::select(DB::raw("SELECT c.county_name,SUM(total_less_nhif_relief) AS total FROM disease_costs dc JOIN county c ON c.id=dc.county_id GROUP BY c.county_name "));
        return $devlist;
    }

    public function projectChartData4()
    {
        $user= Session::get('user');

        $devlist = DB::select(DB::raw("SELECT d.disease_name,SUM(pdc.total) AS total FROM projected_disease_costs pdc JOIN disease d ON d.id=pdc.disease_id GROUP BY d.disease_name "));
        return $devlist;
    }

    public function projectChartData5()
    {
        $user= Session::get('user');

        $devlist = DB::select(DB::raw("SELECT c.county_name,SUM(pdc.total_less_nhif) AS total FROM projected_disease_costs pdc JOIN county c ON c.id=pdc.county_id GROUP BY c.county_name "));
        return $devlist;
    }
}
