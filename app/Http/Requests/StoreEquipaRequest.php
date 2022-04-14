<?php

namespace App\Http\Requests;

use App\Models\Equipa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEquipaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('equipa_create');
    }

    public function rules()
    {
        return [
            'nome' => [
                'string',
                'required',
                'unique:equipas',
            ],
            'grupo_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
