@extends('layouts.main')

@section('titulo', 'FAQs')

@section('conteudo')

@php
$primeiro = true;
@endphp

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