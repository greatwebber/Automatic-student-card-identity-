@extends('adminlte::auth.login')

@section('auth_body')
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                        Remember Me
                    </label>
                </div>
            </div>

            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
        </div>
    </form>
@endsection


@section('auth_footer')
    {{-- Remove "I forgot my password" and "Register a new membership" --}}
@endsection
