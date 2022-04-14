<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJuntasFreguesiumRequest;
use App\Http\Requests\StoreJuntasFreguesiumRequest;
use App\Http\Requests\UpdateJuntasFreguesiumRequest;
use App\Models\JuntasFreguesium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JuntasFreguesiaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('juntas_freguesium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $juntasFreguesia = JuntasFreguesium::all();

        return view('frontend.juntasFreguesia.index', compact('juntasFreguesia'));
    }

    public function create()
    {
        abort_if(Gate::denies('juntas_freguesium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.juntasFreguesia.create');
    }

    public function store(StoreJuntasFreguesiumRequest $request)
    {
        $juntasFreguesium = JuntasFreguesium::create($request->all());

        return redirect()->route('frontend.juntas-freguesia.index');
    }

    public function edit(JuntasFreguesium $juntasFreguesium)
    {
        abort_if(Gate::denies('juntas_freguesium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.juntasFreguesia.edit', compact('juntasFreguesium'));
    }

    public function update(UpdateJuntasFreguesiumRequest $request, JuntasFreguesium $juntasFreguesium)
    {
        $juntasFreguesium->update($request->all());

        return redirect()->route('frontend.juntas-freguesia.index');
    }

    public function show(JuntasFreguesium $juntasFreguesium)
    {
        abort_if(Gate::denies('juntas_freguesium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $juntasFreguesium->load('jfActividadejfs', 'jfAtividadeparticipantes');

        return view('frontend.juntasFreguesia.show', compact('juntasFreguesium'));
    }

    public function destroy(JuntasFreguesium $juntasFreguesium)
    {
        abort_if(Gate::denies('juntas_freguesium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $juntasFreguesium->delete();

        return back();
    }

    public function massDestroy(MassDestroyJuntasFreguesiumRequest $request)
    {
        JuntasFreguesium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
