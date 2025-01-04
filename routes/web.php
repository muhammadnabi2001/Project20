<?php

use App\Http\Controllers\CategorybladeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('Categorya.index');
// });
Route::get('/',[CategorybladeController::class,'index']);
Route::get('/lang/{lang}',[LangController::class,'index'])->name('lang');
