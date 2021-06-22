<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
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

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Category router
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/category/add', [CategoryController::class, 'addCategory'])->name('category.add');
Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');
Route::get('/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');

// Admin dashboard route
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
