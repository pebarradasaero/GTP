@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.grupo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grupos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.grupo.fields.id') }}
                        </th>
                        <td>
                            {{ $grupo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grupo.fields.nome') }}
                        </th>
                        <td>
                            {{ $grupo->nome }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grupos.index') }}">
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
            <a class="nav-link" href="#grupo_actividadejfs" role="tab" data-toggle="tab">
                {{ trans('cruds.actividadejf.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#grupo_equipas" role="tab" data-toggle="tab">
                {{ trans('cruds.equipa.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#grupo_atividadeparticipantes" role="tab" data-toggle="tab">
                {{ trans('cruds.atividadeparticipante.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#grupo_registo_regularidades" role="tab" data-toggle="tab">
                {{ trans('cruds.registoRegularidade.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="grupo_actividadejfs">
            @includeIf('admin.grupos.relationships.grupoActividadejfs', ['actividadejfs' => $grupo->grupoActividadejfs])
        </div>
        <div class="tab-pane" role="tabpanel" id="grupo_equipas">
            @includeIf('admin.grupos.relationships.grupoEquipas', ['equipas' => $grupo->grupoEquipas])
        </div>
        <div class="tab-pane" role="tabpanel" id="grupo_atividadeparticipantes">
            @includeIf('admin.grupos.relationships.grupoAtividadeparticipantes', ['atividadeparticipantes' => $grupo->grupoAtividadeparticipantes])
        </div>
        <div class="tab-pane" role="tabpanel" id="grupo_registo_regularidades">
            @includeIf('admin.grupos.relationships.grupoRegistoRegularidades', ['registoRegularidades' => $grupo->grupoRegistoRegularidades])
        </div>
    </div>
</div>

@endsection