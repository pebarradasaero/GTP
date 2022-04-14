<?php

namespace App\Http\Requests;

use App\Models\Atividadeparticipante;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAtividadeparticipanteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('atividadeparticipante_edit');
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
            'petisco' => [
                'required',
            ],
            'bebida' => [
                'required',
            ],
            'atividade' => [
                'required',
            ],
        ];
    }
}
