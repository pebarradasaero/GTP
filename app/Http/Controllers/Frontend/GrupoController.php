<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGrupoRequest;
use App\Http\Requests\StoreGrupoRequest;
use App\Http\Requests\UpdateGrupoRequest;
use App\Models\Grupo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GrupoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grupo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupos = Grupo::all();

        return view('frontend.grupos.index', compact('grupos'));
    }

    public function create()
    {
        abort_if(Gate::denies('grupo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.grupos.create');
    }

    public function store(StoreGrupoRequest $request)
    {
        $grupo = Grupo::create($request->all());

        return redirect()->route('frontend.grupos.index');
    }

    public function edit(Grupo $grupo)
    {
        abort_if(Gate::denies('grupo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.grupos.edit', compact('grupo'));
    }

    public function update(UpdateGrupoRequest $request, Grupo $grupo)
    {
        $grupo->update($request->all());

        return redirect()->route('frontend.grupos.index');
    }

    public function show(Grupo $grupo)
    {
        abort_if(Gate::denies('grupo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupo->load('grupoActividadejfs', 'grupoEquipas', 'grupoAtividadeparticipantes');

        return view('frontend.grupos.show', compact('grupo'));
    }

    public function destroy(Grupo $grupo)
    {
        abort_if(Gate::denies('grupo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupo->delete();

        return back();
    }

    public function massDestroy(MassDestroyGrupoRequest $request)
    {
        Grupo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
