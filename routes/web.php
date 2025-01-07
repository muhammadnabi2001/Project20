<?php

use App\Http\Controllers\CategorybladeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\NewsBladeController;
use App\Http\Controllers\NewsController;
use App\Http\Middleware\Check;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('Categorya.index');
// });
Route::middleware([Check::class])->group(function () {
    Route::get('/index', [CategorybladeController::class, 'index']);
    Route::post('/category-create',[CategorybladeController::class,'store'])->name('category-create');
    Route::put('/category-update/{category}',[CategorybladeController::class,'update'])->name('category-update');
    Route::delete('/category-delete/{category}',[CategorybladeController::class,'delete'])->name('category-delete');

    Route::get('/news',[NewsBladeController::class,'index'])->name('news');
    Route::post('/news-create',[NewsBladeController::class,'store'])->name('news-create');
    Route::put('/news-update/{new}',[NewsBladeController::class,'update'])->name('news-update');

    Route::get('/lang/{lang}', [LangController::class, 'index'])->name('lang');
    Route::get('/',[NewsController::class,'news']);
    Route::get('/choose/{category}',[NewsController::class,'choose'])->name('choose');
});