@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
        
    </div>
    <div>
        <form class="" action="{{ route('clientes.index') }}" method="get">
            <div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="pesquisar" placeholder="Digite o nome">
                        <button class="btn btn-secondary btn-sm">Pesquisar</button>
                        
                    </div>
                </div>
                <a class="btn btn-success float-end" type="button" href="{{ route('cliente.cadastrar') }}">Registrar</a>
            </div>
        </form>
        <br/>
        <div class="table-responsive small">
            @if ($findCliente->isEmpty())
            <p>Não existem dados!</p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                        <th class="col-4">Nome</th>
                        <th class="col-3">Email</th>
                        <th class="col-3">CEP</th>
                        <th class="col-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findCliente as $cliente)
                            <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->cep }}</td>
                            <td>
                                <a href="{{ route('cliente.atualizar', $cliente->id) }}" 
                                class="btn btn-primary btn-sm">
                                    Editar
                                </a>

                                <meta name='csrf-token' content="{{ csrf_token() }}" />
                                <a onclick="deleteRegistroPaginacao('{{ route('cliente.delete') }}', {{ $cliente->id }})" 
                                    class="btn btn-danger btn-sm">
                                    Excluir
                                </a>
                            </td>
                            </tr>  
                        @endforeach
                        
                    </tbody>
                </table>
            @endif 
        </div>
        
    </div>
@endsection
