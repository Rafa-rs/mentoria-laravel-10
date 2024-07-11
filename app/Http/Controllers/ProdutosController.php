<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Iluminate\Http\Request;

class ProdutosController extends Controller
{
    protected function index()
    {
        $findProduto = Produto::all();

        return view('pages.produtos.paginacao', compact('findProduto'));
    }
}
