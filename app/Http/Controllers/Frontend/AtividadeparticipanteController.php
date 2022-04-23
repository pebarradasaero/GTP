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
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;


class AtividadeparticipanteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('atividadeparticipante_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atividadeparticipantes = Atividadeparticipante::with(['jf', 'grupo', 'equipa', 'created_by'])->get();
       
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

    
        if (empty($atividadeparticipante->checkin)) {
            //iniciar contador
            $checkin = Carbon::now()->toDateTimeString();
            $atividadeparticipante1= Atividadeparticipante::find($atividadeparticipante->id);
            $atividadeparticipante1->checkin = $checkin;
            $atividadeparticipante1->save();
            //rele a row
            $atividadeparticipante2= Atividadeparticipante::find($atividadeparticipante->id);
            //dd($atividadeparticipante2);
            $atividadeparticipante=$atividadeparticipante2;
            $atividadeparticipante->load('jf', 'grupo', 'equipa', 'created_by');
        }

        $jfs = JuntasFreguesium::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        $grupos = Grupo::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipas = Equipa::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $atividadeparticipante->load('jf', 'grupo', 'equipa', 'created_by');
        //dd($atividadeparticipante);

        return view('frontend.atividadeparticipantes.edit', compact('atividadeparticipante', 'equipas', 'grupos', 'jfs'));
    }

    public function update(UpdateAtividadeparticipanteRequest $request, Atividadeparticipante $atividadeparticipante)
    {
        $atividadeparticipante->update($request->all());
        $ident=$atividadeparticipante->id;
        //faz checkout para terminar atividade
        $atividadeparticipante0= Atividadeparticipante::find($atividadeparticipante->id);
        //dd($atividadeparticipante0);
        $atividadeparticipante0->checkout = Carbon::now()->toDateTimeString();
        $atividadeparticipante0->save();
        
        $actividadecp = Atividadeparticipante::find($ident);;
        //dd($actividadecp);
        //regista penalizacao jf_id grupo_id equipa_id
        $checkin=Carbon::parse($actividadecp->checkin);
        $checkoutx=Carbon::parse($actividadecp->checkout);
        $tempo = $checkoutx->diffInMinutes($checkin);
        
        //dd($tempo);
        
        if($tempo >20)
        {
            $actividadejf1 = DB::table('actividadejfs')
            ->where("actividadejfs.jf_id", '=',  $actividadecp->jf_id)->where("actividadejfs.grupo_id", '=',  $actividadecp->grupo_id)->where("actividadejfs.equipa_id", '=',  $actividadecp->equipa_id)
            ->update(['penalizacao' => '5']);
            //dd($actividadecp->jf_id);
        }
        
        //guarda o checkout
        
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
