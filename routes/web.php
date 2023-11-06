<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportPostController;
use App\Http\Controllers\ReportTagController;
use App\Http\Controllers\ReportUserController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ResendController;
use App\Http\Controllers\TagController;
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


//Route::prefix('Komisan/')->group(function () {
   
    Route::get('/', [Controller::class, 'login']);

    Route::middleware('auth')->group(function () { 
        /* logout */
        Route::get('/logout', [Controller::class, 'logout'])->name('user.logout');
        /*posts*/
        Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
        /* follow */
        Route::get('/user/{user_id}/follow/{follower_id}', [UserController::class, 'follower'])->name('user.follow');
        Route::get('/user/{follower_id}/unfollow/{following_id}', [UserController::class, 'unfollow'])->name('user.unfollow');

        /* requests */
        Route::get('/pedido/{artist}', [RequestController::class, 'create'])->name('create.request');
        Route::post('/pedido/store', [RequestController::class, 'store'])->name('store.request');
        Route::get('/chat/{chat_id}',[ChatController::class,'show'])->name('chat.show');
        Route::get('/encomendas', [RequestController::class, 'show'])->name('request.show');
        Route::get('/encomendas/user', [RequestController::class, 'showUser'])->name('request.show.user');
        Route::get('/encomendas/artist', [RequestController::class, 'showArtist'])->name('request.show.artist');
        Route::post('/resends', [ResendController::class, 'store'])->name('resends.store');

        /* assessments */
        Route::get('/assessments/{id}', [AssessmentController::class, 'create'])->name('assessments.create');
        Route::post('/assessments', [AssessmentController::class, 'store'])->name('assessments.store');
        /* report */
        Route::get('/report/post/{id}', [ReportPostController::class, 'create'])->name('report.post.create');
        Route::post('/report/post', [ReportPostController::class, 'store'])->name('report.post.store');
        Route::get('/report/user/{user_id}', [ReportUserController::class, 'create'])->name('report.user.create');
        Route::post('/report/user', [ReportUserController::class, 'store'])->name('report.user.store');
        Route::get('/report/tag/{tag_id}', [ReportTagController::class, 'create'])->name('report.tag.create');
        Route::post('/report/tag', [ReportTagController::class, 'store'])->name('report.tag.store');
        
    });
    Route::middleware('admin')->group(function () { 
        Route::get('admin/report/user',[ReportUserController::class, 'show'])->name('show.report.user');
        Route::get('admin/report/post',[ReportPostController::class, 'show'])->name('show.report.post');
        Route::get('admin/report/tag',[ReportTagController::class, 'show'])->name('show.report.tag');
    });
    Route::get('/cadastrar/one', [UserController::class, 'create_one'])->name('user.create.one');
    Route::post('/cadastrar/user', [UserController::class, 'store_one'])->name('user.store.one');
    Route::get('/cadastrar/two/{id}', [UserController::class, 'create_two'])->name('user.create.two');
    Route::post('/cadastrar/tags', [UserController::class, 'store_two'])->name('user.store.two');
    Route::get('/cadastrar/three/{id}', [UserController::class, 'create_three'])->name('user.create.three');
    Route::post('/cadastrar/user/profile', [UserController::class, 'store_three'])->name('user.store.three');
    Route::get('/cadastrar/four/{id}', [UserController::class, 'create_four'])->name('user.create.four');
    Route::post('/cadastrar/user/artist', [UserController::class, 'store_four'])->name('user.store.four');




    Route::post('/auth', [Controller::class, 'auth'])->name('user.auth');
    Route::get('/login', [Controller::class, 'login'])->name('user.login');
    Route::get('/home', [PostController::class, 'home'])->name('user.explorer');
    Route::get('/explorar', [UserController::class, 'artist'])->name('user.home');
    Route::get('/profile/{username}', [Controller::class, 'profile'])->name('profile.komisan');
    Route::get('/tag/{tagShow}', [TagController::class, 'show'])->name('tag.show');

    Route::get('/post/{id}', [PostController::class, 'post_unico'])->name('post.unico');
    
    Route::get('/tag/user/store/{id}',[TagController::class,'store'])->name('user.tag.store');
    Route::get('/tag/user/destroy/{id}',[TagController::class,'destroy'])->name('user.tag.destroy');
//});