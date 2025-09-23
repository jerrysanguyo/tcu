<div class="card shadow-sm card-top-maroon mb-4">
    <div class="card-header bg-white">
        <h5 class="mb-0 text-maroon">
            <i class="fas fa-user-shield mr-2"></i>Parent / Guardian Information
        </h5>
    </div>
    <div class="card-body p-0">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-user mr-2 text-maroon"></i>
                <strong class="mr-2">Full Name:</strong>
                <span>{{ optional($admission->guardian)->full_name ?? '—' }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-phone mr-2 text-maroon"></i>
                <strong class="mr-2">Contact Number:</strong>
                <span>{{ optional($admission->guardian)->contact_number ?? '—' }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-hashtag mr-2 text-maroon"></i>
                <strong class="mr-2">COMELEC No.:</strong>
                <span>{{ optional($admission->guardian)->comelec_number ?? '—' }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fas fa-id-card mr-2 text-maroon"></i>
                    <strong class="mr-2">Voter’s ID</strong>
                    <span class="text-muted small">(optional)</span>
                </div>
                <div>
                    @php
                    $docPath = $docPath ?? null;
                    @endphp
                    @if($docPath)
                    <a href="{{ asset($docPath) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-external-link-alt mr-1"></i> View
                    </a>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal"
                        data-target="#docPreviewModal">
                        <i class="fas fa-eye mr-1"></i> Preview
                    </button>
                    @else
                    <span class="text-muted">No document uploaded.</span>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</div>