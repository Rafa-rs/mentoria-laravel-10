<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProdutos = $this->totalProdutosCadastrados();
        $totalClientes = $this->totalClientesCadastrados();
        $totalVendas = $this->totalVendasCadastrados();

        return view('pages.dashboard.dashboard', compact('totalProdutos', 'totalClientes', 'totalVendas'));
    }

    public function totalProdutosCadastrados()
    {
        $totalProdutos = Produto::all()->count();

        return $totalProdutos;
    }

    public function totalClientesCadastrados()
    {
        $totalClientes = Cliente::all()->count();

        return $totalClientes;
    }

    public function totalVendasCadastrados()
    {
        $totalVendas = Venda::all()->count();

        return $totalVendas;
    }
}
