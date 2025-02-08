@extends('admin.layout')
@section('title', 'Students')

@section('content_header')
    <h1>Students</h1>
@endsection

@section('content')
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Faculty</th>
            <th>Department</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->faculty->name }}</td>
                <td>{{ $student->department->name }}</td>
                <td>
                        <span class="badge badge-{{ $student->status == 'approved' ? 'success' : 'warning' }}">
                            {{ ucfirst($student->status) }}
                        </span>
                </td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
