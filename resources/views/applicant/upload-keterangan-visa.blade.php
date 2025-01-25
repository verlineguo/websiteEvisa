@extends('applicant.layouts.layout-applicant')
@section('content')
<div class="flex justify-center pb-8">
  <div class="flex w-full max-w-4xl items-center">
      @foreach ([ 
          'applicant.uploadDP' => 'Data Pribadi', 
          'applicant.upload-document.create' => 'Upload Dokumen', 
          'applicant.uploadKV' => 'Keterangan Visa', 
          'applicant.payment' => 'Pembayaran', 
          'applicant.confirmation' => 'Konfirmasi' 
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
<div class="flex items-center justify-end px-28">
        <a href="{{ route('applicant.pembayaran-visa') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
        Selanjutnya &raquo;
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger p2 px-32 text-red-500 text-xl">
        {{ Session::get('error') }}
    </div>
    @elseif(Session::has('fail'))
        <span class="alert alert-danger p2 px-32 text-red-500 text-xl">{{ Session::get('fail') }}</span>
    @elseif(Session::has('success'))
        <span class="alert alert-success p2 px-32 text-green-500 text-xl">{{ Session::get('success') }}</span>
    @endif
<div class="px-32 py-8">

    <form action="{{ route('applicant.storeKV') }}" method="POST">
        @csrf
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="font-semibold text-gray-900 text-3xl">Keterangan Visa</h2>
            <p class="mt-1 text-sm/6 text-gray-600">Mohon isi keterangan visa dengan benar dan lengkap!</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="jenis-visa" class="block text-sm/6 font-medium text-gray-900">Jenis Visa</label>
                    <div class="form-group">
                        <select class="form-control" id="jenis-visa" name="jenis-visa" required>
                            <option value="">Pilih Jenis Visa</option>
                            @foreach ($visa as $row)
                            <option value="{{ $row->idFee }}">
                                {{ $row->jenisVisa }} - {{ $row->country->countryName ?? 'No Country' }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="sm:col-span-4">
                    <label for="departure-date" class="block text-sm/6 font-medium text-gray-900">Tanggal Keberangkatan</label>
                    <div class="mt-2">
                        <input id="departure-date" name="departure-date" type="date" class="block w-50 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                    </div>
                </div>
                
                <div class="sm:col-span-4">
                    <label for="arrival-date" class="block text-sm/6 font-medium text-gray-900">Tanggal Kedatangan</label>
                    <div class="mt-2">
                        <input id="arrival-date" name="arrival-date" type="date" class="block w-50 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                    </div>
                </div>
            </div>
        </div>
    
        
        <div class="mt-8 flex justify-between">
                <a href="{{ route('applicant.upload-document.create') }}" class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    Kembali
                </a>

                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Simpan
                </button>
        </div>
    </form>
</div>
@endsection