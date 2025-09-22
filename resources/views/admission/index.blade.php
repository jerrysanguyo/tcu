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

                        <div class="card-body">
                            <form id="status-form" action="{{ route('admission.store') }}" method="POST">
                                @csrf

                                <h5 class="text-maroon font-weight-bold mb-3">Parent / Guardian Information</h5>

                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label for="guardian_full_name">Full Name <span
                                                class="text-maroon">*</span></label>
                                        <input id="guardian_full_name" type="text"
                                            class="form-control @error('guardian_full_name') is-invalid @enderror"
                                            name="guardian_full_name" value="{{ old('guardian_full_name') }}" required>
                                        @error('guardian_full_name') <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="guardian_contact_number">Contact Number <span
                                                class="text-maroon">*</span></label>
                                        <input id="guardian_contact_number" type="text"
                                            class="form-control @error('guardian_contact_number') is-invalid @enderror"
                                            name="guardian_contact_number" value="{{ old('guardian_contact_number') }}"
                                            required>
                                        @error('guardian_contact_number') <div class="invalid-feedback">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="my-4">

                                <h5 class="text-maroon font-weight-bold mb-3">Applicant Information</h5>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="first_name">First Name <span class="text-maroon">*</span></label>
                                        <input id="first_name" type="text"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            name="first_name" value="{{ old('first_name') }}" required>
                                        @error('first_name') <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="middle_name">Middle Name</label>
                                        <input id="middle_name" type="text"
                                            class="form-control @error('middle_name') is-invalid @enderror"
                                            name="middle_name" value="{{ old('middle_name') }}">
                                        @error('middle_name') <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="last_name">Last Name <span class="text-maroon">*</span></label>
                                        <input id="last_name" type="text"
                                            class="form-control @error('last_name') is-invalid @enderror"
                                            name="last_name" value="{{ old('last_name') }}" required>
                                        @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="email">Email <span class="text-maroon">*</span></label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required>
                                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="contact_number">Contact Number <span
                                                class="text-maroon">*</span></label>
                                        <input id="contact_number" type="text"
                                            class="form-control @error('contact_number') is-invalid @enderror"
                                            name="contact_number" value="{{ old('contact_number') }}" required>
                                        @error('contact_number') <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="birth_date">Birth Date <span class="text-maroon">*</span></label>
                                        <input id="birth_date" type="date"
                                            class="form-control @error('birth_date') is-invalid @enderror"
                                            name="birth_date" value="{{ old('birth_date') }}" required>
                                        @error('birth_date') <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="gender">Gender <span class="text-maroon">*</span></label>
                                        <select id="gender" class="form-control @error('gender') is-invalid @enderror"
                                            name="gender" required>
                                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select
                                                gender</option>
                                            @isset($genders)
                                            @foreach($genders as $g)
                                            <option value="{{ $g->id }}" {{ old('gender') ===  $g->id  ? 'selected'
                                                : '' }}>{{ $g->name }}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                        @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <h6 class="font-weight-bold mt-3">Address</h6>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="house_number">House No.</label>
                                        <input id="house_number" type="text"
                                            class="form-control @error('house_number') is-invalid @enderror"
                                            name="house_number" value="{{ old('house_number') }}" required>
                                        @error('house_number') <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="street">Street</label>
                                        <input id="street" type="text"
                                            class="form-control @error('street') is-invalid @enderror" name="street"
                                            value="{{ old('street') }}" required>
                                        @error('street') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="city">City/Municipality</label>
                                        <input id="city" type="text"
                                            class="form-control @error('city') is-invalid @enderror" name="city"
                                            value="{{ old('city') }}" required>
                                        @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="row" x-data="{
                                        districts: @js($districts->map(fn($d)=>['id'=>$d->id,'name'=>$d->name])->values()),
                                        allBarangays: @js($barangays->map(fn($b)=>['id'=>$b->id,'name'=>trim($b->name),'district_id'=>$b->district_id])->values()),
                                        selectedDistrict: @js(old('district')),
                                        selectedBarangay: @js(old('barangay')),
                                        get filteredBarangays() {
                                        if (!this.selectedDistrict) return [];
                                        return this.allBarangays.filter(b => String(b.district_id) === String(this.selectedDistrict));
                                        },
                                        onDistrictChange() {
                                        if (!this.filteredBarangays.some(b => String(b.id) === String(this.selectedBarangay))) {
                                            this.selectedBarangay = '';
                                        }
                                        }
                                    }">

                                    <div class="form-group col-md-6">
                                        <label for="district">District <span class="text-maroon">*</span></label>
                                        <select id="district"
                                            class="form-control @error('district') is-invalid @enderror" name="district"
                                            x-model="selectedDistrict" @change="onDistrictChange" required>
                                            <option value="" disabled x-bind:selected="!selectedDistrict">Select
                                                district</option>
                                            <template x-for="d in districts" :key="d.id">
                                                <option :value="d.id" x-text="d.name"></option>
                                            </template>
                                        </select>
                                        @error('district') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="form-group col-md-6" x-cloak>
                                        <label for="barangay">Barangay <span class="text-maroon">*</span></label>
                                        <select id="barangay"
                                            class="form-control @error('barangay') is-invalid @enderror" name="barangay"
                                            x-model="selectedBarangay" :disabled="!selectedDistrict" required>
                                            <option value="" disabled x-bind:selected="!selectedBarangay">Select
                                                barangay</option>
                                            <template x-for="b in filteredBarangays" :key="b.id">
                                                <option :value="b.id" x-text="b.name"></option>
                                            </template>
                                        </select>
                                        @error('barangay') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        <small class="form-text text-muted" x-show="!selectedDistrict">Choose a district
                                            first.</small>
                                        <small class="form-text text-muted"
                                            x-show="selectedDistrict && filteredBarangays.length === 0">
                                            No barangays found for this district.
                                        </small>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <h5 class="text-maroon font-weight-bold mb-3">Academic Background</h5>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="jr_school">Junior High School <span
                                                class="text-maroon">*</span></label>
                                        <input id="jr_school" type="text"
                                            class="form-control @error('jr_school') is-invalid @enderror"
                                            name="jr_school" value="{{ old('jr_school') }}" required>
                                        @error('jr_school') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="jr_strand">JHS Strand</label>
                                        <select id="jr_strand"
                                            class="form-control @error('jr_strand') is-invalid @enderror"
                                            name="jr_strand" required>
                                            <option value="" {{ old('jr_strand') ? '' : 'selected' }}>Select strand
                                            </option>
                                            @isset($strands)
                                            @foreach($strands as $s)
                                            <option value="{{ $s->id }}"
                                                {{ old('jr_strand')==$s->id ? 'selected' : '' }}>
                                                {{ $s->name }}
                                            </option>
                                            @endforeach
                                            @endisset
                                        </select>
                                        @error('jr_strand') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="jr_gwa">JHS GWA <small class="text-muted">(e.g.,
                                                1.25)</small></label>
                                        <input id="jr_gwa" type="number" step="0.01" min="1.00" max="5.00"
                                            class="form-control @error('jr_gwa') is-invalid @enderror" name="jr_gwa"
                                            value="{{ old('jr_gwa') }}" required>
                                        @error('jr_gwa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="sr_school">Senior High School <span
                                                class="text-maroon">*</span></label>
                                        <input id="sr_school" type="text"
                                            class="form-control @error('sr_school') is-invalid @enderror"
                                            name="sr_school" value="{{ old('sr_school') }}" required>
                                        @error('sr_school') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="sr_strand">SHS Strand</label>
                                        <select id="sr_strand"
                                            class="form-control @error('sr_strand') is-invalid @enderror"
                                            name="sr_strand">
                                            <option value="" {{ old('sr_strand') ? '' : 'selected' }}>Select strand
                                            </option>
                                            @isset($strands)
                                            @foreach($strands as $s)
                                            <option value="{{ $s->id }}"
                                                {{ old('sr_strand')==$s->id ? 'selected' : '' }}>
                                                {{ $s->name }}
                                            </option>
                                            @endforeach
                                            @endisset
                                        </select>
                                        @error('sr_strand') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="sr_gwa">SHS GWA <small class="text-muted">(e.g.,
                                                1.25)</small></label>
                                        <input id="sr_gwa" type="number" step="0.01" min="1.00" max="5.00"
                                            class="form-control @error('sr_gwa') is-invalid @enderror" name="sr_gwa"
                                            value="{{ old('sr_gwa') }}" required>
                                        @error('sr_gwa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

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