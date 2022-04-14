<?php

namespace App\Http\Requests;

use App\Models\JuntasFreguesium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJuntasFreguesiumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('juntas_freguesium_edit');
    }

    public function rules()
    {
        return [
            'nome' => [
                'string',
                'required',
            ],
            'localidade' => [
                'string',
                'nullable',
            ],
        ];
    }
}
