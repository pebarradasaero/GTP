@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Painel de Resultados
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Resultados - Prémio Juntas de Freguesia</h5>
                                </div>
                                <div class="table-responsive">
                                    <table
                                        class=" table table-bordered table-striped table-hover datatable datatable-Resultadosjunta">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Pos.
                                                </th>
                                                <th>
                                                    Junta Freguesia
                                                </th>
                                                <th>
                                                    {{ trans('cruds.atividadeparticipante.fields.petisco') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.atividadeparticipante.fields.bebida') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.atividadeparticipante.fields.atividade') }}
                                                </th>
                                                <th>
                                                    Total
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($resultadosjuntas as $key => $resultadosjunta)
                                                <tr>
                                                    <td>
                                                        @if ($key + 1 < 4)
                                                            <strong>-->{{ $key + 1 ?? '' }}</strong>
                                                        @else
                                                            {{ $key + 1 ?? '' }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($key + 1 < 4)
                                                            <strong>{{ $resultadosjunta->nome ?? '' }} </strong>
                                                        @else
                                                            {{ $resultadosjunta->nome ?? '' }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $resultadosjunta->petisco ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $resultadosjunta->bebida ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $resultadosjunta->atividade ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $resultadosjunta->total ?? '' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Resultados - Prémio Participantes</h5>
                                </div>
                                <div class="table-responsive">
                                    <table
                                        class=" table table-bordered table-striped table-hover datatable datatable-Resultadosjunta">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Pos.
                                                </th>
                                                <th>
                                                    {{ trans('cruds.actividadejf.fields.equipa') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.actividadejf.fields.atividade') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.actividadejf.fields.simpatia') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.registoRegularidade.fields.regularidade_1') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.registoRegularidade.fields.regularidade_2') }}
                                                </th>
                                                <th>
                                                    Penalização - Tempo
                                                </th>
                                                <th>
                                                    Total
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($resultadosparticipantes as $key => $resultadosparticipante)
                                                <tr>
                                                    <td>
                                                        @if ($key + 1 < 4)
                                                            <strong>-->{{ $key + 1 ?? '' }}</strong>
                                                        @else
                                                            {{ $key + 1 ?? '' }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($key + 1 < 4)
                                                            <strong>{{ $resultadosparticipante->nome ?? '' }} </strong>
                                                        @else
                                                            {{ $resultadosparticipante->nome ?? '' }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $resultadosparticipante->atividade ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $resultadosparticipante->simpatia ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $resultadosparticipante->regularidade_1 ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $resultadosparticipante->regularidade_2 ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $resultadosparticipante->penalizacao ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $resultadosparticipante->total ?? '' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@endsection
