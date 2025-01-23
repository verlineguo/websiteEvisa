@extends('admin.layouts.app')
@section('title', 'Data Pegawai')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Applicant</h6>
        <a href="{{ route('admin.employee.create') }}" class="btn btn-primary">Add Employee</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>No</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($employeesWithRole as $employee)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $employee->EmployeeName }}</td>
                        <td>{{ $employee->Role }}</td>
                        <td>{{ $employee->phoneNo }}</td>
                        <td>{{ $employee->emailAddress }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>
                            <a href="{{ route('admin.employee.create.update', $employee->idEmp) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.employee.delete', $employee->idEmp) }}" method="POST" style="display: inline;">
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