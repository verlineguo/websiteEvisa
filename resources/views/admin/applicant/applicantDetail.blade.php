@extends('admin.layouts.app')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="text-primary">Detail Applicant</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Visa Type</th>
                        <th>Visa Count</th>
                    </tr>
                </thead>
                <tbody>
                @php($no = 1)

                @foreach ($applicantDetail as $applicant)
                    <tr>
                        <td>{{ $applicant->jenisVisa }}</td>
                        <td>{{ $applicant->visa_count }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            <a href="{{ route('admin.applicant.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
