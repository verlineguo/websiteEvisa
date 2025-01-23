@extends('admin.layouts.app')
@section('title', 'Data Visa Application history')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary mb-1">Data Applicant</h6>
        <a href="{{ route('admin.visaApplicant.create') }}" class="btn btn-primary">Add Visa Applicant</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Visa Type</th>
                        <th>Date of Arrival</th>
                        <th>Date of Departure</th>
                        <th>Length of Stay</th>
                        <th>Previous Country</th>
                        <th>Expiration Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($visaApplicant as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->jenisVisa }}</td>
                        <td>{{ $row->dateOfArrival }}</td>
                        <td>{{ $row->dateOfDeparture }}</td>
                        <td>{{ $row->lengthOfStay }}</td>
                        <td>{{ $row->prevCountry }}</td>
                        <td>{{ $row->expDate }}</td>
                        <td>
                        <a href="{{ route('admin.visaApplicant.edit', $row->idVisa) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.visaApplicant.delete', $row->idVisa) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('admin.visaApplicant.detail', $row->idVisa) }}" class="btn btn-info">View</a>

                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection