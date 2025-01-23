<?php

namespace App\Http\Controllers;
use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
class VisaController extends Controller
{
    public function index()
    {
        $visa = Visa::with('country')->get()->toArray();
        return view('admin.visa.index',  ['visa' => $visa]);

    }
    public function create()
    {
        $country = Country::all(); 
        return view('admin.visa.form', data: ['country' => $country]);
    }

    public function save(request $request)
    {
        $request->validate([
            'jenisVisa' => 'required|string|max:100',
            'idCountry' => 'required|exists:Country,idCountry',
            'fee' => 'required|integer|min:0',
        ]);
        
        DB::statement('CALL SP_createVisa (?, ?, ?)', [
            $request->jenisVisa,
            $request->idCountry,
            $request->fee,
        ]);
        return redirect()->route('admin.visa.index')->with('success', 'Visa added successfully.');

    }
    public function edit($idFee)
    {
        $visa = Visa::with('country')->find($idFee);
        $country = Country::all();
        return view('admin.visa.form', ['visa' => $visa, 'country' => $country]);
    }

    public function update(Request $request, $idFee)
    {
        DB::statement('CALL SP_updateVisa (?, ?, ?, ?)', [
            $idFee,
            $request->jenisVisa,
            $request->idCountry,
            $request->fee,
        ]);

        return redirect()->route('admin.visa.index')->with('success', 'Visa updated successfully.');
    }
    public function delete($idFee)
    {
        DB::statement('CALL SP_DeleteVisa (?)', [$idFee]);
        return redirect()->route('admin.visa.index')->with('success', 'Visa deleted successfully.');
    } 
}
