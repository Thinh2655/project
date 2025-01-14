@extends('admin.layout.app')

@section('title', 'Home Page')

@section('content')
    <style>
        nav>div>div>p{
            display: none;
        }
    </style>
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
                    @foreach ($users as $customer)
                        <tr data-id="{{ $customer->id }}">
                            <td><input type="checkbox" aria-label="Checkbox for selecting customer"></td>
                            <td class="d-flex align-items-center">
                                <img src="https://placehold.co/40x40" class="rounded-circle me-2"
                                    alt="{{ $customer->name }}">
                                <div>
                                    <span class="fw-semibold d-block h-100">{{ $customer->name }}</span>
                                    <small class="text-muted">{{ $customer->email }}</small>
                                </div>
                            </td>
                            <td>{{ $customer->company }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ $customer->address }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center align-items-center mt-4">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <script>
        // Thêm khách hàng mới
        document.querySelector('.btn-warning').addEventListener('click', function() {
            window.location.href = '/admin/customers/create';
        });

        // Tìm kiếm khách hàng
        document.querySelector('.btn-secondary .fa-search').parentElement.addEventListener('click', function() {
            const searchTerm = document.querySelector('input[placeholder="Search"]').value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const userName = row.querySelector('td:nth-child(2) span').textContent.toLowerCase();
                row.style.display = userName.includes(searchTerm) ? '' : 'none';
            });
        });

        // Lọc khách hàng
        document.querySelector('.btn-secondary .fa-filter').parentElement.addEventListener('click', function() {
            alert('Chức năng lọc đang phát triển!');
        });

        // Sắp xếp khách hàng
        document.querySelector('.btn-secondary .fa-sort-alpha-down').parentElement.addEventListener('click', function() {
            const tableBody = document.querySelector('tbody');
            const rows = Array.from(tableBody.querySelectorAll('tr'));
            rows.sort((a, b) => {
                const nameA = a.querySelector('td:nth-child(2) span').textContent.toLowerCase();
                const nameB = b.querySelector('td:nth-child(2) span').textContent.toLowerCase();
                return nameA.localeCompare(nameB);
            });
            rows.forEach(row => tableBody.appendChild(row));
        });

        // Sắp xếp khách hàng ngược lại
        let isAscending = true; // Define isAscending variable

        document.querySelector('.btn-secondary .fa-sort-alpha-down').parentElement.addEventListener('click', function() {
            const tableBody = document.querySelector('tbody');
            const rows = Array.from(tableBody.querySelectorAll('tr'));

            rows.sort((a, b) => {
                const nameA = a.querySelector('td:nth-child(2) span').textContent.toLowerCase();
                const nameB = b.querySelector('td:nth-child(2) span').textContent.toLowerCase();
                return isAscending ? nameA.localeCompare(nameB) : nameB.localeCompare(nameA);
            });

            rows.forEach(row => tableBody.appendChild(row));
            isAscending = !isAscending; // Đổi trạng thái sắp xếp sau mỗi lần click
        });

        // Xóa khách hàng đã chọn
        document.querySelector('.btn-danger').addEventListener('click', function() {
            const selectedCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]:checked');
            const idsToDelete = Array.from(selectedCheckboxes).map(checkbox => checkbox.closest('tr').dataset.id);

            if (idsToDelete.length > 0) {
                fetch('/admin/customers/delete', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            ids: idsToDelete
                        })
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            idsToDelete.forEach(id => {
                                document.querySelector(`tr[data-id="${id}"]`).remove();
                            });
                        } else {
                            alert('Xóa khách hàng thất bại!');
                        }
                    });
            } else {
                alert('Chưa chọn khách hàng nào để xóa!');
            }
        });
    </script>

@endsection
