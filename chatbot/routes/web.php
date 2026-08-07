<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/empresa', EmpresaController::class);
Route::resource('/usuario', UserController::class);