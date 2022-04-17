@php
use Carbon\Carbon;
$inicio = $atividadeparticipante->checkin;
$today_now = Carbon::now()->subMinutes(20);
$agora = $today_now->diffInSeconds($inicio);

@endphp
@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Avaliação de atividade - Tempo Restante para completar: <span id="timet"></span>
                    </div>

                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('frontend.atividadeparticipantes.update', [$atividadeparticipante->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label class="required"
                                    for="jf_id">{{ trans('cruds.atividadeparticipante.fields.jf') }}</label>
                                <select class="form-control select2" name="jf_id" id="jf_id" required disabled>
                                    @foreach ($jfs as $id => $entry)
                                        <option value="{{ $id }}"
                                            {{ (old('jf_id') ? old('jf_id') : $atividadeparticipante->jf->id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $entry }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('jf'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('jf') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.atividadeparticipante.fields.jf_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="grupo_id">{{ trans('cruds.atividadeparticipante.fields.grupo') }}</label>
                                <select class="form-control select2" name="grupo_id" id="grupo_id" required disabled>
                                    @foreach ($grupos as $id => $entry)
                                        <option value="{{ $id }}"
                                            {{ (old('grupo_id') ? old('grupo_id') : $atividadeparticipante->grupo->id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $entry }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('grupo'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('grupo') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.atividadeparticipante.fields.grupo_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="equipa_id">{{ trans('cruds.atividadeparticipante.fields.equipa') }}</label>
                                <select class="form-control select2" name="equipa_id" id="equipa_id" required disabled>
                                    @foreach ($equipas as $id => $entry)
                                        <option value="{{ $id }}"
                                            {{ (old('equipa_id') ? old('equipa_id') : $atividadeparticipante->equipa->id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $entry }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('equipa'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('equipa') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.atividadeparticipante.fields.equipa_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <p style="text-align: center"> <label
                                        class="required">{{ trans('cruds.atividadeparticipante.fields.petisco') }}</label>
                                </p>
                                <center>
                                    @foreach (App\Models\Atividadeparticipante::PETISCO_RADIO as $key => $label)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="petisco_{{ $key }}"
                                                name="petisco" value="{{ $key }}"
                                                {{ old('petisco', $atividadeparticipante->petisco) === (string) $key ? 'checked' : '' }}
                                                required>
                                            <label class="form-check-label"
                                                for="petisco_{{ $key }}">{{ $label }} </label>
                                        </div>
                                    @endforeach
                                </center>
                                @if ($errors->has('petisco'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('petisco') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.atividadeparticipante.fields.petisco_helper') }}</span>
                            </div>
                            <br>
                            <div class="form-group">
                                <p style="text-align: center"> <label
                                        class="required">{{ trans('cruds.atividadeparticipante.fields.bebida') }}</label>
                                </p>
                                <center>
                                    @foreach (App\Models\Atividadeparticipante::BEBIDA_RADIO as $key => $label)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="bebida_{{ $key }}"
                                                name="bebida" value="{{ $key }}"
                                                {{ old('bebida', $atividadeparticipante->bebida) === (string) $key ? 'checked' : '' }}
                                                required>
                                            <label class="form-check-label"
                                                for="bebida_{{ $key }}">{{ $label }}</label>
                                        </div>
                                    @endforeach
                                </center>
                                @if ($errors->has('bebida'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('bebida') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.atividadeparticipante.fields.bebida_helper') }}</span>
                            </div>
                            <br>
                            <div class="form-group">
                                <p style="text-align: center"><label
                                        class="required">{{ trans('cruds.atividadeparticipante.fields.atividade') }}</label>
                                </p>
                                <center>
                                    @foreach (App\Models\Atividadeparticipante::ATIVIDADE_RADIO as $key => $label)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="atividade_{{ $key }}"
                                                name="atividade" value="{{ $key }}"
                                                {{ old('atividade', $atividadeparticipante->atividade) === (string) $key ? 'checked' : '' }}
                                                required>
                                            <label class="form-check-label"
                                                for="atividade_{{ $key }}">{{ $label }}</label>
                                        </div>
                                    @endforeach
                                </center>
                                @if ($errors->has('atividade'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('atividade') }}
                                    </div>
                                @endif

                                <span
                                    class="help-block">{{ trans('cruds.atividadeparticipante.fields.atividade_helper') }}</span>
                            </div><br><br>
                            <center>
                                <div class="form-group">
                                    <button class="btn btn-danger" type="submit">
                                        Terminar atividade
                                    </button>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        function showTime() {
            var inicio = new Date('{{ $inicio }}');
            var agora = new Date();
            var diff = new Date(inicio-agora);
            diff.setMinutes( diff.getMinutes() + 20 );
            $("#timet").text(diff.getMinutes() + ":" + diff.getSeconds()); //d.getHours() + ":" + d.getMinutes();
        }

        setInterval(showTime, 1000);
        
    </script>
@endsection
