<div class="card shadow-sm card-top-maroon mb-4">
    <div class="card-header bg-white">
        <h5 class="mb-0 text-maroon">
            <i class="fas fa-info-circle mr-2"></i>Admission Overview
        </h5>
    </div>
    <div class="card-body p-0">
        <div class="row no-gutters">
            <div class="col-md-4 d-flex justify-content-center align-items-center p-3 border-right">
                <img src="{{ asset('images/default.webp') }}" alt="Default Picture"
                    class="img-fluid rounded-circle border" style="width: 120px; height: 120px; object-fit: cover;">
            </div>

            <div class="col-md-8">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center">
                        <i class="fas fa-clipboard-check text-maroon mr-2"></i>
                        <strong class="mr-2">Status:</strong>
                        <span class="badge badge-info">Scheduled</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="fas fa-calendar-alt text-maroon mr-2"></i>
                        <strong class="mr-2">Exam Date:</strong>
                        <span>March 10, 2025</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="fas fa-door-open text-maroon mr-2"></i>
                        <strong class="mr-2">Exam Room:</strong>
                        <span>Room 302</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="fas fa-clock text-maroon mr-2"></i>
                        <strong class="mr-2">Exam Time:</strong>
                        <span>9:00 AM – 11:00 AM</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="fas fa-chair text-maroon mr-2"></i>
                        <strong class="mr-2">Seat Number:</strong>
                        <span>25</span>
                    </li>
                </ul>

                <div class="p-3 d-flex">
                    <button class="btn btn-outline-danger mr-2">
                        <i class="fas fa-times-circle mr-1"></i> Remove Schedule
                    </button>
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-print mr-1"></i> Print Exam Permit
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>