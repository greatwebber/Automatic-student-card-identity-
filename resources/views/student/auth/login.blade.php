@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', 'Student Login')

@section('auth_body')
    <form action="{{ route('student.login') }}" method="POST">
        @csrf

        <div class="input-group mb-3">
            <input type="text" name="student_id" class="form-control" placeholder="Matric No" required>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-user"></span></div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
@endsection

@section('auth_footer')
    <a href="#">Forgot password?</a>
@endsection
