<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ApplicantSideController extends Controller
{
    // function untuk applicant
    public function home()
    {
        return view('applicant.home');
    }

    public function uploadDP()
    {
        return view('applicant.upload-data-pribadi');
    }

    // public function uploadKV()
    // {
    //     $country = Country::all()->toArray();
    //     return view('applicant.upload-keterangan-visa', ['country' => $country]);
    // }

    public function uploadDoc()
    {
        return view('applicant.upload-dokumen');
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

    public function storeApplicant(Request $request)
    {
        $request->validate([
            // 'idApplicant' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'dob' => 'required',
            'motherName' => 'required',
            'phoneNo' => 'required',
            'emailAddress' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'profession' => 'required',
        ]);
            

        try{
            Applicant::create([
                'idApplicant' => 1,
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'dob' => $request->dob,
                'motherName' => $request->motherName,
                'phoneNo' => $request->phoneNo,
                'emailAddress' => $request->emailAddress,
                'address' => $request->address,
                'gender' => $request->gender,
                'profession' => $request->profession
            ]);
    
            return redirect()->route('applicant.uploadDP')->with('success', 'Data Anda berhasil disimpan! Lakukan pengisian kembali jika ada data yang salah!');
        } catch(\Exception $e){
            return redirect()->route('applicant.uploadDP')->with('fail', $e->getMessage());
        }
    }

}
