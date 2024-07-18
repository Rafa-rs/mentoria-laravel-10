<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestUsuario;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        //dd($pesquisar);
        $findUser = $this->user->getUserPesquisarIndex(search: $pesquisar ?? '');
        //dd($findProduto);
        return view('pages.users.paginacao', compact('findUser'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = User::find($id);
        $buscarRegistro->delete();
        return response()->json(['success' => true]);
    }

    public function cadastrarUsuario(FormRequestUsuario $request)
    {
        if ($request->method() == "POST") {
            //cria os dados
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            //dd($data);
            User::create($data);

            Toastr::success('Registro salvo com sucesso.', 'Parabéns!', ["positionClass" => "toast-top-center"]);

            return redirect()->route('usuarios.index');
        }

        return view('pages.users.create');
    }

    public function atualizarUsuario(FormRequestUsuario $request, $id)
    {
        if ($request->method() == "PUT") {

            //atualiza os dados
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            $buscaRegistro = User::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Registro alterado com sucesso.', 'Tudo certo!', ["positionClass" => "toast-top-center"]);

            return redirect()->route('usuarios.index');
        }

        //mostrar dados
        $findUser = User::where('id', '=', $id)->first();

        return view('pages.users.update', compact('findUser'));
    }
}
