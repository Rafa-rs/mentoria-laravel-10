<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProdutos = $this->totalProdutosCadastrados();
        $totalClientes = $this->totalClientesCadastrados();
        $totalVendas = $this->totalVendasCadastrados();
        $totalUsuarios = $this->totalUsuariosCadastrados();

        return view(
            'pages.dashboard.dashboard',
            compact(
                'totalProdutos',
                'totalClientes',
                'totalVendas',
                'totalUsuarios'
            )
        );
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

    public function totalUsuariosCadastrados()
    {
        $totalUsuarios = User::all()->count();

        return $totalUsuarios;
    }
}
