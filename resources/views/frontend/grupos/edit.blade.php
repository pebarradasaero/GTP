@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.grupo.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.grupos.update", [$grupo->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="nome">{{ trans('cruds.grupo.fields.nome') }}</label>
                            <input class="form-control" type="text" name="nome" id="nome" value="{{ old('nome', $grupo->nome) }}" required>
                            @if($errors->has('nome'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nome') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.grupo.fields.nome_helper') }}</span>
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