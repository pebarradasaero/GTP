@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.actividadejf.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actividadejfs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.actividadejf.fields.id') }}
                        </th>
                        <td>
                            {{ $actividadejf->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividadejf.fields.jf') }}
                        </th>
                        <td>
                            {{ $actividadejf->jf->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividadejf.fields.grupo') }}
                        </th>
                        <td>
                            {{ $actividadejf->grupo->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividadejf.fields.equipa') }}
                        </th>
                        <td>
                            {{ $actividadejf->equipa->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividadejf.fields.atividade') }}
                        </th>
                        <td>
                            {{ App\Models\Actividadejf::ATIVIDADE_RADIO[$actividadejf->atividade] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividadejf.fields.simpatia') }}
                        </th>
                        <td>
                            {{ App\Models\Actividadejf::SIMPATIA_RADIO[$actividadejf->simpatia] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actividadejfs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection