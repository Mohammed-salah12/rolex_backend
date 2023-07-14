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
    Route::prefix('/cms/admin/')->middleware('auth:admin,author')->group(function () {
        Route::view('', 'cms.parent');
        Route::resource('products', ProductController::class);
        Route::put('update-products/{id}', [ProductController::class, 'update'])->name('update-products');

        Route::resource('homepages', HomepageController::class)->except('update');
        Route::post('update-homepages/{id}', [HomepageController::class, 'update'])->name('update-homepages');

        Route::resource('roles', \App\Http\Controllers\RoleController::class)->except('edit' , 'update');
        Route::post('update-roles/{id}', [\App\Http\Controllers\RoleController::class, 'update'])->name('update-roles');

        Route::resource('permissions', \App\Http\Controllers\PermissionController::class)->except('edit' , 'update');
        Route::post('update-permissions/{id}', [\App\Http\Controllers\PermissionController::class, 'update'])->name('update-permissions');


        Route::resource('roles.permissions', \App\Http\Controllers\RolePermissionController::class);


        Route::resource('admins', AdminController::class);
        Route::post('update-admins/{id}', [AdminController::class, 'update'])->name('update-admins');

        Route::resource('authors', \App\Http\Controllers\AuthorController::class);
        Route::post('update-authors/{id}', [\App\Http\Controllers\AuthorController::class, 'update'])->name('update-authors');

        Route::resource('opinions', \App\Http\Controllers\OpinionController::class);
        Route::post('update-opinions/{id}', [\App\Http\Controllers\OpinionController::class, 'update'])->name('update-opinions');
    });

    Route::prefix('cms/')->middleware('guest:admin,author')->group(function () {
        Route::get('{guard}/login', [UserAuthController::class, 'showlogin'])->name('login');
        Route::post('{guard}/login', [UserAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth:admin,author')->group(function () {
        Route::get('{guard}/logout', [UserAuthController::class, 'logout'])->name('logout');
    });


Route::prefix('front/')->group(function () {
    Route::get('home', [\App\Http\Controllers\Front\HomeController::class, 'home'])->name('parent');

});
