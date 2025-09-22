<hr class="my-4">
<h5 class="text-maroon font-weight-bold mb-3">Program Preferences</h5>

<div class="row">
    <div class="form-group col-md-4">
        <label for="program_first">First Choice <span class="text-maroon">*</span></label>
        <select id="program_first" class="form-control @error('program_first') is-invalid @enderror"
            name="program_first">
            <option value="" {{ old('program_first') ? '' : 'selected' }}>Select program</option>
            @isset($programs)
            @foreach($programs as $p)
            <option value="{{ $p->id }}" {{ old('program_first') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
            @endforeach
            @endisset
        </select>
        @error('program_first') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="program_second">Second Choice</label>
        <select id="program_second" class="form-control @error('program_second') is-invalid @enderror"
            name="program_second">
            <option value="" {{ old('program_second') ? '' : 'selected' }}>Select program</option>
            @isset($programs)
            @foreach($programs as $p)
            <option value="{{ $p->id }}" {{ old('program_second') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
            @endforeach
            @endisset
        </select>
        @error('program_second') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="program_third">Third Choice</label>
        <select id="program_third" class="form-control @error('program_third') is-invalid @enderror"
            name="program_third">
            <option value="" {{ old('program_third') ? '' : 'selected' }}>Select program</option>
            @isset($programs)
            @foreach($programs as $p)
            <option value="{{ $p->id }}" {{ old('program_third') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
            @endforeach
            @endisset
        </select>
        @error('program_third') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>