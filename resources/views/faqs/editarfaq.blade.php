@extends('layouts.main')

@section('titulo', 'FAQs')

@section('conteudo')

<section class="col-md-5 m-md-auto m-3">
    <form action="/faqs/{{$faq->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="pergunta" class="form-label">Pergunta</label>
            <textarea class="form-control" id="pergunta" rows="3" name="pergunta">{{$faq->pergunta}}</textarea>
        </div>

        <div class="mb-3">
            <label for="resposta" class="form-label">Resposta</label>
            <textarea class="form-control" id="resposta" rows="3" name="resposta">{{$faq->resposta}}</textarea>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Atualizar</button>
    </form>
</section>

@endsection