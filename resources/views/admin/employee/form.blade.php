@extends('admin.layouts.app')
@section('title', 'Form Add Employee')

@section('content')
<form action="{{ isset($employee) ? route('admin.employee.create.update', $employee->idEmp) : route('admin.employee.create.save') }}" method="POST">
    @csrf
    @if(isset($employee))
      @method('PUT')
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($employee) ? 'Edit Employee' : 'Add New Employee' }}</h6>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($employee) ? $employee->name : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username', isset($employee) ? $employee->username : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password', isset($employee) ? $employee->password : '') }}" {{ isset($employee) ? 'readonly' : '' }} required>
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                          @foreach ($role as $row)
                          <option value="{{ $row->idRole }}" 
                              {{ old('role', isset($employee) && $employee->role == $row->idRole ? 'selected' : '') }}>
                              {{ $row->roleName }}
                          </option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', isset($employee) ? $employee->dob : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phoneNo">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNo" name="phoneNo" value="{{ old('phoneNo', isset($employee) ? $employee->phoneNo : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', isset($employee) ? $employee->address : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="emailAddress">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" name="emailAddress" value="{{ old('emailAddress', isset($employee) ? $employee->emailAddress : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male" {{ old('gender', isset($employee) && $employee->gender == 'male' ? 'selected' : '') }}>Male</option>
                            <option value="female" {{ old('gender', isset($employee) && $employee->gender == 'female' ? 'selected' : '') }}>Female</option>
                        </select>
                    </div>

                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ isset($employee) ? 'Update' : 'Create' }} Employee</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
