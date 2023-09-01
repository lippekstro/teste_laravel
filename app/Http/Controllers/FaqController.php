<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;

class FaqController extends Controller
{
    /**
     * mostra a listagem do recurso.
     */
    public function index()
    {
        $busca = request('busca');

        if ($busca) {
            $faqs = Faq::where([
                ['pergunta', 'like', '%' . $busca . '%']
            ])->get();
        } else {
            $faqs = Faq::all();
        }

        return view('faqs.faqs', ['faqs' => $faqs, 'busca' => $busca]);
    }

    /**
     * mostra o formulario parar criar um novo recurso.
     */
    public function create()
    {
        return view('faqs.criarfaq');
    }

    /**
     * guarda um novo recurso criado em um armazenamento.
     */
    public function store(StoreFaqRequest $request)
    {
        $faq = new Faq();

        $faq->pergunta = $request->pergunta;
        $faq->resposta = $request->resposta;
        $faq->save();

        return redirect('faqs')->with('msg', 'Inserido com Sucesso')->with('tipo', 'success');
    }

    /**
     * mostra um recurso especifico.
     */
    public function show(Faq $faq)
    {
        return view('faqs.detalhesfaq', ['faq' => $faq]);
    }

    /**
     * mostra o formulario para editar um recurso especifico.
     */
    public function edit(Faq $faq)
    {
        return view('faqs.editarfaq', ['faq' => $faq]);
    }

    /**
     * atualiza o recurso especifico em um armazenamento.
     */
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $faq->update($request->all());
        return redirect('faqs')->with('msg', 'Atualizado com Sucesso')->with('tipo', 'success');
    }

    /**
     * remove o recurso especifico do armazenamento.
     */
    public function destroy(Faq $faq)
    {
        Faq::findOrFail($faq->id)->delete();

        return redirect('faqs')->with('msg', 'Deletado com Sucesso')->with('tipo', 'danger');
    }
}
