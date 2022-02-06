<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'role' => ['required'],
            'username' => ['required', 'unique:users', 'alpha_num', 'min:5', 'max:25'],
            'email' => ['required', 'unique:users', 'email'],
            'name' => ['required', 'min:3', 'string'],
            'password' => ['required', 'min:8'],
        ];
    }
}
