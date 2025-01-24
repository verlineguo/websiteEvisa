@extends('consultant.layouts.app')

@section('title', 'Data Applicant dan Dokumen')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>idApplicant</th>
                    <th>documentType</th>
                    <th>filepath</th>
                    <th>uploadDate</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($documents as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->idApplicant }}</td>
                        <td>{{ $row->documentType }}</td>
                        <td>{{ $row->filepath }}</td>
                        <td>{{ $row->documentType }}</td>
                        <td>
                            <a href="{{ route('consultant.applicationProcess.edit', $row->noAppProcess) }}" class="btn btn-warning">update</a>

                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection