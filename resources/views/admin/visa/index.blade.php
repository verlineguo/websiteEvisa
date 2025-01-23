@extends('admin.layouts.app')
@section('title', 'Data Visa')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action=" ">
            <!-- <select id="filter" class="form-control mt-3 mb-2" name="filter">
                <option value="" disabled selected>Pilih filter berdasarkan</option>
                <option value="jenis">Berdasarkan Jenis</option>
                <option value="negara">Berdasarkan Negara</option>
            </select> -->
            <button type="submit" class="btn btn-primary">Terapkan Filter</button>
        </form>
        <a href="{{ route( 'admin.visa.create') }}" class="btn btn-primary mt-4">Add Visa</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Jenis Visa</th>
                    <th>Country Name</th>
                    <th>Fee</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($visa as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row['jenisVisa'] }}</td>
                        <td>{{ $row['country']['countryName'] ?? '?'}}</td>
                        <td>{{ $row['fee'] }}</td>

                        <td>
                            <a href="{{ route('admin.visa.create.update', $row['idFee']) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.visa.delete', $row['idFee']) }}" method="POST" style="display: inline;">
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