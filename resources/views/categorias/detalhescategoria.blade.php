@extends('layouts.main')

@section('titulo', 'Categorias')

@section('conteudo')

<section class="col-md-5 m-md-auto m-3">
    <div class="alert alert-primary text-center m-3" role="alert">
        {{$categoria->nome}}
    </div>
</section>

@endsection