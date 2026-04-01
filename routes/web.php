<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrosControllers;

Route::get('/', [RegistrosControllers::class, 'index'])->name('user-index');

Route::post('/', [RegistrosControllers::class, 'store'])->name('user-store');

Route::delete('/', [RegistrosControllers::class, 'delete'])->name('user-delete');

Route::get('/buscar', [RegistrosControllers::class, 'buscar'])->name('user-buscar');

Route::get('/buscar/registros', [RegistrosControllers::class, 'show'])->name('user-show');