@extends('admin.layout')
@section('titulo', 'Pedidos')
@section('conteudo')   

<div class="row container">
    <h3>Pedidos</h3>
    @foreach ($pedidos as $pedido)
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{url("storage/{$pedido->produtos->imagem}")}}">
                </div>

                <div class="card-content">
                    <span class="card-title">Valor: {{$pedido->preco}}</span>
                    <p>Quantidade: {{Str::limit($pedido->quantidade), 50}}</p><br>
                    <P>Descrição: {{$pedido->produtos->descricao}}</P>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection