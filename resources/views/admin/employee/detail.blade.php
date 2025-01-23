@extends('admin.layouts.app')
@section('title', 'Detail Applicant')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="text-primary">Detail Applicant</h3>
        </div>
        <div class="card-body">
            <p><strong>ID Applicant:</strong> {{ $applicant->idApplicant }}</p>
            <p><strong>Name:</strong> {{ $applicant->name }}</p>
            <p><strong>Username:</strong> {{ $applicant->username }}</p>
            <p><strong>Email Address:</strong> {{ $applicant->emailAddress }}</p>
            <p><strong>Date of Birth:</strong> {{ $applicant->dob }}</p>
            <p><strong>Phone Number:</strong> {{ $applicant->phoneNo }}</p>
            <p><strong>Address:</strong> {{ $applicant->address }}</p>
            <p><strong>Mother's Name:</strong> {{ $applicant->motherName }}</p>
            <p><strong>Gender:</strong> {{ $applicant->gender }}</p>
            <p><strong>Profession:</strong> {{ $applicant->profession }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.applicant.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('admin.applicant.documents', $visaApplicant->idVisa) }}" class="btn btn-info">View Payment</a>            

        </div>
    </div>
</div>
@endsection
