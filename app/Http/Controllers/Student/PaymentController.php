<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    //

    public function index()
    {
        return view('student.payments');
    }

    public function processPayment(Request $request)
    {
        // Implement payment processing logic (e.g., integrate with Paystack, Stripe, etc.)
        return redirect()->back()->with('success', 'Payment processed successfully!');
    }


    public function redirectToPaystack()
    {
        try {
            $student = auth()->guard('student')->user();
            $amount = 58000 * 100; // Convert to kobo

            $response = Http::withToken('sk_test_0fb9aaa0ace494abaea6e3fc180084d74082cb2e')
                ->post('https://api.paystack.co/transaction/initialize', [
                    'email' => $student->email,
                    'amount' => $amount,
                    'currency' => 'NGN',
                    'callback_url' => route('student.payments.callback'),
                    'reference' => Paystack::genTranxRef(),
                ]);

            $responseData = $response->json();

            if (!$responseData['status']) {
                throw new \Exception($responseData['message']);
            }

            return redirect()->away($responseData['data']['authorization_url']);
        } catch (\Exception $e) {
            return redirect()->route('student.payments')->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }


    public function handlePaystackCallback(Request $request)
    {
        try {
            $reference = $request->query('reference');

            if (!$reference) {
                throw new \Exception('No payment reference found.');
            }

            // Verify the payment with Paystack
            $response = Http::withToken('sk_test_0fb9aaa0ace494abaea6e3fc180084d74082cb2e')
                ->get("https://api.paystack.co/transaction/verify/{$reference}");

            $paymentDetails = $response->json();

            if (!$paymentDetails['status']) {
                throw new \Exception('Payment verification failed.');
            }

            // Check if payment was successful
            if ($paymentDetails['data']['status'] !== 'success') {
                throw new \Exception('Payment was not successful.');
            }

            // Get authenticated student
            $student = auth()->guard('student')->user();

            // Save transaction to database (Example: Save in a `payments` table)
            Payment::create([
                'student_id' => $student->id,
                'reference' => $reference,
                'amount' => $paymentDetails['data']['amount'] / 100, // Convert back to Naira
                'status' => 'successful',
            ]);

            return redirect()->route('student.dashboard')->with('success', 'Payment successful!');

        } catch (\Exception $e) {
            return redirect()->route('student.payments')->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }

}
