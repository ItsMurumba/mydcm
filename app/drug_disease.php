<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class drug_disease extends Model
{
    //
    protected  $table="drug_disease";

    protected $fillable=[
        'drug_id',
        'disease_id',
        'gender_id',
        'disease_type_id'
    ];
}
