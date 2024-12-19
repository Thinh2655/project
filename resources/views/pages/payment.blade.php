<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        .checkout-form {
            padding: 50px;
        }
        .checkout-form h3 {
            font-weight: 600;
            font-size: 24px;
            margin-bottom: 30px;
        }
        .form-label {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 10px;
        }
        .form-control {
            font-size: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .form-select {
            font-size: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .product-summary {
            padding: 30px;
            border: 1px solid #ccc;
        }
        .product-summary h4 {
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 20px;
        }
        .product-summary .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .product-summary .item span {
            font-weight: 500;
            font-size: 16px;
        }
        .product-summary .total {
            display: flex;
            justify-content: space-between;
            font-weight: 600;
            font-size: 18px;
            margin-top: 20px;
        }
        .payment-methods {
            margin-top: 30px;
        }
        .payment-methods .form-check-label {
            font-weight: 600;
            font-size: 16px;
        }
        .payment-methods p {
            font-size: 14px;
            color: #555;
            margin-top: 10px;
        }
        .place-order-btn {
            background-color: #fff;
            color: #222;
            font-weight: 600;
            font-size: 18px;
            padding: 10px 30px;
            border: 1px solid #222;
            margin-top: 20px;
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
            <img src="https://placehold.co/30x30?text=Logo" alt="Furniro Logo" width="30" height="30" class="d-inline-block align-top">
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
        <h1>Checkout</h1>
        <p>Home <i class="fas fa-angle-right"></i> Checkout</p>
    </div>

    <div class="container checkout-form">
        <div class="row">
            <div class="col-md-7">
                <h3>Billing details</h3>
                <div class="row">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName">
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName">
                    </div>
                </div>
                <label for="companyName" class="form-label">Company Name (Optional)</label>
                <input type="text" class="form-control" id="companyName">
                <label for="country" class="form-label">Country / Region</label>
                <select class="form-select" id="country">
                    <option selected>Sri Lanka</option>
                    <option>United States</option>
                    <option>United Kingdom</option>
                    <option>Canada</option>
                    <option>Australia</option>
                </select>
                <label for="streetAddress" class="form-label">Street address</label>
                <input type="text" class="form-control" id="streetAddress" placeholder="House number and street name">
                <input type="text" class="form-control" id="apartment" placeholder="Apartment, suite, unit etc. (optional)">
                <label for="townCity" class="form-label">Town / City</label>
                <input type="text" class="form-control" id="townCity">
                <label for="province" class="form-label">Province</label>
                <select class="form-select" id="province">
                    <option selected>Western Province</option>
                    <option>Central Province</option>
                    <option>Southern Province</option>
                    <option>Northern Province</option>
                    <option>Eastern Province</option>
                </select>
                <label for="zipCode" class="form-label">ZIP code</label>
                <input type="text" class="form-control" id="zipCode">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email">
                <label for="additionalInfo" class="form-label">Additional information</label>
                <textarea class="form-control" id="additionalInfo" rows="3" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
            </div>
            <div class="col-md-5">
                <div class="product-summary">
                    <h4>Product</h4>
                    <div class="item">
                        <span>Asgaard sofa <i class="fas fa-times"></i> 1</span>
                        <span>25.000.000d</span>
                    </div>
                    <div class="item">
                        <span>Subtotal</span>
                        <span>25.000.000d</span>
                    </div>
                    <div class="total">
                        <span>Total</span>
                        <span>250.00.000d</span>
                    </div>
                    <div class="payment-methods">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="directBankTransfer" checked>
                            <label class="form-check-label" for="directBankTransfer">
                                Direct Bank Transfer
                            </label>
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="directBankTransfer2">
                            <label class="form-check-label" for="directBankTransfer2">
                                Direct Bank Transfer
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="cashOnDelivery">
                            <label class="form-check-label" for="cashOnDelivery">
                                Cash On Delivery
                            </label>
                        </div>
                        <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#">privacy policy.</a></p>
                        <button class="place-order-btn">Place order</button>
                    </div>
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