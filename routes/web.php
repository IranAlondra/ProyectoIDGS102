<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaypalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::view('/register', 'register');
Route::post("/login",[UserController::class,'login']);
Route::post("/register",[UserController::class,'register']);
Route::get("/",[ProductController::class,'index']);
Route::get("detail/{id}",[ProductController::class,'detail']);
Route::get("search",[ProductController::class,'search']);
Route::post("add_to_cart",[ProductController::class,'addToCart']);
Route::get("cartlist",[ProductController::class,'cartList']);
Route::get("removecart/{id}",[ProductController::class,'removeCart']);
Route::get("ordernow",[ProductController::class,'orderNow']);
Route::post("orderplace",[ProductController::class,'orderPlace']);
Route::get("myorders",[ProductController::class,'myOrders']);
Route::get("admin_products",[ProductController::class,'admin_products']);
Route::get("/admin_add_product",[ProductController::class,'admin_add_product']);
Route::post("/admin_store_product",[ProductController::class,'admin_store_product']);
Route::get("admin_edit_product/{id}",[ProductController::class,'admin_edit_product']);
Route::put("/admin_update_product/{id}",[ProductController::class,'admin_update_product']);
Route::get("/admin_delete_product/{id}",[ProductController::class,'admin_delete_product']);
Route::get("admin_users",[UserController::class,'admin_users']);
Route::get("/admin_add_user",[UserController::class,'admin_add_user']);
Route::post("/admin_store_user",[UserController::class,'admin_store_user']);
Route::get("admin_edit_user/{id}",[UserController::class,'admin_edit_user']);
Route::put("/admin_update_user/{id}",[UserController::class,'admin_update_user']);
Route::get("/admin_delete_user/{id}",[UserController::class,'admin_delete_user']);
Route::get('create-transaction', [PaypalController::class,'createTransaction'])->name('createTransaction');
Route::post("/process-transaction",[PaypalController::class,'processTransaction']);
Route::get("/success-transaction", [PaypalController::class,'successTransaction'])->name('successTransaction');
Route::get('/cancel-transaction',[PaypalController::class,'cancelTransaction'])->name('cancelTransaction');
Route::get('/users_excel',[UserController::class,'excel']);
Route::get('/users_pdf',[UserController::class,'PDF']);
Route::get('/products_excel',[ProductController::class,'excel']);
Route::get('/products_pdf',[ProductController::class,'PDF']);
Route::get('/cart_excel',[ProductController::class,'cart_excel']);
Route::get('/cart_pdf',[ProductController::class,'cart_PDF']);
Route::get('/orders_excel',[ProductController::class,'orders_excel']);
Route::get('/orders_pdf',[ProductController::class,'orders_PDF']);