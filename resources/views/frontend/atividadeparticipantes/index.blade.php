@php
use Carbon\Carbon;


@endphp
@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @can('atividadeparticipante_create')
                    <div style="margin-bottom: 10px;" class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-success" href="{{ route('frontend.atividadeparticipantes.create') }}">
                                {{ trans('global.add') }} {{ trans('cruds.atividadeparticipante.title_singular') }}
                            </a>
                        </div>
                    </div>
                @endcan
                <div class="card">
                    <div class="card-header">
                        @foreach ($atividadeparticipantes as $key => $atividadeparticipante)
                        {{ $atividadeparticipante->jf->nome ?? '' }} - <strong> {{ $atividadeparticipante->equipa->nome ?? '' }}</strong>
                        @endforeach
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class=" table table-bordered table-striped table-hover datatable datatable-Atividadeparticipante">
                                <thead>
                                    <tr>
                                        <th>
                                            &nbsp;
                                        </th>
                                        <th>
                                            {{ trans('cruds.atividadeparticipante.fields.petisco') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.atividadeparticipante.fields.bebida') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.atividadeparticipante.fields.atividade') }}
                                        </th>
                                        <th>
                                            Tempo Gasto
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atividadeparticipantes as $key => $atividadeparticipante)
                                        <tr data-entry-id="{{ $atividadeparticipante->id }}">
                                            <td style="text-align: center">
                                                @if ($atividadeparticipante->checkin == '')
                                                    @can('atividadeparticipante_edit')
                                                        <a class="btn btn-info"
                                                            href="{{ route('frontend.atividadeparticipantes.edit', $atividadeparticipante->id) }}">
                                                            {{ trans('global.checkin') }}
                                                        </a>
                                                    @endcan
                                                @else
                                                    @if ($atividadeparticipante->checkin != '' & $atividadeparticipante->checkout == '')
                                                        @can('atividadeparticipante_edit')
                                                            <a class="btn btn-danger"
                                                                href="{{ route('frontend.atividadeparticipantes.edit', $atividadeparticipante->id) }}">
                                                                {{ trans('global.continuarcheckin') }}
                                                            </a>
                                                        @endcan
                                                    @else
                                                        @can('atividadeparticipante_show')
                                                            <a class="btn btn-primary"
                                                                href="{{ route('frontend.atividadeparticipantes.show', $atividadeparticipante->id) }}">
                                                                {{ trans('global.view') }}
                                                            </a>
                                                        @endcan
                                                    @endif
                                                @endif
                                                @can('atividadeparticipante_delete')
                                                    <form
                                                        action="{{ route('frontend.atividadeparticipantes.destroy', $atividadeparticipante->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                        style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-xs btn-danger"
                                                            value="{{ trans('global.delete') }}">
                                                    </form>
                                                @endcan

                                            </td>
                                            <td>
                                                {{ App\Models\Atividadeparticipante::PETISCO_RADIO[$atividadeparticipante->petisco] ?? '' }}
                                            </td>
                                            <td>
                                                {{ App\Models\Atividadeparticipante::BEBIDA_RADIO[$atividadeparticipante->bebida] ?? '' }}
                                            </td>
                                            <td>
                                                {{ App\Models\Atividadeparticipante::ATIVIDADE_RADIO[$atividadeparticipante->atividade] ?? '' }}
                                            </td>
                                            <td>
                                                {{ gmdate('H:i:s',Carbon::parse($atividadeparticipantes[0]->checkin)->diffInSeconds(Carbon::parse($atividadeparticipantes[0]->checkout))); }}
                                            </td>
                                            

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('atividadeparticipante_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('frontend.atividadeparticipantes.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                return $(entry).data('entry-id')
                });
            
                if (ids.length === 0) {
                alert('{{ trans('global.datatables.zero_selected') }}')
            
                return
                }
            
                if (confirm('{{ trans('global.areYouSure') }}')) {
                $.ajax({
                headers: {'x-csrf-token': _token},
                method: 'POST',
                url: config.url,
                data: { ids: ids, _method: 'DELETE' }})
                .done(function () { location.reload() })
                }
                }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });


        })
    </script>
@endsection
