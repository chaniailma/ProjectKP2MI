<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;


/*
|--------------------------------------------------------------------------
| PUBLIC (TANPA LOGIN)
|--------------------------------------------------------------------------
*/


Route::get('/', function () {
    return view('welcome');
})->name('home');

// FORM PENGADUAN PUBLIK
Route::get('/pengaduan/create', [PengaduanController::class, 'create'])
    ->name('pengaduan.create');

// SIMPAN PENGADUAN PUBLIK
Route::post('/pengaduan', [PengaduanController::class, 'store'])
    ->name('pengaduan.store');

// EDIT (JIKA DIPERLUKAN)
Route::get('/pengaduan/{id}/edit', [PengaduanController::class, 'edit'])
    ->name('pengaduan.edit');

/*
|--------------------------------------------------------------------------
| ADMIN (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard admin
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | PENGADUAN (ADMIN)
        |--------------------------------------------------------------------------
        */

        // List semua pengaduan
        Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])
            ->name('pengaduan.index');

        // Form tambah pengaduan (jika admin bisa input manual)
        Route::get('/pengaduan/create', [AdminPengaduanController::class, 'create'])
            ->name('pengaduan.create');

        // Simpan pengaduan dari admin
        Route::post('/pengaduan', [AdminPengaduanController::class, 'store'])
            ->name('pengaduan.store');

        // Detail pengaduan
        Route::get('/pengaduan/{id}', [AdminPengaduanController::class, 'show'])
            ->name('pengaduan.show');

        // Form edit pengaduan
        Route::get('/pengaduan/{id}/edit', [AdminPengaduanController::class, 'edit'])
            ->name('pengaduan.edit');

        // Update pengaduan
        Route::put('/pengaduan/{id}', [AdminPengaduanController::class, 'update'])
            ->name('pengaduan.update');

        // Hapus pengaduan (opsional)
        Route::delete('/pengaduan/{id}', [AdminPengaduanController::class, 'destroy'])
            ->name('pengaduan.destroy');
             // UPDATE STATUS
    Route::put('/pengaduan/{id}/status', [AdminPengaduanController::class, 'updateStatus'])
        ->name('pengaduan.updateStatus');

        Route::get('/admin/pengaduan/{id}/pdf', [AdminPengaduanController::class, 'downloadPdf'])
    ->name('pengaduan.pdf');

    });

/*
|--------------------------------------------------------------------------
| PROFILE (BREEZE)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN, REGISTER, DLL)
|--------------------------------------------------------------------------
*/






require __DIR__.'/auth.php';
