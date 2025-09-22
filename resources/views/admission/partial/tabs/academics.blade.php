<div class="tab-pane fade" id="pane-academic" role="tabpanel" aria-labelledby="tab-academic">
    <h5 class="text-maroon font-weight-bold mb-3">
        <i class="fas fa-school mr-2"></i>K–12 Academic Background
    </h5>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card border border-primary shadow-sm h-100">
                <div class="card-header d-flex justify-content-between align-items-center py-2">
                    <span class="badge badge-primary">Junior High School</span>
                    <small class="text-muted">JHS</small>
                </div>
                <div class="card-body py-3">
                    <div class="mb-2">
                        <i class="fas fa-university mr-1 text-primary"></i>
                        <strong>School:</strong>
                        {{ optional($admission->academic)->jr_school ?? '—' }}
                    </div>
                    <div class="mb-2">
                        <i class="fas fa-stream mr-1 text-primary"></i>
                        <strong>Strand:</strong>
                        {{ optional(optional($admission->academic)->jrStrand)->name ?? '—' }}
                    </div>
                    <div class="mb-2">
                        <i class="fas fa-calendar-check mr-1 text-primary"></i>
                        <strong>Year Graduated:</strong>
                        {{ optional($admission->academic)->jr_year_graduated ?? '—' }}
                    </div>
                    <div>
                        <span class="badge badge-pill badge-primary">
                            1st Sem:
                            {{ number_format((float) (optional($admission->academic)->jr_gwa_first ?? 0), 2) }}
                        </span>
                        <span class="badge badge-pill badge-primary ml-1">
                            2nd Sem:
                            {{ number_format((float) (optional($admission->academic)->jr_gwa_second ?? 0), 2) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card border border-warning shadow-sm h-100">
                <div class="card-header d-flex justify-content-between align-items-center py-2">
                    <span class="badge badge-warning">Senior High School</span>
                    <small class="text-muted">SHS</small>
                </div>
                <div class="card-body py-3">
                    <div class="mb-2">
                        <i class="fas fa-university mr-1 text-warning"></i>
                        <strong>School:</strong>
                        {{ optional($admission->academic)->sr_school ?? '—' }}
                    </div>
                    <div class="mb-2">
                        <i class="fas fa-stream mr-1 text-warning"></i>
                        <strong>Strand:</strong>
                        {{ optional(optional($admission->academic)->srStrand)->name ?? '—' }}
                    </div>
                    <div class="mb-2">
                        <i class="fas fa-calendar-check mr-1 text-warning"></i>
                        <strong>Year Graduated:</strong>
                        {{ optional($admission->academic)->sr_year_graduated ?? '—' }}
                    </div>
                    <div>
                        <span class="badge badge-pill badge-warning">
                            1st Sem:
                            {{ number_format((float) (optional($admission->academic)->sr_gwa_first ?? 0), 2) }}
                        </span>
                        <span class="badge badge-pill badge-warning ml-1">
                            2nd Sem:
                            {{ number_format((float) (optional($admission->academic)->sr_gwa_second ?? 0), 2) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-light border mt-2">
        <i class="fas fa-barcode mr-1 text-secondary"></i>
        <strong>LRN:</strong> {{ $admission->academic->lrn ?? '—' }}
    </div>
</div>