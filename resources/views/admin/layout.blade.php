@extends('adminlte::page')

@section('content_header')
    <h1>@yield('page-title', 'Admin Dashboard')</h1>
@endsection

@include('admin.sidebar')

@section('content')
    @yield('content')
@endsection

@section('adminlte_css')
    {{-- Add custom CSS for admin panel if needed --}}
@endsection

@section('adminlte_js')
    {{-- Add custom JS for admin panel if needed --}}
@endsection
