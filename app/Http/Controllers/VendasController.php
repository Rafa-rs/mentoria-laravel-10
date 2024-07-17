<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        //dd($pesquisar);
        $findVenda = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');
        //dd($findProduto);
        return view('pages.vendas.paginacao', compact('findVenda'));
    }

    public function cadastrarVenda(FormRequestVenda $request)
    {
        //gerar numercao
        $findNumeracao = Venda::max('numero_da_venda') + 1;
        //instancias
        $Produtos = Produto::all();
        $Clientes = Cliente::all();

        if ($request->method() == "POST") {
            //cria os dados
            $data = $request->all();
            $data['numero_da_venda'] = $findNumeracao;
            //dd($data);
            Venda::create($data);

            Toastr::success('Registro salvo com sucesso.', 'Parabéns!', ["positionClass" => "toast-top-center"]);

            return redirect()->route('vendas.index');
        }


        return view('pages.vendas.create', compact('findNumeracao', 'Produtos', 'Clientes'));
    }
}
