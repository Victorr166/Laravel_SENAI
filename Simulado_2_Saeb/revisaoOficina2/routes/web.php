<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/painel');
Route::middleware('guest')->group(function () {
    Route::get('/entrar', [AuthController::class, 'create'])->name('login');
    Route::post('/entrar', [AuthController::class, 'store'])->name('login.store');
});
Route::middleware(['auth', 'session.timeout'])->group(function () {
    Route::post('/sair', [AuthController::class, 'destroy'])->name('logout');
    Route::view('/painel', 'dashboard')->name('dashboard');
    Route::resource('clientes', ClientController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::resource('veiculos', VehicleController::class)->only(['index', 'create', 'store']);
    Route::resource('agendamentos', AppointmentController::class)->only(['index', 'create', 'store', 'edit', 'update']);
});