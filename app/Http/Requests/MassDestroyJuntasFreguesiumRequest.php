<?php

namespace App\Http\Requests;

use App\Models\JuntasFreguesium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJuntasFreguesiumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('juntas_freguesium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:juntas_freguesia,id',
        ];
    }
}
