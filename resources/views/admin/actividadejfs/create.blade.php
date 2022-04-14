@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.actividadejf.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.actividadejfs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="jf_id">{{ trans('cruds.actividadejf.fields.jf') }}</label>
                <select class="form-control select2 {{ $errors->has('jf') ? 'is-invalid' : '' }}" name="jf_id" id="jf_id" required>
                    @foreach($jfs as $id => $entry)
                        <option value="{{ $id }}" {{ old('jf_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('jf'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jf') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.actividadejf.fields.jf_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="grupo_id">{{ trans('cruds.actividadejf.fields.grupo') }}</label>
                <select class="form-control select2 {{ $errors->has('grupo') ? 'is-invalid' : '' }}" name="grupo_id" id="grupo_id" required>
                    @foreach($grupos as $id => $entry)
                        <option value="{{ $id }}" {{ old('grupo_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('grupo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grupo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.actividadejf.fields.grupo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="equipa_id">{{ trans('cruds.actividadejf.fields.equipa') }}</label>
                <select class="form-control select2 {{ $errors->has('equipa') ? 'is-invalid' : '' }}" name="equipa_id" id="equipa_id" required>
                    @foreach($equipas as $id => $entry)
                        <option value="{{ $id }}" {{ old('equipa_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <label class="required">{{ trans('cruds.actividadejf.fields.atividade') }}</label>
                @foreach(App\Models\Actividadejf::ATIVIDADE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('atividade') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="atividade_{{ $key }}" name="atividade" value="{{ $key }}" {{ old('atividade', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="atividade_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('atividade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('atividade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.actividadejf.fields.atividade_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.actividadejf.fields.simpatia') }}</label>
                @foreach(App\Models\Actividadejf::SIMPATIA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('simpatia') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="simpatia_{{ $key }}" name="simpatia" value="{{ $key }}" {{ old('simpatia', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="simpatia_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('simpatia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('simpatia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.actividadejf.fields.simpatia_helper') }}</span>
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