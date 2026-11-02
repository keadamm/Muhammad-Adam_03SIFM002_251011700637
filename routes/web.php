<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');
});

Route::get('/profile', function () {
    return redirect('/mahasiswa');
});

Route::get('/project', function () {
    return view('page.project');
});

Route::get('/about', function () {
    return view('page.about');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

// ===== Admin: kelola data perangkat (CRUD) =====
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/projects', [AdminController::class, 'index']);
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/{perangkat}/edit', [AdminController::class, 'edit'])->whereNumber('perangkat')->name('admin.edit');
Route::put('/admin/{perangkat}', [AdminController::class, 'update'])->whereNumber('perangkat')->name('admin.update');
Route::delete('/admin/{perangkat}', [AdminController::class, 'destroy'])->whereNumber('perangkat')->name('admin.destroy');