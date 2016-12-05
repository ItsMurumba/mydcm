<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PredictDiseaseCosts extends Model
{
    //
    protected $table= "projected_disease_costs";
    //
    protected $fillable =[
        'diseases_id',
        'services_total_cost',
        'consultation_fee',
        'drugs_total_cost',
        'total',
        'distributions_id',
        'facility_id',
        'projected_population'

    ];
}
