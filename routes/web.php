<?php

use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;

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

Route::get('/', [PostsController::class, 'get_all_post']);
Route::get('/post/{id}', [PostsController::class, 'get_post_by_id']);
Route::get('/categories/{id}', [PostsController::class, 'get_post_by_category']);
Route::get('/authors/{id}', [PostsController::class, 'get_post_by_author']);
Route::get('/search', [PostsController::class, 'search_post']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy']);
Route::get('/login', [SessionController::class, 'login'])->middleware('guest');
Route::post('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/comment', [CommentsController::class, 'store'])->middleware('auth');
Route::post('/reply-comment', [CommentsController::class, 'storeReplyComment'])->middleware('auth');