@extends('admin.layout')
@section('title', 'Faculties')

@section('content_header')
    <h1>Faculties</h1>
@endsection

@section('content')
    <a href="{{ route('faculties.create') }}" class="btn btn-primary mb-3">Add Faculty</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($faculties as $faculty)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $faculty->name }}</td>
                <td>
                    <a href="{{ route('faculties.edit', $faculty->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST" style="display:inline;">
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
