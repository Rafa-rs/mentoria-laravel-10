<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VendasController;




Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    //Create
    Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('produto.cadastrar');
    Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('produto.cadastrar');
    //Update
    Route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('produto.atualizar');
    Route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('produto.atualizar');

    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');
    //Create
    Route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cliente.cadastrar');
    Route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cliente.cadastrar');
    //Update
    Route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('cliente.atualizar');
    Route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('cliente.atualizar');

    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
});

Route::prefix('vendas')->group(function () {
    Route::get('/', [VendasController::class, 'index'])->name('vendas.index');
    //Create
    Route::get('/cadastrarVenda', [VendasController::class, 'cadastrarVenda'])->name('venda.cadastrar');
    Route::post('/cadastrarVenda', [VendasController::class, 'cadastrarVenda'])->name('venda.cadastrar');
    Route::get('/enviaComprovanteEmail/{id}', [VendasController::class, 'enviaComprovanteEmail'])->name('venda.enviaComprovanteEmail');
});

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios.index');
    //Create
    Route::get('/cadastrarUsuario', [UsuariosController::class, 'cadastrarUsuario'])->name('usuario.cadastrar');
    Route::post('/cadastrarUsuario', [UsuariosController::class, 'cadastrarUsuario'])->name('usuario.cadastrar');
    //Update
    Route::get('/atualizarUsuario/{id}', [UsuariosController::class, 'atualizarUsuario'])->name('usuario.atualizar');
    Route::put('/atualizarUsuario/{id}', [UsuariosController::class, 'atualizarUsuario'])->name('usuario.atualizar');

    Route::delete('/delete', [UsuariosController::class, 'delete'])->name('usuario.delete');
});
