<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIndexRequest extends FormRequest
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
            'dataset'    =>'required|unique:data_sets,data_set_name',
            'county'   =>'required',
            'facilities'       =>'required',
            'disease'       =>'required',
            'distributions'       =>'required',
            'gender'       =>'required'
        ];
    }
}
