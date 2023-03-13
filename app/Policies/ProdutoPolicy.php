<?php

namespace App\Policies;

use App\Models\User;
use App\Models\produto;
use Illuminate\Auth\Access\HandlesAuthorization;


class ProdutoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function verProduto(User $user, Produto $produto){
        return $user->id == $produto->id_user;
    }
}