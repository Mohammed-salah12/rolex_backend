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


        Route::get('products/deleted', [ProductController::class, 'deletedProducts'])->name('products.deleted');
        Route::resource('products', ProductController::class);
        Route::put('update-products/{id}', [ProductController::class, 'update'])->name('update-products');
        Route::patch('products/{product}/restore', [ProductController::class, 'restore'])->name('products.restore');
        Route::delete('products/{product}/force-delete', [ProductController::class, 'forceDelete'])->name('products.forceDelete');


        Route::get('homepages/deleted', [\App\Http\Controllers\HomepageController::class, 'deletedHomepages'])->name('homepages.deleted');
        Route::resource('homepages', HomepageController::class)->except('update');
        Route::post('update-homepages/{id}', [HomepageController::class, 'update'])->name('update-homepages');
        Route::patch('homepages/{homepage}/restore', [HomepageController::class, 'restore'])->name('homepages.restore');
        Route::delete('homepages/{homepage}/force-delete', [HomepageController::class, 'forceDelete'])->name('homepages.forceDelete');


        Route::get('roles/deleted', [\App\Http\Controllers\RoleController::class, 'deletedRoles'])->name('roles.deleted');
        Route::resource('roles', \App\Http\Controllers\RoleController::class)->except('edit' , 'update');
        Route::post('update-roles/{id}', [\App\Http\Controllers\RoleController::class, 'update'])->name('update-roles');
        Route::patch('roles/{role}/restore', [\App\Http\Controllers\RoleController::class, 'restore'])->name('roles.restore');
        Route::delete('roles/{role}/force-delete', [\App\Http\Controllers\RoleController::class, 'forceDelete'])->name('roles.forceDelete');


        Route::get('permissions/deleted', [\App\Http\Controllers\PermissionController::class, 'deletedPermissions'])->name('permissions.deleted');
        Route::resource('permissions', \App\Http\Controllers\PermissionController::class)->except('edit' , 'update');
        Route::post('update-permissions/{id}', [\App\Http\Controllers\PermissionController::class, 'update'])->name('update-permissions');
        Route::patch('permissions/{permission}/restore', [\App\Http\Controllers\PermissionController::class, 'restore'])->name('permissions.restore');
        Route::delete('permissions/{permission}/force-delete', [\App\Http\Controllers\PermissionController::class, 'forceDelete'])->name('permissions.forceDelete');



        Route::resource('roles.permissions', \App\Http\Controllers\RolePermissionController::class);


        Route::get('admins/deleted', [AdminController::class, 'deletedAdmins'])->name('admins.deleted');
        Route::resource('admins', AdminController::class);
        Route::post('update-admins/{id}', [AdminController::class, 'update'])->name('update-admins');
        Route::patch('admins/{admin}/restore', [AdminController::class, 'restore'])->name('admins.restore');
        Route::delete('admins/{admin}/force-delete', [AdminController::class, 'forceDelete'])->name('admins.forceDelete');


        Route::get('authors/deleted', [\App\Http\Controllers\AuthorController::class, 'deletedAuthors'])->name('authors.deleted');
        Route::resource('authors', \App\Http\Controllers\AuthorController::class);
        Route::post('update-authors/{id}', [\App\Http\Controllers\AuthorController::class, 'update'])->name('update-authors');
        Route::patch('authors/{authors}/restore', [\App\Http\Controllers\AuthorController::class, 'restore'])->name('authors.restore');
        Route::delete('authors/{authors}/force-delete', [\App\Http\Controllers\AuthorController::class, 'forceDelete'])->name('authors.forceDelete');


       Route::get('opinions/deleted', [\App\Http\Controllers\OpinionController::class, 'deletedOpinions'])->name('opinions.deleted');
        Route::resource('opinions', \App\Http\Controllers\OpinionController::class);
        Route::post('update-opinions/{id}', [\App\Http\Controllers\OpinionController::class, 'update'])->name('update-opinions');
        Route::patch('opinions/{opinion}/restore', [\App\Http\Controllers\OpinionController::class, 'restore'])->name('opinions.restore');
        Route::delete('opinions/{opinion}/force-delete', [\App\Http\Controllers\OpinionController::class, 'forceDelete'])->name('opinions.forceDelete');
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
