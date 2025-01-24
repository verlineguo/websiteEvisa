<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisaController;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\DocTypeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainDocumentController;
use App\Http\Controllers\ApplicantSideController;
use App\Http\Controllers\VisaApplicantController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\EmployeeAuthController;
use App\Http\Controllers\ApplicationProcessController;

Route::controller(EmployeeAuthController::class)->prefix('employee')->group(function () {
    Route::get('login', 'showLoginForm')->name('employee.login.form');
    Route::post('login', 'login')->name('employee.login');
    Route::post('logout', 'logout')->name('employee.logout');
});

Route::middleware(['auth:employee'])->prefix('')->group(function () {
    Route::get('admin/dashboard',[DashboardController::class, 'adminDashboard'])
    ->name('admin.dashboard');

    Route::get('consultant/dashboard',[DashboardController::class, 'consultantDashboard'])
    ->name('consultant.dashboard');
});


Route::controller(CustomerAuthController::class)->prefix('applicant')->group(function () {
    Route::get('register', 'showRegisterForm')->name('applicant.register.form');
	Route::post('register', 'register')->name('applicant.register');
	Route::get('login', 'showLoginForm')->name('applicant.login.form');
	Route::post('login', 'login')->name('applicant.login');
	Route::get('logout', 'logout')->name('applicant.logout');
});

Route::middleware(['auth:customer'])->group(function () {
    Route::get('/applicant/home',[ApplicantSideController::class, 'home'])
    ->name('applicant.home');
});

Route::controller(ApplicantController::class)->prefix('admin/applicant')->group(function () {
    Route::get('', 'index')->name('admin.applicant.index');
    Route::get('create', 'create')->name('admin.applicant.create');
    Route::post('create', 'save')->name('admin.applicant.create.save');
    Route::get('edit/{idApplicant}', 'edit')->name('admin.applicant.edit');
    Route::put('edit/{idApplicant}',  'update')->name('admin.applicant.create.update');
    Route::delete('delete/{idApplicant}',  'delete')->name('admin.applicant.delete');
    Route::get( 'detail/{idApplicant}', 'detail')->name('admin.applicant.detail');
    Route::get('detail/show/{idApplicant}', 'show')->name('admin.applicant.detail.show');

});

Route::controller(EmployeeController::class)->prefix('admin/employee')->group(function () {
    Route::get('', 'index')->name('admin.employee.index');
    Route::get('create', 'create')->name('admin.employee.create');
    Route::post('create', 'save')->name('admin.employee.create.save');
    Route::get('edit/{idEmp}', 'edit')->name('admin.employee.edit');
    Route::put('edit/{idEmp}', 'update')->name('admin.employee.create.update');
    Route::delete('delete/{idEmp}', 'delete')->name('admin.employee.delete');
});

Route::controller(CountryController::class)->prefix('admin/country')->group(function () {
    Route::get('', 'index')->name('admin.country.index');
    Route::get('create', 'create')->name('admin.country.create');
    Route::post('create', 'save')->name('admin.country.create.save');
    Route::get('edit/{idCountry}', 'edit')->name('admin.country.edit');
    Route::put('edit/{idCountry}', 'update')->name('admin.country.create.update');
    Route::delete('delete/{idCountry}', 'delete')->name('admin.country.delete');
});

Route::controller(DocTypeController::class)->prefix('admin/docType')->group(function () {
    Route::get('', 'index')->name('admin.docType.index');
    Route::get('create', 'create')->name('admin.docType.create');
    Route::post('create', 'save')->name('admin.docType.create.save');
    Route::get('edit/{idDoc}', 'edit')->name('admin.docType.edit');
    Route::put('edit/{idDoc}', 'update')->name('admin.docType.create.update');
    Route::delete('delete/{idDoc}', 'delete')->name('admin.docType.delete');
});

Route::controller(VisaController::class)->prefix('admin/visa')->group(function () {
    Route::get('', 'index')->name('admin.visa.index');
    Route::get('create', 'create')->name('admin.visa.create');
    Route::post('create', 'save')->name('admin.visa.create.save');
    Route::get('edit/{idFee}', 'edit')->name('admin.visa.edit');
    Route::put('edit/{idFee}', 'update')->name('admin.visa.create.update');
    Route::delete('delete/{idFee}', 'delete')->name('admin.visa.delete');
    // Route::post('index/filter', 'filter')->name('admin.visa.index.filter');
    // Route::get('index/filter=jenis')->name('admin.visa.index.filter.jenis');
    // Route::get('index/filter=negara')->name('admin.visa.index.filter.negara');
    
});


