<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::prefix('/dashboard')->group(function(){
        Route::resource('/empresa', EmpresaController::class)->middleware(AdminMiddleware::class);
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    }); 
});
    
Route::resource('/usuario', UserController::class);
Route::get('/cadastre-se'  , [HomeController::class, 'create'])->name('cadastrese');

Route::get('/login'  , [LoginController::class, 'index'])->name('login');
Route::post('/login' , [LoginController::class, 'login'])->name('loginPost');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
