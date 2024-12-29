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

        .cart-totals a {
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

        .features {
            background-color: #F7F4EE;
            padding-top: 50px;
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
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td>
                                    <img src="{{ $item->image_url }}"
                                        alt="Image of a modern sofa with wooden legs and blue cushions" class="product-img">
                                    {{ $item->product_name }}
                                </td>
                                <td>{{ number_format($item->price, 0, ',', '.') }}đ</td>
                                <td>
                                    <input type="number" class="form-control" value="{{ $item->quantity }}" min="1"
                                        style="width: 70px;" data-product-id="{{ $item->id }}">
                                </td>
                                <td>{{ number_format($item->total_price, 0, ',', '.') }}đ</td>
                                <td><i class="fas fa-trash text-danger" style="cursor: pointer;"
                                        data-product-id="{{ $item->id }}"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($cartItems->isEmpty())
                    <div class="text-center my-5">
                        <p style="font-size: 18px; font-weight: 600;">Giỏ hàng của bạn đang trống.</p>
                        <a href="{{ route('pages.shop') }}" class="btn btn-primary">Mua sắm ngay</a>
                    </div>
                @endif
            </div>
            <div class="col-md-4 offset-md-1">
                <div class="cart-totals">
                    <h3>Cart Totals</h3>
                    <div class="total-item">
                        <span>Subtotal</span>
                        <span class="price">{{ number_format($totalAmount, 0, ',', '.') }}đ</span>
                    </div>
                    <div class="total-item">
                        <span>Total</span>
                        <span class="price">{{ number_format($totalAmount, 0, ',', '.') }}đ</span>
                    </div>
                    <a href="payment">Check Out</a>
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
    <script>
        document.querySelectorAll('.fa-trash').forEach(icon => {
            icon.addEventListener('click', function() {
                const productId = this.dataset.productId;

                fetch(`cart/delete/${productId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload(); // Tải lại trang
                        } else {
                            alert(data.message);
                        }
                    });
            });
        });
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('change', function() {
                const productId = this.dataset.productId; // Thêm data-product-id vào input
                const newQuantity = this.value;

                fetch(`cart/update/${productId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            quantity: newQuantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload(); // Tải lại trang để cập nhật giỏ hàng
                        } else {
                            alert(data.message);
                        }
                    });
            });
        });
    </script>
@endsection
