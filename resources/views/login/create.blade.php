@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<ul id="dropdown1" class="dropdown-content">
    @foreach ($categoriasMenu as $categoriaMenu)
    <li><a href="{{ route('site.categoria', $categoriaMenu->id) }}">{{$categoriaMenu->nome}}</a></li>
    @endforeach
  </ul>

  <ul id="dropdown2" class="dropdown-content">
    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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

<form action="{{route('users.store')}}" method="POST">
    @csrf

    <div class="input-field col s12">
      <i class="material-icons prefix">account_circle</i>
      <input type="text" name="first_name" placeholder="Nome" id="autocomplete-input" class="autocomplete">
      <label for="autocomplete-input"></label>
    </div>

    <div class="input-field col s12">
      <i class="material-icons prefix">account_circle</i>
      <input type="text" name="last_name" placeholder="Sobrenome" id="autocomplete-input" class="autocomplete">
      <label for="autocomplete-input"></label>
    </div>

    <div class="input-field col s12">
      <i class="material-icons prefix">account_circle</i>
      <input type="email" name="email" placeholder="Email" id="autocomplete-input" class="autocomplete">
      <label for="autocomplete-input"></label>
    </div>

    <div class="input-field col s12">
      <i class="material-icons prefix">mode_edit</i>
      <input type="password" name="password" placeholder="Senha" id="autocomplete-input">
      <label for="autocomplete-input"></label>
    </div>

    <button class="btn waves-effect waves-light" type="submit">Cadastrar</button>
</form>