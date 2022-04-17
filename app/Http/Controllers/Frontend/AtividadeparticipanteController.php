<?php

namespace App\Http\Controllers\Frontend;

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
use Illuminate\Support\Carbon;


class AtividadeparticipanteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('atividadeparticipante_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atividadeparticipantes = Atividadeparticipante::with(['jf', 'grupo', 'equipa', 'created_by'])->get();
        $tempo = Carbon::parse($atividadeparticipantes[0]->checkin)->diffInMinutes(Carbon::parse($atividadeparticipantes[0]->checkout));
        

        return view('frontend.atividadeparticipantes.index', compact('atividadeparticipantes'));
    }

    public function create()
    {
        abort_if(Gate::denies('atividadeparticipante_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jfs = JuntasFreguesium::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupos = Grupo::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipas = Equipa::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.atividadeparticipantes.create', compact('equipas', 'grupos', 'jfs'));
    }

    public function store(StoreAtividadeparticipanteRequest $request)
    {
        $atividadeparticipante = Atividadeparticipante::create($request->all());

        return redirect()->route('frontend.atividadeparticipantes.index');
    }

    public function edit(Atividadeparticipante $atividadeparticipante)
    {
        abort_if(Gate::denies('atividadeparticipante_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($atividadeparticipante->checkin != "") {
            //ja existe checkin
        } else {
            //iniciar contador
            $atividadeparticipante->checkin = Carbon::now()->toDateTimeString();
            $atividadeparticipante->save();
        }

        $jfs = JuntasFreguesium::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupos = Grupo::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipas = Equipa::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $atividadeparticipante->load('jf', 'grupo', 'equipa', 'created_by');



        return view('frontend.atividadeparticipantes.edit', compact('atividadeparticipante', 'equipas', 'grupos', 'jfs'));
    }

    public function update(UpdateAtividadeparticipanteRequest $request, Atividadeparticipante $atividadeparticipante)
    {
        $atividadeparticipante->update($request->all());

        //faz checkout para terminar atividade
        $atividadeparticipante->checkout = Carbon::now()->toDateTimeString();
        $atividadeparticipante->save();

        return redirect()->route('frontend.atividadeparticipantes.index');
    }

    public function show(Atividadeparticipante $atividadeparticipante)
    {
        abort_if(Gate::denies('atividadeparticipante_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atividadeparticipante->load('jf', 'grupo', 'equipa', 'created_by');

        return view('frontend.atividadeparticipantes.show', compact('atividadeparticipante'));
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
