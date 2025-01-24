@extends('consultant.layouts.app')
@section('title', 'Update Status')

@section('content')
<form action="{{ route('consultant.applicationProcess.update', $applicationProcess->noAppProcess) }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Applicant</h6>
          </div>
          <div class="card-body">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="disetujui" {{ $applicationProcess->status == 'disetujui' ? 'selected' : '' }}>1. Disetujui</option>
                        <option value="proses_pengecekan" {{ $applicationProcess->status == 'proses_pengecekan' ? 'selected' : '' }}>2. Proses pengecekan</option>
                        <option value="tidak_disetujui" {{ $applicationProcess->status == 'tidak_disetujui' ? 'selected' : '' }}>3. Tidak disetujui</option>
                    </select>
                </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
</form>
@endsection