@extends('admin.layout.app')

@section('title', 'Home Page')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .card {
            background: linear-gradient(145deg, #ffffff, #f3f3f3);
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px 15px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .icon-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #eaf4ff;
            color: #007bff;
            font-size: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .title-h5 {
            font-size: 1rem;
            font-weight: bold;
            color: #343a40;
        }

        .content-p {
            font-size: 1.25rem;
            font-weight: 600;
            color: #007bff;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            margin-top: -60px;
            border: 4px solid white;
        }

        .badge {
            font-size: 0.9rem;
            padding: 0.5em 0.7em;
        }

        .table thead th {
            background-color: #f1f3f5;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .recent-orders-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .recent-orders-header .icons {
            display: flex;
            gap: 10px;
        }
    </style>

    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card d-flex flex-row justify-content-between align-items-center">
                    <div>
                        <h5 class="title-h5">Earned</h5>
                        <p class="content-p">$1,250</p>
                    </div>
                    <div class="icon-circle">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card d-flex flex-row justify-content-between align-items-center">
                    <div>
                        <h5 class="title-h5">Hours logged</h5>
                        <p class="content-p">35.5 hrs</p>
                    </div>
                    <div class="icon-circle">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card d-flex flex-row justify-content-between align-items-center">
                    <div>
                        <h5 class="title-h5">Avg. time</h5>
                        <p class="content-p">2:55 hrs</p>
                    </div>
                    <div class="icon-circle">
                        <i class="fas fa-stopwatch"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card d-flex flex-row justify-content-between align-items-center">
                    <div>
                        <h5 class="title-h5">Weekly growth</h5>
                        <p class="content-p">14.5%</p>
                    </div>
                    <div class="icon-circle">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <!-- Profile Card -->
            <div class="col-md-4">
                <div class="card text-center p-3">
                    <div class="card-body">
                        <img src="https://picsum.photos/id/2/400/200" alt="bg Image" class="w-100">
                        <img src="https://via.placeholder.com/120" alt="User Image" class="profile-img">
                        <h5 class="mt-3">John Williams</h5>
                        <p class="text-muted">James is a long-standing customer with a passion for technology.</p>
                        <hr>
                        <p><strong>Company:</strong> TechPinnacle Solutions</p>
                        <p><strong>Phone:</strong> (202) 555-0126</p>
                        <p><strong>Location:</strong> San Francisco, CA</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-4 gap-1">
                    <a href="#" class="btn btn-primary btn-sm w-50 p-2">Call</a>
                    <a href="#" class="btn btn-outline-secondary btn-sm w-50 p-2">Message</a>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="col-md-8">
                <div class="">
                    <!-- Recent Orders Header -->
                    <div class="recent-orders-header">
                        <h4>Recent Orders</h4>
                        <div class="icons">
                            <button class="btn btn-secondary btn-sm me-2"><i class="fas fa-filter"></i></button>
                            <button class="btn btn-secondary btn-sm"><i class="fas fa-sort-alpha-down"></i></button>
                        </div>
                    </div>
                    <!-- Recent Orders Table -->
                    <table class="table table-light table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#3456</td>
                                <td>Apple MacBook Pro</td>
                                <td>2021-08-12</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>$2,499</td>
                            </tr>
                            <tr>
                                <td>#3455</td>
                                <td>Apple iPhone 12 Pro</td>
                                <td>2021-08-11</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                <td>$1,099</td>
                            </tr>
                            <tr>
                                <td>#3454</td>
                                <td>Apple AirPods Pro</td>
                                <td>2021-08-10</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                <td>$249</td>
                            </tr>
                            <tr>
                                <td>#3453</td>
                                <td>Apple Watch Series 6</td>
                                <td>2021-08-09</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>$399</td>
                            </tr>
                            <tr>
                                <td>#3452</td>
                                <td>Apple iPad Pro</td>
                                <td>2021-08-08</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                                <td>$799</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
