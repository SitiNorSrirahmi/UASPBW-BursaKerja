<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AboutController;

// Halaman Home
Route::get('/', function () {
    return view('layouts.app');
});

 //Fitur Lowongan
Route::get('/pekerjaans', [PekerjaanController::class, 'index'])->name('pekerjaans.index'); // Menampilkan lowongan
Route::get('/pekerjaans/create', [PekerjaanController::class, 'create'])->name('pekerjaans.create'); // Formulir untuk menambah lowongan
Route::post('/pekerjaans', [PekerjaanController::class, 'store'])->name('pekerjaans.store'); // Menyimpan lowongan baru


 //Fitur Lamaran
Route::get('/applications', [ApplicationController::class, 'index']); // Menampilkan lamaran yang sudah diproses

 //Fitur Category
Route::get('/categories', [CategoryController::class, 'index']); // Menampilkan kategori pekerjaan untuk admin
Route::post('/categories', [CategoryController::class, 'store']); // Menambah kategori pekerjaan

 //Fitur Akun untuk Admin
Route::get('/users', [AccountController::class, 'index']); // Manajemen akun

 //Halaman Tentang Kami
Route::get('/abouts', [AboutController::class, 'index'])->name('abouts');
//Route::resource('abouts', AboutController::class);
