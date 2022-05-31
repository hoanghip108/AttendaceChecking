<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'gender' => [
                'required',
                'boolean',
            ],
            'birthdate' => [
                'required',
                'date',
                'before:today',
            ],
            'address' => [
                'required',
                'string',
            ],
            'phone' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
            ],
            'major_id' => [
                'required',
            ],
        ];
    }
}
