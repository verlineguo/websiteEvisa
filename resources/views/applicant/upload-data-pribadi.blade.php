@extends('applicant.layouts.layout-applicant')
@section('content')
<!-- Progress Bar -->
<div class="container mx-auto px-6 py-10">
    <!-- Progress Bar -->
    <div class="flex justify-center pb-6">
        <div class="flex w-full max-w-4xl items-center">
            @foreach ([ 
                'applicant.uploadDP' => 'Data Pribadi', 
                'applicant.upload-document.create' => 'Upload Dokumen', 
                'applicant.review' => 'Review Data', 
                'applicant.payment' => 'Pembayaran', 
                'applicant.confirmation' => 'Konfirmasi' 
            ] as $route => $label)
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full {{ Request::routeIs($route) ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-500' }} flex items-center justify-center font-bold">
                        {{ $loop->iteration }}
                    </div>
                    <span class="ml-2 {{ Request::routeIs($route) ? 'text-blue-500 font-semibold' : 'text-gray-500' }}">{{ $label }}</span>
                </div>
                @if (!$loop->last)
                    <div class="flex-1 h-1 {{ Request::routeIs(array_keys(array_slice([ 
                        'applicant.upload-document.create', 'applicant.review', 'applicant.payment', 'applicant.confirmation'], $loop->index))) ? 'bg-blue-500' : 'bg-gray-300' }} mx-1"></div>
                @endif
            @endforeach
        </div>
    </div>
    @if(Session::has('success'))
      <div class="alert alert-success p-4 mb-6 bg-green-100 text-green-700">
          <p>{{ Session::get('success') }}</p>
      </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger p-4 mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('fail'))
        <span class="alert alert-danger p2 px-32">{{ Session::get('fail') }}</span>
    @elseif(Session::has('success'))
        <span class="alert alert-success p2 px-32 text-green-500 text-xl">{{ Session::get('success') }}</span>
    @endif


  <div class="flex items-center justify-end px-28 ">
    <a href="{{ route('applicant.upload-document.create') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
      Selanjutnya &raquo;
    </a>
  </div>
    <div class="px-32 py-8">
      <form action="{{ route('applicant.uploadDP.store', ['idApplicant' => $applicantSide->idApplicant]) }}" method="POST">
        @csrf
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="font-semibold text-gray-900 text-3xl">Data Pribadi</h2>
            <p class="mt-1 text-sm/6 text-gray-600">Mohon isi data pribadi dengan benar dan lengkap!</p>
      
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              
              <div class="sm:col-span-3">
                <label for="name" class="block text-sm/6 font-medium text-gray-900">Nama Lengkap</label>
                <div class="mt-2">
                  <input type="text" name="name" id="name" value="{{ old('name', isset($applicantSide) ? $applicantSide->username : '') }}" placeholder="Nama Lengkap" autocomplete="given-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                  @error('name')
                      <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="gender" class="block text-sm/6 font-medium text-gray-900">Jenis Kelamin</label>
                <div class="mt-2 grid grid-cols-1">
                  <select id="gender" name="gender" autocomplete="gender" placeholder="Jenis Kelamin" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                    <option value="" disabled selected>Jenis Kelamin</option>
                    <option value="Laki-laki" {{ (old('gender') ?? ($applicantSide->gender ?? '')) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ (old('gender') ?? ($applicantSide->gender ?? '')) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                  <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                  </svg>
                  @error('gender')
                      <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="dob" class="block text-sm/6 font-medium text-gray-900">Tanggal Lahir</label>
                <div class="mt-2">
                  <input id="dob" name="dob" type="date" value="{{ old('dob', isset($applicantSide) ? $applicantSide->dob : '') }}"  placeholder="Tanggal Kedatangan" autocomplete="dob" class="block w-50 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                  @error('dob')
                      <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>
      
              
              <div class="sm:col-span-4">
                <label for="motherName" class="block text-sm/6 font-medium text-gray-900">Nama Ibu</label>
                <div class="mt-2">
                  <input id="motherName" name="motherName" type="text" value="{{ old('motherName', isset($applicantSide) ? $applicantSide->motherName : '') }}"  placeholder="Nama Ibu" autocomplete="motherName" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                  @error('motherName')
                      <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="phoneNo" class="block text-sm/6 font-medium text-gray-900">Nomor Telepon</label>
                <div class="mt-2">
                  <input id="phoneNo" name="phoneNo" type="text" value="{{ old('phoneNo', isset($applicantSide) ? $applicantSide->phoneNo : '') }}"  placeholder="Nomor Telepon" autocomplete="phoneNo" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                  @error('phoneNo')
                      <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="emailAddress" class="block text-sm/6 font-medium text-gray-900">Alamat Email</label>
                <div class="mt-2">
                  <input id="emailAddress" name="emailAddress" type="email" value="{{ old('emailAddress', isset($applicantSide) ? $applicantSide->emailAddress : '') }}" placeholder="Alamat Email" autocomplete="emailAddress" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                  @error('emailAddress')
                      <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="profession" class="block text-sm/6 font-medium text-gray-900">Pekerjaan</label>
                <div class="mt-2">
                  <input id="profession" name="profession" type="text" value="{{ old('profession', isset($applicantSide) ? $applicantSide->profession : '') }}"  placeholder="Pekerjaan" autocomplete="profession" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                  @error('profession')
                      <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>
      
              <div class="col-span-full">
                <label for="address" class="block text-sm/6 font-medium text-gray-900">Alamat Rumah</label>
                <div class="mt-2">
                  <input id="address" name="address" type="char" value="{{ old('address', isset($applicantSide) ? $applicantSide->address : '') }}" placeholder="Alamat Rumah" autocomplete="address" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                  @error('address')
                      <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            </div>
          </div>
    
      
        <div class="mt-6 flex items-center justify-end py-8">
          <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="submit">Simpan</button>
        </div>
      </form>
    </div>

  @endsection
</div>