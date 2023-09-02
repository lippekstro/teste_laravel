@extends('layouts.main')

@section('titulo', 'Produtos')

@section('conteudo')

<section class="col-md-4 mx-md-auto m-3">
    <section class="container">
        <div class="row row-cols-1 g-3">
            <div class="col">
                <div class="card m-3 shadow-sm h-100">
                    <img src="data:image;charset=utf8;base64,{{base64_encode($produto->imagem)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2 class="card-title">{{$produto->nome}}</h2>
                        <p class="card-text">{{$produto->nome_categoria}}</p>
                        <p class="card-text">{{$produto->descricao}}</p>
                        <p class="card-text">R$ {{$produto->preco}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection