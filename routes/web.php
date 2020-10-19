<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdvertisementController;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AdvertisementController::class, 'dashboard']);

Auth::routes();

Route::get('/dashboard', [AdminController::class, 'index']);
Route::get('admin/show/{id}', [AdminController::class, 'show']);


Route::get('/home', [HomeController::class, 'index'])->name('dashboard');

Route::get('/post', [UserController::class, 'index'])->name('dash');
Route::get('/post/add', [UserController::class, 'showPostForm']);
Route::post('/post/add', [UserController::class, 'store']);
Route::get('/post/edit/{advertisement}', [UserController::class, 'update']);
Route::post('/post/update/', [UserController::class, 'update']);
Route::get('/post/delete', [UserController::class, 'destroy']);
Route::get('/post/view/{advertisement}', [UserController::class, 'viewPost'])->name('post.view');
Route::get('/allpost', [UserController::class, 'showAllPost'])->name('post.all');

