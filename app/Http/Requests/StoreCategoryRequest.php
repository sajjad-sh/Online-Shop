<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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

    # TODO: Customize error messages
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:50',
            'parent_id' => 'integer',
            'slug' => ['required', 'min:2', 'max:50', 'regex:/^[A-Za-z0-9-]+$/', 'unique:categories'],
            'icon' => 'url',
            'description' => ''
        ];
    }
}
