<hr class="my-4">

<h5 class="text-maroon font-weight-bold mb-3">Parent / Guardian Information</h5>

<div class="row">
    <div class="form-group col-md-7">
        <label for="guardian_full_name">Full Name <span class="text-maroon">*</span></label>
        <input id="guardian_full_name" type="text"
            class="form-control @error('guardian_full_name') is-invalid @enderror" name="guardian_full_name"
            value="{{ old('guardian_full_name') }}">
        @error('guardian_full_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-5">
        <label for="guardian_contact_number">Contact No. <span class="text-maroon">*</span></label>
        <input id="guardian_contact_number" type="tel" inputmode="tel" pattern="^[0-9+\-\s()]{7,}$"
            class="form-control @error('guardian_contact_number') is-invalid @enderror" name="guardian_contact_number"
            value="{{ old('guardian_contact_number') }}">
        @error('guardian_contact_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="comelec_number">Comelec No. <span class="text-maroon">*</span></label>
        <input id="comelec_number" type="text" class="form-control @error('comelec_number') is-invalid @enderror"
            name="comelec_number" value="{{ old('comelec_number') }}">
        @error('comelec_number')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="comelec_file">
            Upload Voter’s ID <span class="text-maroon">*</span>
            <small class="text-muted ml-1">(Accepted file: JPG, PNG, PDF · max 2MB)</small>
        </label>
        <div class="custom-file">
            <input id="comelec_file" type="file" class="custom-file-input @error('comelec_file') is-invalid @enderror"
                name="comelec_file" accept="image/*,application/pdf">
            <label class="custom-file-label" for="comelec_file">Choose file...</label>
            @error('comelec_file')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
});
</script>
@endpush