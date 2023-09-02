@extends('layouts.main')

@section('titulo', 'Loja')

@section('conteudo')

@php
$primeiro = true;
@endphp

<section class="mx-md-auto m-3">
    <h1 class="text-center">Produtos</h1>
    <section class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3">
            @foreach($produtos as $p)
            <div class="col">
                <div class="card m-3 shadow-sm h-100">
                    <img src="data:image;charset=utf8;base64,{{base64_encode($p->imagem)}}" class="card-img-top" alt="{{$p->nome}}">
                    <div class="card-body overflow-auto">
                        <h2 class="card-title">{{$p->nome}}</h2>
                        <p class="card-text">{{$p->nome_categoria}}</p>
                        <p class="card-text">{{$p->descricao}}</p>
                        <p class="card-text">R$ {{$p->preco}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</section>

<section class="col-md-5 mx-md-auto m-3">
    <h1 class="text-center">FAQs</h1>
    <div class="accordion" id="accordionExample">
        @foreach($faqs as $f)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button {{$primeiro ? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$f->id}}" aria-expanded="true" aria-controls="collapse{{$f->id}}">
                    {{$f->pergunta}}
                </button>
            </h2>
            <div id="collapse{{$f->id}}" class="accordion-collapse collapse {{$primeiro ? 'show' : ''}}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    {{$f->resposta}}
                </div>
            </div>
        </div>
        @php
        $primeiro = false;
        @endphp
        @endforeach
    </div>
</section>


@endsection