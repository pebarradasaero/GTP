<?php

namespace App\Http\Requests;

use App\Models\Equipa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEquipaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('equipa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:equipas,id',
        ];
    }
}
