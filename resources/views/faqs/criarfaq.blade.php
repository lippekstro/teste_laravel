@extends('layouts.main')

@section('titulo', 'FAQs')

@section('conteudo')

<section class="col-md-5 mx-md-auto m-3">
    <form action="/faqs" method="post" class="p-3 rounded bg-dark-subtle">
        @csrf

        <div class="mb-3">
            <label for="pergunta" class="form-label">Pergunta</label>
            <textarea class="form-control" id="pergunta" rows="3" name="pergunta"></textarea>
        </div>

        <div class="mb-3">
            <label for="resposta" class="form-label">Resposta</label>
            <textarea class="form-control" id="resposta" rows="3" name="resposta"></textarea>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Enviar</button>
    </form>
</section>

@endsection