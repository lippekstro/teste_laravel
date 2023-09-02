<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $busca = request('busca');

        if ($busca) {
            $categorias = Categoria::where([
                ['nome', 'like', '%' . $busca . '%']
            ])->get();
        } else {
            $categorias = Categoria::all();
        }
        return view('categorias.categorias', ['categorias' => $categorias, 'busca' => $busca]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.criarcategoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();

        $categoria->nome = $request->nome;
        
        $categoria->save();

        return redirect('categorias')->with('msg', 'Inserido com Sucesso')->with('tipo', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('categorias.detalhescategoria', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.editarcategoria', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect('categorias')->with('msg', 'Atualizado com Sucesso')->with('tipo', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        Categoria::findOrFail($categoria->id)->delete();

        return redirect('categorias')->with('msg', 'Deletado com Sucesso')->with('tipo', 'danger');
    }
}
