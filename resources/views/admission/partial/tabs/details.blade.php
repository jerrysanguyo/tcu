<div class="tab-pane fade show active" id="pane-details" role="tabpanel" aria-labelledby="tab-details">
    <h5 class="text-maroon font-weight-bold mb-3">
        <i class="fas fa-user-shield mr-2"></i>Parent / Guardian Information
    </h5>
    <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item">
            <i class="fas fa-user mr-2 text-maroon"></i>
            <strong>Full Name:</strong>
            {{ optional($admission->guardian)->full_name ?? '—' }}
        </li>
        <li class="list-group-item">
            <i class="fas fa-phone mr-2 text-maroon"></i>
            <strong>Contact Number:</strong>
            {{ optional($admission->guardian)->contact_number ?? '—' }}
        </li>
        <li class="list-group-item">
            <i class="fas fa-hashtag mr-2 text-maroon"></i>
            <strong>COMELEC No.:</strong>
            {{ optional($admission->guardian)->comelec_number ?? '—' }}
        </li>

        <li class="list-group-item">
            <i class="fas fa-id-card mr-2 text-maroon"></i>
            <span class="mr-3">Voter’s ID</span>
            @if($docPath)
            <a href="{{ asset($docPath) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-external-link-alt mr-1"></i> View
            </a>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal"
                data-target="#docPreviewModal">
                <i class="fas fa-eye mr-1"></i> Preview
            </button>
            @else
            No document uploaded.
            @endif
        </li>
    </ul>

    <h5 class="text-maroon font-weight-bold mb-3 mt-4">
        <i class="fas fa-child mr-2"></i>Applicant Information
    </h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <i class="fas fa-id-card mr-2 text-maroon"></i>
            <strong>Full Name:</strong>
            {{ $admission->first_name }} {{ $admission->middle_name }}
            {{ $admission->last_name }}
        </li>
        <li class="list-group-item">
            <i class="fas fa-venus-mars mr-2 text-maroon"></i>
            <strong>Gender:</strong> {{ optional($admission->gender)->name ?? '—' }}
        </li>
        <li class="list-group-item">
            <i class="fas fa-birthday-cake mr-2 text-maroon"></i>
            <strong>Birth Date:</strong>
            {{ \Carbon\Carbon::parse($admission->birth_date)->format('F d, Y') }}
        </li>
        <li class="list-group-item">
            <i class="fas fa-map-marker-alt mr-2 text-maroon"></i>
            <strong>Address:</strong>
            {{ $admission->house_number }} {{ $admission->street }},
            {{ optional($admission->barangay)->name ?? '—' }}, {{ $admission->city }}
            {{ $admission->zip_code }}
        </li>
        <li class="list-group-item">
            <i class="fas fa-globe-asia mr-2 text-maroon"></i>
            <strong>Nationality:</strong> {{ $admission->nationality }}
        </li>
        <li class="list-group-item">
            <i class="fas fa-envelope mr-2 text-maroon"></i>
            <strong>Email:</strong> {{ $admission->email }}
        </li>
        <li class="list-group-item">
            <i class="fas fa-phone mr-2 text-maroon"></i>
            <strong>Contact Number:</strong> {{ $admission->contact_number }}
        </li>
    </ul>
</div>