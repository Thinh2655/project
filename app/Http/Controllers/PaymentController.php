<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_items;
use App\Models\Carts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
    public function index(Request $request)
    {
        // Lấy tất cả các sản phẩm trong giỏ hàng của người dùng
        $carts = Carts::where('user_id', auth()->user()->id)->get();
        $total_price = 0;

        // Nếu là request POST và có dữ liệu sản phẩm từ form
        if ($request->isMethod('post') && $request->has('products')) {
            $selectedProducts = $request->input('products', []);

            // Lọc giỏ hàng theo các sản phẩm được chọn
            $carts = $carts->filter(function ($cart) use ($selectedProducts) {
                return in_array($cart->product_id, $selectedProducts);
            });

            // Tính tổng giá dựa trên các sản phẩm được chọn
            foreach ($carts as $cart) {
                $total_price += $cart->product->sale_price * $cart->quantity;
            }
        } else {
            // Nếu không phải POST hoặc không có sản phẩm chọn, tính tổng giá của tất cả sản phẩm trong giỏ hàng
            foreach ($carts as $cart) {
                $total_price += $cart->product->price * $cart->quantity;
            }
        }

        $user = Auth::user();

        // Trả về view với dữ liệu cần thiết
        return view('pages.payment', compact('carts', 'total_price', 'user'));
    }

    public function payment(Request $request)
    {
        $input = $request->all();
        $input['status'] = 'pending';
        $input['total_price'] = $input['total_price'];
        $input['user_id'] = auth()->user()->id;
        $order = orders::create($input);
        $cart = Carts::where('user_id', auth()->user()->id)->get();
        foreach ($cart as $c) {
            $input['order_id'] = $order->id;
            $input['product_id'] = $c->product_id;
            $input['quantity'] = $c->quantity;
            order_items::create($input);
            $c->delete();
        }
        return redirect()->route('pages.shop')->with('message', 'Đặt hàng thành công');
    }
    public function history()
    {
        $orders = orders::where('user_id', auth()->user()->id)->get();
        return view('history', compact('orders'));
    }
}
