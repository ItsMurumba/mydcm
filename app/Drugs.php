<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drugs extends Model
{
    //
    protected $table= "drug";
    protected $fillable =[
        'name',
        'generic_name',
        'unit',
        'unit_cost'

    ];
}
