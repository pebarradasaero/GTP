@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.registoRegularidade.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.registo-regularidades.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.registoRegularidade.fields.id') }}
                        </th>
                        <td>
                            {{ $registoRegularidade->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registoRegularidade.fields.grupo') }}
                        </th>
                        <td>
                            {{ $registoRegularidade->grupo->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registoRegularidade.fields.equipa') }}
                        </th>
                        <td>
                            {{ $registoRegularidade->equipa->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registoRegularidade.fields.regularidade_1') }}
                        </th>
                        <td>
                            {{ App\Models\RegistoRegularidade::REGULARIDADE_1_RADIO[$registoRegularidade->regularidade_1] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registoRegularidade.fields.regularidade_2') }}
                        </th>
                        <td>
                            {{ App\Models\RegistoRegularidade::REGULARIDADE_2_RADIO[$registoRegularidade->regularidade_2] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.registo-regularidades.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection