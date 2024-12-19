@extends('layout.app')

@section('title', 'Home Page')

@section('content')
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
        body {
            background-color: #faf0e6;
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
        .show-label, .sort-label {
            font-size: 14px;
            color: #000;
            margin-right: 10px;
        }
        .show-input, .sort-input {
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            color: #777;
            width: 80px;
        }
        .card {
            border: none;
            margin-bottom: 20px;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
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

        .pagination {
            margin-top: 20px;
            justify-content: center;
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
    </style>
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <h1 class="hero-title">Trang chủ</h1>
            <p class="hero-subtitle">Home</p>
        </div>
    </section>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 filter-container">
                    <button class="filter-button">
                        <i class="fas fa-filter filter-icon"></i>
                        Filter
                    </button>
                    <div class="view-options">
                        <i class="fas fa-th view-icon"></i>
                        <i class="fas fa-list view-icon"></i>
                    </div>
                    <span class="separator">|</span>
                    <span class="results-info">Showing 1-16 of 32 results</span>
                    <div class="show-sort-container">
                        <span class="show-label">Show</span>
                        <input type="text" class="show-input" value="16">
                        <span class="sort-label">Sort by</span>
                        <input type="text" class="sort-input" value="Default">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-img-top">
                        <img src="https://placehold.co/400x200"
                            alt="Dining table with a white tabletop and four white stools, with a chandelier above, in a white room"
                            class="card-img-top">
                        <span class="discount-badge">-30%</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Syltherine</h5>
                        <p class="card-text">Stylish cafe chair</p>
                        <span class="price">2.500.000₫</span>
                        <span class="original-price">3.500.000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://placehold.co/400x200" alt="Stylish white chair with wooden legs" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Leviosa</h5>
                        <p class="card-text">Stylish cafe chair</p>
                        <span class="price">2.500.000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-img-top">
                        <img src="https://placehold.co/400x200" alt="Luxury big grey sofa in a white-walled room"
                            class="card-img-top">
                        <span class="discount-badge">-50%</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Lolito</h5>
                        <p class="card-text">Luxury big sofa</p>
                        <span class="price">7.000.000₫</span>
                        <span class="original-price">14.000.000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-img-top">
                        <img src="https://placehold.co/400x200"
                            alt="Outdoor bar table and stool in a living room with white brick walls and wooden floor"
                            class="card-img-top">
                        <span class="new-badge">New</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Respira</h5>
                        <p class="card-text">Outdoor bar table and stool</p>
                        <span class="price">5.000.000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-img-top">
                        <img src="https://placehold.co/400x200"
                            alt="Dining table with a white tabletop and four white stools, with a chandelier above, in a white room"
                            class="card-img-top">
                        <span class="discount-badge">-30%</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Syltherine</h5>
                        <p class="card-text">Stylish cafe chair</p>
                        <span class="price">2.500.000₫</span>
                        <span class="original-price">3.500.000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://placehold.co/400x200" alt="Stylish white chair with wooden legs" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Leviosa</h5>
                        <p class="card-text">Stylish cafe chair</p>
                        <span class="price">2.500.000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-img-top">
                        <img src="https://placehold.co/400x200" alt="Luxury big grey sofa in a white-walled room"
                            class="card-img-top">
                        <span class="discount-badge">-50%</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Lolito</h5>
                        <p class="card-text">Luxury big sofa</p>
                        <span class="price">7.000.000₫</span>
                        <span class="original-price">14.000.000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-img-top">
                        <img src="https://placehold.co/400x200"
                            alt="Outdoor bar table and stool in a living room with white brick walls and wooden floor"
                            class="card-img-top">
                        <span class="new-badge">New</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Respira</h5>
                        <p class="card-text">Outdoor bar table and stool</p>
                        <span class="price">5.000.000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-img-top">
                        <img src="https://placehold.co/400x200"
                            alt="Dining table with a white tabletop and four white stools, with a chandelier above, in a white room"
                            class="card-img-top">
                        <span class="discount-badge">-30%</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Syltherine</h5>
                        <p class="card-text">Stylish cafe chair</p>
                        <span class="price">2.500.000₫</span>
                        <span class="original-price">3.500.000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://placehold.co/400x200" alt="Stylish white chair with wooden legs"
                        class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Leviosa</h5>
                        <p class="card-text">Stylish cafe chair</p>
                        <span class="price">2.500.000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-img-top">
                        <img src="https://placehold.co/400x200" alt="Luxury big grey sofa in a white-walled room"
                            class="card-img-top">
                        <span class="discount-badge">-50%</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Lolito</h5>
                        <p class="card-text">Luxury big sofa</p>
                        <span class="price">7.000.000₫</span>
                        <span class="original-price">14.000.000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-img-top">
                        <img src="https://placehold.co/400x200"
                            alt="Outdoor bar table and stool in a living room with white brick walls and wooden floor"
                            class="card-img-top">
                        <span class="new-badge">New</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Respira</h5>
                        <p class="card-text">Outdoor bar table and stool</p>
                        <span class="price">5.000.000₫</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
