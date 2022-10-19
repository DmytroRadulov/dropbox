<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostAllController;
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


