<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders as Order;
use App\Models\order_items as OrderItem;
use App\Models\Products as Product;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        // Tính tổng tiền
        $total = 0;
        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);
            $total += $product->sale_price * $item['quantity'];
        }

        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
        ]);

        // Lưu từng sản phẩm trong đơn hàng
        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->sale_price,
            ]);
        }

        return response()->json(['message' => 'Order placed successfully', 'order_id' => $order->id]);
    }
}
