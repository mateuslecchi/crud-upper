<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; //chamando Model Usuario

class UsuariosApiController extends Controller
{

    public function index() //funcao index para listar os usuarios cadastrados
    {
        $usuario = Usuario::all();

        return response()->json([
            'success'=> true,
            'data' => $usuario
        ]);
    }
    

    public function store(Request $request) //funcao salvar dados de novos usuarios
    {
        $usuario = Usuario::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'nasc' => $request->nasc,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'logradouro' => $request->logradouro,
            'cidade' => $request->cidade,
            'estado' => $request->estado
        ]);

         if($usuario)
            return response()->json([
                'success' => true,
                'data' => $request->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Post not added'
            ], 500);
    }

    public function show($id) //funcao para mostrar destalhes do usuario individual
    {
        $usuario = Usuario::findOrFail($id);
        
        if (!$usuario) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found '
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $usuario->toArray()
        ], 200);
    }
    
    public function update(Request $request, $id) //funcao para atualizar edicoes no banco
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 400);
        }

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

        if ($usuario)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Post can not be updated'
            ], 500);    }

    public function destroy($id) //funcao para executar o delete no banco
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 400);
        }

        $usuario->delete();

        if ($usuario) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post can not be deleted'
            ], 500);
        }
    }
}
