<?php

namespace App\Http\Controllers;

use App\Models\ApplicationProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApplicationProcessController extends Controller
{
    public function index() 
    {
        $process = applicationProcess::with('status')->get();
        return view('consultant.applicationProcess.index', compact('process'));
    }
    public function create()
    {
        return view('consultant.applicationProcess.form');
    }

    public function edit($noAppProcess)
    {
        $process = applicationProcess::find($noAppProcess);  
        return view('consultant.applicationProcess.form', ['process' => $process]);
    }

    public function update(Request $request, $noAppProcess)
    {
        $request->validate([
            'idStat' => 'required|exists:status,idStat', // Validasi bahwa idStat harus ada di tabel status
        ]);
        
        DB::statement('CALL SP_updateStatAppProc (?, ?)', [
            $noAppProcess,
            $request->idStat,
        ]);
        return redirect()->route('consultant.applicationProcess.index')->with('success', 'Application Process updated successfully.');
    }

    
}
