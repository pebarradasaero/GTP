@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @can('actividadejf_create')
                    <div style="margin-bottom: 10px;" class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-success" href="{{ route('frontend.actividadejfs.create') }}">
                                {{ trans('global.add') }} {{ trans('cruds.actividadejf.title_singular') }}
                            </a>
                        </div>
                    </div>
                @endcan
                <div class="card">
                    <div class="card-header">
                        <strong>{{ Auth::user()->name }}</strong> - Votação nas Equipas
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Actividadejf">
                                <thead>
                                    <tr>
                                        <th>
                                            &nbsp;
                                        </th>
                                        <th>
                                            {{ trans('cruds.actividadejf.fields.equipa') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.actividadejf.fields.atividade') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.actividadejf.fields.simpatia') }}
                                        </th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actividadejfs as $key => $actividadejf)
                                        @php
                                            if (strpos($actividadejf->equipa->nome, 'Azul') !== false) {
                                                $color = '#3f6c72';
                                                $txtcolor = 'white';
                                            } else {
                                                if (strpos($actividadejf->equipa->nome, 'Amarelo') !== false) {
                                                    $color = '#c4993b';
                                                    $txtcolor = 'black';
                                                } else {
                                                    if (strpos($actividadejf->equipa->nome, 'Verde') !== false) {
                                                        $color = '#6e933b';
                                                        $txtcolor = 'white';
                                                    } else {
                                                        if (strpos($actividadejf->equipa->nome, 'Cinza') !== false) {
                                                            $color = '#6d6e70';
                                                            $txtcolor = 'white';
                                                        } else {
                                                            if (strpos($actividadejf->equipa->nome, 'Rosa') !== false) {
                                                                $color = '#b10059';
                                                                $txtcolor = 'white';
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        @endphp

                                        <tr style="background-color: {{ $color }}; color:{{ $txtcolor }}"
                                            data-entry-id="{{ $actividadejf->id }}">
                                            <td style="background-color: floralwhite">
                                                <center>
                                                @can('actividadejf_show')
                                                    <a class="btn btn-xs btn-primary"
                                                        href="{{ route('frontend.actividadejfs.show', $actividadejf->id) }}">
                                                        {{ trans('global.view') }}
                                                    </a>
                                                @endcan

                                                @can('actividadejf_edit')
                                                    <a class="btn rounded-pill btn-dark"
                                                        href="{{ route('frontend.actividadejfs.edit', $actividadejf->id) }}">
                                                        Votar
                                                    </a>
                                                @endcan

                                                @can('actividadejf_delete')
                                                    <form
                                                        action="{{ route('frontend.actividadejfs.destroy', $actividadejf->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                        style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-xs btn-danger"
                                                            value="{{ trans('global.delete') }}">
                                                    </form>
                                                @endcan
                                                </center>
                                            </td>
                                            <td>
                                                {{ $actividadejf->equipa->nome ?? '' }}
                                            </td>
                                            <td>
                                                {{ App\Models\Actividadejf::ATIVIDADE_RADIO[$actividadejf->atividade] ?? '' }}
                                            </td>
                                            <td>
                                                {{ App\Models\Actividadejf::SIMPATIA_RADIO[$actividadejf->simpatia] ?? '' }}
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
            @can('actividadejf_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('frontend.actividadejfs.massDestroy') }}",
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
                    [1, 'asc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-Actividadejf:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
