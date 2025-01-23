@extends('admin.layouts.app')
@section('title', 'Detail Visa Applicant')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="text-center">Detail Visa Applicant</h3>
        </div>
        <div class="card-body">
<<<<<<< Updated upstream
            
=======
            <div class="row mb-2">
                <div class="col-sm-4"><strong>ID Visa Applicant:</strong></div>
                <div class="col-sm-8">{{ $visaApplicant->VisaID }}</div>
            </div>
            <hr>
>>>>>>> Stashed changes
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Applicant Name:</strong></div>
                <div class="col-sm-8">{{ $visaApplicant->ApplicantName }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Date of Birth:</strong></div>
                <div class="col-sm-8">{{ $visaApplicant->DateOfBirth }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Visa Type:</strong></div>
                <div class="col-sm-8">{{ $visaApplicant->VisaType }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Destination Country:</strong></div>
                <div class="col-sm-8">{{ $visaApplicant->destinationCountry }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Visa Fee:</strong></div>
                <div class="col-sm-8 text-success">{{ $visaApplicant->VisaFee }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Date of Arrival:</strong></div>
                <div class="col-sm-8">{{ $visaApplicant->ArrivalDate }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Date of Departure:</strong></div>
                <div class="col-sm-8">{{ $visaApplicant->DepartureDate }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Length of Stay:</strong></div>
                <div class="col-sm-8">{{ $visaApplicant->LengthOfStay }} days</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Previous Country:</strong></div>
                <div class="col-sm-8">{{ $visaApplicant->PreviousCountry }}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Expiration Date:</strong></div>
                <div class="col-sm-8">{{ $visaApplicant->ExpirationDate }}</div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.visaApplicant.index') }}" class="btn btn-secondary">Back to List</a>
<<<<<<< Updated upstream
            <a href="{{ route('admin.visaApplicant.documents', $visaApplicant->idVisa) }}" class="btn btn-info">View Documents</a>            
            <a href="{{ route('admin.visaApplicant.applicationProcess', $visaApplicant->idVisa) }}" class="btn btn-warning">View Application Process</a>
=======
            <!-- <a href="{{ route('admin.visaApplicant.documents', $visaApplicant->VisaID) }}" class="btn btn-info">View Documents</a>            
            <a href="{{ route('admin.visaApplicant.applicationProcess', $visaApplicant->VisaID) }}" class="btn btn-warning">View Application Process</a> -->
>>>>>>> Stashed changes
        </div>
    </div>
</div>
@endsection