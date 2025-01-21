@extends('applicant.layouts.layout-applicant')
@section('content')
<div class="flex items-center justify-end px-40">
  <a href="{{ route('applicant.upload-done') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-500  rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
    Selesai
  </a>
</div>
  <div class="px-32 py-8">
    <form action="/applicant/store" method="POST">
      @csrf
    
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="font-semibold text-gray-900 text-3xl">Keterangan Visa</h2>
          <p class="mt-1 text-sm/6 text-gray-600">Mohon isi keterangan visa dengan benar dan lengkap!</p>
    
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="jenis-visa" class="block text-sm/6 font-medium text-gray-900">Jenis Visa</label>
              <div class="mt-2 grid grid-cols-1">
                <select id="jenis-visa" name="jenis-visa" autocomplete="jenis-visa-name" placeholder="Jenis Visa" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                  <option value ="" disabled selected>Jenis Visa</option>
                  <option value = "wisata">Visa Wisata</option>
                  <option value = "bisnis">Visa Bisnis</option>
                  <option value = "kunjungan">Visa Kunjungan Keluarga</option>
                  <option value = "pelajar">Visa Pelajar</option>
                  <option value = "transit">Visa Transit</option>
                  <option value = "kerja">Visa Kerja</option>
                  <option value = "diplomatik">Visa Diplomatik</option>
                  <option value = "religi">Visa Religi</option>
                  <option value = "medis">Visa Medis</option>
                  <option value = "permanen">Visa Permanen</option>
                  <option value = "budaya">Visa Budaya</option>
                  <option value = "penelitian">Visa Penelitian</option>
                </select>
                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                  <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
            
            <div class="sm:col-span-4">
              <label for="departure-date" class="block text-sm/6 font-medium text-gray-900">Tanggal Keberangkatan</label>
              <div class="mt-2">
                <input id="departure-date" name="departure-date" type="date" placeholder="Tanggal Kedatangan" autocomplete="departure-date" class="block w-50 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
              </div>
            </div>
            
            <div class="sm:col-span-4">
              <label for="arrival-date" class="block text-sm/6 font-medium text-gray-900">Tanggal Kedatangan</label>
              <div class="mt-2">
                <input id="arrival-date" name="arrival-date" type="date" placeholder="Tanggal Kedatangan" autocomplete="arrival-date" class="block w-50 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
              </div>
            </div>

            <div class="sm:col-span-4">
              <label for="country" class="block text-sm/6 font-medium text-gray-900">Negara yang Ingin Dikunjungi</label>
              <div class="mt-2">
                <select id="country" name="country" type="text" placeholder="Negara yang Ingin Dikunjungi" autocomplete="country" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                  <option value="" disabled selected>Negara yang Ingin Dikunjungi</option>
                  {{-- @foreach ($country ad $item)
                    <option >{{ $item['countryName'] }}</option>
                  @endforeach --}}
                </select>
              </div>
            </div>


          </div>
        </div>
  
    
      <div class="mt-6 flex items-center justify-end px-16">
        <button type="submit">Simpan</button>
      </div>
    </form>
  </div>  

@endsection