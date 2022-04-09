<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KataController;
use App\Http\Controllers\AyatController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [KataController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::resource('/kata', KataController::class)->middleware(['auth']);
Route::resource('/ayat', AyatController::class)->middleware(['auth']);
Route::resource('/surat', SuratController::class)->middleware(['auth']);
Route::resource('/user', UserController::class)->middleware(['auth']);
Route::get('/profile', [UserController::class , 'profile'])->name('profile')->middleware(['auth']);


Route::get('front' , function() {

    return view('layouts.front_app');
});


require __DIR__.'/auth.php';
