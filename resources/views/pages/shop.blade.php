@extends('layout.app')

@section('title', 'Home Page')

@section('content')
    @php
        $currentPerPage = request('per_page', 16); // 16 là mặc định nếu không có giá trị
    @endphp
    <style>
        .hero {
            background-image: url(https://placehold.co/1400x400/EEE/313438&text=Hero+Image);
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 100px 0;
            position: relative;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #b88e2f;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: #222;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .filter-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-button {
            background-color: transparent;
            border: none;
            font-size: 14px;
            color: #000;
            cursor: pointer;
        }

        .filter-icon {
            margin-right: 10px;
            font-size: 1.5rem;
        }

        .view-options {
            margin-left: 10px;
        }

        .view-icon {
            font-size: 1.5rem;
            color: #000;
            margin-right: 5px;
            cursor: pointer;
        }

        .separator {
            margin: 0 10px;
            color: #777;
        }

        .results-info {
            font-size: 14px;
            color: #000;
            margin-left: auto;
        }

        .show-sort-container {
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        .show-label,
        .sort-label {
            font-size: 14px;
            color: #000;
            margin-right: 10px;
        }

        .show-input,
        .sort-input {
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            color: #777;
            width: 80px;
        }

        .card {
            margin-bottom: 20px;
            background-color: #f4f5f7;
            position: relative;
        }

        .card-img-top {
            width: 100%;
            object-fit: cover;
            position: relative;
        }

        .discount-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #F05454;
            color: white;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 12px;
        }

        .new-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #2596be;
            color: white;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 12px;
        }

        .card-title {
            font-weight: bold;
            margin-top: 10px;
        }

        .card-text {
            color: #777;
        }

        .price {
            font-weight: bold;
            font-size: 18px;
        }

        .original-price {
            text-decoration: line-through;
            color: #777;
            font-size: 14px;
            margin-left: 5px;
        }

        .page-link {
            color: #333;
            border: 1px solid #ccc;
            margin: 0 5px;
        }

        .page-link:hover {
            background-color: #eee;
        }

        .page-item.active .page-link {
            background-color: #c89f49;
            border-color: #c89f49;
            color: #fff;
        }

        /* css filter */
        .filter-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            border-radius: 5px;
        }

        .filter-left {
            display: flex;
            align-items: center;
        }

        .filter-right {
            display: flex;
            align-items: center;
        }

        .btn-outline-secondary {
            border: 1px solid #ced4da;
            color: #495057;
        }

        .btn-outline-secondary:hover {
            background-color: #e9ecef;
        }

        .dropdown-toggle::after {
            margin-left: 0.5em;
            vertical-align: 0.15em;
        }

        .filter-options {
            margin-top: 10px;
            padding: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #fff;
        }

        .feature {
            text-align: center;
        }

        .icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .feature-text {
            font-size: 1rem;
        }

        .feature-subtext {
            color: gray;
            font-size: 0.9rem;
        }

        .text-decoration-none {
            text-decoration: none;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card:hover .overlay {
            opacity: 1;
        }

        .new-item-icons i {
            color: #fff;
            margin: 0 5px;
        }
    </style>
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <h1 class="hero-title">Trang chủ</h1>
            <p class="hero-subtitle">Home</p>
        </div>
    </section>
    <div class="container-fluid" style="background-color: #faf0e6;">
        <div class="container p-0">
            <div class="filter-bar">
                <div class="filter-left">
                    <button class="btn btn-outline-secondary btn-sm me-2" id="filterButton">
                        <i class="bi bi-filter"></i> Filter
                    </button>
                    <button class="btn btn-outline-secondary btn-sm" id="gridButton">
                        <i class="bi bi-grid" id="list-grid"></i>
                    </button>
                    <span class="ms-3">Showing 1–16 of 32 results</span>
                </div>
                <div class="filter-right">
                    <span class="me-2">Show</span>
                    <div class="dropdown me-2">
                        <button class="btn btn-light dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ $currentPerPage }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.shop', array_merge(request()->query(), ['per_page' => 8])) }}">8</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.shop', array_merge(request()->query(), ['per_page' => 16])) }}">16</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.shop', array_merge(request()->query(), ['per_page' => 32])) }}">32</a>
                            </li>
                        </ul>
                    </div>
                    <span class="me-2">Sort by</span>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Default
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.shop', array_merge(request()->query(), ['sort' => 'created_at'])) }}">Newest</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.shop', array_merge(request()->query(), ['sale_price' => 'asc', 'sort' => 'sale_price'])) }}">Price:
                                    Low to High</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.shop', array_merge(request()->query(), ['sale_price' => 'desc', 'sort' => 'sale_price'])) }}">Price:
                                    High to Low</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="filter-options container" id="filterOptions" style="display: none;">
        <h5>Filter Options</h5>
        <div class="mb-3">
            <label for="categoryFilter" class="form-label">Category</label>
            <select class="form-select" id="categoryFilter">
                <option value="">All</option>
                <option value="11">Electronics</option>
                <option value="2">Clothing</option>
                <option value="3">Smartphone</option>
            </select>
            <label for="priceFilter" class="form-label">Price</label>
            <select class="form-select" id="priceFilter">
                <option value="">All</option>
                <option value="0-100">0 - 100₫</option>
                <option value="100-500">100 - 500₫</option>
                <option value="500-1000">500 - 1000₫</option>
            </select>
            <label for="brandFilter" class="form-label">Brand</label>
            <select class="form-select" id="brandFilter">
                <option value="">All</option>
                <option value="brand1">Brand 1</option>
                <option value="brand2">Brand 2</option>
                <option value="brand3">Brand 3</option>
            </select>
        </div>
        <button class="btn btn-primary btn-sm" id="applyFiltersButton">Apply Filters</button>
    </div>
    <div class="mb-5"></div>
    <div class="container">
        @if ($products->isEmpty())
            <div class="row">
                <div class="col-12">
                    <p class="text-center">No products available.</p>
                </div>
            </div>
        @else
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 mb-3 col-sm-6">
                        <div class="card h-100">
                            <div class="card-img-top img">
                                <img src="{{ $product->image_url }}" alt="lỗi ảnh" class="card-img-top img">
                                <span class="discount-badge">-30%</span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ \Illuminate\Support\Str::limit($product->name, 40) }}</h5>
                                <p class="card-text flex-grow-1">{{ \Illuminate\Support\Str::limit($product->description, 70) }}</p>
                                <div>
                                    <span class="price">{{ $product->sale_price }}₫</span>
                                    <span class="original-price">{{ $product->price }}₫</span>
                                </div>
                            </div>
                            <div class="overlay">
                                <a href="{{ route('product.show', ['id' => $product->id]) }}"
                                    class="btn btn-light mb-3">View</a>
                                <div>
                                    <a href="#" class="new-item-icons" onclick="openShareTab()"><i
                                            class="fas fa-share-alt"></i></a>
                                    <a href="#" class="new-item-icons"><i class="far fa-heart"></i></a>
                                    <a href="cart/add/{{ $product->id }}" class="new-item-icons add-cart"
                                        data-product-id="{{ $product->id }}"><i class="bi bi-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        {{-- <div class="row">
            @foreach ($product as $product)
                <div class="col-12 mb-3 grid-view">
                    <a href="{{ route('product.show', ['id' => $product->id]) }}">
                        <div class="card h-100 d-flex flex-row" id="card">
                            <div class="card-img-left">
                                <img src="{{ $product->image_url }}" alt="Hình ảnh sản phẩm {{ $product->name }}"
                                    class="card-img-left">
                                <span class="discount-badge">-30%</span>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text flex-grow-1">{{ Str::limit($product->description, 120) }}</p>
                                <div class="price-section">
                                    <span class="price">{{ $product->sale_price }}₫</span>
                                    <span class="original-price">{{ $product->price }}₫</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>   --}}
        <!-- Hiển thị phân trang -->
        <div class="justify-content-center">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <div class="container-fluid py-5" style="background-color: #faf0e6;">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 feature">
                    <div class="icon">🏆</div>
                    <h5 class="feature-text">High Quality</h5>
                    <p class="feature-subtext">crafted from top materials</p>
                </div>
                <div class="col-md-3 feature">
                    <div class="icon">✅</div>
                    <h5 class="feature-text">Warranty Protection</h5>
                    <p class="feature-subtext">Over 2 years</p>
                </div>
                <div class="col-md-3 feature">
                    <div class="icon">📦</div>
                    <h5 class="feature-text">Free Shipping</h5>
                    <p class="feature-subtext">Order over 150 $</p>
                </div>
                <div class="col-md-3 feature">
                    <div class="icon">🎧</div>
                    <h5 class="feature-text">24 / 7 Support</h5>
                    <p class="feature-subtext">Dedicated support</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        const filterButton = document.getElementById('filterButton');
        const filterOptions = document.getElementById('filterOptions');
        const gridButton = document.getElementById('gridButton');
        const gridView = document.getElementById('gridView');

        filterButton.addEventListener('click', () => {
            filterOptions.style.display = filterOptions.style.display === 'none' ? 'block' : 'none';
        });
        document.getElementById('gridButton').addEventListener('click', function() {
            const toggleClasses = (elements, removeClasses, addClasses) => {
                elements.forEach(element => {
                    element.classList.remove(...removeClasses);
                    element.classList.add(...addClasses);
                });
            };

            const updateDescription = (elements) => {
                elements.forEach(element => {
                    const descriptionElement = element.querySelector('p.card-text');
                    if (descriptionElement) {
                        const description = descriptionElement.textContent;
                        descriptionElement.textContent = description.length > 120 ? description
                            .substring(0, 120) + '...' : description;
                    }
                });
            };

            if (document.querySelector('.col-lg-3')) {
                toggleClasses(document.querySelectorAll('div.col-lg-3.col-md-4.mb-3.col-sm-6'), ['col-lg-3',
                    'col-md-4', 'col-sm-6'
                ], ['col-12', 'grid-view']);
                toggleClasses(document.querySelectorAll('div.card.h-100'), [], ['d-flex', 'flex-row']);
                toggleClasses(document.querySelectorAll('.card-img-top.img'), ['card-img-top', 'img'], [
                    'card-img-left', 'h-100'
                ]);
                toggleClasses(document.querySelectorAll('div.card-body.d-flex.flex-column'), [], [
                    'justify-content-between'
                ]);
                updateDescription(document.querySelectorAll('div.card-body.d-flex.flex-column'));
                toggleClasses(document.querySelectorAll('div.card-body div'), [], ['price-section']);
                document.getElementById('list-grid').classList.remove('bi-grid');
                document.getElementById('list-grid').classList.add('bi-list-ul');
            } else {
                toggleClasses(document.querySelectorAll('div.col-12.grid-view'), ['col-12', 'grid-view'], [
                    'col-lg-3', 'col-md-4', 'col-sm-6'
                ]);
                toggleClasses(document.querySelectorAll('div.card.h-100'), ['d-flex', 'flex-row'], []);
                toggleClasses(document.querySelectorAll('.card-img-left'), ['card-img-left', 'h-100'], [
                    'card-img-top',
                    'img'
                ]);
                toggleClasses(document.querySelectorAll('div.card-body.d-flex.flex-column'), [
                    'justify-content-between'
                ], []);
                updateDescription(document.querySelectorAll('div.card-body.d-flex.flex-column'));
                toggleClasses(document.querySelectorAll('div.card-body div'), ['price-section'], []);
                document.getElementById('list-grid').classList.remove('bi-list-ul');
                document.getElementById('list-grid').classList.add('bi-grid');
            }
        });
        document.querySelectorAll('.add-cart').forEach(icon => {
            icon.addEventListener('click', function() {
                const productId = this.dataset.productId;

                fetch(`cart/add/${productId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Thêm vào giỏ hàng thành công');
                        } else {
                            alert(data.message);
                        }
                    });
            });
        });

        function openShareTab() {
            if (navigator.share) {
                navigator.share({
                    title: 'Chia sẻ trang',
                    text: 'Mời bạn chia sẻ trang này',
                    url: window.location.href
                }).then(() => {
                    console.log('Chia sẻ thành công');
                }).catch((error) => {
                    console.log('Có lỗi xảy ra trong khi chia sẻ: ', error);
                });
            } else {
                alert('Trình duyệt của bạn không hỗ trợ chia sẻ');
            }
        }
        //Filter
        document.getElementById('applyFiltersButton').addEventListener('click', function() {
            const category = document.getElementById('categoryFilter').value;
            const price = document.getElementById('priceFilter').value;
            const brand = document.getElementById('brandFilter').value;

            const queryParams = new URLSearchParams(window.location.search);
            if (category) queryParams.set('category', category);
            if (price) queryParams.set('price', price);
            if (brand) queryParams.set('brand', brand);

            window.location.search = queryParams.toString();
        });
    </script>
@endsection
