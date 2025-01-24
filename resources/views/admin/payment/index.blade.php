@extends('admin.layouts.app')
@section('title', 'Data Payment')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Payment</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>idVisa/Nama/Username?</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php($no = 1)
                    @foreach ($payment as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->idVisa }}</td>
                        <td>{{ $row->amount }}</td>
                        <td>{{ $row->paymentData }}</td>
                        <td>{{ $row->paymentStatus }}</td>

                        <td>
                        <a href="{{ route('admin.payment.edit', $row->idPayment) }}" class="btn btn-warning">Edit Status Pembayaran</a>
                        </td>
                        
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection