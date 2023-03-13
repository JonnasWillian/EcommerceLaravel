@extends('site.layout')
@section('title', 'Detalhes do produto')
@section('conteudo')

<div class="row center"> <br>
    <div class="col s12 m6">
        <img src="{{ url("storage/{$produto->imagem}") }}" class="responsive-img" alt="Imagem do produto">
    </div>

    <div class="col s12 m6">
        <h4>{{ $produto->nome }}</h4>
        <h4>R$: {{ number_format($produto->preco, 2, ',', '.') }}</h4>
        <p>{{ $produto->descricao }}</p>
        <p> Categoria: {{$produto->categoria->nome}} <br>
            Postado por: {{ $produto->user->firstName }}
        </p>

        <form action="{{route('site.addCarrinho')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$produto->id}}">
            <input type="hidden" name="name" value="{{$produto->nome}}">
            <input type="hidden" name="price" value="{{$produto->preco}}">
            <input type="number" min="1" name="qnt" value="1">
            <input type="hidden" name="img" value="{{$produto->imagem}}">
            <button class="btn orange btn-large"> comprar </button>
        </form>
    </div>
</div>

@endsection