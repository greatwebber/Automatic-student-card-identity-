<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('student.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('student')->attempt($request->only('student_id', 'password'))) {
            return redirect()->route('student.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }
}

