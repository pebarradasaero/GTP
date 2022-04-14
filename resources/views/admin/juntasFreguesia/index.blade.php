@extends('layouts.admin')
@section('content')
@can('juntas_freguesium_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.juntas-freguesia.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.juntasFreguesium.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.juntasFreguesium.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-JuntasFreguesium">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.juntasFreguesium.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.juntasFreguesium.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.juntasFreguesium.fields.localidade') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($juntasFreguesia as $key => $juntasFreguesium)
                        <tr data-entry-id="{{ $juntasFreguesium->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $juntasFreguesium->id ?? '' }}
                            </td>
                            <td>
                                {{ $juntasFreguesium->nome ?? '' }}
                            </td>
                            <td>
                                {{ $juntasFreguesium->localidade ?? '' }}
                            </td>
                            <td>
                                @can('juntas_freguesium_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.juntas-freguesia.show', $juntasFreguesium->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('juntas_freguesium_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.juntas-freguesia.edit', $juntasFreguesium->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('juntas_freguesium_delete')
                                    <form action="{{ route('admin.juntas-freguesia.destroy', $juntasFreguesium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('juntas_freguesium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.juntas-freguesia.massDestroy') }}",
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
  let table = $('.datatable-JuntasFreguesium:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection