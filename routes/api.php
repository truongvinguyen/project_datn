<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\product;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('product', function() {
    return $products=product::paginate(3);
});
Route::get('product/{id}', function($id) {
    return $product=product::find($id);
});
Route::post('product', function(Request $request) {
    return $product=product::create($request->all());
});
Route::put('product/{id}', function(Request $request ,$id) {
    $product = product::findOrFail($id);
    $product->update($request->all());
    return $product;
});

Route::prefix('home')->name('product')->group(function () {
    Route::get('', [App\Http\Controllers\showDataController::class, 'product'])->name(''); 
    Route::get('{id}', [App\Http\Controllers\showDataController::class, 'product_by_id'])->name('index');
});

Route::get('product-list/{offset?}/{limit?}', function($offset = 0, $limit = 6) {
    $products = product::offset($offset)->limit($limit)->orderBy('id','desc')->get();
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

