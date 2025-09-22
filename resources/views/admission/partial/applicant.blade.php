<hr class="my-4">

<h5 class="text-maroon font-weight-bold mb-3">Applicant Information</h5>

<div class="row">
    <div class="form-group col-md-4">
        <label for="first_name">First Name <span class="text-maroon">*</span></label>
        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
            name="first_name" value="{{ old('first_name') }}">
        @error('first_name') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <label for="middle_name">Middle Name</label>
        <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror"
            name="middle_name" value="{{ old('middle_name') }}">
        @error('middle_name') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <label for="last_name">Last Name <span class="text-maroon">*</span></label>
        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
            value="{{ old('last_name') }}">
        @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        <label for="email">Email <span class="text-maroon">*</span></label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="contact_number">Contact Number <span class="text-maroon">*</span></label>
        <input id="contact_number" type="tel" inputmode="tel" pattern="^[0-9+\-\s()]{7,}$"
            class="form-control @error('contact_number') is-invalid @enderror" name="contact_number"
            value="{{ old('contact_number') }}">
        @error('contact_number') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="gender">Gender <span class="text-maroon">*</span></label>
        <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender">
            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select
                gender</option>
            @isset($genders)
            @foreach($genders as $g)
            <option value="{{ $g->id }}" {{ old('gender') == $g->id ? 'selected' : '' }}>{{ $g->name }}</option>
            @endforeach
            @endisset
        </select>
        @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">

    <div class="form-group col-md-4">
        <label for="birth_date">Birth Date <span class="text-maroon">*</span></label>
        <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror"
            name="birth_date" value="{{ old('birth_date') }}">
        @error('birth_date') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="birth_place">Birth Place <span class="text-maroon">*</span></label>
        <input id="birth_place" type="text" class="form-control @error('birth_place') is-invalid @enderror"
            name="birth_place" value="{{ old('birth_place') }}">
        @error('birth_place') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="religion">Religion</label>
        <select id="religion" class="form-control @error('religion') is-invalid @enderror" name="religion">
            <option value="" {{ old('religion') ? '' : 'selected' }}>Select religion
            </option>
            @isset($religions)
            @foreach($religions as $r)
            <option value="{{ $r->id }}" {{ old('religion') == $r->id ? 'selected' : '' }}>{{ $r->name }}
            </option>
            @endforeach
            @endisset
        </select>
        @error('religion') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">

    <div class="form-group col-md-4">
        <label for="civil">Civil Status</label>
        <select id="civil" class="form-control @error('civil') is-invalid @enderror" name="civil">
            <option value="" {{ old('civil') ? '' : 'selected' }}>Select civil status
            </option>
            @isset($civilStatuses)
            @foreach($civilStatuses as $cs)
            <option value="{{ $cs->id }}" {{ old('civil') == $cs->id ? 'selected' : '' }}>{{ $cs->name }}
            </option>
            @endforeach
            @endisset
        </select>
        @error('civil') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="nationality">Nationality <span class="text-maroon">*</span></label>
        <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror"
            name="nationality" value="{{ old('nationality','Filipino') }}">
        @error('nationality') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="ethnic_background">Ethnic Background</label>
        <input id="ethnic_background" type="text" class="form-control @error('ethnic_background') is-invalid @enderror"
            name="ethnic_background" value="{{ old('ethnic_background') }}">
        @error('ethnic_background') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<h6 class="font-weight-bold mt-3">Address</h6>

<div class="row">
    <div class="form-group col-md-3">
        <label for="house_number">House No.</label>
        <input id="house_number" type="text" class="form-control @error('house_number') is-invalid @enderror"
            name="house_number" value="{{ old('house_number') }}">
        @error('house_number') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-5">
        <label for="street">Street</label>
        <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street"
            value="{{ old('street') }}">
        @error('street') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="form-group col-md-4">
        <label for="zip_code">ZIP Code <span class="text-maroon">*</span></label>
        <input id="zip_code" type="text" inputmode="numeric" pattern="^\d{4}$"
            class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}"
        >
        @error('zip_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
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

    <div class="form-group col-md-4">
        <label for="district">District <span class="text-maroon">*</span></label>
        <select id="district" class="form-control @error('district') is-invalid @enderror" name="district"
            x-model="selectedDistrict" @change="onDistrictChange">
            <option value="" disabled x-bind:selected="!selectedDistrict">Select
                district</option>
            <template x-for="d in districts" :key="d.id">
                <option :value="d.id" x-text="d.name"></option>
            </template>
        </select>
        @error('district') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-4" x-cloak>
        <label for="barangay">Barangay <span class="text-maroon">*</span></label>
        <select id="barangay" class="form-control @error('barangay') is-invalid @enderror" name="barangay"
            x-model="selectedBarangay" :disabled="!selectedDistrict">
            <option value="" disabled x-bind:selected="!selectedBarangay">Select
                barangay</option>
            <template x-for="b in filteredBarangays" :key="b.id">
                <option :value="b.id" x-text="b.name"></option>
            </template>
        </select>
        @error('barangay') <div class="invalid-feedback">{{ $message }}</div> @enderror
        <small class="form-text text-muted" x-show="!selectedDistrict">Choose a district
            first.</small>
        <small class="form-text text-muted" x-show="selectedDistrict && filteredBarangays.length === 0">
            No barangays found for this district.
        </small>
    </div>

    <div class="form-group col-md-4">
        <label for="city">City/Municipality</label>
        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="Taguig"
        >
        @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>