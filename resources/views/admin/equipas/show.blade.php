@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.equipa.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.equipas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.equipa.fields.id') }}
                        </th>
                        <td>
                            {{ $equipa->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipa.fields.nome') }}
                        </th>
                        <td>
                            {{ $equipa->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipa.fields.grupo') }}
                        </th>
                        <td>
                            {{ $equipa->grupo->nome ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.equipas.index') }}">
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
            <a class="nav-link" href="#equipa_actividadejfs" role="tab" data-toggle="tab">
                {{ trans('cruds.actividadejf.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#equipa_atividadeparticipantes" role="tab" data-toggle="tab">
                {{ trans('cruds.atividadeparticipante.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="equipa_actividadejfs">
            @includeIf('admin.equipas.relationships.equipaActividadejfs', ['actividadejfs' => $equipa->equipaActividadejfs])
        </div>
        <div class="tab-pane" role="tabpanel" id="equipa_atividadeparticipantes">
            @includeIf('admin.equipas.relationships.equipaAtividadeparticipantes', ['atividadeparticipantes' => $equipa->equipaAtividadeparticipantes])
        </div>
    </div>
</div>

@endsection