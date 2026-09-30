<?php

use App\Http\Controllers\api\ChatController;
use App\Http\Middleware\AuthChat;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function(){
    Route::post('/send', [ChatController::class, 'send'])->name('send')->middleware(AuthChat::class);
    Route::post('/session', [ChatController::class, 'session'])->name('session');
})->middleware('throttle:20,1');

