<?php

namespace App\Http\Requests;

use App\Models\Actividadejf;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateActividadejfRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('actividadejf_edit');
    }

    public function rules()
    {
        return [
            'jf_id' => [
                'required',
                'integer',
            ],
            'grupo_id' => [
                'required',
                'integer',
            ],
            'equipa_id' => [
                'required',
                'integer',
            ],
            'atividade' => [
                'required',
            ],
            'simpatia' => [
                'required',
            ],
        ];
    }
}
