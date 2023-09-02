<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Produto;

class WelcomeController extends Controller
{
    public function index()
    {
        $produtos = Produto::join('categorias', 'produtos.categoria_id', '=', 'categorias.id')
            ->select('produtos.*', 'categorias.nome as nome_categoria')
            ->get();
        $faqs = Faq::all();
        return view('welcome', ['produtos' => $produtos, 'faqs' => $faqs]);
    }
}
