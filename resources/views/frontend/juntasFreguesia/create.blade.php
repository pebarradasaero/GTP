@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.juntasFreguesium.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.juntas-freguesia.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="nome">{{ trans('cruds.juntasFreguesium.fields.nome') }}</label>
                            <input class="form-control" type="text" name="nome" id="nome" value="{{ old('nome', '') }}" required>
                            @if($errors->has('nome'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nome') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.juntasFreguesium.fields.nome_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="localidade">{{ trans('cruds.juntasFreguesium.fields.localidade') }}</label>
                            <input class="form-control" type="text" name="localidade" id="localidade" value="{{ old('localidade', '') }}">
                            @if($errors->has('localidade'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('localidade') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.juntasFreguesium.fields.localidade_helper') }}</span>
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