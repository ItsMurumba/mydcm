<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosage extends Model
{
    //
    protected $table= "dosage";
    protected $fillable =[
        'distribution_id',
        'drug_id',
        'dosage',
        'user_id',
        'disease_id'

    ];
}
