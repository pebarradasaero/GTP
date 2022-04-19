@extends('layouts.admin')
@section('content')
@can('atividadeparticipante_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.atividadeparticipantes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.atividadeparticipante.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.atividadeparticipante.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Atividadeparticipante">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.atividadeparticipante.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.atividadeparticipante.fields.jf') }}
                        </th>
                        <th>
                            {{ trans('cruds.atividadeparticipante.fields.grupo') }}
                        </th>
                        <th>
                            {{ trans('cruds.atividadeparticipante.fields.equipa') }}
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
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($atividadeparticipantes as $key => $atividadeparticipante)
                        <tr data-entry-id="{{ $atividadeparticipante->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $atividadeparticipante->id ?? '' }}
                            </td>
                            <td>
                                {{ $atividadeparticipante->jf->nome ?? '' }} / {{ $atividadeparticipante->jf->localidade ?? '' }}
                            </td>
                            <td>
                                {{ $atividadeparticipante->grupo->nome ?? '' }}
                            </td>
                            <td>
                                {{ $atividadeparticipante->equipa->nome ?? '' }}
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
                                @can('atividadeparticipante_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.atividadeparticipantes.show', $atividadeparticipante->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('atividadeparticipante_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.atividadeparticipantes.edit', $atividadeparticipante->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('atividadeparticipante_delete')
                                    <form action="{{ route('admin.atividadeparticipantes.destroy', $atividadeparticipante->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('atividadeparticipante_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.atividadeparticipantes.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Atividadeparticipante:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection