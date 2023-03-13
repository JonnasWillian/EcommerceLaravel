<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\produto;
use App\Models\pedidos;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //return 'index';
        //$produtos = \App\Models\produto::all(); // - Ver todos os itens localizados

        $id = Auth::id();

        if ($id == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }
 
        $produtos = Produto::paginate(10);
        $categorias = Categoria::all();
        return view('admin/produtos', compact('produtos', 'categorias', 'admin'));
    }

    public function pedidos()  {
        $id = Auth::id();

        if ($id == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }

        $pedidos = pedidos::all();
        return view('admin/pedidos', compact('pedidos', 'admin'));
    }

    public function categorias()  {
        $id = Auth::id();

        if ($id == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }
 
        $categorias = Categoria::all();
        return view('admin/categorias', compact('categorias', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
       $produto = $request->all();

       $produto['slug'] = Str::slug($request->nome);

       if ($request->imagem) {
           $produto['imagem'] = $request->imagem->store('produtos');
       }

       $produto = Produto::create($produto); 

       return redirect()->route('admin.produtos')->with('sucesso', 'Produto cadastrado com sucesso !');
    }

    public function categoriaStore(Request $request) {
        $categoria['nome'] = $request['nome'];
        $categoria['descricao'] = $request['descricao'];
 
        $categoria = Categoria::create($categoria); 
 
        return redirect()->route('admin.categorias')->with('sucesso', 'Categoria cadastrada com sucesso !');
     }
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)  {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('admin.produtos')->with('sucesso', 'Produto removido com sucesso !');
    }
    public function categoriasDestroy($id) {
        $categorias = Categoria::find($id);
        $categorias->delete();
        return redirect()->route('admin.categorias')->with('sucesso', 'Categoria removida com sucesso !');
    }
}
