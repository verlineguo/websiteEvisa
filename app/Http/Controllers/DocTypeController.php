<?php

namespace App\Http\Controllers;

use App\Models\DocType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DocTypeController extends Controller
{
    public function index()
    {
        $docType = DocType::all();
        
        return view('admin.docType.index', ['docType' => $docType]);
    }

    public function create()
    {
        return view('admin.docType.form');
    }

    public function save(Request $request)
{
    DB::statement('EXEC SP_createDocType ?', [
        $request->dType,
    ]);

    return redirect()->route('admin.docType.index')->with('success', 'Document Type added successfully.');
}


    public function edit($idDoc)
    {
        $docType = DocType::findOrFail($idDoc);
        return view('admin.docType.form', ['docType' => $docType]);
    }

    public function update(Request $request, $idDoc)
    {
        $request->validate([
            'dType' => 'required|string|max:50',
        ]);

        DB::statement('EXEC SP_updateDocType ?, ?', [
            $idDoc,
            $request->dType,
        ]);

        return redirect()->route('admin.docType.index')->with('success', 'Document Type updated successfully.');
    }

    public function delete($idDoc)
    {
        DB::statement('EXEC SP_deleteDocType ?', [
            $idDoc,
        ]);

        return redirect()->route('admin.docType.index')->with('success', 'Document Type deleted successfully.');
    }
}
