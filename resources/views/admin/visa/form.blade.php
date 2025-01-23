@extends('admin.layouts.app')
@section('title', 'Form Visa')

@section('content')
<form action="{{ isset($visa) ? route('admin.visa.create.update', $visa->idFee) : route('admin.visa.create.save') }}" method="POST">
    @csrf
    @if (isset($visa))
        @method('PUT')
    @endif
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($visa) ? 'Form Edit Visa' : 'Form Add Visa' }}</h6>
          </div>
          <div class="card-body">
          
            <div class="form-group">
                <label for="jenisVisa">Jenis Visa</label>
                <input type="text" class="form-control" id="jenisVisa" name="jenisVisa" value="{{ old('jenisVisa', isset($visa) ? $visa->jenisVisa : '') }}">
            </div>

            <div class="form-group">
              <label for="idCountry">Country Name</label>
              <select class="form-control" id="idCountry" name="idCountry" required>
                @foreach ($country as $row)
                <option value="{{ $row->idCountry }}" 
                    {{ old('idCountry', isset($visa) && $visa->idCountry == $row->idCountry ? 'selected' : '') }}>
                    {{ $row->countryName }}
                </option>
              @endforeach
              </select>
                                        
                                             
            </div>
            <div class="form-group">
              <label for="fee">Fee</label>
              <input type="number" class="form-control" id="fee" name="fee" value="{{ old('fee', isset($visa) ? $visa->fee : '') }}">
            </div>


          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ isset($visa) ? 'Update' : 'Create' }}</button>
          </div>
        </div>
      </div>
    </div>
</form>
@endsection
