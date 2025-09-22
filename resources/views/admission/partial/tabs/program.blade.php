<div class="tab-pane fade" id="pane-programs" role="tabpanel" aria-labelledby="tab-programs">
    <h5 class="text-maroon font-weight-bold mb-3">
        <i class="fas fa-list-ol mr-2"></i>Program Preferences
    </h5>

    <ol class="list-group list-group-numbered">
        @foreach(($admission->choice ?? []) as $choice)
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
        @endforeach
        @if(empty($admission->choice) || count($admission->choice) === 0)
        <li class="list-group-item text-muted">No program choices found.</li>
        @endif
    </ol>
</div>