<?php

namespace App\Http\Requests;

use App\Models\Atividadeparticipante;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAtividadeparticipanteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('atividadeparticipante_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:atividadeparticipantes,id',
        ];
    }
}
