@extends('student.layout')

@section('page-title', 'Pay School Fees')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Display Error Message -->
            @if (session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
                </div>
            @endif

            <!-- Display Success Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <!-- Student Details -->
        <div class="col-md-6">
            <div class="card bg-light">
                <div class="card-header">
                    <h3 class="card-title">Student Information</h3>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Student ID:</strong> {{ auth()->user()->student_id }}</p>
                    <p><strong>Faculty:</strong> {{ auth()->user()->faculty->name }}</p>
                    <p><strong>Department:</strong> {{ auth()->user()->department->name }}</p>
                </div>
            </div>
        </div>

        <!-- Payment Section -->
        <div class="col-md-6">
            <div class="card bg-light">
                <div class="card-header">
                    <h3 class="card-title">School Fees Payment</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tuition Fees</span>
                            <strong>₦{{ number_format(50000, 2) }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Library Fees</span>
                            <strong>₦{{ number_format(5000, 2) }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Sports Fees</span>
                            <strong>₦{{ number_format(3000, 2) }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-primary text-white">
                            <span><strong>Total Fees:</strong></span>
                            <strong>₦{{ number_format(58000, 2) }}</strong>
                        </li>
                    </ul>

                    <form action="{{ route('student.payments.process') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-block">
                            <i class="fas fa-credit-card"></i> Pay Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
