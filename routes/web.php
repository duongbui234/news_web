<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\PostController;
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

// Sub categories route
Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories');
Route::get('/subcategories/add', [SubCategoryController::class, 'addSubCate'])->name('subcategory.add');
Route::post('/subcategories/store', [SubCategoryController::class, 'storeSubCategory'])->name('subcategory.store');
Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'editSubCategory'])->name('subcategory.edit');
Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'updateSubCategory'])->name('subcategory.update');
Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('subcategory.delete');

// District route
Route::get('/district', [DistrictController::class, 'index'])->name('district');
Route::get('/district/add', [DistrictController::class, 'addDistrict'])->name('district.add');
Route::post('/district/store', [DistrictController::class, 'storeDistrict'])->name('district.store');
Route::get('/district/edit/{id}', [DistrictController::class, 'editDistrict'])->name('district.edit');
Route::post('/district/update/{id}', [DistrictController::class, 'updateDistrict'])->name('district.update');
Route::get('/district/delete/{id}', [DistrictController::class, 'deleteDistrict'])->name('district.delete');

// Sub District route
Route::get('/subdistricts', [SubDistrictController::class, 'index'])->name('subdistrict');
Route::get('subdistrict/add', [SubDistrictController::class, 'addSubDis'])->name('subdistrict.add');
Route::post('/subdistrict/store', [SubDistrictController::class, 'storeSubDis'])->name('subdistrict.store');
Route::get('/subdistrict/edit/{id}', [SubDistrictController::class, 'editSubDis'])->name('subdistrict.edit');
Route::post('/subdistrict/update/{id}', [SubDistrictController::class, 'updateSubDis'])->name('subdistrict.update');
Route::get('/subdistrict/delete/{id}', [SubDistrictController::class, 'deleteSubDis'])->name('subdistrict.delete');

// Posts route

Route::get('/post/all', [PostController::class, 'index'])->name('post.all');
Route::get('post/add', [PostController::class, 'createPost'])->name('post.add');
Route::get('/get/subcategory/{category_id}', [PostController::class, 'getSubCategory']);
Route::get('/get/subdistrict/{district_id}', [PostController::class, 'getSubDistrict']);
Route::post('post/store', [PostController::class, 'storePost'])->name('post.store');
Route::get('/post/edit/{id}', [PostController::class, 'editPost'])->name('post.edit');
Route::post('/post/update/{id}', [PostController::class, 'updatePost'])->name('post.update');
Route::get('/post/delete/{id}', [PostController::class, 'deletePost'])->name('post.delete');


// Setting route
Route::get('/social/all', [SettingController::class, 'social'])->name('social.all');
Route::post('/social/update/{id}', [SettingController::class, 'updateSocial'])->name('social.update');

Route::get('/seo/all', [SettingController::class, 'seo'])->name('seo.all');
Route::post('/seo/update/{id}', [SettingController::class, 'updateSeo'])->name('seo.update');

Route::get('/prayer/all', [SettingController::class, 'prayer'])->name('prayer.all');
Route::post('/prayer/update/{id}', [SettingController::class, 'updatePrayer'])->name('prayer.update');

Route::get('/livetv/all', [SettingController::class, 'livetv'])->name('livetv.all');
Route::post('/livetv/update/{id}', [SettingController::class, 'updateLivetv'])->name('livetv.update');
Route::get('/livetv/active/{id}', [SettingController::class, 'active'])->name('livetv.active');
Route::get('/livetv/inactive/{id}', [SettingController::class, 'inactive'])->name('livetv.inactive');

Route::get('/notice/all', [SettingController::class, 'notice'])->name('notice.all');
Route::post('/notice/update/{id}', [SettingController::class, 'updateNotice'])->name('notice.update');
Route::get('/notice/active/{id}', [SettingController::class, 'activeNotice'])->name('notice.active');
Route::get('/notice/inactive/{id}', [SettingController::class, 'inactiveNotice'])->name('notice.inactive');

// Admin dashboard route
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
