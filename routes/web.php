<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/', [HomeController::class, 'home']);


Route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

//Categories

route::get('view_category', [AdminController::class, 'view_category']);
route::post('add_category', [AdminController::class, 'add_category']);
route::get('delete_category/{id}', [AdminController::class, 'delete_category']);
route::get('edit_category/{id}', [AdminController::class, 'edit_category']);
route::post('update_category/{id}', [AdminController::class, 'update_category']);

// Products

route::get('add_product', [AdminController::class, 'add_product']);
route::post('upload_product', [AdminController::class, 'upload_product']);
route::get('view_product', [AdminController::class, 'view_product']);
route::get('delete_product/{id}', [AdminController::class, 'delete_product']);
route::get('edit_product/{id}', [AdminController::class, 'edit_product']);
route::post('update_product/{id}', [AdminController::class, 'update_product']);
route::get('product_search', [AdminController::class, 'product_search']);



route::get('product_detail/{id}', [HomeController::class, 'product_detail']);

// cart
route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);
route::get('mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified']);

//order
route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified']);
route::get('view_order', [AdminController::class, 'view_order'])->middleware(['auth', 'admin']);
route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->middleware(['auth', 'admin']);
route::get('order_delivered/{id}', [AdminController::class, 'order_delivered'])->middleware(['auth', 'admin']);
route::get('order_canceled/{id}', [AdminController::class, 'order_canceled'])->middleware(['auth', 'admin']);

//pdf
route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->middleware(['auth', 'admin']);

// my order
Route::get('/myorders', [HomeController::class, 'myorders'])->middleware(['auth', 'verified']);
