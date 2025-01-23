@extends('applicant.layouts.layout-applicant')
@section('content')
@if(Session::has('fail'))
    <span class="alert alert-danger p2 px-32">{{ Session::get('fail') }}</span>
@elseif(Session::has('success'))
    <span class="alert alert-success p2 px-32 text-green-500 text-xl">{{ Session::get('success') }}</span>
@endif
<div class="flex items-center justify-end px-28">
    <a href="{{ route('applicant.uploadKV') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
      Selanjutnya &raquo;
    </a>
</div>
  <div class="px-32 py-8    ">
    <div class="border-b border-gray-900/10 pb-12">
    <h2 class="font-semibold text-gray-900 text-3xl">Dokumen Utama</h2>
    <p class="mt-1 text-sm/6 text-gray-600">Mohon isi dokumen utama dengan benar dan lengkap!</p>

    <form action="{{ route('applicant.uploadDoc.store-KTP') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="col-span-full mt-10 ">
                <label class="text-xl" for="ktp">Fotokopi KTP</label>
                <br>
                <input class="mt-5" type="file" id="ktp" name="ktp"  accept="image/png, image/jpg, .doc, .docx, .pdf">
            </div>
            <button type="submit">Simpan</button>
    </form>

    <form action="{{ route('applicant.uploadDoc.store-KK') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="col-span-full mt-10 ">
                <label class="text-xl" for="kk">Kartu Keluarga</label>
                <br>
                <input class="mt-5" type="file" id="kk" name="kk"  accept="image/png, image/jpg, .doc, .docx, .pdf">
            </div>
            <button type="submit">Simpan</button>
    </form>

    <form action="{{ route('applicant.uploadDoc.store-Akta-Lahir') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="col-span-full mt-10 ">
                <label class="text-xl" for="aktalahir">Akta Lahir</label>
                <br>
                <input class="mt-5" type="file" id="aktalahir" name="aktalahir" accept="image/png, image/jpg, .doc, .docx, .pdf">
            </div>
            <button type="submit">Simpan</button>
    </form>

    <form action="{{ route('applicant.uploadDoc.store-Passport') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="col-span-full mt-10 ">
                <label class="text-xl" for="passport">Passport</label>
                <br>
                <input class="mt-5" type="file" id="passport" name="passport"  accept="image/png, image/jpg, .doc, .docx, .pdf">
            </div>
            <button type="submit">Simpan</button>
    </form> 
            
        </div>
      </div> 
  </div>  
@endsection