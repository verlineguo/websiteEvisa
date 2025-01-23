<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class ApplicantController extends Controller
{
    public function index() 
    {
        $user = Auth::guard('employee')->user();
        if (!$user) {
            return redirect()->route('customer.login')->with('error', 'You must be logged in to access this page.');
        }
        if ($user->role == 1) { 
            $applicant = Applicant::all()->toArray();
            return view('admin.applicant.index', ['applicant' => $applicant]);
        } elseif ($user->role == 2) { 
            $applicant = Applicant::all()->toArray();
            return view('consultant.applicant.index', ['applicant' => $applicant]);
        } else {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }
    }
    
    public function create()
    {
        return view('admin.applicant.form');
    }

    // Menyimpan applicant baru ke database
    public function save(Request $request)
    {

        DB::statement('CALL SP_createApplicant (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->name,
            $request->username,
            bcrypt($request->password),
            $request->dob,
            $request->phoneNo,
            $request->emailAddress,
            $request->address,
            $request->motherName,
            $request->gender,
            $request->profession,
        ]);

        return redirect()->route('admin.applicant.index')->with('success', 'Applicant added successfully.');

    }

    public function edit($idApplicant)
    {
        $applicant = Applicant::find($idApplicant);  
        return view('admin.applicant.form', ['applicant' => $applicant]);
    }

    public function update(Request $request, $idApplicant)
    {
        DB::statement('CALL SP_updateApplicant (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $idApplicant,
            $request->name,
            $request->username,
            $request->password ? bcrypt($request->password) : null,
            $request->dob,
            $request->phoneNo,
            $request->emailAddress,
            $request->address,
            $request->motherName,
            $request->gender,
            $request->profession,
        ]);
        return redirect()->route('admin.applicant.index')->with('success', 'Applicant updated successfully.');
    }

    public function delete($idApplicant)
    {
        DB::statement('CALL SP_deleteApplicant (?)', [$idApplicant]);

        return redirect()->route('admin.applicant.index')->with('success', 'Applicant deleted successfully.');
    }



    public function detail($idApplicant)
    {
        $applicant = Applicant::find($idApplicant);
        if (!$applicant) {
            return redirect()->route('admin.applicant.index')->with('error', 'Applicant not found.');
        }
        return view('admin.applicant.detail', compact('applicant'));
    }

    public function show($id)
    {
        $applicantDetail = DB::table('view_applicant_detail')
        
        ->where('idApplicant', $id)
        ->get()->toArray();
        if (!$applicantDetail) {
            abort(404, 'No data found for this applicant.');
        }

        return view('admin.applicant.applicantDetail', compact('applicantDetail'));
    }

    
    
}
