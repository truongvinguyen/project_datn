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
Route::get('/product-detail/{id}', [App\Http\Controllers\ProductController::class, 'product_detail'])->name('');
Route::get('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('');

Route::get('product', [App\Http\Controllers\ProductController::class, 'index'])->name('');
//end quản lý sản phẩm
//tồm kho
Route::get('/view-inventory/{product_id}/{product_name}', [App\Http\Controllers\inventoryController::class, 'index'])->name('');
Route::post('/add-new-inventory', [App\Http\Controllers\inventoryController::class, 'add_new_inventory'])->name('');
//end tồn kho

//thành viên
//thêm thành viên
Route::get('add-new-user', [App\Http\Controllers\UserController::class, 'form_add_user'])->name('');
Route::post('save-user', [App\Http\Controllers\UserController::class, 'save_user'])->name('');
Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('');
Route::get('/add-image-product/{product_id}/for={product_name}', [App\Http\Controllers\imageProductController::class, 'add_imageproduct'])->name('');
Route::post('/select-image', [App\Http\Controllers\imageProductController::class, 'select_image'])->name('');
Route::post('/insert-image-product/{product_id}', [App\Http\Controllers\imageProductController::class, 'insert_image_product'])->name('');
Route::post('/delete-image-product/', [App\Http\Controllers\imageProductController::class, 'delete_image'])->name('');
