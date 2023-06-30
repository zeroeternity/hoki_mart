<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/', 'index')->name('auth');
    Route::post('/signin', 'signin');
    Route::get('/signup', 'signup');
});

Route::get('/dashboard', [DashboardController::class, 'index']);








Route::get('/sale', function () {
    return view('page.sale.sale');
});
Route::get('/input-sale', function () {
    return view('page.sale.input-sale');
});

Route::get('/pembelian', function () {
    return view('pembelian');
});

Route::get('/pembelians', function () {
    return view('pembelians');
});

Route::get('/returpembelian', function () {
    return view('returpembelian');
});

Route::get('/laporanpembelian', function () {
    return view('laporanpembelian');
});

Route::get('/adjustment', function () {
    return view('adjustment');
});

Route::get('/mutasi', function () {
    return view('mutasi');
});

Route::get('/bukubesar', function () {
    return view('bukubesar');
});

Route::get('/invoice', function () {
    return view('invoice');
});

Route::get('/profiless', function () {
    return view('profiless');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
