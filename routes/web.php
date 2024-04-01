<?php

use App\Http\Controllers\albumcontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\komentarcontroller;
use App\Http\Controllers\likecontroller;
use App\Http\Controllers\PhotoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Route::get('/album/create', [AlbumController::class, 'create']);
Route::post('/album', [AlbumController::class, 'store']);

// Route::get('/photo/create', [PhotoController::class, 'create']);
Route::post('/photo', [PhotoController::class, 'store']);
Route::post('/komentar', [komentarcontroller::class, 'store']);
Route::post('/like', [likecontroller::class, 'like']);
Route::post('/unlike', [likecontroller::class, 'unlike']);



Route::get('/show', [HomeController::class, 'photo']);

Route::get('/coba', [HomeController::class, 'coba']);



// Route::get('/photo', [PhotoController::class, 'create']);
// Route::post('/photo', [PhotoController::class, 'store']);

// Route::post('/upload', [App\Http\Controllers\PhotoController::class, 'upload'])->name('upload');
// Route::get('/friends', [HomeController::class, 'friends']);
// Route::get('/', [PhotoController::class, 'index'])->name('index');
// Route::get('/family', [HomeController::class, 'family']);
Route::get('/me', [HomeController::class, 'me']);


