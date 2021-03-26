<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TvController;
use App\Http\Controllers\MoviesControler;
use App\Http\Controllers\ActorsController;

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
Route::get('/', [MoviesControler::class,'index'])->name('movies.index');
Route::get('/movies/{id}', [MoviesControler::class,'show'])->name('movies.show');

Route::get('/tv', [TvController::class,'index'])->name('tv.index');
Route::get('/tv/{id}', [TvController::class,'show'])->name('tv.show');

Route::get('/actors', [ActorsController::class,'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [ActorsController::class,'index']);

Route::get('/actors/{id}', [ActorsController::class,'show'])->name('actors.show');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
