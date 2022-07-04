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
    return $product=product::paginate(3);
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