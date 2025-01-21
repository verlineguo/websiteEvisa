<?php

use App\Http\Controllers\ApplicantSideController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Ini Route Buat Applicant
Route::controller(ApplicantSideController::class)->prefix('applicant')->group(function () {
    Route::get('home', [ApplicantSideController::class, 'home'])->name('applicant.home');
    Route::get('pengajuan-visa/upload-data-pribadi', [ApplicantSideController::class, 'uploadDP'])->name('applicant.uploadDP');
    Route::post('pengajuan-visa/upload-data-pribadi/store', [ApplicantSideController::class, 'storeApplicant'])->name('applicant.uploadDP.store');
    Route::get('pengajuan-visa/upload-dokumen', [ApplicantSideController::class, 'uploadDoc'])->name('applicant.uploadDoc');
    // Route::post('pengajuan-visa/upload-dokumen/store-ktp', [MainDocumentController::class, 'storeDocumentKTP'])->name('applicant.uploadDoc.store-KTP');
    // Route::post('pengajuan-visa/upload-dokumen/store-kk', [MainDocumentController::class, 'storeDocumentKK'])->name('applicant.uploadDoc.store-KK');
    // Route::post('pengajuan-visa/upload-dokumen/store-akta-lahir', [MainDocumentController::class, 'storeDocumentAktaLahir'])->name('applicant.uploadDoc.store-Akta-Lahir');
    // Route::post('pengajuan-visa/upload-dokumen/store-passport', [MainDocumentController::class, 'storeDocumentPassport'])->name('applicant.uploadDoc.store-Passport');
    Route::get('pengajuan-visa/upload-keterangan-visa', [ApplicantSideController::class, 'uploadKV'])->name('applicant.uploadKV');
    Route::get('pengajuan-visa/upload-done', [ApplicantSideController::class, 'done'])->name('applicant.upload-done');
    Route::get('status-pengajuan', [ApplicantSideController::class, 'statusPengajuan'])->name('applicant.status-pengajuan');
    Route::get('pembayaran-visa', [ApplicantSideController::class, 'pembayaranVisa'])->name('applicant.pembayaran-visa');
});