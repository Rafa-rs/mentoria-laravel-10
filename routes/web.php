<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
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
