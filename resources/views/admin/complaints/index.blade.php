@extends('layouts.admin')
@section('content')
@can('complaint_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.complaints.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.complaint.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.complaint.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Complaint">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.numar_intrare') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.data_intrare') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.modul_preluare') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.localitate') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.reclamant') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.tip_client') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.tip_document') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.continut') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.concluzia_analizarii') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.masuri') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.termen') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.date_contact') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.responsabil') }}
                        </th>
                        <th>
                            {{ trans('cruds.complaint.fields.raspuns') }}
                        </th>
                        <th>
                            Fisier 
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <!--<tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Complaint::MODUL_PRELUARE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Complaint::TIP_CLIENT_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Complaint::CONCLUZIA_ANALIZARII_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                     -->
                </thead>
                <tbody>
                    @foreach($complaints as $key => $complaint)
                        <tr data-entry-id="{{ $complaint->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $complaint->id ?? '' }}
                            </td>
                            <td>
                                {{ $complaint->numar_intrare ?? '' }}
                            </td>
                            <td>
                                {{ $complaint->data_intrare ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Complaint::MODUL_PRELUARE_SELECT[$complaint->modul_preluare] ?? '' }}
                            </td>
                            <td>
                                {{ $complaint->localitate ?? '' }}
                            </td>
                            <td>
                                {{ $complaint->reclamant ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Complaint::TIP_CLIENT_SELECT[$complaint->tip_client] ?? '' }}
                            </td>
                            <td>
                                {{ $complaint->tip_document ?? '' }}
                            </td>
                            <td>
                                {{ $complaint->continut ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Complaint::CONCLUZIA_ANALIZARII_SELECT[$complaint->concluzia_analizarii] ?? '' }}
                            </td>
                            <td>
                                {{ $complaint->masuri ?? '' }}
                            </td>
                            <td>
                                {{ $complaint->termen ?? '' }}
                            </td>
                            <td>
                                {{ $complaint->date_contact ?? '' }}
                            </td>
                            <td>
                                {{ $complaint->responsabil ?? '' }}
                            </td>
                            <td>
                                {{ $complaint->raspuns ?? '' }}
                            </td>
                            <td>
                                <a href={{\Storage::url($complaint->fisier)}} target="_blank">{{ $complaint->fisier ?? '' }}</a>
                            </td>
                            <td>
                                @can('complaint_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.complaints.show', $complaint->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('complaint_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.complaints.edit', $complaint->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('complaint_delete')
                                    <form action="{{ route('admin.complaints.destroy', $complaint->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('complaint_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.complaints.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-Complaint:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection