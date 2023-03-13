<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categoria;
use App\Models\produto;
use App\Models\pedidos;

//use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboradController extends Controller {

    public function index() {
        $usuarios = User::all()->count();
        $id = Auth::id();
        $pedidos = pedidos::all();
        $quantidadePedidos = pedidos::all()->count();

        if ($id == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }

        $UsuariosPorAno = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        foreach ($UsuariosPorAno as $usuario) {
            $ano[] = $usuario->ano;
            $totalUsuarios[] = $usuario->total;
        }

        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        //echo '<pre>';var_dump($userAno);exit;
        $userTotal = implode(',', $totalUsuarios);

        $listaCategorias = Categoria::with('produtos')->get();
        foreach ($listaCategorias as $categoria) {
           $nomesCatgorias[] = "'" . $categoria->nome . "'";
           $totalCategorias[] = $categoria->produtos->count();
        }

        $faturamento = 0;
        foreach ($pedidos as $key => $pedido) {
            $preco = $pedido->preco;
            $faturamento = $preco + $faturamento;
        }

        $totalNomesCategorias = implode(',', $nomesCatgorias);
        $totalDeCategorias = implode(',', $totalCategorias);

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'totalNomesCategorias', 'totalDeCategorias', 'admin', 'quantidadePedidos', 'faturamento'));
    }
}
