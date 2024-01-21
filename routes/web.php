<?php

use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [PagesController::class,'index'])->name('welcome');
Route::get('/artists', [PagesController::class,'artists'])->name('artists');
Route::post('/artists/like', [PagesController::class,'artistLike'])
    ->middleware('auth')
    ->name('artistLike');

Route::get('/albums', [PagesController::class,'albums'])->name('albums');
Route::post('/albums/like', [PagesController::class,'albumLike'])
    ->middleware('auth')
    ->name('albumLike');



require __DIR__.'/auth.php';
Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);




Route::middleware('auth')->group(function () {

    Route::get('/dashboard',[AuthenticatedController::class,'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
