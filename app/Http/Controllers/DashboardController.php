<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index(){
        $salaries = DB::select(DB::raw("SELECT SUM(salaries)AS Salaries FROM disease_costs"));
        $services = DB::select(DB::raw("SELECT SUM(services_total_cost)AS Services FROM disease_costs"));
        $consultation = DB::select(DB::raw("SELECT SUM(consultation_fee)AS Consultation FROM disease_costs"));
        $drugs = DB::select(DB::raw("SELECT SUM(drugs_total_cost)AS Drugs FROM disease_costs"));
        return view('dashboard')->with( ['salaries'=> $salaries,'services'=> $services,'consultation'=>$consultation,'drugs'=>$drugs]);
    }
}
