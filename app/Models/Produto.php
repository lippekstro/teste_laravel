<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco', 'imagem', 'estocado', 'categoria_id'];

    /* indica que produto so tem uma categoria */
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
}
