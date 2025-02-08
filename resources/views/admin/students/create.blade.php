@extends('admin.layout')
@section('title', 'Register Student')

@section('content_header')
    <h1>Register Student</h1>
@endsection

@section('content')
    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="form-group">
            <label for="faculty_id">Faculty</label>
            <select name="faculty_id" class="form-control" required>
                <option value="">Select Faculty</option>
                @foreach ($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" class="form-control" required>
                <option value="">Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Register Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
