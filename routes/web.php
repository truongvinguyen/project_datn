<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;


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
    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');   
    Route::post('update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete'); 
    
});
//thương hiệu
Route::prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('brands.index');
    Route::get('create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('store', [BrandController::class, 'store'])->name('brands.store'); 
    Route::get('edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');   
    Route::post('update/{id}', [BrandController::class, 'update'])->name('brands.update');
    Route::get('delete/{id}', [BrandController::class, 'delete'])->name('brands.delete');   
});
//bài viết
Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('store', [ArticleController::class, 'store'])->name('articles.store');    
    Route::get('edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit'); 
    Route::post('update/{id}', [ArticleController::class, 'update'])->name('articles.update');  
    Route::get('delete/{id}', [ArticleController::class, 'delete'])->name('articles.delete');   
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
Route::get('/cart/view-cart',[App\Http\Controllers\CartController::class,'showCart'])->name('cart.viewcart');
Route::get('/delete-list-cart/{id}',[App\Http\Controllers\CartController::class,'delete_item_list_cart'])->name('');
Route::get('/delete-all-cart',[App\Http\Controllers\CartController::class,'delete_all_cart'])->name('');
Route::get('/save-cart-item/{id}/{quanty}',[App\Http\Controllers\CartController::class,'save_cart'])->name('');

Route::get('/', [App\Http\Controllers\showDataController::class, 'home_page'])->name('');
Route::get('/product-grid', [App\Http\Controllers\showDataController::class, 'product_grid'])->name('');
Route::get('/product-list', [App\Http\Controllers\showDataController::class, 'product_list'])->name('');
Route::get('/quickview/{id}', [App\Http\Controllers\showDataController::class, 'quickview'])->name('');