<hr class="my-4">

<h5 class="text-maroon font-weight-bold mb-3">Academic Background</h5>

<div class="row">
    <div class="form-group col-md-4">
        <label for="lrn">LRN <span class="text-muted">(12 digits)</span> <span class="text-maroon">*</span></label>
        <input id="lrn" type="text" inputmode="numeric" pattern="^\d{12}$"
            class="form-control @error('lrn') is-invalid @enderror" name="lrn" value="{{ old('lrn') }}">
        @error('lrn') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

{{-- Junior High --}}
<div class="row">
    <div class="form-group col-md-8">
        <label for="jr_school">Junior High School <span class="text-maroon">*</span></label>
        <input id="jr_school" type="text" class="form-control @error('jr_school') is-invalid @enderror" name="jr_school"
            value="{{ old('jr_school') }}">
        @error('jr_school') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="jr_strand">JHS Strand</label>
        <select id="jr_strand" class="form-control @error('jr_strand') is-invalid @enderror" name="jr_strand">
            <option value="" {{ old('jr_strand') ? '' : 'selected' }}>Select strand
            </option>
            @isset($strands)
            @foreach($strands as $s)
            <option value="{{ $s->id }}" {{ old('jr_strand') == $s->id ? 'selected' : '' }}>{{ $s->name }}
            </option>
            @endforeach
            @endisset
        </select>
        @error('jr_strand') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">

    <div class="form-group col-md-4">
        <label for="jr_year_graduated">JHS Year Graduated</label>
        <input id="jr_year_graduated" type="text" inputmode="numeric" pattern="^\d{4}$"
            class="form-control @error('jr_year_graduated') is-invalid @enderror" name="jr_year_graduated"
            value="{{ old('jr_year_graduated') }}">
        @error('jr_year_graduated') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="jr_gwa_first">JHS GWA (1st Sem) <small class="text-muted">e.g.,
                1.25</small></label>
        <input id="jr_gwa_first" type="number" step="0.01" min="1.00" max="5.00"
            class="form-control @error('jr_gwa_first') is-invalid @enderror" name="jr_gwa_first"
            value="{{ old('jr_gwa_first') }}">
        @error('jr_gwa_first') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <label for="jr_gwa_second">JHS GWA (2nd Sem) <small class="text-muted">e.g.,
                1.25</small></label>
        <input id="jr_gwa_second" type="number" step="0.01" min="1.00" max="5.00"
            class="form-control @error('jr_gwa_second') is-invalid @enderror" name="jr_gwa_second"
            value="{{ old('jr_gwa_second') }}">
        @error('jr_gwa_second') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Senior High --}}
<div class="row">
    <div class="form-group col-md-8">
        <label for="sr_school">Senior High School <span class="text-maroon">*</span></label>
        <input id="sr_school" type="text" class="form-control @error('sr_school') is-invalid @enderror" name="sr_school"
            value="{{ old('sr_school') }}">
        @error('sr_school') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="sr_strand">SHS Strand</label>
        <select id="sr_strand" class="form-control @error('sr_strand') is-invalid @enderror" name="sr_strand">
            <option value="" {{ old('sr_strand') ? '' : 'selected' }}>Select strand
            </option>
            @isset($strands)
            @foreach($strands as $s)
            <option value="{{ $s->id }}" {{ old('sr_strand') == $s->id ? 'selected' : '' }}>{{ $s->name }}
            </option>
            @endforeach
            @endisset
        </select>
        @error('sr_strand') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    
    <div class="form-group col-md-4">
        <label for="sr_year_graduated">SHS Year Graduated</label>
        <input id="sr_year_graduated" type="text" inputmode="numeric" pattern="^\d{4}$"
            class="form-control @error('sr_year_graduated') is-invalid @enderror" name="sr_year_graduated"
            value="{{ old('sr_year_graduated') }}">
        @error('sr_year_graduated') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="sr_gwa_first">SHS GWA (1st Sem) <small class="text-muted">e.g.,
                1.25</small></label>
        <input id="sr_gwa_first" type="number" step="0.01" min="1.00" max="5.00"
            class="form-control @error('sr_gwa_first') is-invalid @enderror" name="sr_gwa_first"
            value="{{ old('sr_gwa_first') }}">
        @error('sr_gwa_first') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <label for="sr_gwa_second">SHS GWA (2nd Sem) <small class="text-muted">e.g.,
                1.25</small></label>
        <input id="sr_gwa_second" type="number" step="0.01" min="1.00" max="5.00"
            class="form-control @error('sr_gwa_second') is-invalid @enderror" name="sr_gwa_second"
            value="{{ old('sr_gwa_second') }}">
        @error('sr_gwa_second') <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>