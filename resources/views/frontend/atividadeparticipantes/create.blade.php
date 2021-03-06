@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.atividadeparticipante.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.atividadeparticipantes.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="jf_id">{{ trans('cruds.atividadeparticipante.fields.jf') }}</label>
                            <select class="form-control select2" name="jf_id" id="jf_id" required>
                                @foreach($jfs as $id => $entry)
                                    <option value="{{ $id }}" {{ old('jf_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <select class="form-control select2" name="grupo_id" id="grupo_id" required>
                                @foreach($grupos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('grupo_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <select class="form-control select2" name="equipa_id" id="equipa_id" required>
                                @foreach($equipas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('equipa_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <label class="required">{{ trans('cruds.atividadeparticipante.fields.petisco') }}</label>
                            @foreach(App\Models\Atividadeparticipante::PETISCO_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="petisco_{{ $key }}" name="petisco" value="{{ $key }}" {{ old('petisco', '') === (string) $key ? 'checked' : '' }} required>
                                    <label for="petisco_{{ $key }}">{{ $label }}</label>
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
                                <div>
                                    <input type="radio" id="bebida_{{ $key }}" name="bebida" value="{{ $key }}" {{ old('bebida', '') === (string) $key ? 'checked' : '' }} required>
                                    <label for="bebida_{{ $key }}">{{ $label }}</label>
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
                                <div>
                                    <input type="radio" id="atividade_{{ $key }}" name="atividade" value="{{ $key }}" {{ old('atividade', '') === (string) $key ? 'checked' : '' }} required>
                                    <label for="atividade_{{ $key }}">{{ $label }}</label>
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

        </div>
    </div>
</div>
@endsection