<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Furniro</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .navbar {
            padding: 20px 50px;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 24px;
        }

        .nav-link {
            font-weight: 500;
            font-size: 16px;
            color: #222;
            margin-left: 30px;
        }

        .nav-link:hover {
            color: #222;
        }

        .banner {
            background-image: url(https://placehold.co/1400x400/EAE1D7/EAE1D7?text=Banner);
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #333;
        }

        .banner h1 {
            font-weight: 600;
            font-size: 48px;
            margin-bottom: 20px;
        }

        .banner p {
            font-weight: 500;
            font-size: 18px;
        }

        .cart-table {
            padding: 50px;
        }

        .cart-table th {
            background-color: #F7F4EE;
            padding: 20px;
            font-weight: 600;
            font-size: 18px;
        }

        .cart-table td {
            padding: 20px;
            font-weight: 500;
            font-size: 16px;
        }

        .cart-table .product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .cart-totals {
            background-color: #F7F4EE;
            padding: 30px;
            margin-left: 50px;
        }

        .cart-totals h3 {
            font-weight: 600;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .cart-totals .total-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .cart-totals .total-item span {
            font-weight: 500;
            font-size: 18px;
        }

        .cart-totals .total-item .price {
            font-weight: 600;
        }

        .cart-totals button {
            background-color: #E7C985;
            color: #222;
            font-weight: 600;
            font-size: 18px;
            padding: 10px 30px;
            border: none;
            width: 100%;
        }

        .features {
            background-color: #F7F4EE;
            padding: 50px;
            text-align: center;
        }

        .features .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .features .feature-item i {
            font-size: 36px;
            margin-right: 20px;
            color: #222;
        }

        .features .feature-item .feature-text {
            text-align: left;
        }

        .features .feature-item h4 {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .features .feature-item p {
            font-weight: 500;
            font-size: 16px;
            color: #555;
        }

        .footer {
            padding: 50px;
            background-color: #fff;
        }

        .footer h2 {
            font-weight: 600;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .footer .info {
            font-weight: 500;
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
        }

        .footer .links h4 {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .footer .links a {
            display: block;
            font-weight: 500;
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
            text-decoration: none;
        }

        .footer .links a:hover {
            text-decoration: underline;
        }

        .footer .newsletter input {
            padding: 10px;
            border: 1px solid #ccc;
            margin-right: 10px;
            width: 200px;
        }

        .footer .newsletter button {
            background-color: #222;
            color: #fff;
            font-weight: 600;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
        }

        .copyright {
            padding: 20px 50px;
            background-color: #fff;
            text-align: center;
            font-weight: 500;
            font-size: 16px;
            color: #555;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src="https://placehold.co/30x30?text=Logo" alt="Furniro Logo" width="30" height="30"
                class="d-inline-block align-top">
            Furniro
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            <a href="#" class="nav-link"><i class="fas fa-user"></i></a>
            <a href="#" class="nav-link"><i class="fas fa-search"></i></a>
            <a href="#" class="nav-link"><i class="fas fa-heart"></i></a>
            <a href="#" class="nav-link"><i class="fas fa-shopping-cart"></i></a>
        </div>
    </nav>

    <div class="banner">
        <img src="https://placehold.co/100x40?text=Logo" alt="Furniro Logo" width="100" height="40">
        <h1>Cart</h1>
        <p>Home <i class="fas fa-angle-right"></i> Cart</p>
    </div>

    <div class="container cart-table">
        <div class="row">
            <div class="col-md-7">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="https://placehold.co/80x80?text=Product+Image"
                                    alt="Image of a modern sofa with wooden legs and blue cushions" class="product-img">
                                Asgaard sofa
                            </td>
                            <td>25.000.000d</td>
                            <td>
                                <input type="number" class="form-control" value="1" style="width: 70px;">
                            </td>
                            <td>25.000.000d</td>
                            <td><i class="fas fa-trash"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 offset-md-1">
                <div class="cart-totals">
                    <h3>Cart Totals</h3>
                    <div class="total-item">
                        <span>Subtotal</span>
                        <span class="price">25.000.000d</span>
                    </div>
                    <div class="total-item">
                        <span>Total</span>
                        <span class="price">25.000.000d</span>
                    </div>
                    <button>Check Out</button>
                </div>
            </div>
        </div>
    </div>

    <div class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="feature-item">
                        <i class="fas fa-trophy"></i>
                        <div class="feature-text">
                            <h4>High Quality</h4>
                            <p>crafted from top materials</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <div class="feature-text">
                            <h4>Warranty Protection</h4>
                            <p>Over 2 years</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-item">
                        <i class="fas fa-shipping-fast"></i>
                        <div class="feature-text">
                            <h4>Free Shipping</h4>
                            <p>Order over 150 $</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-item">
                        <i class="fas fa-headset"></i>
                        <div class="feature-text">
                            <h4>24 / 7 Support</h4>
                            <p>Dedicated support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2>Furniro.</h2>
                    <p class="info">400 University Drive Suite 200 Coral Gables,<br>FL 33134 USA</p>
                </div>
                <div class="col-md-3 links">
                    <h4>Links</h4>
                    <a href="#">Home</a>
                    <a href="#">Shop</a>
                    <a href="#">About</a>
                    <a href="#">Contact</a>
                </div>
                <div class="col-md-3 links">
                    <h4>Help</h4>
                    <a href="#">Payment Options</a>
                    <a href="#">Returns</a>
                    <a href="#">Privacy Policies</a>
                </div>
                <div class="col-md-3 newsletter">
                    <h4>Newsletter</h4>
                    <input type="email" placeholder="Enter Your Email Address">
                    <button>SUBSCRIBE</button>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <p>2023 furino. All rights reverved</p>
    </div>
</body>

</html>
