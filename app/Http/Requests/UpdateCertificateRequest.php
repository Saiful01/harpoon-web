<?php

namespace App\Http\Requests;

use App\Models\Certificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCertificateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('certificate_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
