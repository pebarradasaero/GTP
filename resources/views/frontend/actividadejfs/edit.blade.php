@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong>{{ $actividadejf->jf->nome ?? '' }} --> {{ $actividadejf->equipa->nome ?? '' }}</strong>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.actividadejfs.update", [$actividadejf->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group" style="display: none">
                            <label class="required" for="jf_id">{{ trans('cruds.actividadejf.fields.jf') }}</label>
                            <select class="form-control select2" name="jf_id" id="jf_id" required>
                                @foreach($jfs as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('jf_id') ? old('jf_id') : $actividadejf->jf->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('jf'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('jf') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.actividadejf.fields.jf_helper') }}</span>
                        </div>
                        <div class="form-group" style="display: none">
                            <label class="required" for="grupo_id">{{ trans('cruds.actividadejf.fields.grupo') }}</label>
                            <select class="form-control select2" name="grupo_id" id="grupo_id" required>
                                @foreach($grupos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('grupo_id') ? old('grupo_id') : $actividadejf->grupo->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('grupo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('grupo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.actividadejf.fields.grupo_helper') }}</span>
                        </div>
                        <div class="form-group" style="display: none">
                            <label class="required" for="equipa_id">{{ trans('cruds.actividadejf.fields.equipa') }}</label>
                            <select class="form-control select2" name="equipa_id" id="equipa_id" required>
                                @foreach($equipas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('equipa_id') ? old('equipa_id') : $actividadejf->equipa->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('equipa'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('equipa') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.actividadejf.fields.equipa_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <p style="text-align: center"><label class="required">{{ trans('cruds.actividadejf.fields.atividade') }}</label></p>
                            <center>
                            @foreach(App\Models\Actividadejf::ATIVIDADE_RADIO as $key => $label)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="atividade_{{ $key }}" name="atividade" value="{{ $key }}" {{ old('atividade', $actividadejf->atividade) === (string) $key ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="atividade_{{ $key }}">{{ $label }}</label>
                            </div>
                            @endforeach
                            </center>
                            @if($errors->has('atividade'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('atividade') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.actividadejf.fields.atividade_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <p style="text-align: center"><label class="required">{{ trans('cruds.actividadejf.fields.simpatia') }}</label></p>
                            <center>
                            @foreach(App\Models\Actividadejf::SIMPATIA_RADIO as $key => $label)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="simpatia_{{ $key }}" name="simpatia" value="{{ $key }}" {{ old('simpatia', $actividadejf->simpatia) === (string) $key ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="simpatia_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            </center>
                            @if($errors->has('simpatia'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('simpatia') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.actividadejf.fields.simpatia_helper') }}</span>
                        </div>
                        <div class="form-group" style="text-align: center">
                            <button class="btn btn-danger" type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection