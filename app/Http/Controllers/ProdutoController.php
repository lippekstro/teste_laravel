<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $busca = request('busca');

        if ($busca) {
            $produtos = Produto::join('categorias', 'produtos.categoria_id', '=', 'categorias.id')
                ->select('produtos.*', 'categorias.nome as nome_categoria')
                ->where('produtos.nome', 'like', '%' . $busca . '%')
                ->get();
        } else {
            $produtos = Produto::join('categorias', 'produtos.categoria_id', '=', 'categorias.id')
                ->select('produtos.*', 'categorias.nome as nome_categoria')
                ->get();
        }
        return view('produtos.produtos', ['produtos' => $produtos, 'busca' => $busca]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.criarproduto', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = new Produto();

        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->categoria_id = $request->categoria;
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $conteudoImagem = file_get_contents($imagem->getRealPath());
            $produto->imagem = $conteudoImagem;
        } else {
            $produto->imagem = file_get_contents(public_path('/img/dummy.png'));
        }

        $produto->save();

        return redirect('produtos')->with('msg', 'Inserido com Sucesso')->with('tipo', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('produtos.detalhesproduto', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.editarproduto', ['produto' => $produto, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->categoria_id = $request->categoria_id;
        $produto->estocado = $request->estocado;
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $conteudoImagem = file_get_contents($imagem->getRealPath());
            $produto->imagem = $conteudoImagem;
        }
        $produto->update();
        return redirect('produtos')->with('msg', 'Atualizado com Sucesso')->with('tipo', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        Produto::findOrFail($produto->id)->delete();

        return redirect('produtos')->with('msg', 'Deletado com Sucesso')->with('tipo', 'danger');
    }
}
