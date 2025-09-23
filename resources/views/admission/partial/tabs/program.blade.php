<div class="card shadow-sm card-top-maroon mb-4">
    <div class="card-header bg-white">
        <h5 class="mb-0 text-maroon">
            <i class="fas fa-list-ol mr-2"></i>Program Preferences
        </h5>
    </div>
    <div class="card-body p-0">
        <ol class="list-group list-group-flush">
            @php

            $choices = ($admission->choices ?? null) ?: ($admission->choice ?? []);
            @endphp

            @forelse($choices as $choice)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-book mr-2 text-maroon"></i>
                    <strong>{{ ucfirst($choice->remarks) }} choice</strong>:
                    {{ optional($choice->program)->name ?? '—' }}
                </div>
                @if($choice->program)
                <span class="badge badge-light border">{{ $choice->program->code ?? 'CODE' }}</span>
                @endif
            </li>
            @empty
            <li class="list-group-item text-muted">No program choices found.</li>
            @endforelse
        </ol>
    </div>
</div>