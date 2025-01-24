@extends('consultant.layouts.app')
@section('title', 'Update Status')

@section('content')
<form action=" {{route('consultant.applicationProcess.update', $process->noAppProcess) }}" method="post">
  @csrf
    @method('PUT')
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($process) ? 'Form Edit applicant' : 'Form add Applicant' }}</h6>
          </div>
          <div class="card-body">
                {{-- <div class="form-group">
                    <label for="noAppProcess">No Applicant Process</label>
                    <input type="text" class="form-control" id="motherName" name="motherName" value="{{ old('motherName', isset($applicant) ? $applicant->motherName : '') }}">
                </div> --}}
                <div class="form-group">
                    <label for="statName">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="male" {{ old('statName', isset($application_process) && $application_process->idStat == '1' ? 'selected' : '') }}>1. Disetujui</option>
                        <option value="female" {{ old('statName', isset($application_process) && $application_process->idStat == '2' ? 'selected' : '') }}>2. Proses pengecekan</option>
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