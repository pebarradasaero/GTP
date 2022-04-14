<?php

namespace App\Http\Requests;

use App\Models\Equipa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEquipaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('equipa_edit');
    }

    public function rules()
    {
        return [
            'nome' => [
                'string',
                'required',
                'unique:equipas,nome,' . request()->route('equipa')->id,
            ],
            'grupo_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
