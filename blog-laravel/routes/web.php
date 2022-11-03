<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostAllController;
use App\Http\Controllers\Admin\PoController;
use App\Http\Controllers\Admin\TaController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Oauth\GoogleController;


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

Route::get('/callback', GoogleController::class)->name('google.callback');

Route::get('lara/', [HomeController::class, 'index'])->name('main');

Route::get('/', [PostController::class, 'index'])->name('post');
Route::get('/author/{id}', [UserController::class, 'author'])->name('author');
Route::get('/category/{id}', [CategoryController::class, 'category'])->name('category');
Route::get('/author/{id}/category/{category_id}', [HomeController::class, 'autcategory'])->name('author.category');
Route::get('/tag/{id}', [TagController::class, 'tag'])->name('tag');
Route::get('/author/{id}/category/{category_id}/tag/{tag_id}', [PostAllController::class, 'all'])->name('author.category.tag');


Route::middleware(['guest'])->group(function () {
    Route::post('/auth/login', [AuthController::class, 'handleLogin'])->name('auth.handleLogin');
});

Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/admin', [PanelController::class, 'index'])->name('admin.panel');

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/post', [PoController::class, 'index'])->name('admin.posts');
    Route::get('admin/post/create', [PoController::class, 'create'])->name('admin.posts.create');
    Route::get('admin/post/{id}', [PoController::class, 'show'])->name('admin.posts.show');
    Route::post('admin/post/review/{id}', [PoController::class, 'addReview'])->name('admin.posts.add.review');
    Route::post('admin/post/store', [PoController::class, 'store'])->name('admin.posts.store');
    Route::get('admin/post/{id}/edit', [PoController::class, 'edit'])->name('admin.posts.edit');
    Route::post('admin/post/update', [PoController::class, 'update'])->name('admin.posts.update');
    Route::get('admin/post/{post}/delete', [PoController::class, 'destroy'])->name('admin.posts.destroy');

    Route::get('/admin/tag', [TaController::class, 'index'])->name('admin.tags');
    Route::get('admin/tag/create', [TaController::class, 'create'])->name('admin.tags.create');
    Route::post('admin/tag/store', [TaController::class, 'store'])->name('admin.tags.store');
    Route::get('admin/tag/{id}/edit', [TaController::class, 'edit'])->name('admin.tags.edit');
    Route::post('admin/tag/update', [TaController::class, 'update'])->name('admin.tags.update');
    Route::get('admin/tag/{tag}/delete', [TaController::class, 'destroy'])->name('admin.tags.destroy');

    Route::get('/admin/category', [CatController::class, 'index'])->name('admin.categories');
    Route::get('admin/category/create', [CatController::class, 'create'])->name('admin.categories.create');
    Route::post('admin/category/store', [CatController::class, 'store'])->name('admin.categories.store');
    Route::get('admin/category/{id}/edit', [CatController::class, 'edit'])->name('admin.categories.edit');
    Route::post('admin/category/update', [CatController::class, 'update'])->name('admin.categories.update');
    Route::get('admin/category/{category}/delete', [CatController::class, 'destroy'])->name('admin.categories.destroy');
});

Route::get('/pages', [PageController::class, 'index'])->name('page');
Route::get('/pages/{id}', [PageController::class, 'show'])->name('page.show');
Route::post('/pages/review/{id}', [PageController::class, 'addReview'])->name('page.add.review');



