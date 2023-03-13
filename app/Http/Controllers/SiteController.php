<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\produto;
use App\Models\Categoria;
use App\Models\pedidos;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;

class SiteController extends Controller {
    public function index() {
        $id = Auth::id();

        if ($id == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }

        $produtos = Produto::paginate(15);
        return view('site/home', compact('produtos', 'admin'));
    }

    public function pedidos() {
        $id = Auth::id();

        if ($id == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }

        $pedidos = pedidos::all();
        return view('site/pedidos', compact('pedidos', 'admin'));
    }

    public function details($slug) {
        $produto = Produto::where('slug', $slug)->first();

        $id = Auth::id();

        if ($id == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }

        /*
        if (Gate::allows('verProduto', $produto)) {
            return view('site.details', compact('produto'));
        }

        if (Gate::denies('verProduto', $produto)) {
            return redirect()->route('site.index');
        }
        */
        return view('site.details', compact('produto', 'admin'));
    }

    public function categoria($id) {
        $id_user = Auth::id();

        if ($id_user == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }

        $categoria = Categoria::find($id);
        $produtos = Produto::where('id_categorias', $id)->paginate(12);

        return view('site.categoria', compact('produtos', 'categoria', 'admin'));
    }
}
