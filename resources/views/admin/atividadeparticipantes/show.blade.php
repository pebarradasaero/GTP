@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.atividadeparticipante.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.atividadeparticipantes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.atividadeparticipante.fields.id') }}
                        </th>
                        <td>
                            {{ $atividadeparticipante->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.atividadeparticipante.fields.jf') }}
                        </th>
                        <td>
                            {{ $atividadeparticipante->jf->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.atividadeparticipante.fields.grupo') }}
                        </th>
                        <td>
                            {{ $atividadeparticipante->grupo->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.atividadeparticipante.fields.equipa') }}
                        </th>
                        <td>
                            {{ $atividadeparticipante->equipa->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.atividadeparticipante.fields.petisco') }}
                        </th>
                        <td>
                            {{ App\Models\Atividadeparticipante::PETISCO_RADIO[$atividadeparticipante->petisco] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.atividadeparticipante.fields.bebida') }}
                        </th>
                        <td>
                            {{ App\Models\Atividadeparticipante::BEBIDA_RADIO[$atividadeparticipante->bebida] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.atividadeparticipante.fields.atividade') }}
                        </th>
                        <td>
                            {{ App\Models\Atividadeparticipante::ATIVIDADE_RADIO[$atividadeparticipante->atividade] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.atividadeparticipantes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection