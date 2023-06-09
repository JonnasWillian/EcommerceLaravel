<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function produtos() {
        return $this->hasMany(produto::class, 'id_categorias', 'id');
    }
}


