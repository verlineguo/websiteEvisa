@extends('applicant.layouts.layout-applicant')
@section('content')
<div class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="max-w-screen-md mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Status Pengajuan Visa Anda</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Jenis Visa</th>
                        <th>Negara Tujuan</th>
                        <th>Status Visa</th>
                        <th>Pembayaran</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($employee as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row['idEmp'] }}</td>
                            <td>{{ $row['name'] }}</td>
                            <td>{{ $row['username'] }}</td>
                            <td>{{ $row['role']['roleName'] ?? 'No Role' }}</td>
                            
                            <td>
                                <form action="{{ route('applicant.payment', $row['idEmp']) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
    </tr>
    @endforeach
    </div>
</div>
@endsection