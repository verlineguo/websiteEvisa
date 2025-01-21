@extends('applicant.layouts.layout-applicant')
@section('content')
<div class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="max-w-screen-md mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Pengajuan Visa Anda Berhasil!</h2>
            <p class="text-gray-500 sm:text-xl dark:text-gray-400">Silahkan tunggu hingga status visa anda disetujui.</p>
        </div>
        <a href="/applicant/status-pengajuan" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
            Lihat status pengajuan
            </a>
        <a href="/applicant/home" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
            Kembali ke home  
            </a>
    </div>
</div>
@endsection