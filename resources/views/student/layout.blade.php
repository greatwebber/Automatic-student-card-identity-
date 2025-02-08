@extends('adminlte::page')

@section('content_header')
    <h1>@yield('page-title', 'Student Dashboard')</h1>
@endsection

@include('student.sidebar')


@section('content')
    @yield('content')
@endsection

@section('adminlte_css')
    {{-- Add custom CSS for student panel if needed --}}
@endsection

@section('adminlte_js')
    {{-- Add custom JS for student panel if needed --}}
@endsection
