<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidosController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::resource('produtos', ProdutoController::class);
Route::resource('users', UserController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');
Route::get('/pedidoSolicitado', [SiteController::class, 'pedidos'])->name('site.pedidoSolicitado');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');   
Route::post('/carrinho', [CarrinhoController::class, 'adicionaCarrinho'])->name('site.addCarrinho');
Route::post('/remover', [CarrinhoController::class, 'removeCarrinho'])->name('site.removeCarrinho');
Route::post('/atualizar', [CarrinhoController::class, 'atualizaCarrinho'])->name('site.atualizaCarrinho');
Route::get('/limpar', [CarrinhoController::class, 'limpaCarrinho'])->name('site.limpaCarrinho');
Route::get('/pedidos', [CarrinhoController::class, 'cadastrarPedidos'])->name('site.pedidos');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');

Route::get('/admin/dashboard', [DashboradController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'checkemail']);
Route::get('/admin/produtos', [ProdutoController::class, 'index'])->name('admin.produtos');
Route::delete('/admin/produto/delete/{id}', [ProdutoController::class, 'destroy'])->name('admin.produto.delete');
Route::post('/admin/produtos/store', [ProdutoController::class, 'store'])->name('admin.produto.store');
Route::get('/admin/pedidos', [ProdutoController::class, 'pedidos'])->name('admin.pedidos');
Route::get('/admin/categorias', [ProdutoController::class, 'categorias'])->name('admin.categorias');
Route::delete('/admin/categorias/delete/{id}', [ProdutoController::class, 'categoriasDestroy'])->name('admin.categorias.delete');
Route::post('/admin/categorias/store', [ProdutoController::class, 'categoriaStore'])->name('admin.categoria.store');