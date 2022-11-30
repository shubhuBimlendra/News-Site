<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ListingPageController;
use App\Http\Controllers\DetailsPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
//use App\Http\Controllers\DbController;

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

Route::get('/', [HomePageController::class,'index']);
Route::get('/listing', [ListingPageController::class,'index']);
Route::get('/page-details', [DetailsPageController::class,'index']);

Route::group(['prefix'=>'back','middleware'=>'auth'],function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::get('/category/edit', [CategoryController::class, 'edit']);
    Route::get('/permission', [PermissionController::class, 'index'])->name('admin.permission');
    Route::get('/permission/create', [PermissionController::class, 'create']);
    Route::post('/permission/store', [PermissionController::class, 'store']);
    Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission-edit');
    Route::put('/permission/edit/{id}', [PermissionController::class, 'update'])->name('permission-update');
    Route::delete('/permission/delete/{id}',[PermissionController::class, 'destroy'])->name('permission-delete');
    Route::get('/roles', [RoleController::class, 'index'])->name('admin.role');
    Route::get('/roles/create', [RoleController::class, 'create']);
    Route::post('role/store', [RoleController::class, 'store']);
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('role-edit');
    Route::put('/roles/edit/{id}', [RoleController::class, 'update'])->name('role-update');
    Route::delete('/roles/delete/{id}',[RoleController::class, 'destroy'])->name('role-delete');
});

/*Route::get('/query', [DbController::class, 'index']);
Route::get('/joining', [DbController::class, 'joining']);
Route::get('/model', [DbController::class, 'model']);*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
