@extends('layouts.main')

@section('titulo', 'Categorias')

@section('conteudo')

<section class="col-md-5 mx-md-auto m-3">
    <form action="/categorias" method="post" class="p-3 rounded bg-dark-subtle">
        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome da Categoria</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nome da categoria" name="nome">
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Enviar</button>
    </form>
</section>

@endsection