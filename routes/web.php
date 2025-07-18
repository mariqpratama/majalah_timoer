<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MajalahController;
use App\Http\Controllers\CarouselController;    
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
// Login routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

// Route::get('/detail', function () {
//     return view('detail');
// });

Route::get('/detail/{slug}', [MajalahController::class, 'show'])->name('majalah.detail');

Route::get('/contact', function () {
    return view('contact');
});

// Route::middleware('admin.session')->group(function() {
//     Route::get('/admin', [AdminController::class, 'dashboard']);
//     Route::post('/admin/majalah', [AdminController::class, 'storeMajalah']);
//     Route::get('/admin/majalah/{id}/edit', [AdminController::class, 'editMajalah']);
//     Route::put('/admin/majalah/{id}', [AdminController::class, 'updateMajalah']);
//     Route::delete('/admin/majalah/{id}', [AdminController::class, 'destroyMajalah']);
//     Route::post('/admin/carousel', [AdminController::class, 'storeCarousel']);
//     Route::delete('/admin/carousel/{id}', [AdminController::class, 'destroyCarousel']);
// });


Route::middleware(['admin.session'])->group(function () {
    // Dashboard
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // CRUD Majalah
    Route::get('/admin/majalah/create', [AdminController::class, 'createMajalah'])->name('admin.majalah.create');
    Route::post('/admin/majalah', [AdminController::class, 'storeMajalah'])->name('admin.majalah.store');
    Route::get('/admin/majalah/{id}/edit', [AdminController::class, 'editMajalah'])->name('admin.majalah.edit');
    Route::put('/admin/majalah/{id}', [AdminController::class, 'updateMajalah'])->name('admin.majalah.update');
    Route::delete('/admin/majalah/{id}', [AdminController::class, 'destroyMajalah'])->name('admin.majalah.destroy');
});

Route::get('/test-session', function () {
    session(['cek' => 'berhasil']);
    return session('cek', 'gagal');
});