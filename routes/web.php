<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;

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

// Pages routes
Route::get('/', [PagesController::class, 'index']);
Route::get('about', [PagesController::class, 'about']);

// Users routes
Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
Route::put('users/edit/{id}', [UsersController::class, 'update'])->name('user.update');
Route::get('users', [UsersController::class, 'index'])->name('users.index');
