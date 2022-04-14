@can('actividadejf_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.actividadejfs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.actividadejf.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.actividadejf.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-grupoActividadejfs">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.actividadejf.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.actividadejf.fields.jf') }}
                        </th>
                        <th>
                            {{ trans('cruds.actividadejf.fields.grupo') }}
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
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($actividadejfs as $key => $actividadejf)
                        <tr data-entry-id="{{ $actividadejf->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $actividadejf->id ?? '' }}
                            </td>
                            <td>
                                {{ $actividadejf->jf->nome ?? '' }}
                            </td>
                            <td>
                                {{ $actividadejf->grupo->nome ?? '' }}
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
                            <td>
                                @can('actividadejf_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.actividadejfs.show', $actividadejf->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('actividadejf_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.actividadejfs.edit', $actividadejf->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('actividadejf_delete')
                                    <form action="{{ route('admin.actividadejfs.destroy', $actividadejf->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('actividadejf_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.actividadejfs.massDestroy') }}",
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
  let table = $('.datatable-grupoActividadejfs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection