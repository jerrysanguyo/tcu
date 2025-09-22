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

                    <div class="card card-maroon">
                        <div class="card-header">
                            <div class="text-center w-100">
                                <h4 class="mb-1 font-bold text-blue-800 text-xl">
                                    <i class="fas fa-file-alt mr-2"></i>Admission Application Status
                                </h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="nav nav-pills mb-3 justify-content-center" id="admissionTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-details" data-toggle="tab" href="#pane-details"
                                        role="tab">
                                        <i class="fas fa-id-card mr-1"></i> Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-academic" data-toggle="tab" href="#pane-academic"
                                        role="tab">
                                        <i class="fas fa-school mr-1"></i> Academics
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-programs" data-toggle="tab" href="#pane-programs"
                                        role="tab">
                                        <i class="fas fa-list-ol mr-1"></i> Program Choices
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-activity" data-toggle="tab" href="#pane-activity"
                                        role="tab">
                                        <i class="fas fa-stream mr-1"></i> Activity
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content" id="admissionTabsContent">
                                @include('admission.partial.tabs.details')
                                @include('admission.partial.tabs.academics')
                                @include('admission.partial.tabs.program')
                                @include('admission.partial.tabs.activity')
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-muted text-center">
                        <i class="fas fa-info-circle mr-1 text-maroon"></i>
                        If you wish to update any details, kindly reach out to the admissions team.
                    </div>
                    <div class="mt-4 text-center text-muted">
                        <a href="#" class="btn btn-outline-maroon mt-2">
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
@push('modals')
    @include('admission.partial.modal.voters')
@endpush