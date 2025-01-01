@extends('admin.layout.app')

@section('title', 'Home Page')

@section('content')

    <div>
        <!-- Top Bar -->
        <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm mb-4">
            <div class="d-flex align-items-center">
                <img src="https://placehold.co/50x50" class="rounded-circle me-3" alt="Placeholder image">
                <div>
                    <p class="text-muted mb-0 small">Customers <span class="fw-bold">Customers</span></p>
                    <h2 class="fw-bold mb-0">Customers</h2>
                </div>
            </div>
            <button class="btn btn-warning fw-bold"><i class="fas fa-plus"></i> New customer</button>
        </div>

        <!-- Search Bar -->
        <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm mb-4">
            <span class="text-muted small">
                3 contacts selected
                <button class="btn btn-danger btn-sm">Delete</button>
            </span>
            <div class="d-flex">
                <input type="text" class="form-control form-control-sm me-2" placeholder="Search">
                <button class="btn btn-secondary btn-sm me-2"><i class="fas fa-search"></i></button>
                <button class="btn btn-secondary btn-sm me-2"><i class="fas fa-filter"></i></button>
                <button class="btn btn-secondary btn-sm"><i class="fas fa-sort-alpha-down"></i></button>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th></th>
                        <th>User</th>
                        <th>Company</th>
                        <th>Phone</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" aria-label="Checkbox for selecting customer"></td>
                        <td class="d-flex align-items-center">
                            <img src="https://placehold.co/40x40" class="rounded-circle me-2" alt="John Williams">
                            <div>
                                <span class="fw-semibold d-block h-100">John Williams</span>
                                <small class="text-muted">james.smith@example.com</small>
                            </div>
                        </td>
                        <td>TechPinnacle Solutions</td>
                        <td>(202) 555-0126</td>
                        <td>San Francisco, CA</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" checked aria-label="Checkbox for selecting customer"></td>
                        <td class="d-flex align-items-center">
                            <img src="https://placehold.co/40x40" class="rounded-circle me-2" alt="Michael Johnson">
                            <div>
                                <span class="fw-semibold d-block">Michael Johnson</span>
                                <small class="text-muted">michael.johnson@example.com</small>
                            </div>
                        </td>
                        <td>Quantum Dynamics</td>
                        <td>(202) 555-0181</td>
                        <td>San Francisco, CA</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" aria-label="Checkbox for selecting customer"></td>
                        <td class="d-flex align-items-center">
                            <img src="https://placehold.co/40x40" class="rounded-circle me-2" alt="Robert Garcia">
                            <div>
                                <span class="fw-semibold d-block">Robert Garcia</span>
                                <small class="text-muted">robert.garcia@example.com</small>
                            </div>
                        </td>
                        <td>Apex Innovations</td>
                        <td>(312) 555-0324</td>
                        <td>Miami, FL</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <span class="text-muted small">1-10 (2550 total)</span>
            <nav aria-label="Page navigation example">
                <ul class="pagination mb-0">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </nav>
        </div>
    </div>

@endsection
