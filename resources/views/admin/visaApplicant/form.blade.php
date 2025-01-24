@extends('admin.layouts.app')

@section('content')
<form action="{{ isset($visaApplicant) ? route('admin.visaApplicant.create.update', $visaApplicant->idVisa) : route('admin.visaApplicant.create.save') }}" method="post">
    @csrf
    @if (isset($visaApplicant))
        @method('put')
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($visaApplicant) ? 'Form Edit Visa Application' : 'Form Add Visa Application' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Type Applicant Name"  value="{{ old('name', isset($visaApplicant) ? $visaApplicant->applicant->name : '') }}" required>
                        <small id="nameError" class="text-danger d-none">Name not available.</small>
                    </div>

    
                    <div class="form-group">
                        <label for="idFee">Visa(ID)</label>
                        <select class="form-control" id="idFee" name="idFee">
                            <option value="">Select Visa Fee</option>
                            @foreach ($visa as $row)
                            <option 
                                value="{{ $row->idFee }}" 
                                {{ (old('idFee', $visaApplicant->idFee ?? '') == $row->idFee) ? 'selected' : '' }}>
                                {{ $row->jenisVisa }} - {{ $row->country->countryName ?? 'No Country' }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    


                    <div class="form-group">
                        <label for="dateOfArrival">Date of Arrival</label>
                        <input type="date" class="form-control" id="dateOfArrival" name="dateOfArrival" value="{{ old('dateOfArrival', isset($visaApplicant) ? $visaApplicant->dateOfArrival : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="dateOfDeparture">Date of Departure</label>
                        <input type="date" class="form-control" id="dateOfDeparture" name="dateOfDeparture" value="{{ old('dateOfDeparture', isset($visaApplicant) ? $visaApplicant->dateOfDeparture : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="lengthOfStay">Length of Stay (in days)</label>
                        <input type="number" class="form-control" id="lengthOfStay" name="lengthOfStay" value="{{ old('lengthOfStay', isset($visaApplicant) ? $visaApplicant->lengthOfStay : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="prevCountry">Previous Country</label>
                        <input type="text" class="form-control" id="prevCountry" name="prevCountry" value="{{ old('prevCountry', isset($visaApplicant) ? $visaApplicant->prevCountry : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="expDate">Expiry Date</label>
                        <input type="date" class="form-control" id="expDate" name="expDate" value="{{ old('expDate', isset($visaApplicant) ? $visaApplicant->expDate : '') }}" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ isset($visaApplicant) ? 'Update' : 'Create' }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     $(document).ready(function() {
        // Event handler for name input
        $('#name').on('input', function() {
            var name = $(this).val();
            if (name.length > 2) {
                $.ajax({
                    url: '/admin/visaApplicant/checkName',
                    type: 'GET',
                    data: { name: name },
                    success: function(response) {
                        if (response.idApplicant) {
                            $('#idApplicant').val(response.idApplicant);
                            $('#nameError').addClass('d-none');
                        } else {
                            $('#idApplicant').val('');
                            $('#nameError').removeClass('d-none').text('Name not available.');
                        }
                    }
                });
            } else {
                $('#idApplicant').val('');
                $('#nameError').addClass('d-none');
            }
        
        });
    });

</script>
@endsection
