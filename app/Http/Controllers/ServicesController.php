<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Equipments;


class ServicesController extends Controller
{
    //
    public function equipments(){
        $equipments = Equipments::pluck('name', 'id');

        return view('services', ['equipments'=> $equipments]);
    }
}
