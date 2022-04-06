@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.complaint.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.complaints.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.id') }}
                        </th>
                        <td>
                            {{ $complaint->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.data_intrare') }}
                        </th>
                        <td>
                            {{ $complaint->data_intrare }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.localitate') }}
                        </th>
                        <td>
                            {{ $complaint->localitate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.reclamant') }}
                        </th>
                        <td>
                            {{ $complaint->reclamant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.tip_document') }}
                        </th>
                        <td>
                            {{ $complaint->tip_document }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.continut') }}
                        </th>
                        <td>
                            {{ $complaint->continut }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.termen') }}
                        </th>
                        <td>
                            {{ $complaint->termen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.date_contact') }}
                        </th>
                        <td>
                            {{ $complaint->date_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.responsabil') }}
                        </th>
                        <td>
                            {{ $complaint->responsabil }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.raspuns') }}
                        </th>
                        <td>
                            {{ $complaint->raspuns }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.complaints.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection