@extends('admin.layout')
@section('title', 'Add Department')

@section('content_header')
    <h1>Add Department</h1>
@endsection

@section('content')
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Department Name</label>
            <input type="text" name="name" class="form-control" required>
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

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
