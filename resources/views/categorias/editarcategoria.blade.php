@extends('layouts.main')

@section('titulo', 'Categorias')

@section('conteudo')

<section class="col-md-5 mx-md-auto m-3">
    <form action="/categorias/{{$categoria->id}}" method="post" class="p-3 rounded bg-dark-subtle">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome da Categoria</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nome da categoria" name="nome" value="{{$categoria->nome}}">
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Atualizar</button>
    </form>
</section>

@endsection