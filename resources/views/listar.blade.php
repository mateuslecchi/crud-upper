@extends('base')
@section('conteudo')
    <h2>Usuários Cadastrados</h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success my-2">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a href="novo" class="btn btn-sm btn-success">Cadastrar Novo</a>

    @if ($usuario->isEmpty())
        <p class="my-5">Nenhum usuário cadastrado!</p>
    @else
    <table class="table table-bordered my-3 ">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome Completo</th>
            <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>

        @foreach  ($usuario as $usuarios)
            <tr>
            <th scope="row">{{ $usuarios->id }}</th>
            <td>{{ $usuarios->nome }}</td>
            <td>
                <a href="usuario/{{ $usuarios->id }}" class="btn btn-sm btn-primary">Ver Detalhes</a>
                <a href="editar/{{ $usuarios->id }}" class="btn btn-sm btn-warning">Editar</a>
                <a href="excluir/{{ $usuarios->id }}" class="btn btn-sm btn-danger">Excluir</a>
            </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    @endif
@endsection