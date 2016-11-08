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
        'pack_size',
        'no_of_packs',
        'price_per_pack',
        'total',
        'total_units',
        'price_per_unit'

    ];
}
