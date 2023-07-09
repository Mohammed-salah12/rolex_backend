<?php

namespace App\Http\Requests;

use App\Rules\HashedPassword;
use Illuminate\Foundation\Http\FormRequest;

class AuthorRequset extends FormRequest
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
    protected function prepareForValidation()
    {
        $this->merge([
            'password' => bcrypt($this->input('password'))
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gmail' => 'email|required',
            'password' => 'string|required',
        ];
    }
}
