<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\VisaApplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PaymentController extends Controller
{
    public function index()
    {
        $paymentDetails = DB::table('View_PaymentDetails')->get();

        return view('admin.payment.index', ['paymentDetails' => $paymentDetails]);
    }

    public function edit($idPayment)
    {
        $visaApplicant = VisaApplicant::all();
        $payment = Payment::with('visaApplicant')->find($idPayment); 
        if (!$payment) {
            return redirect()->route('admin.payment.index')->with('error', 'Payment not found');
        }
        return view('admin.payment.form', ['payment' => $payment, 'visaApplicant' => $visaApplicant]);
    }

    public function updateStatus(Request $request, $idPayment)
    {
        $request->validate([
            'paymentStatus' => 'required|boolean', 
        ]);
        $payment = Payment::find($idPayment); 
        if (!$payment) {
            return redirect()->back()->with('error', 'Payment not found');
        }

        $status = $request->input('paymentStatus');
        DB::statement('EXEC UpdatePaymentStatus ?, ?', [$idPayment, $status]);

        return redirect()->back()->with('success', 'Payment status updated successfully');
    }

    public function delete($idPayment)
    {
        $payment = Payment::find($idPayment);
        $payment->delete();

        return redirect()->route('admin.payment.index')->with('success', 'Payment deleted successfully.');
    }
}
