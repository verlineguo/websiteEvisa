<?php

namespace App\Http\Controllers;

use App\Models\ApplicationProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ILluminate\Facades\Log;


class ApplicationProcessController extends Controller
{
    public function index() 
    {
        $process = ApplicationProcess::with('status')->get();
        return view('consultant.applicationProcess.index', compact('process'));
    }
    public function create()
    {
        return view('consultant.applicationProcess.form');
    }

    public function edit($noAppProcess)
    {
        $process = ApplicationProcess::find($noAppProcess);  
        return view('consultant.applicationProcess.form', ['process' => $process]);
    }

    public function update(Request $request, $noAppProcess)
    {
        DB::statement('CALL SP_updateStatAppProc (?, ?)', [
            $noAppProcess,
            $request->idStat,
        ]);
        return redirect()->route('consultant.applicationProcess.index')->with('success', 'Application Process updated successfully.');
    }
    
}
