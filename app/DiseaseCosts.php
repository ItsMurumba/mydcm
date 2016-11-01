<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiseaseCosts extends Model
{
    //
    protected $table= "disease_costs";
    //
    protected $fillable =[
        'diseases_id',
        'services_total_cost',
        'consultation_fee',
        'drugs_total_cost',
        'total'

    ];
}
