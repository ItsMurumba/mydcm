<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staffcategories extends Model
{
    //
    protected $table= "staff_category";
    //
    protected $fillable =[
        'cadre',
        'basic_salary',
        'allowances',
        'reimbursement'

    ];
}
