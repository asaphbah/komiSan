<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ResendController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [Controller::class, 'login']);

Route::get('/cadastrar/one', [UserController::class, 'create_one'])->name('user.create.one');
Route::post('/cadastrar/user', [UserController::class, 'store_one'])->name('user.store.one');
Route::get('/cadastrar/two/{id}', [UserController::class, 'create_two'])->name('user.create.two');
Route::post('/cadastrar/tags', [UserController::class, 'store_two'])->name('user.store.two');
Route::get('/cadastrar/three/{id}', [UserController::class, 'create_three'])->name('user.create.three');
Route::post('/cadastrar/user/profile', [UserController::class, 'store_three'])->name('user.store.three');


Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::post('/auth', [Controller::class, 'auth'])->name('user.auth');
Route::get('/login', [Controller::class, 'login'])->name('user.login');
Route::get('/logout', [Controller::class, 'logout'])->name('user.logout');
Route::get('/home', [PostController::class, 'home'])->name('user.explorer');
Route::get('/explorar', [UserController::class, 'artist'])->name('user.home');
Route::get('/profile/{username}', [Controller::class, 'profile'])->name('profile.komisan');

Route::get('/post/{id}', [PostController::class, 'post_unico'])->name('post.unico');
Route::get('/user/{user_id}/follow/{follower_id}', [UserController::class, 'follower'])->name('user.follow');
Route::get('/user/{follower_id}/unfollow/{following_id}', [UserController::class, 'unfollow'])->name('user.unfollow');

Route::get('/pedido/{artist}', [RequestController::class, 'create'])->name('create.request');
Route::post('/pedido/store', [RequestController::class, 'store'])->name('store.request');

Route::get('/chat/{chat_id}',[ChatController::class,'show'])->name('chat.show');

Route::get('/encomendas', [RequestController::class, 'show'])->name('request.show');
Route::get('/encomendas/user', [RequestController::class, 'showUser'])->name('request.show.user');
Route::get('/encomendas/artist', [RequestController::class, 'showArtist'])->name('request.show.artist');

Route::post('/resends', [ResendController::class, 'store'])->name('resends.store');

Route::get('/assessments/{id}', [AssessmentController::class, 'create'])->name('assessments.create');
Route::post('/assessments', [AssessmentController::class, 'store'])->name('assessments.store');

//Route::get('/encomenda', [RequestController::class, 'show'])->name('request.show');