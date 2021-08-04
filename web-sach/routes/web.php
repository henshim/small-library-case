<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[BookController::class,'index'])->name('book.list');

Route::prefix('book/')->group(function (){
    Route::get('add',[BookController::class,'add'])->name('book.add');

    Route::post('store',[BookController::class,'store'])->name('book.store');

    Route::get('update/{id}',[BookController::class,'update'])->name('book.update');

    Route::post('edit',[BookController::class,'edit'])->name('book.edit');


});
