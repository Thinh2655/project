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
                        <p>Hello, <strong>username</strong> (not <strong>username</strong>? <a href="#">Log
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
                    <p>Hello, <strong>username</strong> (not <strong>username</strong>? <a href="#">Log out</a>)</p>
                    <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                  `;
                    break;
                case 'Orders':
                    contentArea.innerHTML = `
                    <h2>Orders</h2>
                    <p>No order has been made yet.</p>
                    <a href="shop" class="btn btn-primary">Go Shop</a>
                  `;
                    break;
                case 'Addresses':
                    contentArea.innerHTML = `
                    <h2>Addresses</h2>
                    <p>The following addresses will be used on the checkout page by default.</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Billing address</h4>
                            <p>You have not set up this type of address yet.</p>
                            <button class="btn btn-primary">Add</button>
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
    </script>
@endsection
