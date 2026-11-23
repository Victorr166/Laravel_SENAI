
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AgendamentoController;

// LOGIN
Route::get('/', [UsuarioController::class, 'login']);
Route::get('/login', [UsuarioController::class, 'login']);
Route::post('/login', [UsuarioController::class, 'autenticar']);
Route::post('/logout', [UsuarioController::class, 'logout']);

// PÁGINA PRINCIPAL
Route::get('/principal', function () {
    return view('principal');
});

// TUTORES
Route::get('/tutores/listar', [TutorController::class, 'listar']);
Route::get('/tutores/create', [TutorController::class, 'create']);
Route::post('/tutores', [TutorController::class, 'store']);
Route::get('/tutores/{id}/edit', [TutorController::class, 'edit']);
Route::put('/tutores/{id}', [TutorController::class, 'update']);
Route::delete('/tutores/{id}', [TutorController::class, 'destroy']);

// PETS
Route::get('/pets/listar', [PetController::class, 'listar']);
Route::get('/pets/create', [PetController::class, 'create']);
Route::post('/pets', [PetController::class, 'store']);
Route::get('/pets/{id}/edit', [PetController::class, 'edit']);
Route::put('/pets/{id}', [PetController::class, 'update']);
Route::delete('/pets/{id}', [PetController::class, 'destroy']);

// AGENDAMENTOS
Route::get('/agendamentos/listar', [AgendamentoController::class, 'listar']);
Route::get('/agendamentos/create', [AgendamentoController::class, 'create']);
Route::post('/agendamentos', [AgendamentoController::class, 'store']);
Route::get('/agendamentos/{id}/edit', [AgendamentoController::class, 'edit']);
Route::put('/agendamentos/{id}', [AgendamentoController::class, 'update']);
Route::delete('/agendamentos/{id}', [AgendamentoController::class, 'destroy']);
