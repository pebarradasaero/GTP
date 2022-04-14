<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEquipaRequest;
use App\Http\Requests\StoreEquipaRequest;
use App\Http\Requests\UpdateEquipaRequest;
use App\Models\Equipa;
use App\Models\Grupo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('equipa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipas = Equipa::with(['grupo'])->get();

        return view('admin.equipas.index', compact('equipas'));
    }

    public function create()
    {
        abort_if(Gate::denies('equipa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupos = Grupo::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.equipas.create', compact('grupos'));
    }

    public function store(StoreEquipaRequest $request)
    {
        $equipa = Equipa::create($request->all());

        return redirect()->route('admin.equipas.index');
    }

    public function edit(Equipa $equipa)
    {
        abort_if(Gate::denies('equipa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupos = Grupo::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipa->load('grupo');

        return view('admin.equipas.edit', compact('equipa', 'grupos'));
    }

    public function update(UpdateEquipaRequest $request, Equipa $equipa)
    {
        $equipa->update($request->all());

        return redirect()->route('admin.equipas.index');
    }

    public function show(Equipa $equipa)
    {
        abort_if(Gate::denies('equipa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipa->load('grupo', 'equipaActividadejfs', 'equipaAtividadeparticipantes');

        return view('admin.equipas.show', compact('equipa'));
    }

    public function destroy(Equipa $equipa)
    {
        abort_if(Gate::denies('equipa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipa->delete();

        return back();
    }

    public function massDestroy(MassDestroyEquipaRequest $request)
    {
        Equipa::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
