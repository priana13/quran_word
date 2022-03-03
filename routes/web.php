<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KataController;
use App\Http\Controllers\AyatController;
use App\Http\Controllers\SuratController;


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


require __DIR__.'/auth.php';
