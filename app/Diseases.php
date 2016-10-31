<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diseases extends Model
{
    //
    protected $table= "disease";
    protected $fillable =[
        'name',
        'description'

    ];
}
