@extends('admin.layout')
@section('titulo', 'Categorias')
@section('conteudo')    
    <div class="fixed-action-btn">
        <a  class="btn-floating btn-large bg-gradient-green modal-trigger" href="#create">
        <i class="large material-icons">add</i>
        </a>   
    </div>

    @include('admin.categorias.create')

    <div class="row container crud">
        <div class="row titulo ">              
            <h1 class="left">Pedidos</h1>
            <span class="right chip">{{$categorias->count()}} produtos exibidos nesta página</span>  
        </div>

        <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
                <form>
                    <div class="input-field">
                        <input placeholder="Pesquisar..." id="search" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>     

        <div class="card z-depth-4 registros" >
            <table class="striped ">
                @include('admin.includes.mensagens')
                <thead>
                    <tr>
                        <th>ID</th>  
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th></th>
                    </tr>
                </thead>
            
                <tbody>

                    @foreach ($categorias as $categoria)     
                        <tr>         
                            <td>#{{$categoria->id}}</td>            
                            <td>{{$categoria->nome}}</td>            
                            <td>{{$categoria->descricao}}</td>
                            <td><a href="#deleteCategoria-{{$categoria->id}}" class="btn-floating modal-trigger waves-effect waves-light red"><i class="material-icons">delete</i></a></td>
                            @include('admin.categorias.delete')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>           
    </div>
@endsection