<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimates extends Model
{
    //
    protected $table= "population_estimates";
    //
    protected $fillable =[
        'population',
        'population_distribution_id',
        'county_id',
        'facility_id',
        'disease_id'

    ];
}
