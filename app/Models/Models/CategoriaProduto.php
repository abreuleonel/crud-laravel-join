<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    use HasFactory;
    protected $table = 'categoria_produtos';
    protected $fillable = ['nome'];

    public function relProdutos()
    {
        return $this->hasOne(related: 'App\Models\Models\Produtos', foreignKey: 'id', localKey: 'id_categoria');
    }
}
