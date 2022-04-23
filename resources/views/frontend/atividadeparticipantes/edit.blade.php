@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <center>Avaliação de atividade - Tempo Restante para completar: <h1><span style="color: red"
                                    id="timet"></span></h1>
                        </center>
                    </div>

                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('frontend.atividadeparticipantes.update', [$atividadeparticipante->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group" style="text-align: center">
                                <strong> {{ $atividadeparticipante->jf->nome ?? '' }} -
                                    {{ $atividadeparticipante->equipa->nome ?? '' }}</strong>
                            </div>
                            <div class="form-group" style="display: none">
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
                            <div class="form-group" style="display: none">
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
                            <div class="form-group" style="display: none">
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
                            </div>
                            <center>
                                <div class="form-group">
                                    <label class="required" for="senhasaida">Código
                                        Saída: </label>
                                    <input style="width: 100px" class="form-control" type="number" name="codigosaida"
                                        id="codigosaida" value="{{ old('codigosaida', '') }}" required>
                                    @if ($errors->has('codigosaida'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('codigosaida') }}
                                        </div>
                                    @endif
                                    <span class="help-block">*Solicite o código de saída a um elemento da
                                        organização.</span>
                                </div>
                            </center><br><br>
                            <center>
                                <div class="form-group">
                                    <button class="btn btn-danger" type="submit" disabled>
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
        $(function() {
            //alert('aqui!');
        });

        $("#codigosaida").on("input", function() {
            var codigosaida = $("#codigosaida").val();
            var senhasaida = {{ $atividadeparticipante->senhasaida }};
            if (codigosaida == senhasaida) {
                //alert("iguais");
                $(':input[type="submit"]').prop('disabled', false);
            } else {
                $(':input[type="submit"]').prop('disabled', true);
            }
        })

            var countDownDate = moment('{{ $atividadeparticipante->checkin }}').add(20, 'minutes');

            var x = setInterval(function() {
                diff = countDownDate.diff(moment());

                if (diff <= 0) {
                    clearInterval(x);
                    // If the count down is finished, write some text 
                    $("#timet").text("Terminou o tempo!");
                } else
                    $("#timet").text(moment.utc(diff).format("mm:ss"));
            }, 1000);
           
/*
        var now = moment(); // new Date().getTime();
        var countDownDate = moment('{{ $atividadeparticipante->checkin }}').add(20, 'minutes'); // new Date(now + 60 * 1000);

        var x = setInterval(function() {
                diff = countDownDate.diff(now);

                if (diff <= 0) {
                    clearInterval(x);
                    // If the count down is finished, write some text 
                    $("#timet").text("Terminou o tempo!");
                } else
                    $("#timet").text(moment.utc(diff).format("HH:mm:ss"));
            }, 1000);    */    
        
    </script>
@endsection
