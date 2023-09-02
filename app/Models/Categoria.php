<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    /* indica que categorias tem muitos produtos */
    public function produtos(){
        return $this->hasMany('App\Models\Produto');
    }
}
