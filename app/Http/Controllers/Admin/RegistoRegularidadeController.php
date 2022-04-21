<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRegistoRegularidadeRequest;
use App\Http\Requests\StoreRegistoRegularidadeRequest;
use App\Http\Requests\UpdateRegistoRegularidadeRequest;
use App\Models\Equipa;
use App\Models\Grupo;
use App\Models\RegistoRegularidade;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistoRegularidadeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('registo_regularidade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registoRegularidades = RegistoRegularidade::with(['grupo', 'equipa'])->get();

        return view('admin.registoRegularidades.index', compact('registoRegularidades'));
    }

    public function create()
    {
        abort_if(Gate::denies('registo_regularidade_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupos = Grupo::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipas = Equipa::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.registoRegularidades.create', compact('equipas', 'grupos'));
    }

    public function store(StoreRegistoRegularidadeRequest $request)
    {
        $registoRegularidade = RegistoRegularidade::create($request->all());

        return redirect()->route('admin.registo-regularidades.index');
    }

    public function edit(RegistoRegularidade $registoRegularidade)
    {
        abort_if(Gate::denies('registo_regularidade_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupos = Grupo::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipas = Equipa::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registoRegularidade->load('grupo', 'equipa');

        return view('admin.registoRegularidades.edit', compact('equipas', 'grupos', 'registoRegularidade'));
    }

    public function update(UpdateRegistoRegularidadeRequest $request, RegistoRegularidade $registoRegularidade)
    {
        $registoRegularidade->update($request->all());

        return redirect()->route('admin.registo-regularidades.index');
    }

    public function show(RegistoRegularidade $registoRegularidade)
    {
        abort_if(Gate::denies('registo_regularidade_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registoRegularidade->load('grupo', 'equipa');

        return view('admin.registoRegularidades.show', compact('registoRegularidade'));
    }

    public function destroy(RegistoRegularidade $registoRegularidade)
    {
        abort_if(Gate::denies('registo_regularidade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registoRegularidade->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegistoRegularidadeRequest $request)
    {
        RegistoRegularidade::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
