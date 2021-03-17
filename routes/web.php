<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesControler;
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
Route::get('/movies/{movie}', [MoviesControler::class,'show'])->name('movies.show');


// Route::get('/movies/{movie}', 'MoviesControler@show')->name('movies.show');