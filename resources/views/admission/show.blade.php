@extends('layouts.admission')
@section('content')
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div
                    class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="{{ asset('images/tcu_logo.webp') }}" alt="Logo" width="100"
                            class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-danger">
                        <div class="card-header">
                            <div class="text-center w-100">
                                <h4 class="mb-1 font-bold text-blue-800 text-xl">
                                    <i class="fas fa-file-alt mr-2"></i>Admission Application Status
                                </h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-4 text-center">
                                <h6 class="font-weight-bold text-dark">
                                    <i class="fas fa-clipboard-check mr-1 text-danger"></i>Current Status:
                                </h6><span
                                    class="badge badge-pill badge-{{ $admission->status === 'approved' ? 'success' : ($admission->status === 'pending' ? 'warning' : 'danger') }} px-3 py-2">
                                    <i
                                        class="fas {{ $admission->status === 'approved' ? 'fa-check-circle' : ($admission->status === 'pending' ? 'fa-hourglass-half' : 'fa-times-circle') }} mr-1"></i>
                                    {{ $admission->status === 'approved' ? 'Approved' : ($admission->status === 'pending' ? 'Pending' : 'Rejected') }}
                                </span>
                                <p class="text-muted mt-2">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    Submitted on
                                    {{ \Carbon\Carbon::parse($admission->created_at)->format('F d, Y - h:i A') }}
                                </p>
                            </div>

                            <hr class="border-danger">

                            <h5 class="text-danger font-weight-bold mb-3">
                                <i class="fas fa-user-shield mr-2"></i>Parent / Guardian Information
                            </h5>
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item">
                                    <i class="fas fa-user mr-2 text-danger"></i>
                                    <strong>Full Name:</strong>
                                    {{ $admission->guardian->full_name }}
                                </li>
                                @auth
                                <li class="list-group-item">
                                    <i class="fas fa-phone mr-2 text-danger"></i>
                                    <strong>Contact Number:</strong> {{ $admission->guardian->contact_number }}
                                </li>
                                @endauth
                            </ul>

                            <h5 class="text-danger font-weight-bold mb-3 mt-4">
                                <i class="fas fa-child mr-2"></i>Applicant Information
                            </h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="fas fa-id-card mr-2 text-danger"></i>
                                    <strong>Full Name:</strong>
                                    {{ $admission->first_name }} {{ $admission->middle_name }}
                                    {{ $admission->last_name }}
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-birthday-cake mr-2 text-danger"></i>
                                    <strong>Birth Date:</strong>
                                    {{ \Carbon\Carbon::parse($admission->birth_date)->format('F d, Y') }}
                                </li>
                                @auth
                                <li class="list-group-item">
                                    <i class="fas fa-phone mr-2 text-danger"></i>
                                    <strong>Contact Number:</strong> {{ $admission->contact_number }}
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-envelope mr-2 text-danger"></i>
                                    <strong>Email:</strong> {{ $admission->email }}
                                </li>
                                @endauth
                                <li class="list-group-item">
                                    <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                    <strong>Address:</strong>
                                    {{ $admission->house_number }} {{ $admission->street }}
                                    {{ $admission->barangay->name }} {{ $admission->city }}
                                </li>
                            </ul>

                            <h5 class="text-danger font-weight-bold mb-3 mt-4">
                                <i class="fas fa-school mr-2"></i>K–12 Academic Background
                            </h5>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="card border border-primary shadow-sm h-100">
                                        <div class="card-header d-flex justify-content-between align-items-center py-2">
                                            <span class="badge badge-primary">Junior High School</span>
                                            <small class="text-muted">Grade 11</small>
                                        </div>
                                        <div class="card-body py-3">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <h6 class="mb-1 text-dark">
                                                        <i class="fas fa-university mr-1 text-primary"></i>
                                                        {{ $admission->academic->jr_school }}
                                                    </h6>
                                                    <span class="badge badge-light text-primary border">
                                                        <i class="fas fa-stream mr-1"></i>
                                                        {{ $admission->academic->jrStrand->name }}
                                                    </span>
                                                </div>
                                                <span class="badge badge-pill badge-primary px-3 py-2">
                                                    GWA: {{ number_format($admission->academic->jr_gwa, 2) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="card border border-warning shadow-sm h-100">
                                        <div class="card-header d-flex justify-content-between align-items-center py-2">
                                            <span class="badge badge-warning">Senior High School</span>
                                            <small class="text-muted">Grade 12</small>
                                        </div>
                                        <div class="card-body py-3">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <h6 class="mb-1 text-dark">
                                                        <i class="fas fa-university mr-1 text-warning"></i>
                                                        {{ $admission->academic->sr_school }}
                                                    </h6>
                                                    <span class="badge badge-light text-warning border">
                                                        <i class="fas fa-stream mr-1"></i>
                                                        {{ $admission->academic->srStrand->name }}
                                                    </span>
                                                </div>
                                                <span class="badge badge-pill badge-warning px-3 py-2">
                                                    GWA: {{ number_format($admission->academic->sr_gwa, 2) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @auth
                        @if($admission->status === 'pending')
                        @role('superadmin|admin')
                        <div class="text-center mb-4">
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#approveModal">
                                <i class="fas fa-check-circle mr-1"></i> Approve Admission
                            </button>

                            <button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#rejectModal">
                                <i class="fas fa-times-circle mr-1"></i> Reject Admission
                            </button>
                        </div>
                        @endrole
                        @endif
                        @endauth
                    </div>
                    <div class="mt-4 text-muted text-center">
                        <i class="fas fa-info-circle mr-1 text-danger"></i>
                        If you wish to update any details, kindly reach out to the admissions team.
                    </div>
                    <div class="mt-4 text-center text-muted">
                        <a href="#" class="btn btn-outline-danger mt-2">
                            <i class="fas fa-arrow-left mr-1"></i> Go Back
                        </a>
                    </div>

                    <div class="mt-5 text-muted text-center">
                        Copyright © 2025 <div class="bullet"></div> Information Technology
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@auth
@if($admission->status === 'pending')
@role('superadmin|admin')
@include('admission.partials.modal')
@endrole
@endif
@endauth