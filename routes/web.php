<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//quản lý sản phẩm
Route::get('add-new-product', [App\Http\Controllers\ProductController::class, 'add_product'])->name('');
Route::post('save-product', [App\Http\Controllers\ProductController::class, 'save_product'])->name('');
Route::get('edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('');
Route::post('/save-edit-product/{id}', [App\Http\Controllers\ProductController::class, 'edit_save'])->name('');
Route::get('/product-detail/{id}-{product_name}', [App\Http\Controllers\ProductController::class, 'product_detail'])->name('');
Route::get('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('');
Route::get('product', [App\Http\Controllers\ProductController::class, 'index'])->name('');
//end quản lý sản phẩm


//tồm kho
Route::get('/view-inventory/{product_id}-{product_name}', [App\Http\Controllers\inventoryController::class, 'index'])->name('');
Route::post('/add-new-inventory', [App\Http\Controllers\inventoryController::class, 'add_new_inventory'])->name('');
Route::post('/update-inventory/{id}', [App\Http\Controllers\inventoryController::class, 'update_inventory'])->name('');
Route::get('/delete-inventory/{id}', [App\Http\Controllers\inventoryController::class, 'delete_inventory'])->name('');
//end tồn kho

//thành viên
Route::get('add-new-user', [App\Http\Controllers\UserController::class, 'form_add_user'])->name('');
Route::post('save-user', [App\Http\Controllers\UserController::class, 'save_user'])->name('');
Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('');
Route::get('/add-image-product/{product_id}/for={product_name}', [App\Http\Controllers\imageProductController::class, 'add_imageproduct'])->name('');
Route::post('/select-image', [App\Http\Controllers\imageProductController::class, 'select_image'])->name('');
Route::post('/insert-image-product/{product_id}', [App\Http\Controllers\imageProductController::class, 'insert_image_product'])->name('');
Route::post('/delete-image-product', [App\Http\Controllers\imageProductController::class, 'delete_image'])->name('');
//end thành viên

//danh mục
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('store', [CategoryController::class, 'store'])->name('categories.store');   
    
});
//thương hiệu
Route::prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('brands.index');
  
    
});
//layout


Route::get('/layout', function () {
    return view('layouts.client');
});

//chi tiết sản phẩm

Route::get('product-detail/{id}', [App\Http\Controllers\productDetail::class, 'index'])->name('');

//giỏ hàng
Route::get('/add-to-cart/{id}/{quantity}',[App\Http\Controllers\CartController::class,'add_to_cart'])->name('');
Route::get('/delete-item-cart/{id}',[App\Http\Controllers\CartController::class,'delete_item_cart'])->name('');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// login gg
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name("loginGg");
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
