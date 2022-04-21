@extends('layouts.admin')
@section('content')
@can('registo_regularidade_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12" style="display: none">
            <a class="btn btn-success" href="{{ route('admin.registo-regularidades.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.registoRegularidade.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.list') }} - {{ trans('cruds.registoRegularidade.title_singular') }} 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RegistoRegularidade">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            &nbsp;
                        </th>
                        <th>
                            {{ trans('cruds.registoRegularidade.fields.grupo') }}
                        </th>
                        <th>
                            {{ trans('cruds.registoRegularidade.fields.equipa') }}
                        </th>
                        <th>
                            {{ trans('cruds.registoRegularidade.fields.regularidade_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.registoRegularidade.fields.regularidade_2') }}
                        </th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($registoRegularidades as $key => $registoRegularidade)
                        <tr data-entry-id="{{ $registoRegularidade->id }}">
                            <td>

                            </td>
                            <td>
                                @can('registo_regularidade_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.registo-regularidades.edit', $registoRegularidade->id) }}">
                                        Registar
                                    </a>
                                @endcan
                            </td>
                            <td>
                                {{ $registoRegularidade->grupo->nome ?? '' }}
                            </td>
                            <td>
                                {{ $registoRegularidade->equipa->nome ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RegistoRegularidade::REGULARIDADE_1_RADIO[$registoRegularidade->regularidade_1] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RegistoRegularidade::REGULARIDADE_2_RADIO[$registoRegularidade->regularidade_2] ?? '' }}
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
@can('registo_regularidade_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.registo-regularidades.massDestroy') }}",
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
    order: [[ 3, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-RegistoRegularidade:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection