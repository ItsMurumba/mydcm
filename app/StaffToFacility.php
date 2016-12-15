<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffToFacility extends Model
{
    //
    protected $table= "staff_facility";
    //
    protected $fillable =[
        'no_of_cadres',
        'staff_category_id',
        'facility_id',
        'county_id'

    ];
}
