<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\IDCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IDCardController extends Controller
{
    //

    public function view()
    {
        $student = auth()->user();
        return view('student.id-card-view', compact('student'));
    }


    public function edit()
    {
        $student = Auth::guard('student')->user();
        return view('student.id-card', compact('student'));
    }

    public function update(Request $request)
    {
        $student = Auth::guard('student')->user();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'issue_date' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'signature' => 'required|image|mimes:jpeg,png,jpg', // Validate signature
        ]);

        // Upload the profile picture
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('id_card_photos', 'public');
        }

        // Upload the signature
        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature')->store('id_card_signatures', 'public');
        }

        // Update student details
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Save ID card details
        $idCard = IDCard::updateOrCreate(
            ['student_id' => $student->id],
            [
                'issue_date' => $request->issue_date,
                'photo' => $photoPath,
                'signature' => $signaturePath, // Save signature path
            ]
        );

        return redirect()->route('student.id-card.view')->with('success', 'ID Card generated successfully!');
    }


}
