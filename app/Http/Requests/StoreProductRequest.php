<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'fa_title' => 'required|min:3|max:255',
            'en_title' => '',
            'slug' => ['required','min:2', 'max:50'],
            'description' => 'required|min:3|max:1000',
            'price' => 'integer',
            'inventory' => 'integer',
            'review' => '',
            'status' => 'required',
            'amazing_id' => '',
            'color' => 'string',
            'brand' => 'string',
            'mykeys' => '',
            'myvalues' => '',
            'categories' => '',
        ];
    }
}
