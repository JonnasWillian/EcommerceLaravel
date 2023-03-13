@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="row container">

    @if ($mensagem = Session::get('sucesso'))
        <div class="card green">
            <div class="card-content white-text">
            <span class="card-title">Parabéns</span>
            <p>{{$mensagem}}</p>
            </div>
        </div>
    @endif

    @if ($mensagem = Session::get('aviso'))
        <div class="card blue">
            <div class="card-content white-text">
            <span class="card-title">Tudo bem</span>
            <p>{{$mensagem}}</p>
            </div>
        </div>
    @endif

    @if ($itens->count() == 0)
        <div class="card orange">
            <div class="card-content white-text">
            <span class="card-title">Seu carrinho está vazio!</span>
            <p>Aproveite nossas promoções!</p>
            </div>
        </div>
    @else
    <h5>Seu carrinho possui {{ $itens->count() }} produtos.</h5>
    <table>
        <thead>
          <tr>
              <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
            @foreach ($itens as $item)
                @php
                    $carrinho['id'][] = $item->id;
                    $carrinho['price'][] = $item->price;
                    $carrinho['quantidade'][] = $item->quantity;
                @endphp
                <tr>
                    <td><img src="{{url("storage/{$item->attributes->image}")}}" width="80px" alt="imagem do produto" class="responsive-img circle"></td>
                    <td>{{$item->name}}</td>
                    <td>{{ number_format($item->price, 2, ',', '.') }}</td>

                    <form action="{{route('site.atualizaCarrinho')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <td><input style="width:40 px; font-weight:900;" class="white center" min="1" type="number" name="quantity" value="{{$item->quantity}}"></td>
                        <td>
                        <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                    </form>

                    <form action="{{route('site.removeCarrinho')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                    </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card orange">
        <div class="card-content white-text">
        <span class="card-title">R$ {{ number_format(\Cart::getTotal(), 2, ',', '.') }}</span>
        <p>Pague em até 12x sem juros</p>
        </div>
    </div>
    @endif

    @php
        if (count($itens) > 0) {
            $id = implode(',', $carrinho['id']);
            $price = implode(',', $carrinho['price']);
            $quantidade = implode(',', $carrinho['quantidade']);
        } else {
            $id = 0;
            $price = 0;
            $quantidade = 0;
        }
    @endphp

    <div class="row container center">
        <form action="{{route('site.pedidos')}}" method="GET" enctype="multipart/form-data">
            @csrf
            <a href="{{route("site.index")}}" class="btn waves-effect waves-light blue">Continuar comprando<i class="material-icons right">arrow_back</i></a>
            <a href="{{route("site.limpaCarrinho")}}" class="btn waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></a>

            <input type="hidden" name="id" value="{{$id}}">
            <input type="hidden" name="price" value="{{$price}}">
            <input type="hidden" name="quantidade" value="{{$quantidade}}">
            <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
            <button class="btn waves-effect waves-light green">Finalizar pedido<i class="material-icons right">check</i></button>
        </form>
    </div>
</div>

@endsection