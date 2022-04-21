@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.registoRegularidade.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.registo-regularidades.update", [$registoRegularidade->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="grupo_id">{{ trans('cruds.registoRegularidade.fields.grupo') }}</label>
                            <select class="form-control select2" name="grupo_id" id="grupo_id">
                                @foreach($grupos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('grupo_id') ? old('grupo_id') : $registoRegularidade->grupo->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('grupo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('grupo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registoRegularidade.fields.grupo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="equipa_id">{{ trans('cruds.registoRegularidade.fields.equipa') }}</label>
                            <select class="form-control select2" name="equipa_id" id="equipa_id" required>
                                @foreach($equipas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('equipa_id') ? old('equipa_id') : $registoRegularidade->equipa->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('equipa'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('equipa') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registoRegularidade.fields.equipa_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.registoRegularidade.fields.regularidade_1') }}</label>
                            @foreach(App\Models\RegistoRegularidade::REGULARIDADE_1_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="regularidade_1_{{ $key }}" name="regularidade_1" value="{{ $key }}" {{ old('regularidade_1', $registoRegularidade->regularidade_1) === (string) $key ? 'checked' : '' }} required>
                                    <label for="regularidade_1_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('regularidade_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('regularidade_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registoRegularidade.fields.regularidade_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.registoRegularidade.fields.regularidade_2') }}</label>
                            @foreach(App\Models\RegistoRegularidade::REGULARIDADE_2_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="regularidade_2_{{ $key }}" name="regularidade_2" value="{{ $key }}" {{ old('regularidade_2', $registoRegularidade->regularidade_2) === (string) $key ? 'checked' : '' }} required>
                                    <label for="regularidade_2_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('regularidade_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('regularidade_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registoRegularidade.fields.regularidade_2_helper') }}</span>
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