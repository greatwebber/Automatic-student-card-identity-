@extends('student.layout')

@section('page-title', 'Update ID Card')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update ID Card Details</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('student.id-card.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Student ID</label>
                    <input type="text" class="form-control" name="student_id" value="{{ auth()->user()->student_id }}" readonly>
                </div>

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}" required>
                </div>

                <div class="form-group">
                    <label>Faculty</label>
                    <input type="text" class="form-control" name="faculty" value="{{ auth()->user()->faculty->name }}" readonly>
                </div>

                <div class="form-group">
                    <label>Department</label>
                    <input type="text" class="form-control" name="department" value="{{ auth()->user()->department->name }}" readonly>
                </div>

                <div class="form-group">
                    <label>Issue Date</label>
                    <input type="date" class="form-control" name="issue_date" required>
                </div>

                <div class="form-group">
                    <label>Upload Profile Picture</label>
                    <input type="file" class="form-control" name="photo" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label>Upload Signature</label>
                    <input type="file" class="form-control" name="signature" accept="image/*" required>
                    <small class="form-text text-muted">Upload your signature (PNG, JPG, JPEG).</small>
                </div>

                <button type="submit" class="btn btn-info btn-block">Generate ID Card</button>
            </form>
        </div>
    </div>
@endsection
