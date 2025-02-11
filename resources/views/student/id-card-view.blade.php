@extends('student.layout')

@section('page-title', 'Student ID Card')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="id-card" id="idCard">
            <div class="id-card-header text-center">
                <img src="{{ asset('images/fpelogopng.png') }}" alt="School Logo" class="school-logo">
                <h5 class="text-white">Student Identity Card</h5>
            </div>

            <div class="id-card-body text-center">
                <img src="{{ asset('storage/' . auth()->user()->idCard->photo) }}" alt="Student Photo" class="student-photo">
                <h4>{{ auth()->user()->name }}</h4>
                <p><strong>Student ID:</strong> {{ auth()->user()->student_id }}</p>
                <p><strong>Faculty:</strong> {{ auth()->user()->faculty->name }}</p>
                <p><strong>Department:</strong> {{ auth()->user()->department->name }}</p>
                <p><strong>Issue Date:</strong> {{ auth()->user()->idCard->issue_date }}</p>
            </div>

            <div class="id-card-footer text-center">
                <p><strong>Authorized Signature</strong></p>

                <!-- Display the uploaded signature -->
                <div class="signature">
                    <img src="{{ asset('storage/' . auth()->user()->idCard->signature) }}" alt="Signature" class="signature-image">
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-3">
        <button class="btn btn-primary" onclick="printIDCard()">
            <i class="fas fa-print"></i> Print ID Card
        </button>
    </div>

    <style>
        .id-card {
            width: 300px;
            border: 2px solid #000;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 15px;
        }

        .id-card-header {
            background: #007bff;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .school-logo {
            width: 50px;
            height: 50px;
        }

        .student-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px solid #000;
            margin-bottom: 10px;
        }

        .id-card-body p {
            margin: 5px 0;
            font-size: 14px;
        }

        .id-card-footer {
            margin-top: 10px;
            border-top: 1px solid #000;
            padding-top: 5px;
        }

        .signature {
            width: 100px;
            margin: auto;
        }

        .signature-image {
            width: 100px;
            height: auto;
            object-fit: contain;
        }
    </style>

    <script>
        function printIDCard() {
            var printContent = document.getElementById("idCard").innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        }
    </script>
@endsection
