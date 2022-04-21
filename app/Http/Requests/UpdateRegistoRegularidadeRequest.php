<?php

namespace App\Http\Requests;

use App\Models\RegistoRegularidade;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRegistoRegularidadeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('registo_regularidade_edit');
    }

    public function rules()
    {
        return [
            'regularidade_1' => [
                'required',
            ],
            'regularidade_2' => [
                'required',
            ],
        ];
    }
}
