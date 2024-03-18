<?php

use App\Test;
use App\Container;
use App\TestFacade;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

// Route::get('/',function(){
//     return (TestFacade::smth());
// });

Route::middleware(['auth'])->group(function () {
    Route::redirect('/dashboard', '/');
    Route::get('/',[PostController::class,'index']);
    Route::get('/posts',[PostController::class,'index'])->name('post#list');
    Route::get('/posts/{post}',[PostController::class,'show'])->name('post.show');
    Route::get('/post/create',[PostController::class,'create'])->name('post.create');
    Route::post('/post/create',[PostController::class,'store'])->name('post.create');
    Route::get('/post/{post}/edit',[PostController::class,'edit'])->name('post.edit');
    Route::put('/post/{post}/update',[PostController::class,'update'])->name('post.update');
    Route::delete('/post/{post}/destory',[PostController::class,'destory'])->name('post.destory');
    Route::get('/logout',[AuthController::class,'logout']);
});

