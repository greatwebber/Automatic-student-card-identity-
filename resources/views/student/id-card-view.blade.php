@extends('student.layout')

@section('page-title', 'Student ID Card')

@section('content')
    <div class="d-flex justify-content-center flex-column align-items-center">
        <div class="id-card-container">
            <div class="id-card {{ old('show_back', false) ? 'is-flipped' : '' }}" id="idCard">
                <!-- Front of the card -->
                <div class="id-card-side front">
                    <div class="id-card-header">
                        <div class="header-content">
                            <div class="logo-container">
                                <img src="{{ asset('images/fpelogopng.png') }}" alt="School Logo" class="school-logo">
                            </div>
                            <div class="school-name">
                                <h5 class="text-white mb-0">THE FEDERAL POLYTECHNIC EDE</h5>
                                <p class="text-white mb-0 address">P.M.B 231, EDE, OSUN STATE</p>
                                <p class="text-white mb-0 motto"><em>MOTTO: KNOWLEDGE, SKILL AND CHARACTER</em></p>
                                <h6 class="text-white mb-0 mt-2">Student Identity Card</h6>
                            </div>
                        </div>
                    </div>

                    <div class="id-card-body">
                        <div class="student-details">
                            <h4>{{ auth()->user()->name }}</h4>
                            <div class="details-grid">
                                <div class="detail-item">
                                    <i class="fas fa-id-card"></i>
                                    <span><strong>Student ID:</strong> {{ auth()->user()->student_id }}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-university"></i>
                                    <span><strong>Faculty:</strong> {{ auth()->user()->faculty->name }}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-graduation-cap"></i>
                                    <span><strong>Department:</strong> {{ auth()->user()->department->name }}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span><strong>Issue Date:</strong> {{ auth()->user()->idCard->issue_date }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="photo-section">
                            <img src="{{ asset('storage/' . auth()->user()->idCard->photo) }}" alt="Student Photo" class="student-photo">
                            <div class="photo-border"></div>
                        </div>
                        <div class="watermark">
                            <img src="{{ asset('images/fpelogopng.png') }}" alt="Watermark" class="watermark-logo">
                        </div>
                    </div>

                    <div class="id-card-footer">
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-globe"></i>
                                <span>www.federalpolyede.edu.ng</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>info@federalpolyede.edu.ng</span>
                            </div>
                            <!-- <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+234-xxx-xxx-xxxx</span>
                            </div> -->
                        </div>
                        <div class="card-stripe"></div>
                    </div>
                </div>

                <!-- Back of the card -->
                <div class="id-card-side back">
                    <div class="back-content">
                        <div class="back-header text-center mb-3">
                            <h6 class="institution-name mb-0">THE FEDERAL POLYTECHNIC, EDE</h6>
                        </div>

                        <div class="card-notice">
                            <p class="notice-text mb-2">This Identity Card is the property of the institution</p>
                            
                            <p class="notice-text mb-2">The student is the bonafide owner,<br>
                            it must be shown on request at anytime</p>
                            
                            <p class="notice-text">If found please, return to the Student's Affair Office<br>
                            or the Nearest Police Station</p>
                        </div>
                        
                        <div class="signature-section mt-3">
                            <div class="signature">
                                <img src="{{ asset('storage/' . auth()->user()->idCard->signature) }}" alt="Signature" class="signature-image">
                                <p class="text-center mb-0"><strong>Authorized Signature</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="controls mt-3">
            <button class="btn btn-secondary me-2" onclick="flipCard()">
                <i class="fas fa-sync-alt"></i> Flip Card
            </button>
            <button class="btn btn-primary" onclick="printIDCard()">
                <i class="fas fa-print"></i> Print ID Card
            </button>
        </div>
    </div>

    <style>
        .id-card-container {
            perspective: 1000px;
            width: 450px;
            height: 310px;
            margin: 20px;
        }

        .id-card {
            width: 100%;
            height: 100%;
            position: relative;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
        }

        .id-card.is-flipped {
            transform: rotateY(180deg) scale(1.02);
        }

        .id-card-side {
            width: 100%;
            height: 100%;
            position: absolute;
            backface-visibility: hidden;
            border: 2px solid #000;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .front {
            display: flex;
            flex-direction: column;
        }

        .back {
            transform: rotateY(180deg);
        }

        .back-content {
            height: 100%;
            display: flex;
            flex-direction: column;
            padding: 15px;
        }

        .back-header {
            border-bottom: 1px solid #198754;
            padding-bottom: 8px;
        }

        .institution-name {
            font-weight: bold;
            color: #198754;
            font-size: 1rem;
        }

        .card-notice {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 10px 0;
        }

        .notice-text {
            text-align: center;
            font-size: 12px;
            line-height: 1.3;
        }

        .signature-section {
            text-align: center;
        }

        .signature {
            width: 120px;
            margin: 0 auto;
        }

        .signature-image {
            width: 100%;
            height: auto;
            max-height: 40px;
            object-fit: contain;
        }

        .id-card-header {
            background: #198754;
            padding: 10px;
            width: 100%;
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo-container {
            flex-shrink: 0;
        }

        .school-name {
            flex-grow: 1;
            text-align: center;
        }

        .school-name .address {
            font-size: 12px;
            margin-top: 2px;
        }

        .school-name .motto {
            font-size: 11px;
            margin-top: 2px;
        }

        .school-logo {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .id-card-body {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            /* flex: 1; */
            position: relative;
            background: linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(25,135,84,0.05) 100%);
        }

        .student-details {
            flex: 1;
            padding-right: 15px;
            position: relative;
            z-index: 1;
        }

        .student-details h4 {
            color: #198754;
            font-weight: bold;
            border-bottom: 2px solid #198754;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        .details-grid {
            display: grid;
            /* gap: 10px; */
        }

        .detail-item {
            display: flex;
            align-items: center;
            /* gap: 8px; */
            font-size: 14px;
            /* padding: 4px 8px; */
            /* border-radius: 4px; */
            transition: background-color 0.3s ease;
        }

        .detail-item:hover {
            background-color: rgba(25,135,84,0.05);
        }

        .detail-item i {
            color: #198754;
            width: 20px;
        }

        .photo-section {
            position: relative;
            z-index: 1;
            transition: transform 0.3s ease;
        }

        .photo-section:hover {
            transform: scale(1.05);
        }

        .photo-section:hover .photo-border {
            border-color: #146c43;
            opacity: 0.8;
        }

        .student-photo {
            width: 120px;
            height: 120px;
            border-radius: 10px;
            border: 2px solid #198754;
            object-fit: cover;
            position: relative;
            z-index: 2;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .photo-border {
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 2px solid #198754;
            border-radius: 12px;
            z-index: 1;
            opacity: 0.5;
        }

        .id-card-footer {
            padding: 10px 15px;
            background: linear-gradient(90deg, #198754 0%, #146c43 100%);
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            position: relative;
            overflow: hidden;
        }

        .contact-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 5px;
            color: white;
            font-size: 11px;
        }

        .contact-item i {
            font-size: 12px;
        }

        .card-stripe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(255,255,255,0.1) 10px,
                rgba(255,255,255,0.1) 20px
            );
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            z-index: 0;
            opacity: 0.07;
            pointer-events: none;
        }

        .watermark-logo {
            width: 250px;
            height: 250px;
            object-fit: contain;
        }

        /* Button styles */
        .btn-primary {
            background-color: #198754;
            border-color: #198754;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #146c43;
            border-color: #146c43;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5c636a;
            border-color: #565e64;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .controls {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .controls .btn {
            padding: 8px 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .controls .btn i {
            font-size: 14px;
        }

        /* Hover effects */
        .student-photo:hover {
            transform: scale(1.02);
            transition: transform 0.3s ease;
        }

        .detail-item:hover i {
            transform: scale(1.2);
            transition: transform 0.2s ease;
        }

        .contact-item:hover {
            text-shadow: 0 0 8px rgba(255,255,255,0.5);
            transition: text-shadow 0.3s ease;
        }

        /* Print styles */
        @media print {
            body * {
                visibility: hidden;
            }
            .id-card-container, .id-card-container * {
                visibility: visible;
            }
            .id-card-container {
                position: absolute;
                left: 0;
                top: 0;
            }
            .controls {
                display: none;
            }
            /* Ensure both sides are printed */
            .id-card {
                page-break-after: always;
            }
            .back {
                position: relative;
                transform: none;
            }
            .id-card-container {
                margin: 0;
                box-shadow: none;
            }

            .id-card-side {
                break-inside: avoid;
                page-break-inside: avoid;
            }

            .watermark {
                opacity: 0.05;
            }
        }
    </style>

    <script>
        function flipCard() {
            document.getElementById('idCard').classList.toggle('is-flipped');
        }

        function printIDCard() {
            window.print();
        }
    </script>
@endsection
