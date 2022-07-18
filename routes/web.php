<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Client\HomeController;
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



Auth::routes();

Route::get('/home-admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin/products')->group(function () {
    Route::get('/create', [App\Http\Controllers\ProductController::class, 'add_product'])->name('products.create');
    Route::post('/store', [App\Http\Controllers\ProductController::class, 'save_product'])->name('products.store');
    Route::get('edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::post('/update/{id}', [App\Http\Controllers\ProductController::class, 'edit_save'])->name('products.update');
    Route::get('/show/{id}', [App\Http\Controllers\ProductController::class, 'product_detail'])->name('products.show');
    Route::get('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('products.delete');
    Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
});


//tồn kho
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
Route::prefix('categories')->name('categories.')->group(function () {
    // Fetch
    Route::post('s/{col?}/{offset?}/{limit?}', [CategoryController::class, 'getSearchedRecords'])->name('search');

    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('detail/{id}', [CategoryController::class, 'detail'])->name('detail');
    Route::get('create', [CategoryController::class, 'create'])->name('create');
    Route::post('store', [CategoryController::class, 'store'])->name('store');
    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
});
//thương hiệu
Route::prefix('brands')->name('brands.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::get('detail/{id}', [BrandController::class, 'detail'])->name('detail');
    Route::get('create', [BrandController::class, 'create'])->name('create');
    Route::post('store', [BrandController::class, 'store'])->name('store');
    Route::get('edit/{id}', [BrandController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [BrandController::class, 'update'])->name('update');
    Route::get('delete/{id}', [BrandController::class, 'delete'])->name('delete');
});
//bài viết
Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('detail/{id}', [ArticleController::class, 'detail'])->name('detail');
    Route::get('create', [ArticleController::class, 'create'])->name('create');
    Route::post('store', [ArticleController::class, 'store'])->name('store');
    Route::get('edit/{id}', [ArticleController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [ArticleController::class, 'update'])->name('update');
    Route::get('delete/{id}', [ArticleController::class, 'delete'])->name('delete');
});
//layout


Route::get('/layout', function () {
    return view('layouts.client');
});

//chi tiết sản phẩm

Route::get('product-detail/{id}', [App\Http\Controllers\productDetail::class, 'index'])->name('');

//giỏ hàng
Route::get('/add-to-cart/{id}/{quantity}', [App\Http\Controllers\CartController::class, 'add_to_cart'])->name('');
Route::get('/delete-item-cart/{id}', [App\Http\Controllers\CartController::class, 'delete_item_cart'])->name('');
Route::get('/cart/view-cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('cart.viewcart');
Route::get('/delete-list-cart/{id}', [App\Http\Controllers\CartController::class, 'delete_item_list_cart'])->name('');
Route::get('/delete-all-cart', [App\Http\Controllers\CartController::class, 'delete_all_cart'])->name('');
Route::get('/save-cart-item/{id}/{quanty}', [App\Http\Controllers\CartController::class, 'save_cart'])->name('');
Route::post('/save-all-cart', [App\Http\Controllers\CartController::class, 'save_all_cart'])->name('');

// login
// Route::get('kich-hoat', [HomeController::class, 'getAcctiveAccount'])->name('getAcctiveAccount');
// Route::get('', [HomeController::class, 'index'])->route('home_client');
Route::get('dang-ky', [HomeController::class, "getRegister"])->name('dang-ky');
Route::post('dang-ky', [HomeController::class, "postRegister"])->name('submit-dang-ky');
Route::post('kich-hoat', [HomeController::class, "postActive"])->name('active');
Route::get('dang-nhap', [HomeController::class, "getlogin"])->name('getLogin');
Route::post('dang-nhap', [HomeController::class, "postLogin"])->name('postLogin');
Route::get('quen-mat-khau', [HomeController::class,"getForgotPass"])->name('getForgotPass');
Route::post('quen-mat-khau', [HomeController::class, "postForgotPass"])->name("postForgotPass");
Route::post('lay-ma-xac-thuc', [HomeController::class, "postGetCodeForgotPass"])->name('postGetCodeForgotPass');
Route::get('dang-xuat', [HomeController::class, "getLogout"])->name('getLogout');
Route::post('danh-gia', [HomeController::class, 'postReview'])->name('review');

Route::get('/', [App\Http\Controllers\showDataController::class, 'home_page'])->name('home_client');
Route::get('/product-grid', [App\Http\Controllers\showDataController::class, 'product_grid'])->name('');
Route::get('/product-list', [App\Http\Controllers\showDataController::class, 'product_list'])->name('');
Route::get('/quickview/{id}', [App\Http\Controllers\showDataController::class, 'quickview'])->name('');