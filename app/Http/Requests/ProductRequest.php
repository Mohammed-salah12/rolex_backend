<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'is_new' => 'boolean',
            'is_featured' => 'boolean',
            'name' => 'required|string|max:255',
            'img' => 'image|mimes:jpeg,png,jpg,gif,jpeg|max:2048',
        ];
    }
}
