<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultationFee extends Model
{
    //
    protected $table= "consultation_fee";
    //
    protected $fillable =[
        'level_id',
        'consultation_amount'

    ];
}
