@extends('layouts.main')

@section('titulo', 'Produtos')

@section('conteudo')

@if(session('msg'))
<section class="text-center m-3 mx-md-auto col-md-6">
    <div class="alert alert-{{session('tipo')}}" role="alert">
        {{session('msg')}}
    </div>
</section>
@endif

<section class="p-3 table-responsive">
    <section class="d-flex justify-content-center">
        <form action="/produtos" method="GET" class="col-md-6 d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Busca" name="busca" aria-label="Busca">
            <button class="btn btn-outline-success" type="submit">Busca</button>
        </form>
    </section>

    @if($busca)
    <section>
        Resultados para: {{$busca}}
    </section>
    @endif

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Em estoque?</th>
                <th colspan="2" class="text-center">
                    <a href="/produtos/create" class="btn btn-success">Adicionar</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $p)
            <tr>
                <td><a href="/produtos/{{$p->id}}">{{$p->id}}</a></td>
                <td>{{$p->nome}}</td>
                <td>{{$p->nome_categoria}}</td>
                <td>{{$p->estocado == 1 ? 'Sim' : 'Não'}}</td>
                <td class="text-center">
                    <a href="/produtos/{{$p->id}}/edit" class="btn btn-info">Editar</a>
                </td>
                <td class="text-center">
                    <form action="/produtos/{{$p->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Deletar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>



@endsection