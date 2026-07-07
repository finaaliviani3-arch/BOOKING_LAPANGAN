<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\RedirectByRoleController;

// 1. HALAMAN UTAMA (Welcome)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// 2. LOGIC REDIRECT SETELAH LOGIN (Sesuai Role)
Route::get('/redirect-by-role', RedirectByRoleController::class)->middleware('auth');

// 3. FITUR PENCARIAN LAPANGAN (User)
Route::get('/user/lapangans', [CourtController::class, 'search'])->name('lapangan.search');

// 4. ROUTE OTOMATIS AUTHENTICATION (Login, Register, Logout dari Laravel Auth)
Auth::routes();

// 5. ROUTE DASHBOARD (ROLE BASED)
Route::middleware(['auth', \App\Http\Middleware\EnsureRole::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/lapangans', [\App\Http\Controllers\AdminLapanganController::class, 'index'])->name('admin.lapangans.index');
    Route::get('/admin/lapangans/create', [\App\Http\Controllers\AdminLapanganController::class, 'create'])->name('admin.lapangans.create');
    Route::post('/admin/lapangans', [\App\Http\Controllers\AdminLapanganController::class, 'store'])->name('admin.lapangans.store');
    Route::get('/admin/lapangans/{lapangan}/edit', [\App\Http\Controllers\AdminLapanganController::class, 'edit'])->name('admin.lapangans.edit');
    Route::put('/admin/lapangans/{lapangan}', [\App\Http\Controllers\AdminLapanganController::class, 'update'])->name('admin.lapangans.update');
    Route::delete('/admin/lapangans/{lapangan}', [\App\Http\Controllers\AdminLapanganController::class, 'destroy'])->name('admin.lapangans.destroy');

    Route::get('/admin/bookings', [\App\Http\Controllers\AdminBookingController::class, 'index'])->name('admin.bookings.index');
    Route::put('/admin/bookings/{booking}/status', [\App\Http\Controllers\AdminBookingController::class, 'updateStatus'])->name('admin.bookings.status');

    // placeholder menu admin users (CRUD user belum ada di fase ini)
    Route::get('/admin/users', function () {
        return view('admin.dashboard');
    })->name('admin.users.index');
});

Route::middleware(['auth', \App\Http\Middleware\EnsureRole::class . ':customer'])->group(function () {    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/user/dashboard/beranda', function () {
        return view('user.beranda');
    })->name('user.dashboard.beranda');

    Route::get('/user/dashboard/cari-lapangan', function () {
        return redirect()->to('/user/lapangans');
    })->name('user.dashboard.cari-lapangan');

    Route::get('/user/dashboard/booking-saya', function () {
        return view('user.booking-saya');
    })->name('user.dashboard.booking-saya');

    Route::get('/user/dashboard/profil', function () {
        return view('user.profil');
    })->name('user.dashboard.profil');

    // Booking user
    Route::get('/user/bookings', [\App\Http\Controllers\UserBookingController::class, 'index'])->name('user.bookings');
    Route::post('/user/bookings', [\App\Http\Controllers\UserBookingController::class, 'store'])->name('user.bookings.store');
    Route::get('/user/bookings/riwayat', [\App\Http\Controllers\UserBookingController::class, 'riwayat'])->name('user.bookings.riwayat');
});



// 7. MANAJEMEN KELAS (Jika Masih Digunakan)
Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');

// 8. FITUR POSTS & COMMENTS (Admin + User)
Route::resource('posts', \App\Http\Controllers\PostsController::class)
    ->middleware(['auth']);

Route::post('comments', [\App\Http\Controllers\CommentController::class, 'store'])
    ->middleware(['auth']);

// Route untuk halaman Cari Lapangan

Route::get('/cari-lapangan', function () {
    return view('cari_lapangan'); // mengarah ke resources/views/cari_lapangan.blade.php
})->name('menu.cari');

// Route untuk Jadwal Saya
Route::get('/jadwal-saya', function () {
    return view('jadwal_saya'); // mengarah ke resources/views/jadwal_saya.blade.php
})->name('menu.jadwal');

// Route untuk Sewaan
Route::get('/sewaan', function () {
    return view('sewaan'); // mengarah ke resources/views/sewaan.blade.php
})->name('menu.sewaan');

// Route untuk Kontak
Route::get('/kontak', function () {
    return view('kontak'); // mengarah ke resources/views/kontak.blade.php
})->name('menu.kontak');