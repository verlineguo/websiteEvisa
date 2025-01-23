@extends('admin.layouts.app')
@section('title', 'Form dokumen')

@section('content')
<form action="{{ isset($docType) ? route('admin.docType.create.update', $docType->idDoc) : route('admin.docType.create.save') }}" method="POST">
    @csrf
    @if (isset($docType))
        @method('PUT')
    @endif
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($docType) ? 'Edit Document Type' : 'Add Document Type' }}</h6>
          </div>
          <div class="card-body">
            
            <div class="form-group">
                <label for="dType">Document Type</label>
                <input type="text" class="form-control" id="dType" name="dType" value="{{ old('dType', isset($docType) ? $docType->dType : '') }}">
            </div>

          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ isset($docType) ? 'Update' : 'Create' }}</button>
          </div>
        </div>
      </div>
    </div>
</form>
@endsection
