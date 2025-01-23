<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Visa;
use App\Models\Country;
use App\Models\DocType;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\VisaApplicant;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ApplicantSideController extends Controller
{
    // function untuk applicant
    public function home()
    {
        $applicantSide = Auth::guard('customer')->user(); 
        return view('applicant.home', compact('applicantSide'));
    }

    public function uploadDP()
    {
        $applicantSide = Auth::guard('customer')->user(); 
        return view('applicant.upload-data-pribadi', compact('applicantSide'));
    }
    
    public function uploadKV()
    {
        $applicantSide = Auth::guard('customer')->user();
        $applicant = Applicant::all();
        $countries = Country::all();
        $visa = Visa::all();
        return view('applicant.upload-keterangan-visa', ['applicant' => $applicant, 'countries' => $countries, 'visa' => $visa], compact('applicantSide'));
    }

    public function uploadDoc()
    {
        $docType = DocType::all();
        $applicantSide = Auth::guard('customer')->user(); 
        $uploadedDocuments = [];
        foreach ($docType as $row) {
            $filePath = storage_path('app/public/documents/' . $row->idDoc);  // Sesuaikan dengan nama dokumen yang diupload
            if (file_exists($filePath)) {
                $uploadedDocuments[$row->idDoc] = basename($filePath);
            }
        }
        return view('applicant.upload-dokumen', compact('applicantSide', 'docType', 'uploadedDocuments'));
    }

    public function storeDoc(Request $request)
    {

        $request->validate([
            'documents' => 'required|array',
            'documents.*' => 'file|mimes:png,jpg,pdf,doc,docx|max:2048', // Maksimum 2MB
        ]);
        
        try {
            $idApplicant = Auth::guard('customer')->user()->idApplicant;
            $documents = $request->file('documents');    
            $uploadedDocuments = [];        
            $docType = DocType::all();

            foreach ($docType as $row) {
                if (!isset($documents[$row->idDoc])) {
                    return redirect()->back()->withErrors(['error' => 'Semua dokumen wajib diupload']);
                }
            }
            
            foreach ($documents as $idDoc => $file) {
                $filePath = $file->store('documents', 'public');
                $uploadedDocuments[$idDoc] = $file->getClientOriginalName(); 

                DB::statement('EXEC SP_createDocument ?, ?, ?', [
                    $idApplicant,
                    $idDoc,
                    $filePath,
                ]);
            }
            // dd($uploadedDocuments);

    
            return redirect()->route('applicant.uploadKV')->with('success', 'Dokumen berhasil diunggah.')->with('uploadedDocuments', $uploadedDocuments);
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    

    
    public function done()
    {
        return view('applicant.upload-done');
    }

    public function statusPengajuan()
    {
        return view('applicant.status-pengajuan');
    }

    public function pembayaranVisa()
    {
        return view('applicant.pembayaran-visa');
    }

    public function storeApplicant(Request $request, $idApplicant)
    {
        $applicant = Auth::guard('customer')->user();
        
        if (!$applicant) {
            return redirect()->route('applicant.uploadDP')->with('fail', 'Pengguna tidak ditemukan.');
        }

        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'motherName' => 'required',
            'phoneNo' => 'required',
            'emailAddress' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'profession' => 'required',
        ]);
            

        try{
            DB::statement('EXEC SP_updateApplicant ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', [
                $idApplicant,
                $request->name,
                $applicant->username,
                $applicant->password,
                $request->dob,
                $request->phoneNo,
                $request->emailAddress,
                $request->address,
                $request->motherName,
                $request->gender,
                $request->profession,
            ]);
            return redirect()->route('applicant.uploadDP')->with('success', 'Data Anda berhasil disimpan! Lakukan pengisian kembali jika ada data yang salah!');
        } catch(\Exception $e){
            return redirect()->route('applicant.uploadDP')->with('fail', $e->getMessage());
        }
    }

    public function storeKV(Request $request){
        // Validasi input
        $request->validate([
            'jenis-visa' => 'required|string',
            'departure-date' => 'required|date',
            'arrival-date' => 'required|date|after:departure-date'
        ]);

        // Ambil ID pelamar
        $idApplicant = Auth::guard('customer')->user()->idApplicant;

        // Parsing tanggal
        $departureDate = Carbon::parse($request->input('departure-date'));
        $arrivalDate = Carbon::parse($request->input('arrival-date'));
        $lengthOfStay = $departureDate->diffInDays($arrivalDate);

        try {
            // Panggil stored procedure
            DB::statement('CALL SP_createVisaApplicant (?, ?, ?, ?, ?, ?, ?)', [
                $idApplicant,
                $request->input('jenis-visa'),
                $arrivalDate,
                $departureDate,
                $lengthOfStay,
                null, 
                null
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('applicant.uploadKV')->with('success', 'Keterangan visa berhasil disimpan');
        } catch (\Exception $e) {
            // Tangani kesalahan
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
        }
        
    }


}
