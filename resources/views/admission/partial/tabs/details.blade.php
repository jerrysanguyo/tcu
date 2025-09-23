<div class="card shadow-sm card-top-maroon mb-4">
    <div class="card-header bg-white">
        <h5 class="mb-0 text-maroon">
            <i class="fas fa-child mr-2"></i>Applicant Information
        </h5>
    </div>
    <div class="card-body p-0">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-id-card mr-2 text-maroon"></i>
                <strong class="mr-2">Full Name:</strong>
                <span>{{ trim($admission->first_name.' '.($admission->middle_name ?? '').' '.$admission->last_name) }}</span>
            </li>

            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-venus-mars mr-2 text-maroon"></i>
                <strong class="mr-2">Gender:</strong>
                <span>{{ optional($admission->gender)->name ?? '—' }}</span>
            </li>

            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-birthday-cake mr-2 text-maroon"></i>
                <strong class="mr-2">Birth Date:</strong>
                <span>
                    @if(!empty($admission->birth_date))
                    {{ \Carbon\Carbon::parse($admission->birth_date)->format('F d, Y') }}
                    @else
                    —
                    @endif
                </span>
            </li>

            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-map-marker-alt mr-2 text-maroon"></i>
                <strong class="mr-2">Address:</strong>
                <span>
                    {{ $admission->house_number }} {{ $admission->street }},
                    {{ optional($admission->barangay)->name ?? '—' }}, {{ $admission->city }}
                    {{ $admission->zip_code }}
                </span>
            </li>

            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-globe-asia mr-2 text-maroon"></i>
                <strong class="mr-2">Nationality:</strong>
                <span>{{ $admission->nationality }}</span>
            </li>

            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-envelope mr-2 text-maroon"></i>
                <strong class="mr-2">Email:</strong>
                <span>{{ $admission->email }}</span>
            </li>

            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-phone mr-2 text-maroon"></i>
                <strong class="mr-2">Contact Number:</strong>
                <span>{{ $admission->contact_number }}</span>
            </li>
        </ul>
    </div>
</div>