<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiseaseType extends Model
{
    //
    protected $table= "disease_types";
    //
    protected $fillable =[
        'disease_id',
        'gender_id',
        'disease_type'

    ];
}
