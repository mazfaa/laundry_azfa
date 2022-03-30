<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThingsDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'things_name' => ['required'],
            'qty' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'pay_date' => ['required'],
            'supplier' => ['required'],
            'things_status' => ['required'],
            'updated_status_date' => ['required'],
        ];
    }
}