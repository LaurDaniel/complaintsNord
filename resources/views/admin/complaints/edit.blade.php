@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.complaint.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.complaints.update", [$complaint->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="data_intrare">{{ trans('cruds.complaint.fields.data_intrare') }}</label>
                <input class="form-control date {{ $errors->has('data_intrare') ? 'is-invalid' : '' }}" type="text" name="data_intrare" id="data_intrare" value="{{ old('data_intrare', $complaint->data_intrare) }}" required>
                @if($errors->has('data_intrare'))
                    <span class="text-danger">{{ $errors->first('data_intrare') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.data_intrare_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="localitate">{{ trans('cruds.complaint.fields.localitate') }}</label>
                <input class="form-control {{ $errors->has('localitate') ? 'is-invalid' : '' }}" type="text" name="localitate" id="localitate" value="{{ old('localitate', $complaint->localitate) }}" required>
                @if($errors->has('localitate'))
                    <span class="text-danger">{{ $errors->first('localitate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.localitate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reclamant">{{ trans('cruds.complaint.fields.reclamant') }}</label>
                <input class="form-control {{ $errors->has('reclamant') ? 'is-invalid' : '' }}" type="text" name="reclamant" id="reclamant" value="{{ old('reclamant', $complaint->reclamant) }}" required>
                @if($errors->has('reclamant'))
                    <span class="text-danger">{{ $errors->first('reclamant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.reclamant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tip_document">{{ trans('cruds.complaint.fields.tip_document') }}</label>
                <input class="form-control {{ $errors->has('tip_document') ? 'is-invalid' : '' }}" type="text" name="tip_document" id="tip_document" value="{{ old('tip_document', $complaint->tip_document) }}" required>
                @if($errors->has('tip_document'))
                    <span class="text-danger">{{ $errors->first('tip_document') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.tip_document_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="continut">{{ trans('cruds.complaint.fields.continut') }}</label>
                <input class="form-control {{ $errors->has('continut') ? 'is-invalid' : '' }}" type="text" name="continut" id="continut" value="{{ old('continut', $complaint->continut) }}" required>
                @if($errors->has('continut'))
                    <span class="text-danger">{{ $errors->first('continut') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.continut_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="termen">{{ trans('cruds.complaint.fields.termen') }}</label>
                <input class="form-control date {{ $errors->has('termen') ? 'is-invalid' : '' }}" type="text" name="termen" id="termen" value="{{ old('termen', $complaint->termen) }}" required>
                @if($errors->has('termen'))
                    <span class="text-danger">{{ $errors->first('termen') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.termen_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_contact">{{ trans('cruds.complaint.fields.date_contact') }}</label>
                <input class="form-control {{ $errors->has('date_contact') ? 'is-invalid' : '' }}" type="text" name="date_contact" id="date_contact" value="{{ old('date_contact', $complaint->date_contact) }}" required>
                @if($errors->has('date_contact'))
                    <span class="text-danger">{{ $errors->first('date_contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.date_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="responsabil">{{ trans('cruds.complaint.fields.responsabil') }}</label>
                <input class="form-control {{ $errors->has('responsabil') ? 'is-invalid' : '' }}" type="text" name="responsabil" id="responsabil" value="{{ old('responsabil', $complaint->responsabil) }}" required>
                @if($errors->has('responsabil'))
                    <span class="text-danger">{{ $errors->first('responsabil') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.responsabil_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="raspuns">{{ trans('cruds.complaint.fields.raspuns') }}</label>
                <input class="form-control {{ $errors->has('raspuns') ? 'is-invalid' : '' }}" type="text" name="raspuns" id="raspuns" value="{{ old('raspuns', $complaint->raspuns) }}">
                @if($errors->has('raspuns'))
                    <span class="text-danger">{{ $errors->first('raspuns') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.raspuns_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection