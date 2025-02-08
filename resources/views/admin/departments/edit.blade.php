@extends('admin.layout')
@section('title', 'Edit Department')

@section('content_header')
    <h1>Edit Department</h1>
@endsection

@section('content')
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Department Name</label>
            <input type="text" name="name" class="form-control" value="{{ $department->name }}" required>
        </div>

        <div class="form-group">
            <label for="faculty_id">Faculty</label>
            <select name="faculty_id" class="form-control" required>
                @foreach ($faculties as $faculty)
                    <option value="{{ $faculty->id }}" {{ $department->faculty_id == $faculty->id ? 'selected' : '' }}>
                        {{ $faculty->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
