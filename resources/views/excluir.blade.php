@extends('base')
@section('conteudo')
    <h2>Deletar Usuários</h2>
    <form action="{{ route('excluir',['id' => $usuario->id]) }}" method="POST">
        @csrf
        <div class="class my-3">
            <label class="form-label" for="nome">Deseja excluir este usuário?</label>
            <input class="form-control" type="text" name="nome" value="{{ $usuario->nome  }}" disabled>
        </div>
        <button class="btn btn-danger">Excluir Usuário</button>
    </form>

@endsection