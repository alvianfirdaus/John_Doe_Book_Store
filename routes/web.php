<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\RatingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\BooksController::class,'index'])->name('books.index');
Route::get('/authors/top', [\App\Http\Controllers\AuthorsController::class,'index'])->name('authors.top');
Route::get('/ratings/create', [\App\Http\Controllers\RatingsController::class,'create'])->name('ratings.create');
Route::post('/ratings', [\App\Http\Controllers\RatingsController::class,'store'])->name('ratings.store');
Route::get('/api/authors/{author}/books', [\App\Http\Controllers\RatingsController::class,'booksByAuthor']); // optional ajax

