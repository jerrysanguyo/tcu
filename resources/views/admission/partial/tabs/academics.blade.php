<div class="card shadow-sm card-top-maroon mb-4">
    <div class="card-header bg-white">
        <h5 class="mb-0 text-maroon">
            <i class="fas fa-school mr-2"></i>K–12 Academic Background
        </h5>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-6 mb-3">
                <div class="card border border-primary h-100 shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center py-2">
                        <span class="badge badge-primary">Junior High School</span>
                        <small class="text-muted">JHS</small>
                    </div>
                    <div class="card-body py-3">
                        <div class="mb-2">
                            <i class="fas fa-university mr-1 text-primary"></i>
                            <strong>School:</strong>
                            <span>{{ optional($admission->academic)->jr_school ?? '—' }}</span>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-stream mr-1 text-primary"></i>
                            <strong>Strand:</strong>
                            <span>{{ optional(optional($admission->academic)->jrStrand)->name ?? '—' }}</span>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-calendar-check mr-1 text-primary"></i>
                            <strong>Year Graduated:</strong>
                            <span>{{ optional($admission->academic)->jr_year_graduated ?? '—' }}</span>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge badge-pill badge-primary mb-2 mr-2">
                                1st Sem:
                                {{ number_format((float) (optional($admission->academic)->jr_gwa_first ?? 0), 2) }}
                            </span>
                            <span class="badge badge-pill badge-primary mb-2">
                                2nd Sem:
                                {{ number_format((float) (optional($admission->academic)->jr_gwa_second ?? 0), 2) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card border border-warning h-100 shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center py-2">
                        <span class="badge badge-warning">Senior High School</span>
                        <small class="text-muted">SHS</small>
                    </div>
                    <div class="card-body py-3">
                        <div class="mb-2">
                            <i class="fas fa-university mr-1 text-warning"></i>
                            <strong>School:</strong>
                            <span>{{ optional($admission->academic)->sr_school ?? '—' }}</span>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-stream mr-1 text-warning"></i>
                            <strong>Strand:</strong>
                            <span>{{ optional(optional($admission->academic)->srStrand)->name ?? '—' }}</span>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-calendar-check mr-1 text-warning"></i>
                            <strong>Year Graduated:</strong>
                            <span>{{ optional($admission->academic)->sr_year_graduated ?? '—' }}</span>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge badge-pill badge-warning mb-2 mr-2">
                                1st Sem:
                                {{ number_format((float) (optional($admission->academic)->sr_gwa_first ?? 0), 2) }}
                            </span>
                            <span class="badge badge-pill badge-warning mb-2">
                                2nd Sem:
                                {{ number_format((float) (optional($admission->academic)->sr_gwa_second ?? 0), 2) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-light border mt-2 mb-0">
            <i class="fas fa-barcode mr-1 text-secondary"></i>
            <strong>LRN:</strong> {{ optional($admission->academic)->lrn ?? '—' }}
        </div>
    </div>
</div>