<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')->group(function(){
    Route::resource('/empresa', EmpresaController::class)->middleware(AdminMiddleware::class);
    Route::resource('/usuario', UserController::class);
});
    
Route::get('/login'  , [LoginController::class, 'index'])->name('login');
Route::post('/login' , [LoginController::class, 'login'])->name('loginPost');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');