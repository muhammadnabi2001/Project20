<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/create-category',[CategoryController::class,'create']);
    Route::get('/category',[CategoryController::class,'all']);
    Route::post('/update-category/{id}',[CategoryController::class,'update']);
    Route::post('/delete-category/{id}',[CategoryController::class,'delete']);
    Route::get('/news',[NewsController::class,'index']);
    Route::post('/news-create',[NewsController::class,'store']);
    Route::post('/news-update/{id}',[NewsController::class,'update']);
    Route::post('/delete-news/{id}',[NewsController::class,'delete']);
    Route::post('/user-update',[AuthController::class,'updateProfile']);
});

Route::post('login',[AuthController::class,'login']);
