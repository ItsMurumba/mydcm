<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projections extends Model
{
    //
    protected $table= "projections";

    //
    protected $fillable =[
        'rate',
        'projection_factor_id',
        'county_id'

    ];
}
