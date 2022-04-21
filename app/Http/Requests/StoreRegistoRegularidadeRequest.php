<?php

namespace App\Http\Requests;

use App\Models\RegistoRegularidade;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRegistoRegularidadeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('registo_regularidade_create');
    }

    public function rules()
    {
        return [
            'equipa_id' => [
                'required',
                'integer',
            ],
            'regularidade_1' => [
                'required',
            ],
            'regularidade_2' => [
                'required',
            ],
        ];
    }
}
