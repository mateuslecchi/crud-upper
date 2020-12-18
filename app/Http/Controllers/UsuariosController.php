<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; //chamando Model Usuario

class UsuariosController extends Controller
{

    public function index()
    {
        $usuario = Usuario::all('id','nome');
        return view('listar',compact('usuario'));
    }
    

    public function create() //funcao para chamar a view 'criar' para criacao de noo registro
    {
        return view('criar');
    }

    public function store(Request $request)
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

        return redirect('')->with('success', 'Usuario cadastrado com sucesso.');
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuario',['usuario' => $usuario]);
    }
    

    
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('editar',['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
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

        return redirect('')->with('success', 'Usuario alterado com sucesso.');
    }

    public function delete($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('excluir',['usuario' => $usuario]);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect('')->with('success', 'Usuario excluído com sucesso.');
    }
}
