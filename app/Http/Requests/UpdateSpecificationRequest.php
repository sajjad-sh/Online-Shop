<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSpecificationRequest extends FormRequest
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
//            'title' => 'unique:primary_specification_values,spec_title_id',
            'title' => '',
            'value' => 'required|min:2'
//            'title' => [
//                'unique:primary_specification_values,spec_title_id',
//                Rule::unique('primary_specification_values')->ignore('spec_title_id'),
//            ]
        ];
    }
}
