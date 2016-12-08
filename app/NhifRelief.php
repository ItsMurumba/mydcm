<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhifRelief extends Model
{
    //
    protected $table= "nhif_relief";
    //
    protected $fillable =[
        'patient_type',
        'relief_amount'

    ];
}
