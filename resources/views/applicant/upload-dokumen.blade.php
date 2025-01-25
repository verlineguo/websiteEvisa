@extends('applicant.layouts.layout-applicant')

@section('content')
<div class="container mx-auto px-6 py-10">
    <!-- Progress Bar -->
    <div class="flex justify-center pb-8">
        <div class="flex w-full max-w-4xl items-center">
            @foreach ([ 
                'applicant.uploadDP' => 'Data Pribadi', 
                'applicant.upload-document.create' => 'Upload Dokumen', 
                'applicant.uploadKV' => 'Keterangan Visa', 
                'applicant.payment' => 'Pembayaran', 
                'applicant.confirmation' => 'Selesai' 
            ] as $route => $label)
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full shadow {{ Request::routeIs($route) ? 'bg-blue-600 text-white' : 'bg-gray-300 text-gray-600' }} flex items-center justify-center font-bold">
                        {{ $loop->iteration }}
                    </div>
                    <span class="ml-2 {{ Request::routeIs($route) ? 'text-blue-600 font-medium' : 'text-gray-500' }}">{{ $label }}</span>
                </div>
                @if (!$loop->last)
                    <div class="flex-1 h-1 {{ Request::routeIs(array_keys(array_slice([ 
                        'applicant.upload-document.create', 'applicant.review', 'applicant.payment', 'applicant.confirmation'], $loop->index))) ? 'bg-blue-600' : 'bg-gray-300' }} mx-2"></div>
                @endif
            @endforeach
        </div>
    </div>

    @if(Session::has('error'))
    <div class="alert alert-danger p2 px-32 text-red-500 text-xl">
        {{ Session::get('error') }}
    </div>
    @elseif(Session::has('fail'))
        <span class="alert alert-danger p2 px-32 text-red-500 text-xl">{{ Session::get('fail') }}</span>
    @elseif(Session::has('success'))
        <span class="alert alert-success p2 px-32 text-green-500 text-xl">{{ Session::get('success') }}</span>
    @endif

    @if ($errors->any())
        <div class="p-4 mb-6 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex items-center justify-end px-28">
        <a href="{{ route('applicant.uploadKV') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
        Selanjutnya &raquo;
        </a>
  </div>

    <div class="px-32 py-8">
        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Upload Dokumen</h2>
        <p class="text-gray-600 mb-6">Silakan unggah dokumen yang diperlukan untuk pengajuan visa Anda.</p>

        <form action="{{ route('applicant.upload-document.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($docType as $row)
                    <div class="flex flex-col">
                        <label for="{{ $row->idDoc }}" class="block text-sm font-medium text-gray-700">{{ $row->dType }}</label>
                        <input type="file" id="{{ $row->idDoc }}" name="documents[{{ $row->idDoc }}]" 
                            class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                            accept=".png,.jpg,.pdf,.doc,.docx">

                        @if(isset($uploadedDocuments[$row->idDoc]))
                            <p class="mt-2 text-sm text-gray-500">
                                Dokumen yang diupload: {{ $uploadedDocuments[$row->idDoc] }}
                            </p>
                        @endif
                    </div>
                @endforeach

            </div>

            <div class="mt-8 flex justify-between">
                <a href="{{ route('applicant.uploadDP') }}" class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    Kembali
                </a>

                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection