<?php

namespace App\Http\Controllers;
use App\Models\Aluno;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function listar(){
        $query = Aluno::query();
        $alunos = $query->get();
        return view('listar', compact('alunos'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email'
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email
        ]);
        return redirect()->back()->with('success','Aluno Cadastro com sucesso!');
    }

    public function atualizar($id){
        $aluno = Aluno::findOrFail($id); // Busca o aluno pelo ID
        return view('atualizar', compact('aluno'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => "required|string|max:255|unique:alunos,email,$id"
        ]);

        $aluno = Aluno::findOrFail($id); // buscar aluno para ser atualizado

        $aluno->nome = $request->nome; // atualizando o campo nome
        $aluno->email = $request->email; // atualizando o campo amail

        $aluno->save(); // salvando o banco de dados
        return redirect()->back()->with('success','Aluno atualizado com suceso');

    }

    public function deletar($id){
        $aluno = Aluno::findOrFail($id); // buscar o aluno para depois deletar
        $aluno->delete(); // faz o delete no banco de dados

        return redirect()->route('aluno.listar')->with('success','Aluno excluído com sucesso!');
    }       
}