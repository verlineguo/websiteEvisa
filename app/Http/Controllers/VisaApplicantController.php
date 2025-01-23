<?php

namespace App\Http\Controllers;

use App\Models\VisaApplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Visa;
use App\Models\Applicant;
use Illuminate\Support\Facades\Log;
use App\Models\MainDocument;
use App\Models\ApplicationProcess;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
class VisaApplicantController extends Controller
{
    public function index()
    {
        $user = Auth::guard('employee')->user();

        if (!$user) {
            return redirect()->route('employee.login')->with('error', 'You must be logged in to access this page.');
        }

        if ($user->role == 1) { 
            $visaApplicant = DB::table('View_visaApplicant')->get();
            return view('admin.visaApplicant.index', compact('visaApplicant'));
        } elseif ($user->role == 2) { 
            $visaApplicant = DB::table('View_visaApplicant')->get();
            return view('consultant.visaApplicant.index', compact('visaApplicant'));
        } else {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        
    }
    public function create()
    {
        $applicant = Applicant::all();
        $countries = Country::all();
        $visa = Visa::all();

        return view('admin.visaApplicant.form', ['applicant' => $applicant, 'countries' => $countries, 'visa' => $visa]);
    }


    public function save(Request $request)
    {
        Log::info('Data Form:', $request->all()); 
    
        DB::statement('CALL SP_createVisaApplicant (?, ?, ?, ?, ?, ?, ?)', [
            $request->idApplicant,
            $request->idFee,
            $request->dateOfArrival,
            $request->dateOfDeparture,
            $request->lengthOfStay,
            $request->prevCountry,
            $request->expDate,
        ]);
    
        return redirect()->route('admin.visaApplicant.index')->with('success', 'Visa application added successfully.');
    }

    public function edit($idVisa)
    {
        $visaApplicant = VisaApplicant::with('applicant', 'visa')->find($idVisa);
        $visa = Visa::with('country')->get();
        if (!$visaApplicant) {
            return redirect()->route('admin.visaApplicant.index')->with('error', 'Visa applicant not found.');
        }

        return view('admin.visaApplicant.form', [
            'visaApplicant' => $visaApplicant,
            'applicant' => Applicant::all(),
            'visa' => $visa,
        ]);

    }

    public function update(Request $request, $idVisa)
    {
        DB::statement('CALL SP_updateVisaApplicant (?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $idVisa,
            $request->idApplicant,
            $request->jenisVisa,
            $request->countryOfDest,
            $request->dateOfArrival,
            $request->dateOfDeparture,
            $request->lengthOfStay,
            $request->prevCountry,
            $request->expDate,
        ]);

        return redirect()->route('admin.visaApplicant.index')->with('success', 'Visa application updated successfully.');
    }

    public function delete($idVisa)
    {
        DB::statement('CALL SP_DeleteVisaApplicant (?)', [$idVisa]);
        return redirect()->route('admin.visaApplicant.index')->with('success', 'Visa application deleted successfully.');
    }

    public function checkName(Request $request)
    {
        $name = $request->query('name');
        $applicant = Applicant::where('name', 'LIKE', "%{$name}%")->first();

        if ($applicant) {
            return response()->json([
                'idApplicant' => $applicant->idApplicant,
                'name' => $applicant->name,
            ]);
        }

        return response()->json([
            'idApplicant' => null,
        ]);
    }    

    public function detail($idVisa)
    {
        $visaApplicant = DB::table('view_VisaDetail')->where('idVisa', $idVisa)->first();
        if (!$visaApplicant) {
            return redirect()->route('admin.visaApplicant.index')->with('error', 'visa not found.');
        }
        return view('admin.visaApplicant.detail', compact('visaApplicant'));
    }

    public function viewDocuments($idVisa)
    {
        $visaApplicant = VisaApplicant::find($idVisa);
        $documents = MainDocument::where('idVisa', $idVisa)->get();

        return view('admin.visaApplicant.documents', compact('visaApplicant', 'documents'));
    }
    public function showApplicationProcess($idVisa)
    {
        $applicationProcesses = ApplicationProcess::where('idVisa', $idVisa)->get();

        return view('admin.visaApplicant.applicationProcess', compact('application Processes'));
    }

}