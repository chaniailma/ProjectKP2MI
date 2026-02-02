<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

/*
|--------------------------------------------------------------------------
| PUBLIK
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/pengaduan/create', [PengaduanController::class, 'create'])
    ->name('pengaduan.create');

Route::post('/pengaduan', [PengaduanController::class, 'store'])
    ->name('pengaduan.store');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // List
        Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])
            ->name('pengaduan.index');

        // Create (ADMIN INPUT)
        Route::get('/pengaduan/create', [AdminPengaduanController::class, 'create'])
            ->name('pengaduan.create');

        // 🔥 STORE (INI YANG KURANG)
        Route::post('/pengaduan', [AdminPengaduanController::class, 'store'])
            ->name('pengaduan.store');

        // Detail
        Route::get('/pengaduan/{id}', [AdminPengaduanController::class, 'show'])
            ->name('pengaduan.show');

        // Edit
        Route::get('/pengaduan/{id}/edit', [AdminPengaduanController::class, 'edit'])
            ->name('pengaduan.edit');

        Route::put('/pengaduan/{id}', [AdminPengaduanController::class, 'update'])
            ->name('pengaduan.update');

        // Status
        Route::get('/pengaduan/{id}/status', [AdminPengaduanController::class, 'editStatus'])
            ->name('pengaduan.editStatus');

        Route::put('/pengaduan/{id}/status', [AdminPengaduanController::class, 'updateStatus'])
            ->name('pengaduan.updateStatus');

        // PDF
        Route::get('/pengaduan/{id}/pdf', [AdminPengaduanController::class, 'downloadPdf'])
            ->name('pengaduan.pdf');

        // Delete
        Route::delete('/pengaduan/{id}', [AdminPengaduanController::class, 'destroy'])
            ->name('pengaduan.destroy');
    });

require __DIR__.'/auth.php';
