@extends('adminlte::page')

@section('content_header')
    <h1>@yield('page-title', 'Admin Dashboard')</h1>
@endsection



@section('content')
    <div class="wrapper">

        <!-- Custom Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('admin.sidebar') {{-- Load your custom sidebar --}}
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
@endsection

@section('adminlte_css')
    {{-- Add custom CSS for admin panel if needed --}}
@endsection

@section('adminlte_js')
    {{-- Add custom JS for admin panel if needed --}}
@endsection
