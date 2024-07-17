@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendas</h1>
        
    </div>
    <div>
        <form class="" action="{{ route('vendas.index') }}" method="get">
            <div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="pesquisar" placeholder="Digite o nome">
                        <button class="btn btn-secondary btn-sm">Pesquisar</button>
                        
                    </div>
                </div>
                <a class="btn btn-success float-end" type="button" href="{{ route('venda.cadastrar') }}">Registrar</a>
            </div>
        </form>
        <br/>
        <div class="table-responsive small">
            @if ($findVenda->isEmpty())
            <p>Não existem dados!</p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                        <th class="col-1">Nº Venda</th>
                        <th class="col-4">Produto</th>
                        <th class="col-5">Cliente</th>
                        <th class="col-2">Ações</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findVenda as $venda)
                            <tr>
                            <td>{{ $venda->numero_da_venda }}</td>
                            <td>{{ $venda->produto->nome }}</td>
                            <td>{{ $venda->cliente->nome }}</td>
                            <td>
                                <a href="{{ route('venda.enviaComprovanteEmail', $venda->id) }}" 
                                    class="btn btn-primary btn-sm">
                                        Enviar Email
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
