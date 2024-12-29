<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

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
            return redirect()->back()->with('message', 'Đăng nhập thành công');
        }

        // Nếu không tìm thấy người dùng hoặc mật khẩu không đúng
        return response()->json(['message' => 'Email hoặc mật khẩu không chính xác'], 401);
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
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Thử thực hiện thao tác insert và kiểm tra lỗi
        try {
            // Thêm người dùng vào cơ sở dữ liệu
            $userId = DB::table('users')->insertGetId([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
            ]);

            // Nếu thêm thành công, trả về phản hồi thành công
            return response()->json([
                'message' => 'Đăng ký thành công',
                'user_id' => $userId
            ], 201);
        } catch (QueryException $e) {
            // Xử lý lỗi nếu có khi thực hiện insert
            return response()->json([
                'message' => 'Lỗi khi đăng ký người dùng',
                'error' => $e->getMessage()
            ], 500); // Trả về mã lỗi 500 cho server error
        }

        // Đăng nhập người dùng ngay sau khi đăng ký thành công
        Auth::loginUsingId($user->id);

        return response()->json(['message' => 'Đăng ký thành công'], 201);
    }
}
