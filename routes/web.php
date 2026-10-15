<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

// Raíz y Login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Rutas protegidas para operadores autenticados
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/inicio', [InicioController::class, 'index'])->name('inicio');

    Route::get('/entrega', [EntregaController::class, 'create'])->name('entrega');
    Route::post('/entrega', [EntregaController::class, 'store'])->name('entrega.store');

    Route::get('/historial', [HistorialController::class, 'index'])->name('historial');
});