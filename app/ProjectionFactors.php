<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectionFactors extends Model
{
    //
    protected $table= "projection_factors";
    //
    protected $fillable =[
        'factor',
        'description'

    ];
}
