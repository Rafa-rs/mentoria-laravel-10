<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;

class ProdutosController extends Controller
{
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        //dd($pesquisar);
        $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');
        //dd($findProduto);
        return view('pages.produtos.paginacao', compact('findProduto'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = Produto::find($id);
        $buscarRegistro->delete();
        return response()->json(['success' => true]);
    }

    public function cadastrarProduto(FormRequestProduto $request)
    {
        if ($request->method() == "POST") {
            //cria os dados
            $data = $request->all();

            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            Produto::create($data);

            Toastr::success('Registro salvo com sucesso.', 'Parabéns!', ["positionClass" => "toast-top-center"]);

            return redirect()->route('produto.index');
        }

        return view('pages.produtos.create');
    }

    public function atualizarProduto(FormRequestProduto $request, $id)
    {
        if ($request->method() == "PUT") {

            //atualiza os dados
            $data = $request->all();

            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscaRegistro = Produto::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Registro alterado com sucesso.', 'Tudo certo!', ["positionClass" => "toast-top-center"]);

            return redirect()->route('produto.index');
        }

        //mostrar dados
        $findProduto = Produto::where('id', '=', $id)->first();

        return view('pages.produtos.update', compact('findProduto'));
    }
}
