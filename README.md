<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

-----------------------------------------------------------------------------

# Apresentação
Olá caro amigo desenvolvedor ou recrutador, aqui abaixo está pequenas anotações e explicações sobre o Laravel que quis salvar pra mim e que possa ajuda-ló
Qualquer dúvida pode entrar em contato com o número (71)99734-3101 ou pelo e-mail (Wathsapp) jonnasnogueira2@gmail.com

# Extensões recomendadas no VS CODE que podem ajudar na produtividade
Laravel Blade Snippets
Laravel Snippets

# Bibliotecas utilizadas no projeto 
- materializecss (https://materializecss.com/)
- darryldecode/cart (composer require darryldecode/cart)

# Tipos de direcionamento
Usando controler (php artisan make:controller (NomeDoController) --resource(caso queira que venha com algumas funções prontas))
Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');
Route::get('/produto/{id?}', [ProdutoController::class, 'show'])->name('produto.show');

Direcionamento padrão
Route::get('/', [function () {
    return view('welcome');
}]);

- Direcionando e aceitando todos os tipos de requisições
Route::any('/any', function(){
    return "Permite todo tipo de acesso http (Put, delete, get, post)";
});

- Direcionando e aceitando apenas padrões pré-estabeliciddos
Route::match(['get', 'post'], '/math', function(){
    return "Permite apenas acessos definidos";
});

- Direcionando e passando dados, sendo esses dados obrigatórios ou opcionais
Route::get('/produto/{id}/{categoria?}/', function($id, $categoria = ''){
    return 'Id do produto é :' . $id . "<br> Da categoria :" . $categoria;
});

- Redirecionando de uma página para outro
Route:: redirect('/sobre', '/empresa');

- Direcionamento direto
Route:: view('/empresa', 'site/empresa');

- Criando nome de rotas e redirecionamento de rotas por nome
Route::get('/news', function () {
    return view('site/news');
})->name("noticias");

Route::get('/novidades', function () {
   return redirect()->route('noticias');
});

- Grupo de rotas por name ou prefix
Route::(name ou prefix)('admin')->group(function(){

Route::group([
    'prefix' => 'admin',
    "as" => 'admin.'//as = name, mas por causa do group
], function(){
    Route::get('dashboard', function () {
        return 'dashboard';
    })->name("dashboard");
    
    Route::get('users', function () {
        return 'users';
    })->name("users");
    
    Route::get('clientes', function () {
        return 'clientes';
    })->name("clientes");

});

# Migrations

php artisan make:migration {nomeDaMigration} --create={nomeDaMigration}  -{cria migration}
php artisan migrate:reset // reseta as tabelas
php artisan migrate // cria as tabelas do migrate no banco de dados
php artisan migrate:rollback // apaga as tabelas do banco de dados do migrate
php artisan migrate:status // verifica o andamento das tabelas do banco
php artisan migrate:refresh // recarrega todas as tabelas
php artisan migrate:fresh // apaga todas as tabelas e recria elas  

- Schema::rename('produtos', 'produto'); // trocando o nome de uma tabela
- Schema::dropIfExists('produto'); // Apaga uma tabela caso exista

- Cria uma model, migration, controler e resource com o mesmo nome em um comando
php artisan make:model produto // Cria uma model com o nome de produto
php artisan make:model categoria --migration --controller --resource OU// php artisan make:model Categoria -m -c -cr OU// php artisan make:model Categoria -mcr


- $table->string('imagem')->nullable(); //Aceita campo nulo
- $table->unsignedBigInteger('id_user');// Interligação com uma tabela estrangeira
- $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');// Cria uma ligação com a tabela relacionada e caso a coluna relacionada for apagada, esse dado também será
- $table->timestamps();// Data da criação do registro e da atualização

# Seeds
php artisan make:seeder CategoriasSeeder // cria a seeder
php artisan db:seed // Roda o seeder
php artisan make:factory CategoriaFactory // criar um factory
- $this->faker // Cria registro fake

# controllers
php artisan make:controller (NomeDoController) --resource(caso queira que venha com algumas funções prontas)

$nome = 'Jonnas';
$idade = 23;
return view('site/empresa', compact('nome', 'idade')); //Envie as variaveis com valores

- passando dados para view com itens {
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}

- return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido do carrinho com sucesso!'); // redirecionando com mensagem

- abs() //função para tratar numero com valores absolutos

# view
{{$html}} //Recebe a variável sem interpretar os comandos html
{!! $html !!} //Recebe a variável interpretando os comandos html

@extends('site.layout') //Informar qual página ele está se conectando
@section('title', 'Home') //titulo da seção
@section('conteudo') // conteúdo da seçãoo
    <\h1>Essa é a nossa home<\h1> //Conteúdo da página //O que vai ser passado na seção entre o ínicio e o fim
@endsection //fim da seção

<\title>@yield('title')<\/title> // Titulo que vai ser recebido na seção
<\body>
    @yield('conteudo') //conteudo recebido na herança
<\body>

{{-- Comentário --}}

- Para criar uma página para ver os erros na aplicação, basta ir em "VIES" criar uma página o nome "ERRORS" e dentro destá pasta criar um arquivo com o código do erro .blade.php
EX: 404.blade.php

@php //adicionanco comandos PHP
    $i = 0;
@endphp

- Estrutura de controle {
    @if ($nome == 'jonnas') //if
        true
    @else //else
        false
    @endunless

    @switch($idade) //swtich
        @case(23) //cases
            idade certa
            @break
        @case(24)
            idade errada
            @break
        @default
            idade incompativel
    @endswitch

    @auth //verificar usuário autenticado
        está autenticado
    @endauth

    @guest //verifica usuário não autenticado
        não está autenticado
    @endauth
}

- Estrutura de repetição {
    @for ($i = 0; $i < 10; $i++) //for
        valor atual é {{$i}} <br>
    @endfor

    @while ($i < 10) //while
        valor atual é {{$i}} <br>
        @php
            $i ++;
        @endphp
    @endwhile

    @foreach ($frutas as $fruta) //foreach
        {{$fruta}} <br>
    @endforeach

    @forelse ($frutas as $fruta) //foreach
        {{$fruta}} <br>
    @empty //caso array esteja vazio
        array vazio
    @endforelse
}

- include {
    @include('includes.mensagem', ['titulo' => 'Mensagem de sucesso']) //escreva uma mensagem em um padrão ja elaborado
    { //arquivo do include
        <h1>{{$titulo}}</h1>
        <p>Mensagem de sucesso</p>
    }

    @component('components.sidebar') //escreve em um componente com o padrão ja elaborado
        @slot('paragrafo')
            Texto de teste do slot
        @endslot
    @endcomponent { //arquivo do component
        <div style="background-color: black; color: #ffff">
            <h1>Sidebar</h1>
            <p>{{$paragrafo}}</p>
        </div>
    }
}

- Enviando styles e modelagens {
    @push('style') // envia o modelo a ser seguido
        <!-- Compiled and minified CSS -->
        <\link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    @endpush

    @stack('style') // recebe os dados passados pelos push com uma stack com o mesmo nome
}

- view:cache // modelo padrão de visualização
- view:clear // força o laravel a pré-compilar a sua view

- paginação {
    no controller:
        $produtos = Produto::all(); //apresenta todos os produtos
        $produtos = Produto::paginate(20); //cria uma páginação de 20 produtos por página
    
    na view:
         {{$produtos->links()}} //Cria o botão para avançar e voltar na páginação
}

- passando dados e recebendo numa view {
    $produto = Produto::where('slug', $slug)->first();

        return view('site.details', compact('produto'));
}

- @csrf //para utilizar formulários utilize dentro do formulário

# middleware
- Funções prontas (ou criadas manualmente) do laravel 
php artisan make:middleware 'nome' //cria um middleware

- Apois gerar um middleware ele tem que ser registrado no kernel
- Em ' protected $routeMiddleware' adicione o seu middleware
'nome' => \App\Http\Middleware\nome::class, 