<?php

namespace App\Http\Controllers;
use App\Models\pedidos;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller {
    public function carrinhoLista() {
        $id = Auth::id();

        if ($id == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }

        $itens = \Cart::getContent();
        return view('site.carrinho', compact('itens', 'admin'));
    }

    public function adicionaCarrinho(Request $request) {
       \Cart::add([
        'id' => $request->id,
        'name' => $request->name,
        'price' => $request->price,
        'quantity' => abs($request->qnt),
        'attributes' => array(
            'image' => $request->img
        )
       ]);

       return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso!');
    }

    public function removeCarrinho(Request $request) {
        \Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido do carrinho com sucesso!');
    }

    public function atualizaCarrinho(Request $request) {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity)
            ]
        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto atualizado do carrinho com sucesso!');
    }

    public function limpaCarrinho() {
        \Cart::clear();
        return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho está vazio!');
    }

    public function cadastrarPedidos(Request $request)  {
        $dados = $request->query;

        foreach ($dados as $key => $dadoItem) {
            if ($key == 'id') {
                $item['idItem'] = explode(',', $dadoItem);
            }

            if ($key == 'id_user') {
                $item['id_user'] = explode(',', $dadoItem);
            }

            if ($key == 'price') {
                $item['priceItem'] = explode(',', $dadoItem);
            }

            if ($key == 'quantidade') {
                $item['quantidadeItem'] = explode(',', $dadoItem);
            }
        }


        if ($item['idItem'][0] == 0) {
            return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho está vazio!');
        }

        $cont = 0;

        while($cont < count($item['idItem'])) {

            $form = array(
                'preco' => $item['priceItem'][$cont] * $item['quantidadeItem'][$cont],
                'quantidade' => $item['quantidadeItem'][$cont],
                'id_user' => $item['id_user'][$cont],
                'id_produto' => $item['idItem'][$cont]
            );
            $form = Pedidos::create($form);
            $cont ++;
        }

        \Cart::clear();
        return redirect()->route('site.carrinho')->with('sucesso', 'Seus pedidos foram cadastrados com Sucesso!');    
    }
}
