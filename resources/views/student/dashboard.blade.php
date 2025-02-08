@extends('student.layout')
@section('title', 'Student Dashboard')

@section('content_header')
    <h1>Welcome, {{ $student->name }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Faculty:</strong> {{ $student->faculty->name }}</p>
            <p><strong>Department:</strong> {{ $student->department->name }}</p>
        </div>
    </div>

    <form action="{{ route('student.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@endsection
