@extends('layout.app')

@section('title', 'Home Page')

@section('content')
    <style>
        .account-container {
            max-width: 1100px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .account-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .account-header h1 {
            color: #343a40;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin: 0;
            font-size: 0.9rem;
        }

        .breadcrumb-item a {
            color: #6c757d;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #343a40;
        }

        .account-sidebar {
            list-style: none;
            padding: 0;
        }

        .account-sidebar li {
            margin-bottom: 10px;
        }

        .account-sidebar a {
            display: block;
            padding: 10px 15px;
            background-color: #f8f9fa;
            color: #343a40;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .account-sidebar a:hover {
            background-color: #e9ecef;
        }

        .account-sidebar a.active {
            background-color: #b88e2f;
            color: #fff;
        }

        .account-content {
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
        }

        .account-content h2 {
            color: #343a40;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .header-top {
            background-color: #f8f3ed;
        }

        .header-top .container-fluid {
            padding: 5px 30px;
        }

        .bg-sofa {
            background-color: #f8f3ed;
            padding: 50px 0;
        }
    </style>
    <div class="bg-sofa">
        <!-- Account Container -->
        <div class="account-container">
            <div class="account-header">
                <div class="">
                    <a class="navbar-brand" href="home">
                        <img src="https://anhdep.edu.vn/wp-content/uploads/2024/08/avatar-anh-hoat-hinh-cute-037.webp"
                            class="rounded-circle img-fluid border border-4 border-success" height="100" width="100"
                            alt="Furniro Logo">
                    </a>
                    <h1>My Account</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <!-- Account Sidebar -->
                    <ul class="account-sidebar">
                        <li><a class="tab" href="#" class="active">Dashboard</a></li>
                        <li><a class="tab" href="#">Orders</a></li>
                        <li><a class="tab" href="#">Addresses</a></li>
                        <li><a class="tab" href="#">Account Details</a></li>
                        <li><a href="logout" onclick="return confirmLogout(event);">Logout</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <!-- Account Content -->
                    <div class="account-content">
                        <h2>Dashboard</h2>
                        <p>Hello, <strong>{{ $user->name }}</strong> (not <strong>{{ $user->name }}</strong>? <a
                                href="logout" onclick="return confirmLogout(event);">Log
                                out</a>)</p>
                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing
                            addresses, and edit your password and account details.</p>

                        <!-- Example for Account Details Section -->
                        <!-- <h2>Account Details</h2>
                                                        <form>
                                                            <div class="mb-3">
                                                                <label for="firstName" class="form-label">First Name</label>
                                                                <input type="text" class="form-control" id="firstName" value="John">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="lastName" class="form-label">Last Name</label>
                                                                <input type="text" class="form-control" id="lastName" value="Doe">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email Address</label>
                                                                <input type="email" class="form-control" id="email" value="john.doe@example.com">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Add your JavaScript code here, e.g., for handling active class on sidebar
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarLinks = document.querySelectorAll('.account-sidebar a.tab');

            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    // Remove active class from all links
                    sidebarLinks.forEach(l => l.classList.remove('active'));

                    // Add active class to the clicked link
                    this.classList.add('active');

                    // Prevent the default link behavior
                    event.preventDefault();

                    // Here you can load the content corresponding to the clicked link
                    // For example, you can use AJAX to fetch the content and update the .account-content div
                    // For simplicity, let's just log the link's text content for now
                    console.log('Load content for:', this.textContent);

                    let sectionTitle = '';
                    switch (this.textContent) {
                        case 'Dashboard':
                            sectionTitle = 'Dashboard';
                            break;
                        case 'Orders':
                            sectionTitle = 'Orders';
                            break;
                        case 'Addresses':
                            sectionTitle = 'Addresses';
                            break;
                        case 'Account Details':
                            sectionTitle = 'Account Details';
                            break;
                        default:
                            sectionTitle = 'Dashboard';
                    }
                    loadContent(sectionTitle);

                });
            });
        });

        function loadContent(section) {
            const contentArea = document.querySelector('.account-content');

            switch (section) {
                case 'Dashboard':
                    contentArea.innerHTML = `
                    <h2>Dashboard</h2>
                    <p>Hello, <strong>{{ $user->name }}</strong> (not <strong>{{ $user->name }}</strong>? <a href="#">Log out</a>)</p>
                    <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                  `;
                    break;
                case 'Orders':
                    @if ($orders->isEmpty())
                        contentArea.innerHTML = `
                        <h2>Orders</h2>
                        <p>No order has been made yet.</p>
                        <a href="shop" class="btn btn-primary">Go Shop</a>
                    `;
                    @else
                        contentArea.innerHTML = `
                        <h2 class="mb-4 text-center">Đơn hàng của bạn</h2>

                        <input id="searchInput" class="form-control mb-3" type="text" placeholder="Tìm kiếm đơn hàng..." onkeyup="searchTable()">

                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th><button class="btn btn-link text-white text-decoration-none" onclick="sortTable(0)">#</button></th>
                                    <th><button class="btn btn-link text-white text-decoration-none" onclick="sortTable(1)">Mã đơn hàng</button></th>
                                    <th><button class="btn btn-link text-white text-decoration-none" onclick="sortTable(2)">Ngày đặt</button></th>
                                    <th><button class="btn btn-link text-white text-decoration-none" onclick="sortTable(3)">Trạng thái</button></th>
                                    <th><button class="btn btn-link text-white text-decoration-none" onclick="sortTable(4)">Tổng tiền</button></th>
                                    <th><button class="btn btn-link text-white text-decoration-none">Hành động</button></th>
                                </tr>
                            </thead>
                            <tbody id="orderTable">
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            @if ($order->status == 'complete')
                                                <span class="badge bg-success">{{ $order->status }}</span>
                                            @elseif ($order->status == 'pending')
                                                <span class="badge bg-warning">{{ $order->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ number_format($order->total_price, 0, '', '.') }} VND</td>
                                        <td><button class="btn btn-primary btn-sm" onclick="viewOrderDetail('{{ $order->id }}')">Xem Chi Tiết</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    <!-- Modal Chi Tiết Đơn Hàng -->
                    <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="orderDetailModalLabel">Chi Tiết Đơn Hàng</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="orderBasicInfo"></div>
                                    <hr>
                                    <h6>Sản phẩm đã đặt:</h6>
                                    <ul id="orderItems"></ul>
                                    <hr>
                                    <h6>Lịch sử trạng thái:</h6>
                                    <ul id="orderHistory"></ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    @endif
                    break;
                case 'Addresses':
                    contentArea.innerHTML = ` 
                        <h2>Addresses</h2>
                        <p>The following addresses will be used on the checkout page by default.</p>

                        <div class="row">
                            <div class="col-md-6">
                                <h4>Billing address</h4>
                                <p>You have not set up this type of address yet.</p>
                                <div class="d-flex">
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ" required>
                                    <button class="btn btn-primary">Add</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Shipping address</h4>
                                <p>You have not set up this type of address yet.</p>
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </div>
                        `;
                    break;
                case 'Account Details':
                    contentArea.innerHTML = ` 
                    <h2>Account Details</h2>
                    <form action="{{ route('account.update') }}" method="POST">
                        @csrf   
                        <div class="mb-3">
                            <label for="firstName" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="firstName" name="name" value="{{ $user->name }}" placeholder="Nhập tên đầu tiên" required autocomplete="given-name">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $user->phone_number }}" placeholder="Nhập số điện thoại" required autocomplete="tel">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Nhập địa chỉ email" required autocomplete="email">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" placeholder="Nhập địa chỉ" required autocomplete="street-address">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                        `;
                    break;
                default:
                    contentArea.innerHTML = '<h2>Dashboard</h2><p>Select an option from the sidebar.</p>';
            }
        }

        function confirmLogout(event) {
            if (!confirm('Bạn có chắc chắn muốn đăng xuất không?')) {
                event.preventDefault(); // Ngăn chặn việc chuyển của liên kết nếu không đồng ý
            }
        }
        //order
        var orders = {
            "OD123456": {
                id: "OD123456",
                date: "2023-10-01",
                status: "Đã giao",
                total: "1.000.000 VND",
                items: [{
                        name: "Sản phẩm A",
                        quantity: 2,
                        price: "200.000 VND"
                    },
                    {
                        name: "Sản phẩm B",
                        quantity: 1,
                        price: "600.000 VND"
                    }
                ],
                history: [{
                        date: "2023-10-01",
                        status: "Đã giao"
                    },
                    {
                        date: "2023-09-30",
                        status: "Đang chuyển hàng"
                    },
                    {
                        date: "2023-09-29",
                        status: "Đã xử lý"
                    }
                ]
            },
            "OD123457": {
                id: "OD123457",
                date: "2023-10-02",
                status: "Đang xử lý",
                total: "500.000 VND",
                items: [{
                    name: "Sản phẩm C",
                    quantity: 3,
                    price: "300.000 VND"
                }],
                history: [{
                    date: "2023-10-02",
                    status: "Đang xử lý"
                }]
            },
            @foreach ($orders as $order)
                "{{ $order->id }}": {
                    id: "{{ $order->id }}",
                    date: "{{ $order->created_at }}",
                    status: "{{ $order->status }}",
                    total: "{{ number_format($order->total_price, 0, '', '.') }} VND",
                    items: [
                        @foreach ($order->items as $orderDetail)
                            {
                                name: "{{ $orderDetail->product_name }}",
                                quantity: "{{ $orderDetail->quantity }}",
                                price: "{{ number_format($orderDetail->product_price, 0, '', '.') }} VND"
                            },
                        @endforeach
                    ],
                    history: [{
                            date: "{{ $order->created_at }}",
                            status: "Created"
                        },
                        {
                            date: "{{ $order->updated_at }}",
                            status: "{{ $order->status }}"
                        }
                    ]
                },
            @endforeach
        };

        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("orderTable");
            switching = true;
            dir = "asc";

            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 0; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];

                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }

        function searchTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("orderTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                tr[i].classList.remove("highlighted");
                tr[i].style.display = "none";
                td = tr[i].getElementsByTagName("td");

                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            tr[i].classList.add("highlighted");
                            break;
                        }
                    }
                }
            }
        }

        function viewOrderDetail(orderId) {
            var order = orders[orderId];

            if (order) {
                // Thông tin cơ bản
                var basicInfo = `<p>Mã đơn hàng: ${order.id}</p>
                         <p>Ngày đặt: ${order.date}</p>
                         <p>Trạng thái hiện tại: ${order.status}</p>
                         <p>Total: ${order.total}</p>`;
                document.getElementById('orderBasicInfo').innerHTML = basicInfo;

                // Danh sách sản phẩm
                var itemsList = order.items.map(item =>
                    `<li>${item.name} - Số lượng: ${item.quantity} - Giá: ${item.price}</li>`
                ).join('');
                document.getElementById('orderItems').innerHTML = itemsList;

                // Lịch sử trạng thái
                var historyList = order.history.map(h =>
                    `<li>${h.date} - ${h.status}</li>`
                ).join('');
                document.getElementById('orderHistory').innerHTML = historyList;

                var myModal = new bootstrap.Modal(document.getElementById('orderDetailModal'), {
                    keyboard: false
                });
                myModal.show();
            }
        }
    </script>
@endsection
