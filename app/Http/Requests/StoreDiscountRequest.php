<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
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
            'code' => ['required','min:3', 'max:50', 'regex:/^[A-Za-z0-9-]+$/', 'unique:discounts'],
            'title' => 'required', 'min:3', 'max:25',
            'type' => 'required|integer|between:0,1',
            'amount' => 'required|integer',
            'inventory' => 'required|integer',
        ];
    }
}
