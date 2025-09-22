@extends('layouts.admission')

@section('content')
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div
                    class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-10 offset-xl-1">
                    <div class="login-brand">
                        <img src="{{ asset('images/tcu_logo.webp') }}" alt="logo" width="100"
                            class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-maroon">
                        <div class="card-header">
                            <div class="text-center w-100">
                                <h4 class="mb-1 font-bold text-blue-800 text-xl">Applicant Admission Form</h4>
                                <span class="text-muted text-sm">
                                    Kindly complete this form to begin the admission process.
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mb-3">
                            <button type="button" class="btn btn-sm btn-outline-primary" id="btn-fill-demo">
                                <i class="fas fa-magic mr-1"></i> Fill demo data
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="status-form" action="{{ route('admission.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                @include('admission.partial.applicant')
                                @include('admission.partial.academic')
                                @include('admission.partial.choice')
                                @include('admission.partial.guardian')

                                <div class="form-group">
                                    <button type="submit" class="btn btn-maroon btn-lg btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-2 text-muted text-center">
                        Want to check your admission status? <a href="#">Click here</a>
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

@push('scripts')
<script>
(function() {
    const $ = (sel) => document.querySelector(sel);

    function pickFirstNonEmpty(select) {
        const opts = Array.from(select.options).filter(o => o.value !== "");
        if (opts.length) select.value = opts[0].value;
    }

    function pickThreeDifferent(select1, select2, select3) {
        const all = Array.from(select1.options).map(o => o.value).filter(v => v !== "");
        if (all.length === 0) return;
        const a = all[0];
        const b = all.find(v => v !== a) ?? "";
        const c = all.find(v => v !== a && v !== b) ?? "";
        select1.value = a || "";
        select2.value = b || "";
        select3.value = c || "";
    }

    async function fillDemo() {
        $('#first_name').value = 'Juan';
        $('#middle_name').value = 'Santos';
        $('#last_name').value = 'Dela Cruz';

        const ts = Date.now();
        $('#email').value = `juan${ts}@gmail.com`;

        $('#contact_number').value = '09171234567';
        $('#birth_date').value = '2006-08-15';
        $('#birth_place').value = 'Taguig City';

        pickFirstNonEmpty($('#gender'));
        pickFirstNonEmpty($('#religion'));
        pickFirstNonEmpty($('#civil'));

        $('#nationality').value = 'Filipino';
        $('#ethnic_background').value = 'Tagalog';

        $('#house_number').value = '123';
        $('#street').value = 'Gen. Luna St.';
        $('#zip_code').value = '1630';
        $('#city').value = 'Taguig';

        const districtSel = $('#district');
        const barangaySel = $('#barangay');

        pickFirstNonEmpty(districtSel);
        districtSel.dispatchEvent(new Event('change'));

        await new Promise(r => setTimeout(r, 0));

        const bOpts = Array.from(barangaySel.options).filter(o => o.value !== "");
        if (bOpts.length) barangaySel.value = bOpts[0].value;

        $('#lrn').value = '123456789012';
        $('#jr_school').value = 'Taguig National High School';
        pickFirstNonEmpty($('#jr_strand'));
        $('#jr_year_graduated').value = '2022';
        $('#jr_gwa_first').value = '1.50';
        $('#jr_gwa_second').value = '1.75';

        $('#sr_school').value = 'Taguig Senior High School';
        pickFirstNonEmpty($('#sr_strand'));
        $('#sr_year_graduated').value = '2024';
        $('#sr_gwa_first').value = '1.50';
        $('#sr_gwa_second').value = '1.75';

        pickThreeDifferent($('#program_first'), $('#program_second'), $('#program_third'));

        $('#guardian_full_name').value = 'Maria Dela Cruz';
        $('#guardian_contact_number').value = '09181234567';
        $('#comelec_number').value = 'CN-2024-001234';

        document.querySelectorAll('select').forEach(s => s.classList.remove('is-invalid'));
    }

    document.addEventListener('DOMContentLoaded', () => {
        const btn = $('#btn-fill-demo');
        if (btn) btn.addEventListener('click', fillDemo);
    });
})();
</script>
@endpush