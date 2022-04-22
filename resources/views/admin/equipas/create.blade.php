@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.equipa.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.equipas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.equipa.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', '') }}" required>
                @if($errors->has('nome'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.equipa.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="grupo_id">{{ trans('cruds.equipa.fields.grupo') }}</label>
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
                <span class="help-block">{{ trans('cruds.equipa.fields.grupo_helper') }}</span>
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