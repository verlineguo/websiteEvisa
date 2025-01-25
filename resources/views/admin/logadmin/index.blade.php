@extends('admin.layouts.app')
@section('title', 'Data Log')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($logAdmin as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->Pengguna }}</td>
                        <td>{{ $row->Tanggal }}</td>
                        <td>{{ $row->Keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection