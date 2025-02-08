<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //

    public function index()
    {
        return view('student.payments.index');
    }

    public function processPayment(Request $request)
    {
        // Implement payment processing logic (e.g., integrate with Paystack, Stripe, etc.)
        return redirect()->back()->with('success', 'Payment processed successfully!');
    }
}
