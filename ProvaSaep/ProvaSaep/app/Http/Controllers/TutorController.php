<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    // LISTAR E PESQUISAR TUTORES
    public function listar(Request $request)
    {
        $query = Tutor::query();

        if ($request->filled('nome')) {
            $query->where(
                'nome',
                'like',
                '%' . $request->nome . '%'
            );
        }

        $tutores = $query->orderBy('nome')->get();

        return view('tutores.listar', compact('tutores'));
    }

    // ABRIR FORMULÁRIO DE CADASTRO
    public function create()
    {
        return view('tutores.create');
    }

    // CADASTRAR TUTOR
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'cpf' => ['required', 'string', 'max:20'],
            'telefone' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:100'],
        ]);

        Tutor::create($dados);

        return redirect()
            ->back()
            ->with('success', 'Tutor cadastrado com sucesso!');
    }

    // ABRIR FORMULÁRIO DE EDIÇÃO
    public function edit($id)
    {
        $tutor = Tutor::findOrFail($id);

        return view('tutores.edit', compact('tutor'));
    }

    // ATUALIZAR TUTOR
    public function update(Request $request, $id)
    {
        $tutor = Tutor::findOrFail($id);

        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'cpf' => ['required', 'string', 'max:20'],
            'telefone' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:100'],
        ]);

        $tutor->update($dados);

        return redirect()
            ->back()
            ->with('success', 'Tutor atualizado com sucesso!');
    }

    // EXCLUIR TUTOR
    public function destroy($id)
    {
        $tutor = Tutor::findOrFail($id);

        // Verifica se o tutor possui pets cadastrados
        if ($tutor->pets()->exists()) {
            return redirect()
                ->back()
                ->with('error', 'Não é possível excluir este tutor, pois existem pets vinculados a ele.');
        }

        $tutor->delete();

        return redirect()
            ->back()
            ->with('success', 'Tutor excluído com sucesso!');
    }
}
