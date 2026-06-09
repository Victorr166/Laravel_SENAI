<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/produto/listar', [ProdutoController::class, 'listar']) -> name('produto.listar');

// Route::get('/produto/cadastrar', function(){
//     return view('cadastro');
// })->name('produto.cadastro');

Route::get('/produto/cadastrar',[ProdutoController::class, 'cadastro']
)->name('produto.cadastro');

// POST - enviar os dados para cadastrar usuários
Route::post('/produto/salvar', [ProdutoController::class, 'add'])
->name('produto.salvar');

// Tela de Atualizar
Route::get('/produto/{id}/atualizar', [ProdutoController::class, 'atualizar'])
->name('produto.atualizar');

Route::put('/produto/{id}/update', [ProdutoController::class, 'update'])
->name('produto.update');

Route::delete('/fiprodutolme/{id}', [ProdutoController::class, 'deletar'])
->name('produto.deletar');


// AUTOR

Route::get('/produto/cadastrar', function(){
    return view('cadastroProduto');
})->name('produto.cadastro');

Route::post('/produto/salvar', [ProdutoController::class, 'add'])
->name('produto.salvar');