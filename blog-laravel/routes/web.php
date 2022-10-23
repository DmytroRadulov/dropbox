<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostAllController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\AdminCategoryController;
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

Route::get('/', [PostController::class, 'index']);
Route::get('/author/{id}', [UserController::class, 'author']);
Route::get('/category/{id}', [CategoryController::class, 'category']);
Route::get('/author/{id}/category/{category_id}', [HomeController::class, 'autcategory']);
Route::get('/tag/{id}', [TagController::class, 'tag']);
Route::get('/author/{id}/category/{category_id}/tag/{tag_id}', [PostAllController::class, 'all']);

Route::get('/admin/post', [AdminPostController::class, 'index'])->name('admin.posts');
Route::get('admin/post/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
Route::post('admin/post/store', [AdminPostController::class, 'store'])->name('admin.posts.store');
Route::get('admin/post/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
Route::post('admin/post/update', [AdminPostController::class, 'update'])->name('admin.posts.update');
Route::get('admin/post/{post}/delete', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');

Route::get('/admin/tag', [AdminTagController::class, 'index'])->name('admin.tags');
Route::get('admin/tag/create', [AdminTagController::class, 'create'])->name('admin.tags.create');
Route::post('admin/tag/store', [AdminTagController::class, 'store'])->name('admin.tags.store');
Route::get('admin/tag/{id}/edit', [AdminTagController::class, 'edit'])->name('admin.tags.edit');
Route::post('admin/tag/update', [AdminTagController::class, 'update'])->name('admin.tags.update');
Route::get('admin/tag/{tag}/delete', [AdminTagController::class, 'destroy'])->name('admin.tags.destroy');

Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name('admin.categories');
Route::get('admin/category/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
Route::post('admin/category/store', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
Route::get('admin/category/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
Route::post('admin/category/update', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
Route::get('admin/category/{category}/delete', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');
