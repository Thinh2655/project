<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            color: #333;
        }
        .navbar {
            background-color: #FCF8F3;
            padding: 1rem 0;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        .nav-link {
            color: #333;
            font-weight: 500;
            margin-right: 20px;
        }
        .product-section {
            padding: 3rem 0;
            background-color: #FCF8F3;
        }
        .product-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
        }
        .thumbnail-images {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            cursor: pointer;
        }
        .product-details {
            margin-top: 20px;
        }
        .product-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .product-price {
            font-size: 1.5rem;
            font-weight: 500;
            margin-bottom: 10px;
        }
        .rating {
            color: #ffc107;
            margin-bottom: 10px;
        }
        .size-options .btn, .color-options .btn {
            margin-right: 10px;
            margin-bottom: 10px;
        }
        .quantity-input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
        }
        .add-to-cart-btn, .compare-btn {
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: 500;
            margin-right: 10px;
        }
        .add-to-cart-btn {
            background-color: #fff;
            border: 1px solid #333;
        }
        .compare-btn {
            background-color: #fff;
            border: 1px solid #333;
        }
        .product-info {
            margin-top: 20px;
        }
        .product-info p {
            margin-bottom: 5px;
        }
        .product-info a {
            color: #333;
            text-decoration: none;
        }
        .product-description {
            padding: 3rem 0;
        }
        .description-tabs {
            margin-bottom: 20px;
        }
        .description-tabs .nav-link {
            color: #333;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 20px;
        }
        .description-tabs .nav-link.active {
            background-color: #c89f49;
            color: #fff;
        }
        .tab-content {
            background-color: #FCF8F3;
            padding: 20px;
            border-radius: 10px;
        }
        .related-products {
            padding: 3rem 0;
        }
        .related-products-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .related-product-card {
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
        .show-more-btn {
            background-color: #c89f49;
            color: #fff;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: 500;
            border: none;
        }
        .footer {
            background-color: #FCF8F3;
            padding: 3rem 0;
        }
        .footer-brand {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .footer-links {
            list-style: none;
            padding: 0;
        }
        .footer-links li {
            margin-bottom: 10px;
        }
        .footer-links a {
            color: #333;
            text-decoration: none;
        }
        .newsletter-input {
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 10px;
            margin-right: 10px;
        }
        .subscribe-btn {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
        }
        .copyright {
            text-align: center;
            margin-top: 20px;
        }
        .color-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid #ccc;
            margin-right: 10px;
            cursor: pointer;
        }
        .color-purple {
            background-color: #6f42c1;
        }
        .color-black {
            background-color: #000;
        }
        .color-gold {
            background-color: #c89f49;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Furniro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
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
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-heart"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="product-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="https://placehold.co/500x400" alt="Asgaard sofa" class="product-image">
                    <div class="thumbnail-images">
                        <img src="https://placehold.co/80x80" alt="Asgaard sofa thumbnail 1" class="thumbnail">
                        <img src="https://placehold.co/80x80" alt="Asgaard sofa thumbnail 2" class="thumbnail">
                        <img src="https://placehold.co/80x80" alt="Asgaard sofa thumbnail 3" class="thumbnail">
                        <img src="https://placehold.co/80x80" alt="Asgaard sofa thumbnail 4" class="thumbnail">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <h1 class="product-title">Asgaard sofa</h1>
                        <p class="product-price">25.000.000₫</p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5 Customer Review</span>
                        </div>
                        <p>Setting the bar as one of the loudest speakers in its class, the Kilburn is a compact, stout-hearted hero with a well-balanced audio which boasts a clear midrange and extended highs for a sound.</p>
                        <div class="size-options">
                            <p>Size</p>
                            <button class="btn btn-outline-secondary">L</button>
                            <button class="btn btn-outline-secondary">XL</button>
                            <button class="btn btn-outline-secondary">XS</button>
                        </div>
                        <div class="color-options">
                            <p>Color</p>
                            <div class="d-flex">
                                <div class="color-circle color-purple"></div>
                                <div class="color-circle color-black"></div>
                                <div class="color-circle color-gold"></div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-outline-secondary">-</button>
                            <input type="text" value="1" class="quantity-input">
                            <button class="btn btn-outline-secondary">+</button>
                            <button class="add-to-cart-btn">Add To Cart</button>
                            <button class="compare-btn">+ Compare</button>
                        </div>
                        <div class="product-info">
                            <p>SKU: SS001</p>
                            <p>Category: Sofas</p>
                            <p>Tags: <a href="#">Sofa</a>, <a href="#">Chair</a>, <a href="#">Home</a>, <a href="#">Shop</a></p>
                            <p>Share: 
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-description">
        <div class="container">
            <ul class="nav nav-tabs description-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#description">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#additional-info">Additional Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#reviews">Reviews [5]</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="description">
                    <p>Embodying the raw, wayward spirit of rock ‘n’ roll, the Kilburn portable active stereo speaker takes the unmistakable look and sound of Marshall, unplugs the chords, and takes the show on the road.</p>
                    <p>Weighing in under 7 pounds, the Kilburn is a lightweight piece of vintage styled engineering. Setting the bar as one of the loudest speakers in its class, the Kilburn is a compact, stout-hearted hero with a well-balanced audio which boasts a clear midrange and extended highs for a sound that is both articulate and pronounced. The analogue knobs allow you to fine tune the controls to your personal preferences while the guitar-influenced leather strap enables easy and stylish travel.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="https://placehold.co/400x300" alt="Product description image 1" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <img src="https://placehold.co/400x300" alt="Product description image 2" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="additional-info">
                    <p>Additional information content goes here.</p>
                </div>
                <div class="tab-pane fade" id="reviews">
                    <p>Reviews content goes here.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="related-products">
        <div class="container">
            <h2 class="related-products-title">Related Products</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card related-product-card">
                        <div class="card-img-top">
                            <img src="https://placehold.co/400x200" alt="Dining table with a white tabletop and four white stools, with a chandelier above, in a white room" class="card-img-top">
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
                    <div class="card related-product-card">
                        <img src="https://placehold.co/400x200" alt="Stylish white chair with wooden legs" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Leviosa</h5>
                            <p class="card-text">Stylish cafe chair</p>
                            <span class="price">2.500.000₫</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card related-product-card">
                        <div class="card-img-top">
                            <img src="https://placehold.co/400x200" alt="Luxury big grey sofa in a white-walled room" class="card-img-top">
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
                    <div class="card related-product-card">
                        <div class="card-img-top">
                            <img src="https://placehold.co/400x200" alt="Outdoor bar table and stool in a living room with white brick walls and wooden floor" class="card-img-top">
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
            <div class="text-center mt-4">
                <button class="show-more-btn">Show More</button>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-brand">Furniro.</h4>
                    <p>400 University Drive Suite 200 Coral Gables,<br> FL 33134 USA</p>
                </div>
                <div class="col-md-3">
                    <h5 class="mb-3">Links</h5>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="mb-3">Help</h5>
                    <ul class="footer-links">
                        <li><a href="#">Payment Options</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Privacy Policies</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="mb-3">Newsletter</h5>
                    <div class="input-group">
                        <input type="email" class="form-control newsletter-input" placeholder="Enter Your Email Address">
                        <button class="btn subscribe-btn" type="button">SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>2023 furino. All rights reverved</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>