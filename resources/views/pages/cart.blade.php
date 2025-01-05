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

        .cart-totals button {
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

        .cart-totals button:hover {
            background-color: #F7D6A3;
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
                <form action="checkout" method="post" id="cart">
                    @csrf
                    @method('POST')
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr class="text-center align-middle">
                                    <td class="align-middle">
                                        <input type="checkbox" name="products[]" value="{{ $item->product_id }}">
                                    </td>
                                    <td style="position: relative;">
                                        <img src="{{ $item->image_url }}"
                                            alt="Image of a modern sofa with wooden legs and blue cushions"
                                            class="product-img">
                                        {{ $item->product_name }}
                                        <div class="position-absolute top-0 start-0" style="width: 100%; height: 100%;">
                                        </div>
                                    </td>
                                    <td>{{ number_format($item->sale_price, 0, ',', '.') }}đ</td>
                                    <td>
                                        <input type="number" class="form-control" value="{{ $item->quantity }}"
                                            min="1" style="width: 70px;" data-product-id="{{ $item->id }}">
                                    </td>
                                    <td>{{ number_format($item->total_price, 0, ',', '.') }}đ</td>
                                    <td><i class="fas fa-trash text-danger" style="cursor: pointer;"
                                            data-product-id="{{ $item->id }}"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>

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
                        <span>Subtotal:</span>
                        <span class="price" id="selectedTotal">0đ</span>
                    </div>
                    <div class="total-item">
                        <span>Tax (10%):</span>
                        <span class="price" id="tax">0đ</span>
                    </div>
                    <div class="total-item">
                        <span>Total:</span>
                        <span class="price" id="total">0đ</span>
                    </div>
                    <h3>Selected Total</h3>
                    <button type="submit" class="btn btn-primary" form="cart">Check Out</button>
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
                const row = this.closest('tr'); // Hàng chứa sản phẩm

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
                            row.remove(); // Xóa hàng sản phẩm khỏi bảng
                            updateTotals();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
            });
        });

        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('change', function() {
                const productId = this.dataset.productId;
                const newQuantity = parseInt(this.value);

                if (newQuantity < 1) {
                    alert('Số lượng phải lớn hơn 0');
                    this.value = 1;
                    return;
                }

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
                            const row = this.closest('tr');
                            row.querySelector('td:nth-child(5)').innerText =
                                `${new Intl.NumberFormat('vi-VN').format(data.new_subtotal)}đ`; // Cập nhật Subtotal
                            updateTotals();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
            });
        });

        //checkbox
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                updateTotals();
                toggleButtonState();
            });
        });

        // Hàm cập nhật tổng giá trị
        function updateTotals() {
            let selectedTotal = 0;
            document.querySelectorAll('input[type="checkbox"]:checked').forEach(checkedBox => {
                const row = checkedBox.closest('tr');
                const price = row.querySelector('td:nth-child(5)').innerText; // Lấy giá trị ở cột Subtotal
                selectedTotal += parseInt(price.replace(/[^\d]/g, '')); // Loại bỏ ký tự không phải số
            });

            const formattedTotal = new Intl.NumberFormat('vi-VN').format(selectedTotal);
            const formattedTax = new Intl.NumberFormat('vi-VN').format(selectedTotal / 10);
            const formattedFinalTotal = new Intl.NumberFormat('vi-VN').format(selectedTotal + selectedTotal / 10);

            document.getElementById('selectedTotal').innerText = `${formattedTotal}đ`;
            document.getElementById('tax').innerText = `${formattedTax}đ`;
            document.getElementById('total').innerText = `${formattedFinalTotal}đ`;
        }

        // Hàm làm mờ nút button khi không có checkbox nào được chọn
        function toggleButtonState() {
            const button = document.querySelector('.cart-totals button');
            const anyChecked = document.querySelectorAll('input[type="checkbox"]:checked').length > 0;
            if (anyChecked) {
                button.disabled = false;
                button.style.opacity = 1; // Khi có checkbox được chọn, làm rõ nút
            } else {
                button.disabled = true;
                button.style.opacity = 0.5; // Khi không có checkbox được chọn, làm mờ nút
            }
        }

        // Khởi tạo trạng thái của nút khi trang được tải
        toggleButtonState();
    </script>
@endsection
