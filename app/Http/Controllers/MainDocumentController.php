<?php

namespace App\Http\Controllers;

use App\Models\DocType;
use App\Models\MainDocument;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainDocumentController extends Controller
{
    
    public function employeeIndex()
    {
        $user = Auth::guard('employee')->user(); 

        $documents = MainDocument::with('docType')->get();

        if ($user && $user->role === 'admin') {
            return view('admin.document.index', compact('documents'));
        } elseif ($user && $user->role === 'consultant') {
            return view('consultant.mainDocument.index', compact('documents'));
        }

        return redirect()->route('home')->with('fail', 'You do not have permission to access this page.');
    }

    
    public function approveDocument($documentNo)
    {
        try {
            DB::statement('CALL SP_approveDocument (?)', [$documentNo]);
            return redirect()->route('consultant.document.index')->with('success', 'Document approved successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    public function consultantIndex() 
    {
        $documents = mainDocument::with('docType')->get();
        return view('consultant.mainDocument.index', compact('documents'));
    }

    public function adminCreate()
    {
        $docType = DocType::all();
        return view('admin.document.create', compact('docType'));
    }

    
    public function adminEdit($documentNo)
    {
        $docType = DocType::all();
        $document = MainDocument::findOrFail($documentNo);
        return view('admin.document.form', compact('document', 'docType'));
    }

    public function adminUpdate(Request $request, $documentNo)
    {
        $request->validate([
            'documentType' => 'required',
            'filePath' => 'nullable|file',
            'idApplicant' => 'required',
            'uploadedDate' => 'required|date',
        ]);

        try {
            $filePath = $request->filePath
                ? $request->file('filePath')->store('documents', 'public')
                : MainDocument::find($documentNo)->filePath;

            DB::statement('CALL SP_updateDocument (?, ?, ?, ?, ?)', [
                $documentNo,
                $request->idApplicant,
                $request->documentType,
                $filePath,
                $request->uploadedDate // Disimpan dari input admin
            ]);

            return redirect()->route('admin.document.index')->with('success', 'Document updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    public function adminDelete($documentNo)
    {
        DB::statement('CALL SP_deleteDocument (?)', [$documentNo]);

        return redirect()->route('admin.document.index')->with('success', 'Document deleted successfully.');
    }

}

