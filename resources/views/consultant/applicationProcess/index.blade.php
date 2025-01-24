@extends('consultant.layouts.app')

@section('title', 'Data Application Process')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>idVisa</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($process as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->idVisa }}</td>
                        <td>{{ $row->startDate }}</td>
                        <td>{{ $row->endDate }}</td>
                        <td>{{ $row->status->statName }}</td>
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