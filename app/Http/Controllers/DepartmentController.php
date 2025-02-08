<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Faculty;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with('faculty')->get();
        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        return view('admin.departments.create', compact('faculties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'faculty_id' => 'required|exists:faculties,id'
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Department added successfully.');
    }

    public function edit(Department $department)
    {
        $faculties = Faculty::all();
        return view('admin.departments.edit', compact('department', 'faculties'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required',
            'faculty_id' => 'required|exists:faculties,id'
        ]);

        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}

