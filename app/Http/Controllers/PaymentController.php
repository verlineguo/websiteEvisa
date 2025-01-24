<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;


class PaymentController extends Controller
{
    public function index()
    {
        // $payment = Payment::all()->toArray();
        return view('admin.payment.index'); // ['payment' => $payment]
        
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'idVisa' => 'required|exists:VisaApplicant,idVisa',
            'amount' => 'required|numeric',
            'paymentStatus' => 'required|boolean',
        ]);

        $payment = Payment::create([
            'idVisa' => $request->idVisa,
            'amount' => $request->amount,
            'paymentStatus' => $request->paymentStatus,
            'paymentDate' => now(),
        ]);
        if ($payment->paymentStatus == 1) {
            
            return response()->json([
                'message' => 'Pembayaran berhasil, status visa akan diperbarui.',
                'payment' => $payment,
            ]);
        }

        return response()->json(['message' => 'Pembayaran berhasil, tetapi belum diverifikasi.'], 200);
    }
}
