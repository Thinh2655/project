@extends('layout.app')

@section('title', 'Home Page')

@section('content')
    <style>
        body {
            font-family: 'Inter', sans-serif;
            color: #333;
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

        .size-options .btn,
        .color-options .btn {
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
        }

        .add-to-cart-btn,
        .compare-btn {
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

        .comment-card {
            border: 1px solid #eaeaea;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            transition: box-shadow 0.3s;
        }

        .comment-card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .avatar {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }

        .comment-author {
            font-weight: bold;
        }

        .comment-date {
            font-size: 0.875rem;
            color: #888;
        }

        .comment-body {
            margin-top: 10px;
        }

        .reply-card {
            border-left: 3px solid #e91e63;
            margin-left: 1.5rem;
            padding-left: 1rem;
            margin-top: 10px;
        }

        .btn-link {
            font-size: 0.875rem;
            text-decoration: none;
            color: #e91e63;
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        .like-count {
            margin-left: 5px;
            font-size: 0.875rem;
        }
    </style>

    @foreach ($product as $product)
        <section class="product-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://placehold.co/80x80" class="d-block w-100 product-image" alt="Product Image 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://placehold.co/80x80" class="d-block w-100 product-image" alt="Product Image 2">
                                </div>
                                <!-- Thêm nhiều mục carousel nếu cần -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="thumbnail-images">
                            <img src="https://placehold.co/80x80" alt="Asgaard sofa thumbnail 1" class="thumbnail">
                            <img src="https://placehold.co/80x80" alt="Asgaard sofa thumbnail 2" class="thumbnail">
                            <img src="https://placehold.co/80x80" alt="Asgaard sofa thumbnail 3" class="thumbnail">
                            <img src="https://placehold.co/80x80" alt="Asgaard sofa thumbnail 4" class="thumbnail">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $product->name }}</h1>
                            <p class="product-price">{{ $product->price }}₫</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>5 Customer Review</span>
                            </div>
                            <p>{{ $product->description }}</p>
                            <div class="size-options">
                                <p>Size</p>
                                <button class="btn btn-outline-secondary active">L</button>
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
                                <button class="btn btn-outline-secondary"
                                    onclick="document.querySelector('.quantity-input').value = parseInt(document.querySelector('.quantity-input').value, 10) - 1;">-</button>
                                <input type="text" value="1" class="quantity-input" min="1"
                                    oninput="validateInput(this)">
                                <button class="btn btn-outline-secondary"
                                    onclick="document.querySelector('.quantity-input').value = parseInt(document.querySelector('.quantity-input').value, 10) + 1;">+</button>
                                <a href="../cart/add/{{ $product->id }}" class="btn btn-dark me-2">Add To Cart</a>
                                <button class="btn btn-outline-dark">+ Compare</button>
                            </div>
                            <div class="product-info">
                                <p>SKU: SS001</p>
                                <p>Category: Sofas</p>
                                <p>Tags: <a href="#">Sofa</a>, <a href="#">Chair</a>, <a
                                        href="#">Home</a>, <a href="#">Shop</a></p>
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
    @endforeach

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
                    <p>Embodying the raw, wayward spirit of rock ‘n’ roll, the Kilburn portable active stereo
                        speaker takes the unmistakable look and sound of Marshall, unplugs the chords, and takes the
                        show on the road.</p>
                    <p>Weighing in under 7 pounds, the Kilburn is a lightweight piece of vintage styled engineering.
                        Setting the bar as one of the loudest speakers in its class, the Kilburn is a compact,
                        stout-hearted hero with a well-balanced audio which boasts a clear midrange and extended
                        highs for a sound that is both articulate and pronounced. The analogue knobs allow you to
                        fine tune the controls to your personal preferences while the guitar-influenced leather
                        strap enables easy and stylish travel.</p>
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
                    <div class="container mt-5">
                        <h4 class="mb-4">Đánh giá sản phẩm</h4>
                        <!-- Bình luận chính -->
                        <div class="comment-card">
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/40" class="avatar me-3" alt="User Avatar">
                                <div>
                                    <div class="comment-author">Nguyễn Văn A</div>
                                    <small class="comment-date">2 ngày trước</small>
                                </div>
                            </div>
                            <div class="comment-body">
                                <p>Sản phẩm rất tốt, tôi rất hài lòng!</p>
                            </div>
                            <div>
                                <button class="btn btn-link me-3" onclick="likeComment(this)">
                                    <i class="fas fa-heart"></i>
                                    <span class="like-count">0</span>
                                </button>
                                <button class="btn btn-link" onclick="replyComment(this)">Trả lời</button>
                            </div>
                            <div class="replies mt-3">
                                <!-- Các phản hồi sẽ được thêm vào đây -->
                                <div class="reply-card">
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="avatar me-3" alt="User Avatar">
                                        <div>
                                            <div class="comment-author">Trần Thị B</div>
                                            <small class="comment-date">1 ngày trước</small>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        <p>Tôi cũng nghĩ vậy. Đây là một sản phẩm tuyệt vời!</p>
                                    </div>
                                </div>
                                <div class="reply-card">
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="avatar me-3" alt="User Avatar">
                                        <div>
                                            <div class="comment-author">Lê Anh C</div>
                                            <small class="comment-date">1 ngày trước</small>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        <p>Thật đáng kinh ngạc!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bình luận chính khác -->
                        <div class="comment-card">
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/40" class="avatar me-3" alt="User Avatar">
                                <div>
                                    <div class="comment-author">Vũ Văn C</div>
                                    <small class="comment-date">3 ngày trước</small>
                                </div>
                            </div>
                            <div class="comment-body">
                                <p>Tôi có một số vấn đề với sản phẩm này.</p>
                            </div>
                            <div>
                                <button class="btn btn-link me-3" onclick="likeComment(this)">
                                    <i class="fas fa-heart"></i>
                                    <span class="like-count">0</span>
                                </button>
                                <button class="btn btn-link" onclick="replyComment(this)">Trả lời</button>
                            </div>
                            <div class="replies mt-3">
                                <!-- Các phản hồi sẽ được thêm vào đây -->
                            </div>
                        </div>
                    </div>
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
                    <div class="card related-product-card">
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
                    <div class="card related-product-card">
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
                    <div class="card related-product-card">
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
            <div class="text-center mt-4">
                <button class="show-more-btn">Show More</button>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        function validateInput(input) {
            // Kiểm tra nếu ô input bị trống
            if (input.value.trim() === "") {
                // Hiển thị cảnh báo khi ô trống
                alert("Ô nhập liệu không được để trống!");

                // Đặt lại giá trị của input về 1
                input.value = 1;
            }
            // Kiểm tra nếu giá trị không phải là số
            else if (isNaN(input.value)) {
                // Hiển thị cảnh báo khi người dùng nhập chữ
                alert("Vui lòng chỉ nhập số!");

                // Đặt lại giá trị của input về 1
                input.value = 1;
            }
        }
        //bình luận 
        function likeComment(btn) {
            const likeCountSpan = btn.querySelector('.like-count');
            let likeCount = parseInt(likeCountSpan.textContent);
            likeCount += 1;
            likeCountSpan.textContent = likeCount;
        }

        function replyComment(btn) {
            const commentCard = btn.closest('.comment-card');

            if (commentCard.querySelector('.reply-input')) {
                return;
            }

            const replyInput = document.createElement('input');
            replyInput.type = 'text';
            replyInput.placeholder = 'Nhập phản hồi của bạn...';
            replyInput.className = 'form-control mt-2 reply-input';

            const submitButton = document.createElement('button');
            submitButton.textContent = 'Gửi';
            submitButton.className = 'btn btn-primary btn-sm mt-2';
            submitButton.onclick = function() {
                const replyText = replyInput.value.trim();
                if (replyText) {
                    // Tạo một phản hồi mới
                    const newReply = document.createElement('div');
                    newReply.className = 'reply-card';
                    newReply.innerHTML = `
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/40" class="avatar me-3" alt="User Avatar">
                            <div>
                                <div class="comment-author">You</div>
                                <small class="comment-date">Vừa xong</small>
                            </div>
                        </div>
                        <div class="comment-body">
                            <p>${replyText}</p>
                        </div>
                    `;

                    // Thêm phản hồi mới vào danh sách
                    commentCard.querySelector('.replies').appendChild(newReply);

                    // Xóa ô nhập liệu
                    replyInput.remove();
                    submitButton.remove();
                }
            };

            commentCard.appendChild(replyInput);
            commentCard.appendChild(submitButton);
        }
    </script>
@endsection
