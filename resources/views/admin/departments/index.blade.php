@extends('admin.layout')
@section('title', 'Departments')

@section('content_header')
    <h1>Departments</h1>
@endsection

@section('content')
    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Add Department</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Faculty</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($departments as $department)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->faculty->name }}</td>
                <td>
                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
