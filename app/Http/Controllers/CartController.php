<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Carts as Cart;
use App\Models\Products as Product;


class CartController extends Controller
{
    public function getCart(Request $req)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!Auth::check()) {
            return redirect('login')->with('message', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng');
        }

        // Lấy ID người dùng đăng nhập
        $userId = Auth::id();

        // Lấy giỏ hàng của người dùng từ bảng carts
        $cartItems = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->select(
                'carts.id',
                'products.id as product_id',
                'products.name as product_name',
                'products.sale_price',
                'carts.quantity',
                'products.image_url',
                DB::raw('products.sale_price * carts.quantity as total_price')
            )
            ->get();

        // Tổng tiền của giỏ hàng
        $totalAmount = $cartItems->sum('total_price');

        return view('pages.cart', [
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount,
        ]);
    }
    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::find($id);
        if ($cartItem) {
            // Cập nhật số lượng
            $cartItem->quantity = $request->quantity;
            $cartItem->save();

            // Tính toán subtotal mới
            $newSubtotal = $cartItem->quantity * $cartItem->product->sale_price;

            // Tính toán tổng tiền mới của giỏ hàng
            $totalAmount = Cart::where('user_id', $cartItem->user_id)
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->sum(DB::raw('products.sale_price * carts.quantity'));

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật thành công',
                'new_subtotal' => $newSubtotal,
                'total' => $totalAmount,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại']);
    }



    public function delete($id)
    {
        $cartItem = Cart::find($id);
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['success' => true, 'message' => 'Xóa sản phẩm thành công']);
        }
        return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại']);
    }

    public function add(Request $request, $id)
    {
        // Kiểm tra xem sản phẩm có tồn tại không
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại'], 404);
        }

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->back()->with(['message' => 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng']);
        }

        // Xác định người dùng hiện tại
        $userId = Auth::id();

        // Lấy thông tin số lượng từ request (mặc định là 1 nếu không có)
        $quantity = $request->input('quantity', 1);

        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
            Cart::create([
            'user_id' => $userId,
            'product_id' => $id,
            'quantity' => $quantity,
            ]);
        }

        return redirect('cart')->with('message', 'Thêm sản phẩm vào giỏ hàng thành công');
    }
}
