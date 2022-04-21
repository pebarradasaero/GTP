<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyActividadejfRequest;
use App\Http\Requests\StoreActividadejfRequest;
use App\Http\Requests\UpdateActividadejfRequest;
use App\Models\Actividadejf;
use App\Models\Equipa;
use App\Models\Grupo;
use App\Models\JuntasFreguesium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActividadejfController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('actividadejf_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actividadejfs = Actividadejf::with(['jf', 'grupo', 'equipa', 'created_by'])->get();
        
        return view('frontend.actividadejfs.index', compact('actividadejfs'));
    }

    public function create()
    {
        abort_if(Gate::denies('actividadejf_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jfs = JuntasFreguesium::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupos = Grupo::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipas = Equipa::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.actividadejfs.create', compact('equipas', 'grupos', 'jfs'));
    }

    public function store(StoreActividadejfRequest $request)
    {
        $actividadejf = Actividadejf::create($request->all());

        return redirect()->route('frontend.actividadejfs.index');
    }

    public function edit(Actividadejf $actividadejf)
    {
        abort_if(Gate::denies('actividadejf_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jfs = JuntasFreguesium::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupos = Grupo::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipas = Equipa::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actividadejf->load('jf', 'grupo', 'equipa', 'created_by');

        return view('frontend.actividadejfs.edit', compact('actividadejf', 'equipas', 'grupos', 'jfs'));
    }

    public function update(UpdateActividadejfRequest $request, Actividadejf $actividadejf)
    {
        $actividadejf->update($request->all());

        return redirect()->route('frontend.actividadejfs.index');
    }

    public function show(Actividadejf $actividadejf)
    {
        abort_if(Gate::denies('actividadejf_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actividadejf->load('jf', 'grupo', 'equipa', 'created_by');

        return view('frontend.actividadejfs.show', compact('actividadejf'));
    }

    public function destroy(Actividadejf $actividadejf)
    {
        abort_if(Gate::denies('actividadejf_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actividadejf->delete();

        return back();
    }

    public function massDestroy(MassDestroyActividadejfRequest $request)
    {
        Actividadejf::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
