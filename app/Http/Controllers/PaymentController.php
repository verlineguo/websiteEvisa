<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        // $payment = Payment::all()->toArray();
        return view('admin.payment.index', // ['payment' => $payment]
        );
    }

    


}
