@extends('base')
@section('conteudo')
    <h2>Editar Usuário</h2>
    <form action="{{ route('editar',['id' => $usuario->id]) }}" method="POST">
        @csrf
        <div class="class my-3">
            <label class="form-label" for="">Nome Completo</label>
            <input class="form-control" type="text" name="nome" value="{{ $usuario->nome  }}">
            <label class="form-label" for="">CPF</label>
            <input class="form-control" type="text" name="cpf" value="{{ $usuario->cpf  }}">
            <label class="form-label" for="">Data de Nascimento</label>
            <input class="form-control" type="date" name="nasc" value="{{ $usuario->nasc->format('Y-m-d')  }}">
            <label class="form-label" for="">Email</label>
            <input class="form-control" type="email" name="email" value="{{ $usuario->email  }}">
            <label class="form-label" for="">Telefone</label>
            <input class="form-control" type="text" name="telefone" value="{{ $usuario->telefone  }}">
            <label class="form-label" for="">Logradoudo</label>
            <input class="form-control" type="text" name="logradouro" value="{{ $usuario->logradouro  }}">
            <label class="form-label" for="">Cidade</label>
            <input class="form-control" type="text" name="cidade" value="{{ $usuario->cidade  }}">
            <label class="form-label" for="">Estado</label>
            <input class="form-control" type="text" name="estado" value="{{ $usuario->estado  }}">
        </div>
        <button class="btn btn-primary">Salvar Alterações</button>
    </form>

@endsection