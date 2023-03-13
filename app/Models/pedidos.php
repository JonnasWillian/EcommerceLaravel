<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model {
    use HasFactory;

    protected $fillable = [
        'preco',
        'quantidade',
        'id_user',
        'id_produto'
    ];

    public $table = 'pedidos';

    public function produtos() {
        return $this->belongsTo(produto::class, 'id_produto');
    }
}
