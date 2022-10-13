<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/author/{id}', [HomeController::class, 'author']);
Route::get('/category/{id}', [HomeController::class, 'category']);
Route::get('/author/{id}/category/{category_id}', [HomeController::class, 'autcategory']);


