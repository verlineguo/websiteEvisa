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
                        <th>Nama</th>
                        <th>Jenis Visa</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach($paymentDetails as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->ApplicantName }}</td>
                            <td>{{ $row->VisaType }}</td>
                            <td>{{ $row->amount }}</td>
                            <td>{{ $row->paymentDate }}</td>
                            <td>{{ $row->paymentStatus }}</td>
                            <td>
                                <a href="{{ route('admin.payment.updateStatus', $row->idPayment) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.payment.delete', $row->idPayment) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection