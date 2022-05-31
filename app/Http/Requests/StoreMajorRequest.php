<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMajorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'bail',
                'required',
                'string',
                'unique:App\Models\Major,name',
            ]
        ];
    }
}
