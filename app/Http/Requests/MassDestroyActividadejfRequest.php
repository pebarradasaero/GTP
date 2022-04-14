<?php

namespace App\Http\Requests;

use App\Models\Actividadejf;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyActividadejfRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('actividadejf_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:actividadejfs,id',
        ];
    }
}
