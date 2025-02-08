@extends('admin.layout')
@section('title', 'Edit Student')

@section('content_header')
    <h1>Edit Student</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Faculty</label>
                    <select name="faculty_id" class="form-control" required>
                        @foreach($faculties as $faculty)
                            <option value="{{ $faculty->id }}" {{ $student->faculty_id == $faculty->id ? 'selected' : '' }}>
                                {{ $faculty->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <select name="department_id" class="form-control" required>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ $student->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="pending" {{ $student->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $student->status == 'approved' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $student->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Student</button>
            </form>
        </div>
    </div>
@endsection
