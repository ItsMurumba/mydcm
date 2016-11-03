<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    //
    protected $table= "data_sets";
    //
    protected $fillable =[
        'name',
        'county_id',
        'facility_id',
        'disease_id',
        'distribution_id',
        'population',
        'total',
        'user_id'
    ];
}
