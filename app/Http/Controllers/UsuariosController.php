<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; //chamando Model Usuario

class UsuariosController extends Controller
{

    public function index() //funcao index para listar os usuarios cadastrados
    {
        $usuario = Usuario::all('id','nome');
        return view('listar',compact('usuario'));
    }
    

    public function create() //funcao para chamar a view 'criar' para criacao de novo usuário no registro
    {
        return view('criar');
    }

    public function store(Request $request) //funcao salvar dados de novos usuarios
    {
        Usuario::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'nasc' => $request->nasc,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'logradouro' => $request->logradouro,
            'cidade' => $request->cidade,
            'estado' => $request->estado
        ]);

        return redirect('')->with('success', 'Usuario cadastrado com sucesso.'); //retorno da mensagem de sucesso
    }

    public function show($id) //funcao para mostrar destalhes do usuario individual
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuario',['usuario' => $usuario]);
    }
    

    
    public function edit($id) //funcao para editar dados do usuario
    {
        $usuario = Usuario::findOrFail($id);
        return view('editar',['usuario' => $usuario]);
    }

    public function update(Request $request, $id) //funcao para atualizar edicoes no banco
    {
        $usuario = Usuario::findOrFail($id);

        $usuario->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'nasc' => $request->nasc,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'logradouro' => $request->logradouro,
            'cidade' => $request->cidade,
            'estado' => $request->estado
        ]);

        return redirect('')->with('success', 'Usuario alterado com sucesso.'); //retorna mensagem de sucesso na alteração dos dados
    }

    public function delete($id) //funcao para deletar registro
    {
        $usuario = Usuario::findOrFail($id);
        return view('excluir',['usuario' => $usuario]);
    }

    public function destroy($id) //funcao para executar o delete no banco
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect('')->with('success', 'Usuario excluído com sucesso.'); //retorna mensagem de sucesso ao deletar usuario
    }
}
