<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::get('home', [HomeController::class, 'index'])->name('pages.home');

Route::get('/product', function () {
    return view('pages.product');
});

Route::get('login', [HomeController::class, 'login'])->name('pages.login');
Route::post('login', [HomeController::class, 'check_login']);

Route::get('/logout', function () {
    Auth::logout(); // Đăng xuất người dùng
    return redirect('/'); // Chuyển hướng về trang chủ hoặc trang bất kỳ
});

Route::get('register', [HomeController::class, 'register'])->name('pages.register');
Route::post('register', [HomeController::class, 'check_register']);

Route::post('checkout', [PaymentController::class, 'index'])->name('pages.checkout');
Route::post('payment', [PaymentController::class, 'payment'])->name('pages.payment');

Route::get('categories', [CategoryController::class, 'index'])->name('pages.category');

Route::get('cart', [CartController::class, 'getCart'])->name('pages.cart');
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('shop', [ProductController::class, 'search'])->name('pages.shop');

Route::get('account', function () {
    return view('pages.account');
})->name('pages.account');

Route::get('admin', function () {
    return view('admin.dashboard');
});
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('admin/login', function () {
    return view('admin.login');
});
Route::get('admin/register', function () {
    return view('admin.register');
});
Route::get('admin/customers', function () {
    return view('admin.customers');
});
Route::get('admin/customer', function () {
    return view('admin.customer');
});
Route::get('admin/analytics', function () {
    return view('admin.analytics');
});
Route::get('admin/messages', function () {
    return view('admin.messages');
});
Route::get('admin/orders', function () {
    return view('admin.orders');
});
Route::get('admin/settings', function () {
    return view('admin.settings');
});
Route::get('admin/products',[ProductController::class, 'admin'])->name('admin.product');
Route::get('admin/product/{id}', [ProductController::class, 'adminShow'])->name('admin.product.show');