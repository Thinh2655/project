<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products as Product;
use App\Models\Reviews;

class ProductController extends Controller
{
    // Hàm lấy danh sách sản phẩm với logic chung
    private function getProducts(Request $request, $view, $like = null)
    {
        $search = $request->search;
        $perPage = $request->input('per_page', 8); // Số lượng mặc định là 4
        $sort = $request->input('sort', 'created_at'); // Sắp xếp mặc định theo thời gian
        $sale_price = $request->input('sale_price', 'desc'); // Thứ tự mặc định là giảm dần
        $categoryId = $request->input('category_id'); // Lấy category_id từ yêu cầu

        $query = Product::query();

        // Nếu có tham số like, lọc theo like
        if (!is_null($like)) {
            $query->where('like', $like);
        }

        // Nếu có category_id, lọc theo danh mục
        if (!is_null($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        // Nếu có tham số tìm kiếm, lọc theo tên sản phẩm
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        // Sắp xếp theo trường sort, mặc định là created_at
        if ($sort == 'sale_price') {
            $query->orderBy('sale_price', $sale_price);  // Sắp xếp theo giá
        } else {
            $query->orderBy($sort, 'desc');  // Sắp xếp theo thời gian hoặc trường khác
        }

        // Lấy dữ liệu phân trang
        $products = $query->paginate($perPage);

        // Trả về view với dữ liệu sản phẩm
        return view($view, compact('products'));
    }

    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        // Lấy sản phẩm cùng với các review, user của review, reply và user của reply
        $product = Product::with(['review.user', 'review.replies.user', 'review.replies'])->findOrFail($id);

        // Tính tổng số review và reply
        $totalReviews = $product->review->count();
        $totalReplies = $product->review->sum(function ($review) {
            return $review->replies->count();
        });

        // Tính tổng số review và reply
        $totalReviewsAndReplies = $totalReviews + $totalReplies;

        // Trả về view với dữ liệu sản phẩm, reviews, replies và tổng số review + reply
        return view('pages.product', compact('product', 'totalReviewsAndReplies'));
    }

    public function addreview(Request $request)
    {
        $id = $request->product_id;

        // Kiểm tra người dùng đã đăng nhập
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated'
            ]);
        }

        // Xử lý thêm review cho sản phẩm
        $product = Product::findOrFail($id);

        // Tạo review mới
        $review = $product->review()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
            'rating' => 5,
        ]);

        // Trả về phản hồi thành công
        return response()->json([
            'success' => true,
            'username' => auth()->user()->name,
            'commentId' => $review->id,
            'message' => 'Review added successfully'
        ], 200);
    }

    public function addreplies(Request $request)
    {
        $reviewId = $request->review_id;

        // Kiểm tra người dùng đã đăng nhập
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated'
            ]);
        }

        // Xử lý thêm reply cho review
        $review = Reviews::findOrFail($reviewId);
        $review->replies()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        // Trả về phản hồi thành công
        return response()->json([
            'success' => true,
            'username' => auth()->user()->name,
            'message' => 'Reply added successfully'
        ], 200);
    }


    public function adminShow($id)
    {
        $product = DB::table('products')->where('id', $id)->get();
        return view('admin.product', compact('product'));
    }

    // Sản phẩm được thích
    public function like(Request $request)
    {
        return $this->getProducts($request, 'pages.shop', 1);
    }

    // Sản phẩm không được thích
    public function dislike(Request $request)
    {
        return $this->getProducts($request, 'pages.shop', 0);
    }

    // Tìm kiếm sản phẩm
    public function search(Request $request)
    {
        return $this->getProducts($request, 'pages.shop');
    }
}
