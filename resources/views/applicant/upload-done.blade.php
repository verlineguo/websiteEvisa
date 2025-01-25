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
                'applicant.upload-done' => 'Selesai' 
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
    
  <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="mx-auto max-w-5xl">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white text-center sm:text-3xl">Pengajuan Visa anda Berhasil!</h2>
        <h4 class="text-gray-900 dark:text-white text-center sm:text-xl">Silahkan menunggu status pengajuan visa Anda</h4>
      </div>
      <div class="mt-8 flex justify-end">
        <a href={{ route('applicant.home') }} class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kembali ke Home &raquo;</a>
      </div>
    </div>
  </section>
</section>
@endsection
