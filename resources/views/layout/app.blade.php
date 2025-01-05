<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        header {
            position: fixed;
            min-width: 100%;
            z-index: 9999;
            top: 0;
        }

        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            background-color: #fff;
            padding: 1rem;
        }

        .navbar-nav .nav-link {
            color: #222;
            margin-right: 20px;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #b88e2f;
        }

        .navbar-icons i {
            color: #222;
            margin-left: 20px;
        }


        .footer {
            background-color: #f8f8f8;
            padding: 50px 0 20px 0;
            color: #555;
        }

        .footer-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #222;
            margin-bottom: 20px;
        }

        .footer-text {
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .footer-links a {
            display: block;
            font-size: 0.9rem;
            color: #555;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .footer-links a:hover {
            color: #b88e2f;
        }

        .footer-form input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .footer-form button {
            background-color: #222;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .footer-bottom {
            margin-top: 30px;
            font-size: 0.8rem;
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
    </style>
</head>

<body>
    @if (session('message'))
        <div class="alert alert-success fixed-alert" id="errorAlert">
            {{ session('message') }}
        </div>
    @endif
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="home">
                    <img src="https://placehold.co/50x30/EEE/313438&text=Logo" alt="Furniro Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/project">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/project/shop">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact">Contact</a>
                        </li>
                    </ul>
                    <div class="navbar-icons">
                        @if (Auth::check())
                            <!-- Nếu người dùng đã đăng nhập -->
                            <a href="{{route('pages.account')}}"><i class="fas fa-user"></i></a>
                        @else
                            <!-- Nếu người dùng chưa đăng nhập -->
                            <a href="{{ route('pages.login') }}"><i class="fas fa-user"></i></a>
                        @endif
                        <!-- Nút bật tắt ô tìm kiếm -->
                        <a href="#" class="icon-button" id="search-button" onclick="toggleSearch()"><i
                                class="fas fa-search"></i></a>
                        <!-- Ô tìm kiếm -->
                        <input type="text" id="search-input" placeholder="Search..." style="display: none;"
                            name="search">
                        <a href="#"><i class="fas fa-heart"></i></a>
                        <a href="{{ route('pages.cart') }}"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    <!-- Footer Content -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="footer-title">Furniro.</h4>
                    <p class="footer-text">400 University Drive Suite 200 Coral Gables,<br>FL 33134 USA</p>
                </div>
                <div class="col-md-2">
                    <h4 class="footer-title">Links</h4>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4 class="footer-title">Help</h4>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#">Payment Options</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Privacy Policies</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4 class="footer-title">Newsletter</h4>
                    <form class="footer-form">
                        <input type="email" placeholder="Enter Your Email Address" required>
                        <button type="submit">SUBSCRIBE</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="footer-bottom text-center">
                <p>2023 furino. All rights reverved</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const header = document.querySelector("header");
            const main = document.querySelector("main");
            const headerHeight = header.offsetHeight; // Lấy chiều cao header
            main.style.marginTop = headerHeight + "px";
        });

        function toggleSearch() {
            var searchInput = document.getElementById('search-input');
            if (searchInput.style.display === 'none' || searchInput.style.display === '') {
                searchInput.style.display = 'inline';
            } else {
                searchInput.style.display = 'none';
            }
        }
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
        const searchInput = document.getElementById('search-input');
        const searchButton = document.getElementById('search-button');

        // Hàm gửi request
        function sendRequest() {
            const inputValue = searchInput.value.trim();
            if (inputValue === '') {
                return;
            }

            // Tạo URL với query string
            const url = `http://localhost/project/shop?search=${encodeURIComponent(inputValue)}`;
            window.location.href = url;
        }

        // Gửi request khi click button
        searchButton.addEventListener('click', sendRequest);

        // Gửi request khi nhấn Enter trong input
        searchInput.addEventListener('keydown', (event) => {
            if (event.key === 'Enter') {
                sendRequest();
            }
        });
    </script>
</body>

</html>
