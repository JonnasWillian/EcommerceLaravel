<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>@yield('title')</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

  <ul id="dropdown1" class="dropdown-content">
    @foreach ($categoriasMenu as $categoriaMenu)
    <li><a href="{{ route('site.categoria', $categoriaMenu->id) }}">{{$categoriaMenu->nome}}</a></li>
    @endforeach
  </ul>

  <ul id="dropdown2" class="dropdown-content">
    @if ($admin)
      <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    @endif
    <li><a href="{{ route('site.pedidoSolicitado') }}">Pedidos</a></li>
    <li><a href="{{ route('site.index') }}">Home</a></li>
    <li><a href="{{ route('login.logout') }}">Sair</a></li>
  </ul>

  <nav class="red">
       <div class="nav-wrapper container">
         <!--//Caso queira deixar um item de menu fixado no final// <a href="{{ route('site.index') }}" class="brand-logo-center">Nome da Loja</a> -->

         <ul id="nav-mobile" class="left">
          <li><a href="{{ route('site.index') }}">Home</a></li>    
          <li><a href="" class="dropdown-trigger" data-target='dropdown1'>Categorias <i class="material-icons right">more</i></a></li>
          <li><a href="{{route('site.carrinho')}}">Carrinho <span class="new badge blue" data-badge-caption="" >{{\Cart::getContent()->count()}}</span> </a></li>
        </ul>

        @auth
          <ul id="nav-mobile" class="right"> 
            <li><a href="" class="dropdown-trigger" data-target='dropdown2'>Olá {{auth()->user()->first_name}} <i class="material-icons right">more</i></a></li>
          </ul>
        @else
          <ul id="nav-mobile" class="right"> 
            <li><a href="{{route('login.form')}}" >Login<i class="material-icons right">lock</i></a></li>
          </ul>
        @endauth

      </div>
  </nav>

    @yield('conteudo')

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
      /* Dropdown */
      var elemDrop = document.querySelectorAll('.dropdown-trigger');
      var instanceDrop = M.Dropdown.init(elemDrop, {
          coverTrigger: false,
          constrainWidth: false
      });
    </script>
</body>
</html>