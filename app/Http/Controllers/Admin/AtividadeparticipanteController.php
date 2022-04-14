<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAtividadeparticipanteRequest;
use App\Http\Requests\StoreAtividadeparticipanteRequest;
use App\Http\Requests\UpdateAtividadeparticipanteRequest;
use App\Models\Atividadeparticipante;
use App\Models\Equipa;
use App\Models\Grupo;
use App\Models\JuntasFreguesium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AtividadeparticipanteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('atividadeparticipante_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atividadeparticipantes = Atividadeparticipante::with(['jf', 'grupo', 'equipa'])->get();

        return view('admin.atividadeparticipantes.index', compact('atividadeparticipantes'));
    }

    public function create()
    {
        abort_if(Gate::denies('atividadeparticipante_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jfs = JuntasFreguesium::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupos = Grupo::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipas = Equipa::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.atividadeparticipantes.create', compact('equipas', 'grupos', 'jfs'));
    }

    public function store(StoreAtividadeparticipanteRequest $request)
    {
        $atividadeparticipante = Atividadeparticipante::create($request->all());

        return redirect()->route('admin.atividadeparticipantes.index');
    }

    public function edit(Atividadeparticipante $atividadeparticipante)
    {
        abort_if(Gate::denies('atividadeparticipante_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jfs = JuntasFreguesium::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupos = Grupo::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipas = Equipa::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $atividadeparticipante->load('jf', 'grupo', 'equipa');

        return view('admin.atividadeparticipantes.edit', compact('atividadeparticipante', 'equipas', 'grupos', 'jfs'));
    }

    public function update(UpdateAtividadeparticipanteRequest $request, Atividadeparticipante $atividadeparticipante)
    {
        $atividadeparticipante->update($request->all());

        return redirect()->route('admin.atividadeparticipantes.index');
    }

    public function show(Atividadeparticipante $atividadeparticipante)
    {
        abort_if(Gate::denies('atividadeparticipante_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atividadeparticipante->load('jf', 'grupo', 'equipa');

        return view('admin.atividadeparticipantes.show', compact('atividadeparticipante'));
    }

    public function destroy(Atividadeparticipante $atividadeparticipante)
    {
        abort_if(Gate::denies('atividadeparticipante_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atividadeparticipante->delete();

        return back();
    }

    public function massDestroy(MassDestroyAtividadeparticipanteRequest $request)
    {
        Atividadeparticipante::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
