<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\product;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//danh mục
Route::controller(CategoryController::class)->prefix('categories')->name('api.categories.')->group(function () {
    Route::get('home/{orderBy?}/{sort?}', 'getAllRecords')->name('index');
    Route::get('p/{offset?}/{limit?}/{orderBy?}/{sort?}', 'getPageOfRecords')->name('paginate');
    Route::post('s/{col?}/{offset?}/{limit?}', 'getSearchedRecords')->name('search');
    Route::get('detail/{id}', 'getOneRecord')->name('detail');
    Route::post('store', 'storeRecord')->name('store');
    Route::put('update/{id}', 'updateRecord')->name('update');
    Route::post('uploadImage/{id}', 'uploadImage')->name('uploadImage');
    Route::put('delete/{id}', 'deleteRecord')->name('delete');
    Route::put('restore/{id}', 'restoreRecord')->name('restore');
    Route::delete('destroy/{id}', 'destroyRecord')->name('destroy');
    Route::put('activate/{id}', 'activateRecord')->name('activate');
    Route::put('disable/{id}', 'disableRecord')->name('disable');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('product', function () {
    return $product = product::paginate(3);
});
Route::get('product/{id}', function ($id) {
    return $product = product::find($id);
});
Route::post('product', function (Request $request) {
    return $product = product::create($request->all());
});
Route::put('product/{id}', function (Request $request, $id) {
    $product = product::findOrFail($id);
    $product->update($request->all());
    return $product;
});

Route::controller(ProductController::class)->prefix('products')->name('products')->group(function () {
    Route::get('/{orderBy?}/{sort?}','qty_sold')->name('');
    Route::get('/new_product','new_product')->name('');                                 
   
});

Route::get('product-list/{offset?}/{limit?}', function($offset = 0, $limit = 6) {
    $products = product::offset($offset)->limit($limit)->qty_sold();
    return view('client.product.productList',compact('products'));
});

Route::get('product-grid/{offset?}/{limit?}', function($offset = 0, $limit = 6) {
    $products = product::offset($offset)->limit($limit) 
    ->selectRaw('product_name, product_price_sale, product_price, product_image, product_content, category_id, product.id as id, CAST(sum(inventory) as int) as qty_sold')
    ->groupBy('product_inventory.product_id','product.id','product_name','product_price_sale', 'product_content', 'category_id','product_id','product_price', 'product_image')
    ->join('product_inventory', 'product.id', '=', 'product_inventory.product_id')
    ->orderBy('product.id','desc')->get();
    return view('client.product.productGrid',compact('products'));
});

Route::get('product-best/{offset?}/{limit?}', function($offset = 0, $limit = 6) {
    $products = product::offset($offset)->limit($limit) 
    ->selectRaw('product_name, product_price_sale, product_price, product_image, product_content, category_id, product.id as id, CAST(sum(inventory) as int) as qty_sold')
    ->groupBy('product_inventory.product_id','product.id','product_name','product_price_sale', 'product_content', 'category_id','product_id','product_price', 'product_image')
    ->join('product_inventory', 'product.id', '=', 'product_inventory.product_id')
    ->orderBy('qty_sold','desc')->get();
    return view('client.product.productList',compact('products'));
});

