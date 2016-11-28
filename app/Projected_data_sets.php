<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projected_data_sets extends Model
{
    //
    protected $table="projected_data_sets";

    protected $fillable=[
        'data_set_id',
        'disease_id',
        'projected_population',
        'projected_services_cost',
        'projected_consultation_fee',
        'projected_drugs_fee',
        'user_id'
    ];
}
