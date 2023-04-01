<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
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
Route::prefix('/cms/admin/')->group(function () {
    Route::view('','cms.parent');
    Route::resource('products' , ProductController::class);
    Route::post('update-products/{id}' , [ProductController::class , 'update'])->name('update-products');
    Route::resource('homepages' , HomepageController::class);
    Route::post('update-homepages/{id}' , [HomepageController::class , 'update'])->name('update-homepages');

});