<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        $departments = Department::all();
        return view('admin.students.create',compact('faculties','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'faculty_id' => 'required|exists:faculties,id',
            'department_id' => 'required|exists:departments,id',
        ]);

        // Generate unique student ID (e.g., STU2025001)
//        $latestStudent = Student::latest()->first();
//        $nextId = $latestStudent ? ((int)substr($latestStudent->student_id, -3) + 1) : 1;
//        $studentId = 'STU' . date('Y') . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        $department = Department::findOrFail($request->department_id);
        $deptPrefix = strtoupper(substr($department->name, 0, 3)); // Get first 3 letters

        // Generate unique student ID (e.g., CSE2025001 for Computer Science)
        $latestStudent = Student::where('department_id', $request->department_id)
            ->latest()
            ->first();

        $nextId = $latestStudent ? ((int)substr($latestStudent->student_id, -3) + 1) : 1;
        $studentId = $deptPrefix . date('Y') . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        // Create Student
        $student = Student::create([
            'student_id' => $studentId,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($studentId),
            'faculty_id' => $request->faculty_id,
            'department_id' => $request->department_id,
            'status' => 'pending',
        ]);

        return redirect()->route('students.index')->with('success', 'Student registered successfully! ID: ' . $student->student_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $faculties = Faculty::all();
        $departments = Department::all();

        return view('admin.students.edit', compact('student', 'faculties', 'departments'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'faculty_id' => 'required|exists:faculties,id',
            'department_id' => 'required|exists:departments,id',
            'status' => 'required|in:pending,approved,inactive',
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'faculty_id' => $request->faculty_id,
            'department_id' => $request->department_id,
            'status' => $request->status,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }

}
