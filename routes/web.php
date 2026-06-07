<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'showUsers'])->name('home');
Route::get('/user/{id}', [UserController::class, 'singleUser'])
        ->name('view.user');
Route::post('/add', [UserController::class, 'addUser'])->name('addUser');
Route::get('/update/{id}', [UserController::class, 'updateUser'])->name('update.user');
Route::get('/update/{id}', [UserController::class, 'updatePage'])->name('update.page');

Route::put('/update/{id}', [UserController::class, 'updateUser'])->name('update.user');
Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
Route::view('newuser','adduser');
