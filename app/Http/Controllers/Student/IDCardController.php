<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IDCardController extends Controller
{
    //

    public function edit()
    {
        $student = Auth::guard('student')->user();
        return view('student.id_card.edit', compact('student'));
    }

    public function update(Request $request)
    {
        $student = Auth::guard('student')->user();
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/id_cards'), $fileName);
            $student->update(['photo' => $fileName]);
        }

        return redirect()->back()->with('success', 'ID card updated successfully!');
    }
}
