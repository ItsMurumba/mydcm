<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class CreateEstimatesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'population'    =>'required',
            'distributions'   =>'required',
            'county'       =>'required',
            'diseases' =>'required',
            'gender'=>'required',
            'facility' =>'required',
            'diseasetype'=>'required',
            'population' => 'unique:population_estimates,population,NULL,int,population,'.Input::get('population').',county_id,'.Input::get('county').',facility_id,'.Input::get('facility').',population_distribution_id,'.Input::get('distributions').',gender_id,'.Input::get('gender').',disease_id,'.Input::get('diseases').',disease_type_id,'.Input::get('diseasetype')
        ];
    }
}
