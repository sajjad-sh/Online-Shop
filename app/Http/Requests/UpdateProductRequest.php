<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'fa_title' => 'required|min:3',
            'en_title' => '',
            'price' => 'integer',
            'inventory' => 'integer',
            'review' => '',
            'primary_specification_titles[]' => 'min:3',
            'primary_specification_values[]' => '',
            'special_specifications_titles[]' => 'min:3',
            'special_specifications_values[]' => '',
            'status' => 'required',
            'amazing_id' => 'integer'
        ];
    }
}
