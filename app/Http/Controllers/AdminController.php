<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders as Order;
use App\Models\order_items as OrderItem;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Tính thời gian 24 giờ trước
        $twentyFourHoursAgo = now()->subDay();

        // Tổng số tiền đơn hàng toàn bộ
        $totalOrderAmountAll = Order::sum('total_price');
        // Tổng số tiền đơn hàng trong 24 giờ qua
        $totalOrderAmount = Order::where('created_at', '>=', $twentyFourHoursAgo)->sum('total_price');

        // Số lượng đơn hàng toàn bộ
        $orderCountAll = Order::count();
        // Số lượng đơn hàng trong 24 giờ qua
        $orderCount = Order::where('created_at', '>=', $twentyFourHoursAgo)->count();

        // Tổng số lượng sản phẩm đã bán toàn bộ
        $totalProductsSoldAll = OrderItem::sum('quantity');
        // Tổng số lượng sản phẩm đã bán trong 24 giờ qua
        $totalProductsSold = OrderItem::whereHas('order', function ($query) use ($twentyFourHoursAgo) {
            $query->where('created_at', '>=', $twentyFourHoursAgo);
        })->sum('quantity');

        // Tổng số người dùng toàn bộ
        $userCountAll = User::count();
        // Số lượng người dùng mới trong 24 giờ qua
        $newUserCount = User::where('created_at', '>=', $twentyFourHoursAgo)->count();

        $top3RecentOrders = Order::with(['user', 'orderItems'])  // Nạp thông tin người dùng và sản phẩm
        ->where('created_at', '>=', $twentyFourHoursAgo)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        // Tính phần trăm so với tổng số toàn bộ
        $totalOrderAmountPercent = $totalOrderAmountAll ? ($totalOrderAmount / $totalOrderAmountAll) * 100 : 0;
        $orderCountPercent = $orderCountAll ? ($orderCount / $orderCountAll) * 100 : 0;
        $totalProductsSoldPercent = $totalProductsSoldAll ? ($totalProductsSold / $totalProductsSoldAll) * 100 : 0;
        $newUserCountPercent = $userCountAll ? ($newUserCount / $userCountAll) * 100 : 0;

        return view('admin.dashboard', compact(
            'totalOrderAmount',
            'totalOrderAmountPercent',
            'orderCount',
            'orderCountPercent',
            'totalProductsSold',
            'totalProductsSoldPercent',
            'userCountAll',
            'newUserCount',
            'newUserCountPercent',
            'top3RecentOrders'
        ));
    }

    public function customers(){
        $users = User::paginate(10); // Phân trang với 10 người dùng mỗi trang
        return view('admin.customers', compact('users'));
    }

    public function login()
    {
        return view('admin.login');
    }
    public function register()
    {
        return view('admin.register');
    }
    public function check_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if ($email == 'admin') {
            if ($password == 'admin') {
                return redirect('admin');
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
        return redirect('login');
    }
}
