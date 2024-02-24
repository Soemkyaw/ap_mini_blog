<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

// posts
Route::get('/',[PostController::class,'index']);
Route::get('/posts/{post}',[PostController::class,'show'])->name('post.show');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post/create',[PostController::class,'store'])->name('post.create');
Route::get('/post/{post}/edit',[PostController::class,'edit'])->name('post.edit');
Route::put('/post/{post}/update',[PostController::class,'update'])->name('post.update');
Route::delete('/post/{post}/destory',[PostController::class,'destory'])->name('post.destory');


