<?php

namespace App\Http\Requests;

use App\Models\Major;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMajorRequest extends FormRequest
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
                Rule::unique(Major::class)->ignore($this->major),
            ],
        ];
    }
}
