<?php

use Illuminate\Support\Facades\Route;

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
Route::get("/", [App\Http\Controllers\HomeController::class, "index"])->name("home");

Route::get("/categories", [App\Http\Controllers\CategoryController::class,"index",])->name("categories");
Route::get("/categories/{id}", [App\Http\Controllers\CategoryController::class,"detail",])->name("categories-detail");

Route::get("/details/{id}", [App\Http\Controllers\DetailController::class,"index",])->name("details");

Route::get("/cart", [App\Http\Controllers\CartController::class,"index",])->name("cart");

Route::get("/success", [ App\Http\Controllers\CartController::class, "success",])->name("success");

Route::get("/register/success", [App\Http\Controllers\Auth\RegisterController::class, "success"])->name("register-success");

Route::get("/dashboard", [App\Http\Controllers\DashboardController::class,"index",])->name("dashboard");
Route::get("/dashboard/products", [App\Http\Controllers\DashboardProductController::class,"index",])->name("dashboard-product");
Route::get("/dashboard/products/create", [App\Http\Controllers\DashboardProductController::class,"create",])->name("dashboard-product-create");
Route::get("/dashboard/products/{id}", [App\Http\Controllers\DashboardProductController::class,"details",])->name("dashboard-product-details");
Route::get("/dashboard/transactions", [App\Http\Controllers\DashboardTransactionController::class,"index",])->name("dashboard-transactions");
Route::get("/dashboard/transactions/{id}", [App\Http\Controllers\DashboardTransactionController::class,"details",])->name("dashboard-transactions-details");
Route::get("/dashboard/settings", [App\Http\Controllers\DashboardSettingController::class,"index",])->name("dashboard-settings-store");
Route::get("/dashboard/account", [App\Http\Controllers\DashboardSettingController::class,"account",])->name("dashboard-settings-account");

//->midlleware({'auth','admin'})

Route::prefix('admin')
    ->namespace('Admin')
    ->group(function() {
    Route::get("/", [App\Http\Controllers\Admin\DashboardController::class,"index",])->name("admin-dashboard");
    Route::resource('category', '\App\Http\Controllers\Admin\CategoryController');
    Route::resource('user', '\App\Http\Controllers\Admin\UserController');
    Route::resource('product', '\App\Http\Controllers\Admin\ProductController');
    Route::resource('product-gallery', '\App\Http\Controllers\Admin\ProductGalleryController');
});
//Auth::routes();

