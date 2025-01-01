@extends('admin.layout.app')

@section('title', 'Analytics')

@section('content')

    <style>
        .card-chart {
            padding: 20px;
        }
        .card {
            margin-top: 20px;
        }
        .stat-card {
            margin-bottom: 20px;
        }
    </style>
    <div class="container my-4">
        <div class="row">
            <div class="col-lg-3 col-md-6 stat-card">
                <div class="card bg-primary text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <h3 class="card-text"><i class="fas fa-users"></i> 1500</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 stat-card">
                <div class="card bg-success text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">Sales</h5>
                        <h3 class="card-text"><i class="fas fa-dollar-sign"></i> $3000</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 stat-card">
                <div class="card bg-warning text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">New Orders</h5>
                        <h3 class="card-text"><i class="fas fa-shopping-cart"></i> 100</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 stat-card">
                <div class="card bg-danger text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">Active Sessions</h5>
                        <h3 class="card-text"><i class="fas fa-signal"></i> 75</h3>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        Sales Overview
                    </div>
                    <div class="card-chart">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        User Activity
                    </div>
                    <div class="card-chart">
                        <canvas id="userActivityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        Top Products
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Product A <span class="badge bg-success float-end">$2000</span></li>
                        <li class="list-group-item">Product B <span class="badge bg-success float-end">$1500</span></li>
                        <li class="list-group-item">Product C <span class="badge bg-success float-end">$1200</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        Recent Registrations
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">User 1 <span class="float-end">2 hours ago</span></li>
                        <li class="list-group-item">User 2 <span class="float-end">1 day ago</span></li>
                        <li class="list-group-item">User 3 <span class="float-end">3 days ago</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        Sales Distribution
                    </div>
                    <div class="card-chart">
                        <canvas id="doughnutChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        User Engagement
                    </div>
                    <div class="card-chart">
                        <canvas id="radarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        Revenue vs Orders
                    </div>
                    <div class="card-chart">
                        <canvas id="mixedChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        User Demographics
                    </div>
                    <div class="card-chart">
                        <canvas id="scatterChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script>
        var ctxSales = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctxSales, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Sales',
                    data: [120, 190, 30, 50, 20, 30, 250],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxUserActivity = document.getElementById('userActivityChart').getContext('2d');
        var userActivityChart = new Chart(ctxUserActivity, {
            type: 'bar',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                datasets: [{
                    label: 'Active Users',
                    data: [12, 19, 3, 5, 2, 3, 7],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
        var doughnutChart = new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Product A', 'Product B', 'Product C'],
                datasets: [{
                    data: [2000, 1500, 1200],
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56'],
                }]
            },
            options: {
                responsive: true
            }
        });

        var ctxRadar = document.getElementById('radarChart').getContext('2d');
        var radarChart = new Chart(ctxRadar, {
            type: 'radar',
            data: {
                labels: ['Page Views', 'Clicks', 'Sign-Ups', 'Downloads', 'Feedback'],
                datasets: [{
                    label: 'User Engagement',
                    data: [65, 59, 90, 81, 56],
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    r: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxMixed = document.getElementById('mixedChart').getContext('2d');
        var mixedChart = new Chart(ctxMixed, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    type: 'line',
                    label: 'Revenue',
                    data: [300, 400, 300, 500, 400, 600, 700],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 1
                }, {
                    type: 'bar',
                    label: 'Orders',
                    data: [12, 19, 3, 5, 2, 3, 7],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxScatter = document.getElementById('scatterChart').getContext('2d');
        var scatterChart = new Chart(ctxScatter, {
            type: 'scatter',
            data: {
                datasets: [{
                    label: 'User Demographics',
                    data: [
                        { x: 18, y: 65 },
                        { x: 19, y: 59 },
                        { x: 20, y: 80 },
                        { x: 21, y: 81 },
                        { x: 22, y: 56 },
                        { x: 23, y: 55 },
                        { x: 24, y: 40 }
                    ],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom'
                    }
                }
            }
        });
    </script>

@endsection
