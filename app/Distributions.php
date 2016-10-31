<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributions extends Model
{
    //
    protected $table= "population_distribution";

    //
    protected $fillable =[
        'age_group',
        'gender'

    ];
}
