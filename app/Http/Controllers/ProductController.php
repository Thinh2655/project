<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products as Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->get();
        return view('pages.product', compact('product'));
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $perPage = $request->input('per_page', 2); // Số lượng mặc định là 2
        $products = Product::where('name', 'like', "%$search%")->paginate($perPage);
        return view('pages.shop', compact('products'));
    }
    public function like()
    {
        $product = DB::table('products')->where('like', 1)->get();
        return view('pages.shop', compact('product'));
    }
}
