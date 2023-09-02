@extends('layouts.main')

@section('titulo', 'Produtos')

@section('conteudo')

<section class="col-md-5 mx-md-auto m-3">
    <form action="/produtos" method="post" enctype="multipart/form-data" class="p-3 rounded bg-dark-subtle">
        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nome do produto" name="nome">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Preço</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="preco" step="0.01">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" rows="3" name="descricao"></textarea>
        </div>

        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="categoria">
                @foreach($categorias as $c)
                <option value="{{$c->id}}">{{$c->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Imagem</label>
            <input type="file" class="form-control" id="exampleFormControlInput1" name="imagem">
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Enviar</button>
    </form>
</section>

@endsection