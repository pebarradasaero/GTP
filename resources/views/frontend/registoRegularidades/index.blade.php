@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('registo_regularidade_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.registo-regularidades.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.registoRegularidade.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.registoRegularidade.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-RegistoRegularidade">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registoRegularidade.fields.id') }}
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
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registoRegularidades as $key => $registoRegularidade)
                                    <tr data-entry-id="{{ $registoRegularidade->id }}">
                                        <td>
                                            {{ $registoRegularidade->id ?? '' }}
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
                                        <td>
                                            @can('registo_regularidade_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.registo-regularidades.show', $registoRegularidade->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('registo_regularidade_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.registo-regularidades.edit', $registoRegularidade->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('registo_regularidade_delete')
                                                <form action="{{ route('frontend.registo-regularidades.destroy', $registoRegularidade->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('frontend.registo-regularidades.massDestroy') }}",
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
  let table = $('.datatable-RegistoRegularidade:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection