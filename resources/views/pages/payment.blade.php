@extends('layout.app')

@section('title', 'Home Page')

@section('content')
    <style>
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
            display: block;
            background-color: #E7C985;
            color: #222;
            font-weight: 600;
            font-size: 18px;
            padding: 10px 30px;
            border: none;
            width: 100%;
            text-align: center;
            text-decoration: none;
        }
        .place-order-btn:hover {
            background-color: #F7D6A3;
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
    </style>
    <div class="banner">
        <img src="https://placehold.co/100x40?text=Logo" alt="Furniro Logo" width="100" height="40">
        <h1>Checkout</h1>
        <p>Home <i class="fas fa-angle-right"></i> Checkout</p>
    </div>
    <form action="payment" method="post">
        @csrf
        <div class="container checkout-form">
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-md-7">
                        <h3>Billing details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" value="{{ $user->name }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label" required>Last Name</label>
                                <input type="text" class="form-control" id="lastName">
                            </div>
                        </div>
                        <label for="companyName" class="form-label">Company Name (Optional)</label>
                        <input type="text" class="form-control" id="companyName">
                        <label for="country" class="form-label">Country / Region</label>
                        <select class="form-select" id="country">
                            <option>Indonesia</option>
                            <option>Malaysia</option>
                            <option>Thailand</option>
                            <option selected>Vietnam</option>
                            <option>Philippines</option>
                            <option>Singapore</option>
                            <option>Myanmar</option>
                            <option>Brunei</option>
                            <option>Laos</option>
                            <option>Cambodia</option>
                        </select>
                        <label for="townCity" class="form-label">Town / City</label>
                        <input type="text" class="form-control" id="townCity">
                        <label for="streetAddress" class="form-label">Street address</label>
                        <input type="text" class="form-control" id="streetAddress"
                            placeholder="House number and street name" value="{{ $user->address }}" required>
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
                        <input type="text" class="form-control" id="phone" value="{{ $user->phone_number }}"
                            required>
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="{{ $user->email }}" required
                            readonly>
                        <label for="additionalInfo" class="form-label">Additional information</label>
                        <textarea class="form-control" id="additionalInfo" rows="3"
                            placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                    </div>
                @endforeach

                <div class="col-md-5">
                    <div class="product-summary">
                        <h4>Product</h4>
                        @foreach ($carts as $cart)
                            <div class="item">
                                <span>{{ $cart->product->name }} <i class="fas fa-times"></i> {{ $cart->quantity }}</span>
                                <span>{{ number_format($cart->product->sale_price, 0, ',', '.') }}đ</span>
                            </div>
                        @endforeach
                        <div class="item">
                            <span>Subtotal</span>
                            <input type="number" name="total_price" hidden value="{{ $total_price }}">
                            <span>{{ number_format($total_price, 0, ',', '.') }}đ</span>
                        </div>
                        <div class="total">
                            <span>Total</span>
                            <span>{{ number_format($total_price, 0, ',', '.') }}đ</span>
                        </div>
                        <div class="payment-methods">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="directBankTransfer"
                                    checked>
                                <label class="form-check-label" for="directBankTransfer">
                                    Direct Bank Transfer
                                </label>
                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment
                                    reference. Your order will not be shipped until the funds have cleared in our account.
                                </p>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod"
                                    id="directBankTransfer2">
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
                            <p>Your personal data will be used to support your experience throughout this website, to manage
                                access to your account, and for other purposes described in our <a href="#">privacy
                                    policy.</a></p>
                            <button class="place-order-btn">Place order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

@endsection
