<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Diseases;
use App\DiseaseCosts;
use App\Services;
use App\Distributions;
use Illuminate\Support\Facades\DB;
use Dotenv\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\ConsultationFee;
use App\Facilities;
use App\NhifRelief;
use App\Gender;
use App\Http\Requests\CreateDiseaseCostRequest;
use Illuminate\Validation\Rules\In;


class DiseaseCostsController extends Controller
{
    //
    //function used to populate dropdown
    public function index(){
        $facility= Session::get('facility');
        $level = DB::select(DB::raw("SELECT level_id FROM facility where id='$facility'"), array(
            'facility' => $facility,
        ));
        foreach ($level as $row){
            global $levelid;
            $levelid= $row->level_id;
        }
        $diseases = Diseases::pluck('disease_name', 'id');
        $gender=Gender::pluck('gender_name','id');
        $nhiefrelief=NhifRelief::pluck('patient_type','relief_amount');
        $services = DB::select(DB::raw("SELECT service_name,cost FROM services "));
        $consultationfee=DB::select(DB::raw("SELECT consultation_amount FROM consultation_fee where level_id='$levelid'"), array(
            'levelid' => $levelid,
        ));
        $distributions= Distributions::pluck('age_group','id');
        return view('diseasecosts')->with(['gender'=>$gender,'nhifrelief'=>$nhiefrelief,'consultationfee'=>$consultationfee,'diseases' => $diseases,'services' => $services,'distributions' => $distributions]);
    }


    public function store(CreateDiseaseCostRequest $request)
    {
;
        $user= Session::get('user');
        $county= Session::get('county');
        $facility= Session::get('facility');
        $distributions_id=Input::get('distributions');
        $disease_id=Input::get('diseases');
        $gender=Input::get('gender');
        $diseasetype=Input::get('diseasetype');

        //Getting a total cost of the services that were selected for the disease
        $costs=array();
        $costs[]=Input::get('services',[]);
        foreach ($costs as $row){
            global $summation;
            $summation= array_sum($row);
        }

        //Query to get the population of the selected data set
        $population=DB::select(DB::raw("SELECT population FROM population_estimates WHERE facility_id='$facility' AND disease_id='$disease_id' AND population_distribution_id='$distributions_id' AND gender_id='$gender' and disease_type_id='$diseasetype' "), array(
            'distributions_id' => $distributions_id,
        ), array(
            'disease_id' => $disease_id,
        ), array(
            'gender' => $gender,
        ), array(
            'facility' => $facility,
        ), array(
            'diseasetype' => $diseasetype,
        ));
        global $Population;

        foreach ($population as $row){

            $Population = $row->population;

        }

        //Query for getting the dosage and the costs of drugs required to treat the disease
        $DrugCosts = DB::select(DB::raw("SELECT ds.dosage, d.price_per_unit FROM dosage ds JOIN drug d ON d.id=ds.drug_id where ds.distribution_id='$distributions_id' AND ds.disease_id='$disease_id'"), array(
            'distributions_id' => $distributions_id,
        ), array(
            'disease_id' => $disease_id,
        ));
        global $sum;
        $sum=0;
        foreach ($DrugCosts as $row){

            global $dosage;
            $dosage= $row->dosage;

            global $price;
            $price=$row->price_per_unit;

            global $product;
            $product=$dosage*$price;
            $sum=$sum+$product;

        }
        //Finding the total cost of drugs against the population of the selected group
        $TotalDrugsCost=$Population*$sum;

        //Finding the total services against Population
        $TotalServiceCost=$Population*$summation;

        //Finding the total consultation fee against Population
        $ConsultationFee=Input::get('consultationfee');
        $TotalConsultationFee=$Population* $ConsultationFee;

        //Finding Total Nhif Relief against the population
        $NhifRelief=Input::get('nhiefrelief');
        $TotalNhifRelief=$Population*$NhifRelief;

        //Finding the total salaries of the employees that are assigned to the facility where the dataset is assigned.
        $Salaries= DB::select(DB::raw("SELECT ((sc.basic_salary)+(sc.allowances)+(sc.reimbursement)) AS Total ,sf.no_of_cadres,sf.staff_category_id FROM staff_category sc JOIN staff_facility sf ON sf.staff_category_id=sc.id WHERE sf.facility_id='$facility'"), array(
            'facility' => $facility,
        ));
        global $TotalSalaries;
        $TotalSalaries=0;
        foreach ($Salaries as $row){
            global $Total;
            $Total=$row->Total;

            global $count;
            $count=$row->no_of_cadres;

            global $ProductS;
            $ProductS=$Total*$count;
            $TotalSalaries=$TotalSalaries+$ProductS;
        }

        //Finding the Grand Total for the disease against the population(Consultation Fee, Services Fee, drugs cost and salaries of the employees)
        $GrandTotals=$TotalSalaries+$TotalConsultationFee+$TotalDrugsCost+$TotalServiceCost;

        //Finding Total Minus NHIF Relief
        $GrandTotalNoNhif= $GrandTotals - $TotalNhifRelief;

//        Store the record into the database
        $Year=2012;
        $DiseaseCosts = new DiseaseCosts;
        $DiseaseCosts->diseases_id = Input::get('diseases');
        $DiseaseCosts->distributions_id=$distributions_id;
        $DiseaseCosts->services_total_cost = $TotalServiceCost;
        $DiseaseCosts->consultation_fee = $TotalConsultationFee;
        $DiseaseCosts->drugs_total_cost = $TotalDrugsCost;
        $DiseaseCosts->total = $GrandTotals;
        $DiseaseCosts->total_less_nhif_relief=$GrandTotalNoNhif;
        $DiseaseCosts->user_id=$user;
        $DiseaseCosts->county_id=$county;
        $DiseaseCosts->facility_id=$facility;
        $DiseaseCosts->salaries=$TotalSalaries;
        $DiseaseCosts->year=$Year;
        $DiseaseCosts->population=$Population;
        $DiseaseCosts->gender_id=Input::get('gender');
        $DiseaseCosts->disease_type_id=Input::get('diseasetype');
        $DiseaseCosts->nhif_relief=$TotalNhifRelief;
        $DiseaseCosts->save();

        //redirect
        \Session::flash('message', 'Successfully added!');
        return redirect()->action('DiseaseCostsController@index');
//        return redirect()->action('PredictDiseaseCostsController@store');
    }
}
