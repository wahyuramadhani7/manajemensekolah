<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\ManageSiswa;
use App\Livewire\ManageKelas;
use App\Livewire\ManageGuru;
use App\Livewire\ListSiswaByKelas;
use App\Livewire\ListGuruByKelas;
use App\Livewire\ListGabungan;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/siswa', ManageSiswa::class)->middleware(['auth'])->name('siswa');
Route::get('/kelas', ManageKelas::class)->middleware(['auth'])->name('kelas');
Route::get('/guru', ManageGuru::class)->middleware(['auth'])->name('guru');
Route::get('/siswa-by-kelas', ListSiswaByKelas::class)->middleware(['auth'])->name('siswa.by.kelas');
Route::get('/guru-by-kelas', ListGuruByKelas::class)->middleware(['auth'])->name('guru.by.kelas');
Route::get('/laporan-gabungan', ListGabungan::class)->middleware(['auth'])->name('laporan.gabungan');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->middleware(['auth'])->name('logout');

require __DIR__.'/auth.php';
?>