<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
    //
    protected $table= "equipment";
    //
    protected $fillable =[
        'name',
        'model',
        'date_of_delivery',
        'cost'

    ];
}
