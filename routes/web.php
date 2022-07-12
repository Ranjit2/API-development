<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddUserController;


Auth::routes();
Route::get('/create',[AddUserController::class, 'create'])->name('user.create');
Route::post('/store',[AddUserController::class, 'store'])->name('user.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
