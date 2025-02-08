@extends('admin.layout')
@section('title', 'Edit Faculty')

@section('content_header')
    <h1>Edit Faculty</h1>
@endsection

@section('content')
    <form action="{{ route('faculties.update', $faculty->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Faculty Name</label>
            <input type="text" name="name" class="form-control" value="{{ $faculty->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('faculties.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
