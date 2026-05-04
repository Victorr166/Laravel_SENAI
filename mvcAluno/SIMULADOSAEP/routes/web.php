<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/funcionario/listar',[SimuladoController::class, 'listar'])->name('funcionario.listar');
name:('funcionario.listar');

Route::get('/funcionario/cadastrar', function(){
    return view('cadastro');
})->name('funcionario.cadastro'); 


Route::post('funcionario/salvar',[SimuladoController::class, 'add'])-> name('aluno.salvar');


Route::get('/funcionario/{id}/atualizar', [SimuladoController::class, 'atualizar'])->name('funcionario.atualizar');

Route::put('/funcionario/{id}/update',[SimuladoController::class, 'update'])->name('funcionario.update');

Route::delete('/funcionario/{id}',[SimuladoController::class, 'deletar'])->name('funcionario.deletar');


Route::get('/departamento/cadastrar', function(){
    return view('cadastroTurma');
})->name('departamento.cadastro');

Route::post('/departamento/salvar',[SimuladoController::class, 'add'])->name('departamento.salvar');