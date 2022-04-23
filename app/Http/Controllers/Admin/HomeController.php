<?php

namespace App\Http\Controllers\Admin;

use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Carbon\Carbon;

class HomeController
{
    public function index()
    {

        $settings3 = [
            'chart_title'           => 'Equipas',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Equipa',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'equipa',
        ];

        $settings3['total_number'] = 0;
        if (class_exists($settings3['model'])) {
            $settings3['total_number'] = $settings3['model']::when(isset($settings3['filter_field']), function ($query) use ($settings3) {
                if (isset($settings3['filter_days'])) {
                    return $query->where(
                        $settings3['filter_field'],
                        '>=',
                        now()->subDays($settings3['filter_days'])->format('Y-m-d')
                    );
                }
                if (isset($settings3['filter_period'])) {
                    switch ($settings3['filter_period']) {
                        case 'week':
                            $start = date('Y-m-d', strtotime('last Monday'));
                            break;
                        case 'month':
                            $start = date('Y-m') . '-01';
                            break;
                        case 'year':
                            $start = date('Y') . '-01-01';
                            break;
                    }
                    if (isset($start)) {
                        return $query->where($settings3['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings3['aggregate_function'] ?? 'count'}($settings3['aggregate_field'] ?? '*');
        }

        $settings4 = [
            'chart_title'           => 'Grupos',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Grupo',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'grupo',
        ];

        $settings4['total_number'] = 0;
        if (class_exists($settings4['model'])) {
            $settings4['total_number'] = $settings4['model']::when(isset($settings4['filter_field']), function ($query) use ($settings4) {
                if (isset($settings4['filter_days'])) {
                    return $query->where(
                        $settings4['filter_field'],
                        '>=',
                        now()->subDays($settings4['filter_days'])->format('Y-m-d')
                    );
                }
                if (isset($settings4['filter_period'])) {
                    switch ($settings4['filter_period']) {
                        case 'week':
                            $start = date('Y-m-d', strtotime('last Monday'));
                            break;
                        case 'month':
                            $start = date('Y-m') . '-01';
                            break;
                        case 'year':
                            $start = date('Y') . '-01-01';
                            break;
                    }
                    if (isset($start)) {
                        return $query->where($settings4['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings4['aggregate_function'] ?? 'count'}($settings4['aggregate_field'] ?? '*');
        }

        $settings5 = [
            'chart_title'           => 'Juntas Freguesia',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\JuntasFreguesium',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'juntasfreguesia',
        ];

        $settings5['total_number'] = 0;
        if (class_exists($settings5['model'])) {
            $settings5['total_number'] = $settings5['model']::when(isset($settings5['filter_field']), function ($query) use ($settings5) {
                if (isset($settings5['filter_days'])) {
                    return $query->where(
                        $settings5['filter_field'],
                        '>=',
                        now()->subDays($settings5['filter_days'])->format('Y-m-d')
                    );
                }
                if (isset($settings5['filter_period'])) {
                    switch ($settings5['filter_period']) {
                        case 'week':
                            $start = date('Y-m-d', strtotime('last Monday'));
                            break;
                        case 'month':
                            $start = date('Y-m') . '-01';
                            break;
                        case 'year':
                            $start = date('Y') . '-01-01';
                            break;
                    }
                    if (isset($start)) {
                        return $query->where($settings5['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings5['aggregate_function'] ?? 'count'}($settings4['aggregate_field'] ?? '*');
        }

        return view('home', compact('settings5', 'settings3', 'settings4'));
    }

    public function resultados()
    {
        abort_if(Gate::denies('resultados_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resultadosjuntas = DB::table('atividadeparticipantes')
            ->leftjoin('juntas_freguesia', 'atividadeparticipantes.jf_id', '=', 'juntas_freguesia.id')
            ->leftjoin('equipas', 'atividadeparticipantes.equipa_id', '=', 'equipas.id')
            ->selectRaw('juntas_freguesia.nome,SUM(atividadeparticipantes.petisco) petisco,SUM(atividadeparticipantes.bebida) bebida,
            SUM(atividadeparticipantes.atividade) atividade,(SUM(atividadeparticipantes.petisco)+SUM(atividadeparticipantes.bebida)+SUM(atividadeparticipantes.atividade)) as total ')
            ->groupBy('atividadeparticipantes.jf_id')->orderByDesc('total')
            ->get();


        $resultadosparticipantes = DB::select('SELECT 
        actividade.nome,
        SUM(actividade.atividade) atividade,
        SUM(actividade.simpatia) simpatia,
        registo_reg.regularidade_1,
        registo_reg.regularidade_2,
        SUM(actividade.penalizacao) penalizacao,
        (SUM(actividade.atividade)+SUM(actividade.simpatia)+registo_reg.regularidade_1+registo_reg.regularidade_2-SUM(actividade.penalizacao)) as total
        FROM (select distinct equipas.nome,
        actividadejfs.atividade,
        actividadejfs.simpatia,
        actividadejfs.penalizacao
        from actividadejfs, equipas where actividadejfs.equipa_id=equipas.id) actividade, (select equipas.nome,
        registo_regularidades.regularidade_1,
        registo_regularidades.regularidade_2 from registo_regularidades, equipas where registo_regularidades.equipa_id=equipas.id) registo_reg
        where actividade.nome = registo_reg.nome
        group by actividade.nome
        order by total desc');

        //dd($resultadosparticipantes);

        return view('resultados', compact('resultadosjuntas','resultadosparticipantes'));
    }
}

/*
SELECT 
actividade.nome,
SUM(actividade.atividade) atividade,
SUM(actividade.simpatia) simpatia,
registo_reg.regularidade_1,
registo_reg.regularidade_2,
SUM(actividade.penalizacao) penalizacao,
(SUM(actividade.atividade)+SUM(actividade.simpatia)+registo_reg.regularidade_1+registo_reg.regularidade_2-SUM(actividade.penalizacao)) as total
FROM (select distinct equipas.nome,
actividadejfs.atividade,
actividadejfs.simpatia,
actividadejfs.penalizacao
from actividadejfs, equipas where actividadejfs.equipa_id=equipas.id) actividade, (select equipas.nome,
registo_regularidades.regularidade_1,
registo_regularidades.regularidade_2 from registo_regularidades, equipas where registo_regularidades.equipa_id=equipas.id) registo_reg
where actividade.nome = registo_reg.nome
group by actividade.nome
order by total desc



*/