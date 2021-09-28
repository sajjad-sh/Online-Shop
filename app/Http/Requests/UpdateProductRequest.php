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
            'fa_title' => 'required|min:3|max:50',
            'en_title' => '',
            'price' => 'integer',
            'inventory' => 'integer',
            'review' => '',
            'status' => 'required',
            'amazing_id' => 'integer'
        ];
    }
}
