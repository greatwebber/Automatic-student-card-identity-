@extends('student.layout')

@section('page-title', 'Update Bio Data')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Profile</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('student.profile.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
@endsection
