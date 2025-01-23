@extends('admin.layouts.app')
@section('title', 'Data dokumen')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('admin.docType.create') }}" class="btn btn-primary">Add Document Type</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Document Type</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    

                    @foreach ($docType as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->dType }}</td>
                        <td>
                            <a href="{{ route('admin.docType.create.update', $row->idDoc) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.docType.delete', $row->idDoc) }}" method="POST" style="display: inline;">
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