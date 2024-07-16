<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestClientes;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;

class ClientesController extends Controller
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        //dd($pesquisar);
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');
        //dd($findProduto);
        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = Cliente::find($id);
        $buscarRegistro->delete();
        return response()->json(['success' => true]);
    }

    public function cadastrarCliente(FormRequestClientes $request)
    {
        if ($request->method() == "POST") {
            //cria os dados
            $data = $request->all();

            Cliente::create($data);

            Toastr::success('Registro salvo com sucesso.', 'Parabéns!', ["positionClass" => "toast-top-center"]);

            return redirect()->route('clientes.index');
        }

        return view('pages.clientes.create');
    }

    public function atualizarCliente(FormRequestClientes $request, $id)
    {
        if ($request->method() == "PUT") {

            //atualiza os dados
            $data = $request->all();

            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Registro alterado com sucesso.', 'Tudo certo!', ["positionClass" => "toast-top-center"]);

            return redirect()->route('clientes.index');
        }

        //mostrar dados
        $findCliente = Cliente::where('id', '=', $id)->first();

        return view('pages.clientes.update', compact('findCliente'));
    }
}
