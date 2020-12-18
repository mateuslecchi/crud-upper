@extends('base')
@section('conteudo')
    <h2>Cadastrar Usuários</h2>
    <a href="{{ url('') }}" class="btn btn-sm btn-success">Voltar</a>
    <form action="{{ route('registrar') }}" method="POST">
        @csrf
        <div class="class my-3">
            <label class="form-label" for="">Nome Completo</label>
            <input class="form-control" type="text" name="nome" required>
            <label class="form-label" for="">CPF</label>
            <input class="form-control" type="text" name="cpf" required>
            <label class="form-label" for="">Data de Nascimento</label>
            <input class="form-control" type="date" name="nasc" required>
            <label class="form-label" for="">Email</label>
            <input class="form-control" type="email" name="email" required>
            <label class="form-label" for="">Telefone</label>
            <input class="form-control" type="text" name="telefone" required>
            <label class="form-label" for="">Logradoudo</label>
            <input class="form-control" type="text" name="logradouro" required>
            <label class="form-label" for="">Cidade</label>
            <input class="form-control" type="text" name="cidade" required>
            <label class="form-label" for="">Estado</label>
            <input class="form-control" type="text" name="estado" required>
        </div>
        <button class="btn btn-primary">Salvar Novo Usuário</button>
    </form>


@endsection