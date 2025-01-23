@extends('admin.layouts.app')
@section('title', 'Form country')

@section('content')
<form action="{{ isset($country) ? route('admin.country.create.update', $country->idCountry) : route('admin.country.create.save') }}" method="POST">
    @csrf
    @if (isset($country))
        @method('PUT')
    @endif
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($country) ? 'Form Edit Country' : 'Form Add Country' }}</h6>
          </div>
          <div class="card-body">
            
            <div class="form-group">
                <label for="countryName">Country Name</label>
                <input type="text" class="form-control" id="countryName" name="countryName" value="{{ old('countryName', isset($country) ? $country->countryName : '') }}">
            </div>

          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ isset($country) ? 'Update' : 'Create' }}</button>
          </div>
        </div>
      </div>
    </div>
</form>
@endsection
