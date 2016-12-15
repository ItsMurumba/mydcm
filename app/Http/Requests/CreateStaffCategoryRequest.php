<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStaffCategoryRequest extends FormRequest
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
            'cadre'    =>'required|unique:staff_category,cadre',
            'basic_salary'   =>'required',
            'allowances'       =>'required',
            'reimbursement'       =>'required'

        ];
    }
}
