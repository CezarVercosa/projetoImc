<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; // Adicione esta linha

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
Route::get('/list', [UserController::class, 'list'])->name('list');
Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

