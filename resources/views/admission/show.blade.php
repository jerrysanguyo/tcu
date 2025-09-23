@extends('layouts.admission')

@section('content')
<div id="app">
    <section class="section">
        <div style="padding: 1rem 15rem;">

            <div class="text-center mb-4">
                <img src="{{ asset('images/tcu_logo.webp') }}" alt="Logo" width="100"
                    class="shadow-light rounded-circle">
            </div>

            <div class="text-center mb-3">
                <h4 class="mb-1 font-weight-bold text-maroon">
                    <i class="fas fa-file-alt mr-2"></i>Admission Application
                </h4>
                <span class="badge badge-light border"># {{ $uuid }}</span>
            </div>

            <div class="row">
                <div class="col-md-6">
                    @include('admission.partial.tabs.details')
                </div>
                <div class="col-md-6">
                    @include('admission.partial.tabs.academics')
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 mb-4">
                    @include('admission.partial.tabs.guardian')
                    @include('admission.partial.tabs.program')
                </div>
                <div class="col-12 col-lg-6 mb-4">
                    @include('admission.partial.tabs.admissionOverview')
                </div>
            </div>
        </div>
    </section>
</div>
@endsection