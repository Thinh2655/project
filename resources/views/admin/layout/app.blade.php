<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #ffffff;
            padding: 20px;
            min-height: 100vh;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        .sidebar .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #343a40;
        }

        .sidebar .nav-link {
            color: #343a40;
            font-size: 1rem;
        }

        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            border-radius: 5px;
            font-size: 1.1rem;
            padding-left: 23px;
        }

        .sidebar .nav-link.active {
            background-color: #e9ecef;
            border-radius: 5px;
        }

        .main-content {
            padding: 20px;
        }

        .top-bar {
            background-color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        .badge-custom {
            background-color: #dc3545;
            color: #fff;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
            }

            .main-content {
                margin-top: 20px;
            }
        }

        .fixed-alert {
            position: fixed;
            top: 20px;
            right: -300px;
            padding: 15px;
            z-index: 100099;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: right 0.5s ease;
            /* Hiệu ứng chuyển động */
        }

        .show-alert {
            right: 20px;
            /* Di chuyển vào màn hình */
        }

        #logout {
            color: red;
        }
    </style>
</head>

<body>
    @if (session('message'))
        <div class="alert alert-success fixed-alert" id="errorAlert">
            {{ session('message') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar">
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="logo d-md-none ">
                        <span style="color: red">C</span> BABAR
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse row" id="navbarNav">
                        <div
                            class="logo d-flex justify-content-center d-md-block d-none align-items-center text-center">
                            <span style="color: red">C</span> BABAR
                        </div>
                        <ul class="nav flex-column mt-4">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin') || request()->is('admin/dashboard') ? 'active' : '' }}"
                                    href="{{ url('admin/dashboard') }}">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/customers') ? 'active' : '' }}"
                                    href="#customersSubmenu" data-bs-toggle="collapse" aria-expanded="false">
                                    <i class="fas fa-users"></i> Customers
                                    <i class="fas fa-chevron-down float-end"></i>
                                </a>
                                <ul class="collapse nav row ms-3" id="customersSubmenu">
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('admin/customers') ? 'active' : '' }}"
                                            href="{{ url('admin/customers') }}">
                                            <i class="fas fa-users"></i> All Customers
                                        </a>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('admin/customers/detail') ? 'active' : '' }}"
                                            href="{{ url('admin/customers/detail') }}">
                                            <i class="fas fa-user"></i> Customer Detail
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('admin/customers/add') ? 'active' : '' }}"
                                            href="{{ url('admin/customers/add') }}">
                                            <i class="fas fa-user-plus"></i> Add Customer
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/analytics') ? 'active' : '' }}"
                                    href="{{ url('admin/analytics') }}">
                                    <i class="fas fa-chart-line"></i> Analytics
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/messages') ? 'active' : '' }}"
                                    href="{{ url('admin/messages') }}">
                                    <i class="fas fa-envelope"></i> Messages <span class="badge badge-custom">14</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/products') ? 'active' : '' }}"
                                    href="#productsSubmenu" data-bs-toggle="collapse" aria-expanded="false">
                                    <i class="fas fa-box"></i> Products
                                    <i class="fas fa-chevron-down float-end"></i>
                                </a>
                                <ul class="collapse nav row ms-3" id="productsSubmenu">
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('admin/products') ? 'active' : '' }}"
                                            href="{{ url('admin/products') }}">
                                            <i class="fas fa-box"></i> All Products
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('admin/products/detail') ? 'active' : '' }}"
                                            href="{{ url('admin/products/detail') }}">
                                            <i class="fas fa-info-circle"></i> Product Detail
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('admin/products/add') ? 'active' : '' }}"
                                            href="{{ url('admin/products/add') }}">
                                            <i class="fas fa-plus-circle"></i> Add Product
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/orders') ? 'active' : '' }}"
                                    href="{{ url('admin/orders') }}">
                                    <i class="fas fa-file-alt"></i> Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}"
                                    href="{{ url('admin/settings') }}">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                            </li>
                            <li class="nav-item mt-3">
                                <a class="nav-link {{ request()->is('admin/add-product') ? 'active' : '' }}"
                                    href="{{ url('admin/add-product') }}">
                                    <i class="fas fa-plus-circle"></i> Add Product
                                </a>
                            </li>
                            <li class="nav-item mt-3">
                                <a class="nav-link {{ request()->is('admin/logout') ? 'active' : '' }}" id="logout"
                                    href="{{ url('admin/logout') }}">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-9 col-lg-10 main-content">
                <div class="top-bar d-flex justify-content-between align-items-center">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                            checked>
                        <label class="form-check-label" for="mySwitch">Dark Mode</label>
                    </div>
                    <div>
                        <span>Babar</span>
                        <span>Admin</span>
                        <img src="https://placehold.co/40x40" alt="Admin profile picture" style="border-radius: 50%;">
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var alert = document.getElementById('errorAlert');
            if (alert) {
                // Thêm lớp để hiển thị thông báo
                alert.classList.add('show-alert');

                // Tự động ẩn sau 5 giây
                setTimeout(function() {
                    alert.classList.remove('show-alert');
                    // Thêm hiệu ứng ẩn dần nếu cần
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 500);
                }, 5000);
            }
        });
    </script>
</body>

</html>
