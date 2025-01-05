<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
    public function login()
    {
        return view('pages.login');
    }
    public function register()
    {
        return view('pages.register');
    }
    public function check_login(Request $req)
    {
        // Nếu người dùng đã đăng nhập
        if (Auth::check()) {
            return view('pages.home'); // Chuyển hướng đến trang chính
        }

        // Khai báo các quy ràng buộc xác thực
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
        $messages = [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ];

        // Kiểm tra các ràng buộc đầu vào
        $req->validate($rules, $messages);

        // Tìm người dùng dựa trên email
        $user = DB::table('users')->where('email', $req->email)->first();

        // Nếu người dùng tồn tại và mật khẩu khớp
        if ($user && Hash::check($req->password, $user->password)) {
            Auth::loginUsingId($user->id); // Đăng nhập
            return redirect('home')->with('message', 'Đăng nhập thành công');
        }

        // Nếu không tìm thấy người dùng hoặc mật khẩu không đúng
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
    }

    public function check_register(Request $req)
    {
        // Khai báo các quy tắc xác thực
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ];

        // Customize thông báo lỗi
        $messages = [
            'name.required' => 'Tên không được để trống',
            'name.string' => 'Tên phải là chuỗi ký tự hợp lệ',
            'name.max' => 'Tên không được vượt quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã được sử dụng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
        ];

        // Xác thực dữ liệu người dùng
        $validator = Validator::make($req->all(), $rules, $messages);

        // Nếu xác thực thất bại, trả về lỗi
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Lỗi khi đăng ký người dùng',
                'errors' => $validator->errors()
            ], 400); // Trả về mã lỗi 400 cho bad request
        }

        // Thử thực hiện thao tác insert và kiểm tra lỗi
        try {
            // Thêm người dùng vào cơ sở dữ liệu
            $userId = DB::table('users')->insertGetId([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
            ]);
            return redirect()->back()->with('message', 'Đăng ký thành công');
        } catch (QueryException $e) {
            // Xử lý lỗi nếu có khi thực hiện insert
            return redirect()->back()->with('error', 'Đã có lỗi xảy ra');
        }

        // Đăng nhập người dùng ngay sau khi đăng ký thành công
        Auth::loginUsingId($user->id);

        // Chuyển hướng về trang chủ
        return redirect('/');
    }
    public function account()
    {
        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Lấy các đơn hàng của người dùng hiện tại
        $orders = DB::table('orders')->where('user_id', $user->id)->get();

        // Lấy thông tin các order_item và product cho từng đơn hàng
        foreach ($orders as $order) {
            $order->items = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('order_items.order_id', $order->id)
            ->select('order_items.*', 'products.name as product_name', 'products.price as product_price')
            ->get();
        }

        // Trả về view với thông tin người dùng và các đơn hàng
        return view('pages.account', ['user' => $user, 'orders' => $orders]);
    }
    public function update(Request $request)
    {
        // Lấy user hiện tại bằng Eloquent
        $user = User::find(Auth::id());

        // Kiểm tra nếu user tồn tại
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone;
            $user->address = $request->address;

            // Lưu thông tin mới
            $user->save();
        }

        return redirect()->back()->with('message', 'Cập nhật thông tin thành công');
    }
}
