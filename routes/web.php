<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'getuser']);
Route::post('/postuser', [UserController::class, 'postuser'])->name('postuser');