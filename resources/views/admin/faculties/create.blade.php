@extends('admin.layout')
@section('title', 'Add Faculty')

@section('content_header')
    <h1>Add Faculty</h1>
@endsection

@section('content')
    <form action="{{ route('faculties.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Faculty Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('faculties.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
