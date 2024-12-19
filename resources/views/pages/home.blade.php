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

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #222;
            text-align: center;
        }

        .new-item {
            position: relative;
            margin-bottom: 30px;
        }

        .new-item-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .new-item-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #b88e2f;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8rem;
        }

        .new-item-overlay {
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

        .new-item:hover .new-item-overlay {
            opacity: 1;
        }

        .new-item-button {
            background-color: #fff;
            color: #222;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .new-item-icons i {
            color: #fff;
            margin: 0 5px;
        }

        .new-item-title {
            font-size: 1.2rem;
            font-weight: 500;
            color: #222;
            margin-top: 10px;
        }

        .new-item-subtitle {
            font-size: 0.9rem;
            color: #555;
        }

        .new-item-price {
            font-size: 1rem;
            color: #b88e2f;
            font-weight: 500;
            margin-top: 5px;
        }

        .shop-item {
            margin-bottom: 30px;
        }

        .shop-item-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .blog-item {
            margin-bottom: 30px;
        }

        .blog-item-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .blog-item-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #222;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .blog-item-text {
            font-size: 0.9rem;
            color: #555;
        }

        .blog-item-link {
            font-size: 0.9rem;
            color: #222;
            text-decoration: none;
        }

        .blog-item-link i {
            margin-left: 5px;
        }

        .features {
            background-color: #faf3ea;
        }

        .feature {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            back
        }

        .feature-icon {
            font-size: 2rem;
            color: #b88e2f;
            margin-right: 20px;
        }

        .feature-text {
            font-size: 0.9rem;
            color: #555;
        }

        .feature-title {
            font-size: 1rem;
            font-weight: 700;
            color: #222;
            margin-bottom: 5px;
        }
    </style>

    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <h1 class="hero-title">Trang chủ</h1>
            <p class="hero-subtitle">Home</p>
        </div>
    </section>

    <section class="new">
        <div class="container">
            <h2 class="section-title">New</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="new-item">
                        <img src="https://placehold.co/400x250/EEE/313438&text=Syltherine"
                            alt="Syltherine - Stylish cafe chair" class="new-item-img">
                        <div class="new-item-badge">-30%</div>
                        <div class="new-item-overlay">
                            <button class="new-item-button">Add to cart</button>
                            <div>
                                <a href="#" class="new-item-icons"><i class="fas fa-share-alt"></i></a>
                                <a href="#" class="new-item-icons"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <h3 class="new-item-title">Syltherine</h3>
                        <p class="new-item-subtitle">Stylish cafe chair</p>
                        <p class="new-item-price">3.500.000₫</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="new-item">
                        <img src="https://placehold.co/400x250/EEE/313438&text=Leviosa" alt="Leviosa - Stylish cafe chair"
                            class="new-item-img">

                        <div class="new-item-overlay">
                            <button class="new-item-button">Add to cart</button>
                            <div>
                                <a href="#" class="new-item-icons"><i class="fas fa-share-alt"></i></a>
                                <a href="#" class="new-item-icons"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <h3 class="new-item-title">Leviosa</h3>
                        <p class="new-item-subtitle">Stylish cafe chair</p>
                        <p class="new-item-price">2.500.000₫</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="new-item">
                        <img src="https://placehold.co/400x250/EEE/313438&text=Lolito" alt="Lolito - Luxury big sofa"
                            class="new-item-img">
                        <div class="new-item-badge">-50%</div>
                        <div class="new-item-overlay">
                            <button class="new-item-button">Add to cart</button>
                            <div>
                                <a href="#" class="new-item-icons"><i class="fas fa-share-alt"></i></a>
                                <a href="#" class="new-item-icons"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <h3 class="new-item-title">Lolito</h3>
                        <p class="new-item-subtitle">Luxury big sofa</p>
                        <p class="new-item-price">14.000.000₫</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="new-item">
                        <img src="https://placehold.co/400x250/EEE/313438&text=Respira"
                            alt="Respira - Outdoor bar table and stool" class="new-item-img">
                        <div class="new-item-badge">New</div>
                        <div class="new-item-overlay">
                            <button class="new-item-button">Add to cart</button>
                            <div>
                                <a href="#" class="new-item-icons"><i class="fas fa-share-alt"></i></a>
                                <a href="#" class="new-item-icons"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <h3 class="new-item-title">Respira</h3>
                        <p class="new-item-subtitle">Outdoor bar table and stool</p>
                        <p class="new-item-price">5.000.000</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop">
        <div class="container">
            <h2 class="section-title">Shop</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="shop-item">
                        <img src="https://placehold.co/600x400/EEE/313438&text=Shop+Image+1" alt="Shop Image 1"
                            class="shop-item-img">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shop-item">
                        <img src="https://placehold.co/600x400/EEE/313438&text=Shop+Image+2" alt="Shop Image 2"
                            class="shop-item-img">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shop-item">
                        <img src="https://placehold.co/600x400/EEE/313438&text=Shop+Image+3" alt="Shop Image 3"
                            class="shop-item-img">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shop-item">
                        <img src="https://placehold.co/600x400/EEE/313438&text=Shop+Image+4" alt="Shop Image 4"
                            class="shop-item-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="container">
            <h2 class="section-title">BLOG</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="blog-item">
                        <img src="https://placehold.co/400x200/EEE/313438&text=Blog+Image+1" alt="Blog Image 1"
                            class="blog-item-img">
                        <h3 class="blog-item-title">THE ULTIMATE SOFA BUYING GUIDE</h3>
                        <a href="#" class="blog-item-link">

                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-item">
                        <img src="https://placehold.co/400x200/EEE/313438&text=Blog+Image+2" alt="Blog Image 2"
                            class="blog-item-img">
                        <h3 class="blog-item-title">A BEDROOM MUST HAVE SOME THING LIKE THIS</h3>
                        <p class="blog-item-text">Your level of comfort when geting into and out of bed can be greatly
                            influenced by the bed frame you choose. It may significantly affect how want your bedroom to
                            feet and look</p>
                        <a href="#" class="blog-item-link">
                            ABOUT
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-item">
                        <img src="https://placehold.co/400x200/EEE/313438&text=Blog+Image+3" alt="Blog Image 3"
                            class="blog-item-img">
                        <h3 class="blog-item-title">WHY IS A TV CONSOLE A MUST IN EVERY HOUSE</h3>
                        <p class="blog-item-text">People do a lot of research to make sure they purchase the ideal
                            televisoin. And like the rest of us, you want to keep that gorgeous flat srceen in your
                            living or bedroom on a table or stand</p>
                        <a href="#" class="blog-item-link">
                            ABOUT
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="feature">
                        <i class="fas fa-trophy feature-icon"></i>
                        <div>
                            <h4 class="feature-title">High Quality</h4>
                            <p class="feature-text">crafted from top materials</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature">
                        <i class="fas fa-check-circle feature-icon"></i>
                        <div>
                            <h4 class="feature-title">Warranty Protection</h4>
                            <p class="feature-text">Over 2 years</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature">
                        <i class="fas fa-shipping-fast feature-icon"></i>
                        <div>
                            <h4 class="feature-title">Free Shipping</h4>
                            <p class="feature-text">Order over 150 $</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature">
                        <i class="fas fa-headset feature-icon"></i>
                        <div>
                            <h4 class="feature-title">24 / 7 Support</h4>
                            <p class="feature-text">Dedicated support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
@endsection
