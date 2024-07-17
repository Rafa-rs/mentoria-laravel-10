@extends('index')

@section('content')
    
    <form class="form" method="POST" action="{{ route('venda.cadastrar') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Criar Nova Venda</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº</label>
            <input type="text" value="{{ $findNumeracao }}" disabled class="form-control" name="numero_da_venda">
            
        </div>
        <div  class="mb-3">
            <label class="form-label">Produto</label>
            <select class="form-select" name="produto_id">
                <option selected>Click para selecionar</option>
                @foreach ($Produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
                                
            </select>
        </div>
        <div  class="mb-3">
            <label class="form-label">Cliente</label>
            <select class="form-select" name="cliente_id">
                <option selected>Click para selecionar</option>
                @foreach ($Clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
                                
            </select>
        </div>
        
        <button type="submit" class="btn btn-success btn-sm">Gravar</button>
        <a class="btn btn-outline-secondary btn-sm" type="button" href="{{ route('vendas.index') }}">Cancelar</a>
    </form>

@endsection