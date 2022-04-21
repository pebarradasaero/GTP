@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.atividadeparticipante.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.atividadeparticipantes.update", [$atividadeparticipante->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="jf_id">{{ trans('cruds.atividadeparticipante.fields.jf') }}</label>
                <select class="form-control select2 {{ $errors->has('jf') ? 'is-invalid' : '' }}" name="jf_id" id="jf_id" required>
                    @foreach($jfs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('jf_id') ? old('jf_id') : $atividadeparticipante->jf->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('jf'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jf') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.atividadeparticipante.fields.jf_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="grupo_id">{{ trans('cruds.atividadeparticipante.fields.grupo') }}</label>
                <select class="form-control select2 {{ $errors->has('grupo') ? 'is-invalid' : '' }}" name="grupo_id" id="grupo_id" required>
                    @foreach($grupos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('grupo_id') ? old('grupo_id') : $atividadeparticipante->grupo->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('grupo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grupo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.atividadeparticipante.fields.grupo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="equipa_id">{{ trans('cruds.atividadeparticipante.fields.equipa') }}</label>
                <select class="form-control select2 {{ $errors->has('equipa') ? 'is-invalid' : '' }}" name="equipa_id" id="equipa_id" required>
                    @foreach($equipas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('equipa_id') ? old('equipa_id') : $atividadeparticipante->equipa->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('equipa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('equipa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.atividadeparticipante.fields.equipa_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="senhasaida">Senha Saida: </label>
                <input class="form-control {{ $errors->has('senhasaida') ? 'is-invalid' : '' }}" type="text" name="senhasaida" id="senhasaida" value="{{ old('nome', $atividadeparticipante->senhasaida) }}" required>
                @if($errors->has('senhasaida'))
                    <div class="invalid-feedback">
                        {{ $errors->first('senhasaida') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.equipa.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.atividadeparticipante.fields.petisco') }}</label>
                @foreach(App\Models\Atividadeparticipante::PETISCO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('petisco') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="petisco_{{ $key }}" name="petisco" value="{{ $key }}" {{ old('petisco', $atividadeparticipante->petisco) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="petisco_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('petisco'))
                    <div class="invalid-feedback">
                        {{ $errors->first('petisco') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.atividadeparticipante.fields.petisco_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.atividadeparticipante.fields.bebida') }}</label>
                @foreach(App\Models\Atividadeparticipante::BEBIDA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('bebida') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="bebida_{{ $key }}" name="bebida" value="{{ $key }}" {{ old('bebida', $atividadeparticipante->bebida) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="bebida_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('bebida'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bebida') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.atividadeparticipante.fields.bebida_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.atividadeparticipante.fields.atividade') }}</label>
                @foreach(App\Models\Atividadeparticipante::ATIVIDADE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('atividade') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="atividade_{{ $key }}" name="atividade" value="{{ $key }}" {{ old('atividade', $atividadeparticipante->atividade) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="atividade_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('atividade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('atividade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.atividadeparticipante.fields.atividade_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection