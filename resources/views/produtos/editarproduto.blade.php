@extends('layouts.main')

@section('titulo', 'produtos')

@section('conteudo')

<section class="col-md-5 mx-md-auto m-3">
    <form action="/produtos/{{$produto->id}}" method="post" enctype="multipart/form-data" class="p-3 rounded bg-dark-subtle">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nome do produto" name="nome" value="{{$produto->nome}}">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Preço</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="preco" step="0.01" value="{{$produto->preco}}">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" rows="3" name="descricao">{{$produto->descricao}}</textarea>
        </div>

        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="categoria_id">
                @foreach($categorias as $c)
                <option value="{{$c->id}}" @selected(old('categoria_id', $produto->categoria_id) == $c->id)>{{$c->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="my-3">
            <label for="">Estocado?</label>
            <div class="form-check">
              <input id="sim" name="estocado" type="radio" class="form-check-input" value="1" @checked(old('estocado', $produto->estocado) == 1) required>
              <label class="form-check-label" for="sim">Sim</label>
            </div>
            <div class="form-check">
              <input id="nao" name="estocado" type="radio" class="form-check-input" value="0" @checked(old('estocado', $produto->estocado) == 0) required>
              <label class="form-check-label" for="nao">Não</label>
            </div>
          </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Imagem</label>
            <input type="file" class="form-control" id="exampleFormControlInput1" name="imagem">
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Atualizar</button>
    </form>
</section>

@endsection