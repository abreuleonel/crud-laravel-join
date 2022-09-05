<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = ['id_categoria', 'nome_produto', 'valor_produto'];

    public function relCategories()
    {
        return $this->hasOne(related: 'App\Models\Models\CategoriaProduto', foreignKey: 'id', localKey: 'id_categoria');
    }
}
