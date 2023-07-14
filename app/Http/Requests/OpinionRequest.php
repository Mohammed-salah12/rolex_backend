<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpinionRequest extends FormRequest
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
           'name' => 'required|string',
            'massage' => 'required|string',
            'job_name' => 'required|string',
            'img' => 'image|mimes:jpeg,png,jpg,gif,jpeg|max:2048',

        ];
    }
}