Route::controller(VisaApplicantController::class)->prefix('admin/visaApplicant')->group(function () {
    Route::get('', 'index')->name('admin.visaApplicant.index');
    Route::get('create', 'create')->name('admin.visaApplicant.create');
    Route::post('create', 'save')->name('admin.visaApplicant.create.save');
    Route::get('edit/{idVisa}', 'edit')->name('admin.visaApplicant.edit');
    Route::put('edit/{idVisa}', 'update')->name('admin.visaApplicant.create.update');
    Route::delete('delete/{idVisa}', 'delete')->name('admin.visaApplicant.delete');
    Route::get('detail/{idVisa}', 'detail')->name('admin.visaApplicant.detail');
    Route::get('documents/{idVisa}', 'viewDocuments')->name('admin.visaApplicant.documents');
    Route::get('showApplicationProcess/{idVisa}', 'showApplicationProcess')->name('admin.visaApplicant.applicationProcess');
    Route::get('checkName', 'checkName')->name('admin.visaApplicant.checkName');
    
});
Route::put('admin/payment/update-status/{idPayment}', [PaymentController::class, 'updateStatus'])
    ->name('admin.payment.updateStatus');


Route::controller(PaymentController::class)->prefix('admin/payment')->group(function () {
    Route::get('', 'index')->name('admin.payment.index');
    Route::get('edit{idPayment}', 'edit')->name('admin.payment.edit'); 
    Route::put('updateStatus/{idPayment}', 'updateStatus')->name('admin.payment.updateStatus');
    Route::delete('delete/{idPayment}', 'delete')->name('admin.payment.delete');
});



Route::controller(ApplicantSideController::class)->prefix('applicant')->group(function () {
    Route::get('home',  [ApplicantSideController::class, 'home'])->name('applicant.home');
    Route::get('pengajuan-visa/upload-data-pribadi', [ApplicantSideController::class,  'uploadDP'])->name('applicant.uploadDP');
    Route::post('pengajuan-visa/upload-data-pribadi/store/{idApplicant}', [ApplicantSideController::class, 'storeApplicant'])->name('applicant.uploadDP.store');
    Route::get('pengajuan-visa/upload-keterangan-visa', [ApplicantSideController::class, 'uploadKV'])->name('applicant.uploadKV');
    Route::post('pengajuan-visa/upload-keterangan-visa/store', [ApplicantSideController::class, 'storeKV'])->name('applicant.storeKV');
    Route::get('pengajuan-visa/upload-done', [ApplicantSideController::class, 'done'])->name('applicant.upload-done');
    Route::get('status-pengajuan', 'statusPengajuan')->name('applicant.status-pengajuan');
    Route::get('/pembayaran-visa', [ApplicantSideController::class, 'showPaymentForm'])->name('applicant.pembayaran-visa');
    Route::post('/pembayaran-visa', [ApplicantSideController::class, 'createPayment']);

});


Route::middleware(['auth:employee'])->prefix('admin/document')->group(function () {
    Route::get('', [MainDocumentController::class, 'employeeIndex'])->name('admin.document.index');    
    Route::get('create', [MainDocumentController::class, 'adminCreate'])->name('admin.document.create');
    Route::get('edit/{documentNo}', [MainDocumentController::class, 'adminEdit'])->name('admin.document.edit');
    Route::put('edit/{documentNo}', [MainDocumentController::class, 'adminUpdate'])->name('admin.document.update');
    Route::delete('delete/{documentNo}', [MainDocumentController::class, 'adminDelete'])->name('admin.document.delete');
});

Route::middleware(['auth:employee'])->prefix('consultant/document')->group(function () {
    Route::get('', [MainDocumentController::class, 'employeeIndex'])->name('consultant.document.index');
    Route::post('approve/{documentNo}', [MainDocumentController::class, 'approveDocument'])->name('consultant.document.approve');

});

/* -- perubahan oleh Kevin -- */

Route::controller(ApplicationProcessController::class)->prefix('consultant/applicationProcess')->group(function () {
    Route::get('', 'index')->name('consultant.applicationProcess.index');
    Route::get('edit/{noAppProcess}', 'edit')->name('consultant.applicationProcess.edit');
    Route::put('edit/{noAppProcess}', 'update')->name('consultant.applicationProcess.update');
    
});

Route::controller(DashboardController::class)->prefix('consultant')->group(function () {
    Route::get('','consultantDashboard')->name('consultant.dashboard');

});

Route::controller(DashboardController::class)->prefix('admin')->group(function () {
    Route::get('','adminDashboard')->name('admin.dashboard');

});

Route::controller(MainDocumentController::class)->prefix('consultant/mainDocument')->group(function () {
    Route::get('', 'consultantIndex')->name('consultant.mainDocument.index');
    
});

/* -- perubahan oleh Kevin -- */


Route::middleware(['auth:customer'])->prefix('applicant')->group(function () {
    Route::get('upload-dokumen/create', [ApplicantSideController::class, 'uploadDoc'])->name('applicant.upload-document.create');
    Route::post('upload-dokumen/store', [ApplicantSideController::class, 'storeDoc'])->name('applicant.upload-document.store');
});


