<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table= "county";
    //
    protected $fillable =[
        'county_name',
        'address',
        'tel_no'

    ];
    protected $counties = "County::lists('county_name', 'id');";
    
}
