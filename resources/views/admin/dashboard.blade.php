@extends('admin.layout.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #ffffff;
        }

        .bg-orange {
            background-color: #fd7e14;
        }

        .bg-purple {
            background-color: #6f42c1;
        }

        .bg-green {
            background-color: #20c997;
        }

        .bg-red {
            background-color: #dc3545;
        }

        .progress {
            height: 10px;
            margin-top: 10px;
        }

        .table {
            background-color: #ffffff;
        }

        .table th {
            background-color: #f8f9fa;
            color: #343a40;
        }

        .table td {
            color: #6c757d;
        }

        .table a {
            color: #6f42c1;
        }

        .recent-update-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .recent-update-item img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
    <div>
        <h2>Dashboard</h2>
        <div class="input-group mb-3">
            <input type="date" class="form-control" placeholder="mm/dd/yyyy" aria-label="Date"
                aria-describedby="basic-addon2">
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="icon-circle bg-orange">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div>
                                <h5 class="card-title">Total Sales</h5>
                                <p class="card-text">$25,024</p>
                                <p class="card-text"><small class="text-muted">Last 24 Hours</small></p>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 80%;" aria-valuenow="80"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="icon-circle bg-purple">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div>
                                <h5 class="card-title">New Orders</h5>
                                <p class="card-text">1,234</p>
                                <p class="card-text"><small class="text-muted">Last 24 Hours</small></p>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 70%;" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="icon-circle bg-green">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div>
                                <h5 class="card-title">Revenue</h5>
                                <p class="card-text">$12,345</p>
                                <p class="card-text"><small class="text-muted">Last 24 Hours</small></p>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-green" role="progressbar" style="width: 85%;" aria-valuenow="85"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="icon-circle bg-red">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <h5 class="card-title">New Users</h5>
                                <p class="card-text">567</p>
                                <p class="card-text"><small class="text-muted">Last 24 Hours</small></p>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-red" role="progressbar" style="width: 60%;" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="mt-4">Recent Orders</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Number</th>
                        <th>Payments</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mini USB</td>
                        <td>4563</td>
                        <td>Due</td>
                        <td><span style="color: purple">Pending</span></td>
                        <td><a href="#">Details</a></td>
                    </tr>
                    <tr>
                        <td>Mini USB</td>
                        <td>4563</td>
                        <td>Due</td>
                        <td><span style="color: purple">Pending</span></td>
                        <td><a href="#">Details</a></td>
                    </tr>
                    <tr>
                        <td>Mini USB</td>
                        <td>4563</td>
                        <td>Due</td>
                        <td><span style="color: purple">Pending</span></td>
                        <td><a href="#">Details</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <h3 class="mb-3">Recent Update</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="recent-update-item">
                            <img src="https://placehold.co/40x40" alt="User profile picture">
                            <div>
                                <span>Babar</span> Recived his order of USB
                            </div>
                        </div>
                        <div class="recent-update-item">
                            <img src="https://placehold.co/40x40" alt="User profile picture">
                            <div>
                                <span>Ali</span> Recived his order of USB
                            </div>
                        </div>
                        <div class="recent-update-item">
                            <img src="https://placehold.co/40x40" alt="User profile picture">
                            <div>
                                <span>Ramzan</span> Recived his order of USB
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="mb-3">Sales Analytics</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="icon-circle bg-orange">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div>
                                <h5 class="card-title">Onlion Orders</h5>
                                <p class="card-text">Last seen 2 Hours</p>
                                <p class="card-text">-17%</p>
                                <p class="card-text">3849</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="icon-circle bg-green">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div>
                                <h5 class="card-title">Onlion Orders</h5>
                                <p class="card-text">Last seen 2 Hours</p>
                                <p class="card-text">-17%</p>
                                <p class="card-text">3849</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
