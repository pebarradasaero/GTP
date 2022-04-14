@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.juntasFreguesium.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.juntas-freguesia.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.juntasFreguesium.fields.id') }}
                        </th>
                        <td>
                            {{ $juntasFreguesium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.juntasFreguesium.fields.nome') }}
                        </th>
                        <td>
                            {{ $juntasFreguesium->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.juntasFreguesium.fields.localidade') }}
                        </th>
                        <td>
                            {{ $juntasFreguesium->localidade }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.juntas-freguesia.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#jf_actividadejfs" role="tab" data-toggle="tab">
                {{ trans('cruds.actividadejf.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#jf_atividadeparticipantes" role="tab" data-toggle="tab">
                {{ trans('cruds.atividadeparticipante.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="jf_actividadejfs">
            @includeIf('admin.juntasFreguesia.relationships.jfActividadejfs', ['actividadejfs' => $juntasFreguesium->jfActividadejfs])
        </div>
        <div class="tab-pane" role="tabpanel" id="jf_atividadeparticipantes">
            @includeIf('admin.juntasFreguesia.relationships.jfAtividadeparticipantes', ['atividadeparticipantes' => $juntasFreguesium->jfAtividadeparticipantes])
        </div>
    </div>
</div>

@endsection