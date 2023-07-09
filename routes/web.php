<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;

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
////->middleware('auth:admin , author')
//Route::prefix('/cms/admin/')->group(function () {
//    Route::view('','cms.parent');
//    Route::resource('products' , ProductController::class);
//    Route::post('update-products/{id}' , [ProductController::class , 'update'])->name('update-products');
//    Route::resource('homepages' , HomepageController::class);
//    Route::post('update-homepages/{id}' , [HomepageController::class , 'update'])->name('update-homepages');
//
//    Route::resource('roles' , \App\Http\Controllers\RoleController::class);
//    Route::post('update-roles/{id}' , [\App\Http\Controllers\RoleController::class , 'update'])->name('update-roles');
//
//    Route::resource('permissions' , \App\Http\Controllers\RoleController::class);
//    Route::post('update-permissions/{id}' , [\App\Http\Controllers\RoleController::class , 'update'])->name('update-permissions');
//
//    Route::resource('admins' , AdminController::class);
//    Route::post('update-admins/{id}' , [AdminController::class , 'update'])->name('update-admins');
//
//    Route::resource('authors' , \App\Http\Controllers\AuthorController::class);
//    Route::post('update-authors/{id}' , [\App\Http\Controllers\AuthorController::class , 'update'])->name('update-authors');
//
//    Route::resource('opinions' , \App\Http\Controllers\OpinionController::class);
//    Route::post('update-opinions/{id}' , [\App\Http\Controllers\OpinionController::class , 'opinions'])->name('update-opinions');
//});
//
//
//Route::prefix('cms/')->middleware('guest:admin,author')->group(function () {
//    Route::get('{guard}/login', [UserAuthController::class , 'showlogin'])->name('view.login');
//    Route::post('{guard}/login', [UserAuthController::class , 'login'])->name('login');
//
//
//Route::prefix('cms/')->middleware('guest:admin , author')->group(function () {
//// Route::prefix('cms/')->middleware('guest:admin,author')->group(function () {
////     Route::get('{guard}/login' , [UserAuthController::class , 'showlogin'])->name('view.login');
////     Route::post('{guard}/login' , [UserAuthController::class , 'login'])->name('login');
//
//
//Route::prefix('cms/')->middleware('guest:admin,author')->group(function () {
//
//    Route::get('{guard}/login' , [UserAuthController::class , 'showlogin'])->name('view.login');
//    Route::post('{guard}/login' , [UserAuthController::class , 'login'])->name('login');
//
////    Route::get('author/login', 'UserAuthController@showLogin')->name('view.login.author');
////    Route::post('author/login', 'UserAuthController@login')->name('login.author');
// });
//
//Route::middleware('auth')->group(function () {
//    Route::get('{guard}/logout', [UserAuthController::class, 'logout'])->name('view.test');
//});

    Route::prefix('/cms/admin/')->middleware('auth:admin,author')->group(function () {
        Route::view('', 'cms.parent');
        Route::resource('products', ProductController::class);
        Route::post('update-products/{id}', [ProductController::class, 'update'])->name('update-products');
        Route::resource('homepages', HomepageController::class);
        Route::post('update-homepages/{id}', [HomepageController::class, 'update'])->name('update-homepages');

        Route::resource('roles', \App\Http\Controllers\RoleController::class);
        Route::post('update-roles/{id}', [\App\Http\Controllers\RoleController::class, 'update'])->name('update-roles');

        Route::resource('permissions', \App\Http\Controllers\RoleController::class);
        Route::post('update-permissions/{id}', [\App\Http\Controllers\RoleController::class, 'update'])->name('update-permissions');

        Route::resource('admins', AdminController::class);
        Route::post('update-admins/{id}', [AdminController::class, 'update'])->name('update-admins');

        Route::resource('authors', \App\Http\Controllers\AuthorController::class);
        Route::post('update-authors/{id}', [\App\Http\Controllers\AuthorController::class, 'update'])->name('update-authors');

        Route::resource('opinions', \App\Http\Controllers\OpinionController::class);
        Route::post('update-opinions/{id}', [\App\Http\Controllers\OpinionController::class, 'opinions'])->name('update-opinions');
    });

    Route::prefix('cms/')->middleware('guest:admin,author')->group(function () {
        Route::get('{guard}/login', [UserAuthController::class, 'showlogin'])->name('login');
        Route::post('{guard}/login', [UserAuthController::class, 'login'])->name('login.submit');
    });

//Route::prefix('cms/')->middleware('guest:admin,author')->group(function () {
//    Route::get('{guard}/login', [UserAuthController::class, 'showlogin'])->name('view.login');
//    Route::post('{guard}/login', [UserAuthController::class, 'login'])->name('login');
//});

    Route::middleware('auth:admin,author')->group(function () {
        Route::get('{guard}/logout', [UserAuthController::class, 'logout'])->name('logout');
    });
