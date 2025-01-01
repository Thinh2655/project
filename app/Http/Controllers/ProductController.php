<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products as Product;

class ProductController extends Controller
{
    // Hàm lấy danh sách sản phẩm với logic chung
    private function getProducts(Request $request, $view, $like = null)
    {
        $search = $request->search;
        $perPage = $request->input('per_page', 2); // Số lượng mặc định là 2

        $query = Product::query();

        if (!is_null($like)) {
            $query->where('like', $like);
        }

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        $products = $query->paginate($perPage);
        return view($view, compact('products'));
    }

    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->get();
        return view('pages.product', compact('product'));
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

    // Tìm kiếm sản phẩm cho admin
    public function admin(Request $request)
    {
        return $this->getProducts($request, 'admin.products');
    }
}
