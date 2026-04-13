<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller{

    public function listarEditora(){
        $editora = Editora::all();
        return view('listarEditora', compact('editora'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|numeric|max:255',
            'pais' => 'required|string|max:255',
            'cidade' => 'required|string|max:255'
        ]);

        Setor::create([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'pais' => $request->pais,
            'cidade' => $request->cidade
            
        ]);

        return redirect()->back()->with('success','Editora cadastrada com sucesso!');
    }
}