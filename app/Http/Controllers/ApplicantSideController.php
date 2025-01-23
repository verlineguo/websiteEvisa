<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\DocType;
use Illuminate\Support\Facades\Log;


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

    // public function uploadKV()
    // {
    //     $country = Country::all()->toArray();
    //     return view('applicant.upload-keterangan-visa', ['country' => $country]);
    // }

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
            dd($uploadedDocuments);

    
            return redirect()->route('applicant.upload-document.create')->with('success', 'Dokumen berhasil diunggah.')->with('uploadedDocuments', $uploadedDocuments);
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

}
