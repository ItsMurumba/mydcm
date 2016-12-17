<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDrugsRequest extends FormRequest
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
            'name'    =>'required|unique:drug,name',
            'generic_name'   =>'required|unique:drug,generic_name',
            'pack_size'  =>'required|regex:/^[0-9]+$/',
            'no_of_packs' =>'required|regex:/^[0-9]+$/',
            'price_per_pack' =>'required|regex:/^\d*(\.\d{1,2})?$/'
        ];
    }
}
