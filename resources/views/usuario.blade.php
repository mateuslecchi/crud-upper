@extends('base')
@section('conteudo')
    <h2>Detalhes do Usuário</h2>
    <table class="table table-bordered my-3">
        <thead>
            <tr>
            <th scope="col">Nome Completo</th>
            <th>{{ $usuario->nome }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">CPF</th>
            <td>{{ $usuario->cpf }}</td>
            </tr>
            <tr>
            <th scope="row">Data de Nascimento</th>
            <td>{{ $usuario->nasc->format('d/m/Y') }}</td>
            </tr>
            <tr>
            <th scope="row">Email</th>
            <td>{{ $usuario->email }}</td>
            </tr>
            <tr>
            <th scope="row">Telefone</th>
            <td>{{ $usuario->telefone }}</td>
            </tr>
            <tr>
            <th scope="row">Logradouro</th>
            <td>{{ $usuario->logradouro }}</td>
            </tr>
            <tr>
            <th scope="row">Cidade</th>
            <td>{{ $usuario->cidade }}</td>
            </tr>
            <tr>
            <th scope="row">Estado</th>
            <td>{{ $usuario->estado }}</td>
            </tr>
        </tbody>
    </table>
        <a href="{{ url('') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ url('') }}/editar/{{ $usuario->id }}" class="btn btn-warning">Editar</a>
        <a href="{{ url('') }}/excluir/{{ $usuario->id }}" class="btn btn-danger">Excluir</a>

@endsection