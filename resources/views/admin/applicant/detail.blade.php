@extends('admin.layouts.app')
@section('title', ' ')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="text-primary">Detail Applicant</h3>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-sm-4"><strong>ID Applicant:</strong></div>
                <div class="col-sm-8">{{ $applicant->idApplicant }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Name:</strong></div>
                <div class="col-sm-8">{{ $applicant->name }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Username:</strong></div>
                <div class="col-sm-8">{{ $applicant->username }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Email Address:</strong></div>
                <div class="col-sm-8">{{ $applicant->emailAddress }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Date of Birth:</strong></div>
                <div class="col-sm-8">{{ $applicant->dob }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Phone Number:</strong></div>
                <div class="col-sm-8">{{ $applicant->phoneNo }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Address:</strong></div>
                <div class="col-sm-8">{{ $applicant->address }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Mother's Name:</strong></div>
                <div class="col-sm-8">{{ $applicant->motherName }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Gender:</strong></div>
                <div class="col-sm-8">{{ $applicant->gender }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Profession:</strong></div>
                <div class="col-sm-8">{{ $applicant->profession }}</div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('admin.applicant.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('admin.applicant.detail.show', ['idApplicant' => $applicant->idApplicant]) }}" class="btn btn-primary">visa list</a>

        </div>
    </div>
</div>
@endsection
