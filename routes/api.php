<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('create',[CategoryController::class,'create']);
    Route::get('index',[CategoryController::class,'all']);
});

Route::post('login',[AuthController::class,'login']);
