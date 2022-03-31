<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsenteeismRequest extends FormRequest
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
            'employee_name' => ['required'],
            'signin_date' => ['required'],
            'signin_time' => ['required'],
            'status' => ['required'],
            'time_to_finish_work' => ['required'],
        ];
    }
}
