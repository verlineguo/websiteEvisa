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
                'applicant.pembayaran-visa' => 'Pembayaran', 
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

    <div class="flex items-center justify-end px-28">
      <a href="{{ route('applicant.uploadKV') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
      Selanjutnya &raquo;
      </a>
    </div>

  <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="mx-auto max-w-5xl">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Payment</h2>
        
        <div class="flex items-center justify-end px-28 ">
          <a href="{{ route('applicant.upload-document.create') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
            Selanjutnya &raquo;
          </a>
        </div>
        <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12">
          <!-- Payment Form -->
          <form action="{{ route('applicant.pembayaran-visa') }}" method="POST" class="w-full rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-8 lg:max-w-xl">
            @csrf
            <div class="mb-6 grid grid-cols-2 gap-4">
              <div class="col-span-2 sm:col-span-1">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Name </label>
                <input type="text"  value="{{ $applicantSide->name ?? 'N/A' }}" disabled class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" />
              </div>
            </div>

            <div class="mb-6 grid grid-cols-2 gap-4">
              <div class="col-span-2 sm:col-span-1">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Jenis Visa</label>
                <input type="text" value="{{ $visaDetails->visa->jenisVisa ?? 'N/A' }}" disabled class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" />
              </div>
              <div class="col-span-2 sm:col-span-1">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Visa Fee</label>
                <input type="text" value="{{ $visaDetails->visa->fee ?? '0' }}" disabled class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" />
              </div>
            </div>

            <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
              Pay now
            </button>
          </form>

          <!-- Payment Summary (Like a Receipt) -->
          <div class="mt-8 p-4 rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="flex justify-between mb-4">
              <span class="font-semibold text-sm text-gray-900 dark:text-white">Visa Fee</span>
              <span class="text-sm text-gray-900 dark:text-white">{{ $visaDetails->visa->fee ?? '0' }}</span>
            </div>
            
            <div class="flex justify-between mb-4">
              <span class="font-semibold text-sm text-gray-900 dark:text-white">Tax (10%)</span>
              <span class="text-sm text-gray-900 dark:text-white">{{ $tax ?? '0' }}</span>
            </div>

            <div class="flex justify-between mb-4">
              <span class="font-semibold text-sm text-gray-900 dark:text-white">Total Payment</span>
              <span class="text-sm text-gray-900 dark:text-white">{{ $totalAmount ?? '0' }}</span>
            </div>

            <div class="border-t-2 mt-4 pt-4 text-center">
              <span class="text-sm font-semibold text-gray-900 dark:text-white">Thank you for your payment!</span>
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
        </div>
      </div>
    </div>
  </section>
</section>
@endsection
