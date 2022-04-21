@php
    use Carbon\Carbon;
@endphp
@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.atividadeparticipante.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.atividadeparticipantes.index') }}">
                                Voltar
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                
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
                                <tr>
                                    <th>
                                        Tempo Gasto
                                    </th>
                                    <td>
                                        {{ gmdate('H:i:s',Carbon::parse($atividadeparticipante->checkin)->diffInSeconds(Carbon::parse($atividadeparticipante->checkout))); }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.atividadeparticipantes.index') }}">
                                Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection