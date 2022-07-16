<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\product;
use App\Http\Controllers\Api\CategoryController;

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

Route::prefix('home')->name('product')->group(function () {
    Route::get('', [App\Http\Controllers\showDataController::class, 'product'])->name('');
    Route::get('{id}', [App\Http\Controllers\showDataController::class, 'product_by_id'])->name('index');
});
