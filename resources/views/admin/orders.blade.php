@extends('admin.layout.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }

    .table-hover tbody tr:hover {
        background-color: #e9ecef;
    }

    .btn-custom {
        background-color: #4e73df;
        border-color: #4e73df;
        color: #fff;
    }

    .btn-custom:hover {
        background-color: #2e59d9;
        border-color: #2653d4;
    }

    .table thead th {
        background-color: #4e73df;
        color: #fff;
        text-align: center;
    }

    .table tbody td {
        text-align: center;
    }

    .status-unread {
        color: #f6c23e;
        font-weight: bold;
    }

    .status-read {
        color: #1cc88a;
        font-weight: bold;
    }

    .status-important {
        color: #e74a3b;
        font-weight: bold;
    }

    .status-icon {
        margin-right: 5px;
    }
    .status-badge {
      text-transform: uppercase;
    }
    .status-pending {
      background-color: #ffc107;
    }
    .status-completed {
      background-color: #28a745;
      color: white;
    }
    .status-canceled {
      background-color: #dc3545;
      color: white;
    }
</style>

    <div class="container my-5">
        <h2 class="text-center">Order Management</h2>
        <!-- Thanh tìm kiếm -->
        <div class="mb-3">
            <input type="text" id="searchBar" class="form-control" placeholder="Search by Order ID or Customer Name" />
        </div>

        <!-- Bảng hiển thị đơn hàng -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <!-- Phân trang -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            </ul>
        </nav>
    </div>

    <!-- Modal Order View -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Order ID:</strong> <span id="modalOrderId"></span></p>
                    <p><strong>Customer:</strong> <span id="modalCustomer"></span></p>
                    <p><strong>Date:</strong> <span id="modalDate"></span></p>
                    <p><strong>Total:</strong> $<span id="modalTotal"></span></p>
                    <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modalActionButton"></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Link đến Bootstrap 5 JS và Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        // Giả lập dữ liệu đơn hàng
        const orders = [{
                id: '#ORD001',
                customer: 'John Doe',
                date: '2024-01-01',
                total: 120.00,
                status: 'Pending'
            },
            {
                id: '#ORD002',
                customer: 'Jane Smith',
                date: '2024-01-02',
                total: 80.00,
                status: 'Completed'
            },
            {
                id: '#ORD003',
                customer: 'Sam Wilson',
                date: '2024-01-03',
                total: 45.00,
                status: 'Canceled'
            },
            {
                id: '#ORD004',
                customer: 'Lisa Brown',
                date: '2024-01-04',
                total: 200.00,
                status: 'Pending'
            },
            {
                id: '#ORD005',
                customer: 'Peter Parker',
                date: '2024-01-05',
                total: 150.00,
                status: 'Completed'
            },
            {
                id: '#ORD006',
                customer: 'Tony Stark',
                date: '2024-01-06',
                total: 300.00,
                status: 'Pending'
            },
        ];

        // Hiển thị đơn hàng trong bảng
        const displayOrders = (filteredOrders) => {
            const tbody = document.querySelector('tbody');
            tbody.innerHTML = ''; // Clear previous rows

            filteredOrders.forEach((order, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
          <td>${index + 1}</td>
          <td>${order.id}</td>
          <td>${order.customer}</td>
          <td>${order.date}</td>
          <td>$${order.total.toFixed(2)}</td>
          <td><span class="badge status-badge status-${order.status.toLowerCase()}">${order.status}</span></td>
          <td>
            <button class="btn btn-sm btn-primary" onclick="viewOrder('${order.id}')">View</button>
            ${order.status === 'Pending' ? `<button class="btn btn-sm btn-success" onclick="markComplete('${order.id}')">Mark as Complete</button>` : ''}
            ${order.status !== 'Canceled' ? `<button class="btn btn-sm btn-danger" onclick="cancelOrder('${order.id}')">Cancel</button>` : ''}
          </td>
        `;
                tbody.appendChild(row);
            });
        };

        // Tìm kiếm đơn hàng
        const searchOrders = (searchTerm) => {
            const filteredOrders = orders.filter(order =>
                order.id.toLowerCase().includes(searchTerm.toLowerCase()) ||
                order.customer.toLowerCase().includes(searchTerm.toLowerCase()) ||
                order.date.includes(searchTerm)
            );
            displayOrders(filteredOrders);
        };

        // Xem chi tiết đơn hàng
        const viewOrder = (orderId) => {
            const order = orders.find(o => o.id === orderId);
            if (order) {
                document.getElementById('modalOrderId').textContent = order.id;
                document.getElementById('modalCustomer').textContent = order.customer;
                document.getElementById('modalDate').textContent = order.date;
                document.getElementById('modalTotal').textContent = order.total.toFixed(2);
                document.getElementById('modalStatus').textContent = order.status;

                const actionButton = document.getElementById('modalActionButton');
                if (order.status === 'Pending') {
                    actionButton.textContent = 'Mark as Complete';
                    actionButton.classList.remove('btn-danger');
                    actionButton.classList.add('btn-success');
                    actionButton.onclick = () => markComplete(order.id);
                } else if (order.status === 'Completed') {
                    actionButton.textContent = 'Completed';
                    actionButton.classList.remove('btn-success');
                    actionButton.classList.add('btn-secondary');
                    actionButton.disabled = true;
                } else if (order.status === 'Canceled') {
                    actionButton.textContent = 'Canceled';
                    actionButton.classList.remove('btn-success', 'btn-danger');
                    actionButton.classList.add('btn-secondary');
                    actionButton.disabled = true;
                }

                const orderModal = new bootstrap.Modal(document.getElementById('orderModal'));
                orderModal.show();
            }
        };

        // Đánh dấu đơn hàng là "Completed"
        const markComplete = (orderId) => {
            const order = orders.find(o => o.id === orderId);
            if (order) {
                order.status = 'Completed';
                alert(`Order ${orderId} marked as completed`);
                const orderModal = bootstrap.Modal.getInstance(document.getElementById('orderModal'));
                orderModal.hide();
                displayOrders(orders);
            }
        };

        // Hủy đơn hàng
        const cancelOrder = (orderId) => {
            const order = orders.find(o => o.id === orderId);
            if (order) {
                order.status = 'Canceled';
                displayOrders(orders);
            }
        };

        // Lắng nghe sự kiện tìm kiếm
        document.getElementById('searchBar').addEventListener('input', (e) => {
            searchOrders(e.target.value);
        });

        // Khởi tạo trang đầu tiên và hiển thị đơn hàng
        displayOrders(orders);
    </script>
@endsection
