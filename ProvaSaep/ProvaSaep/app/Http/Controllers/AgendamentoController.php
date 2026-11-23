<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Tutor;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AgendamentoController extends Controller
{
    // LISTAR AGENDAMENTOS
    public function listar()
    {
        $agendamentos = Agendamento::with(['tutore', 'pet'])
            ->orderBy('data')
            ->get();

        return view('agendamento.listar', compact('agendamentos'));
    }

    // ABRIR FORMULÁRIO DE CADASTRO
    public function create()
    {
        $tutores = Tutor::all();
        $pets = Pet::with('tutor')->get();

        return view('agendamento.create', compact('tutores', 'pets'));
    }

    // CADASTRAR AGENDAMENTO
    public function store(Request $request)
    {
        $dados = $request->validate([
            'data' => ['required', 'date'],

            'descricao_servico' => ['required', 'string', 'max:255'],

            'status' => [
                'required',
                'in:Agendado,Em andamento,Concluído,Cancelado'
            ],

            'id_tutor' => [
                'required',
                'exists:tutores,id_tutor'
            ],

            'id_pet' => [
                'required',
                Rule::exists('pets', 'id_pet')
                    ->where('id_tutor', $request->input('id_tutor'))
            ],
        ]);

        Agendamento::create($dados);

        return redirect()
            ->back()
            ->with('success', 'Agendamento cadastrado com sucesso!');
    }

    // ABRIR FORMULÁRIO DE EDIÇÃO
    public function edit($id)
    {
        $agendamento = Agendamento::findOrFail($id);

        $tutores = Tutor::all();
        $pets = Pet::with('tutor')->get();

        return view(
            'agendamento.edit',
            compact('agendamento', 'tutores', 'pets')
        );
    }

    // ATUALIZAR AGENDAMENTO
    public function update(Request $request, $id)
    {
        $agendamento = Agendamento::findOrFail($id);

        $dados = $request->validate([
            'data' => ['required', 'date'],

            'descricao_servico' => ['required', 'string', 'max:255'],

            'status' => [
                'required',
                'in:Agendado,Em andamento,Concluído,Cancelado'
            ],

            'id_tutor' => [
                'required',
                'exists:tutores,id_tutor'
            ],

            'id_pet' => [
                'required',
                Rule::exists('pets', 'id_pet')
                    ->where('id_tutor', $request->input('id_tutor'))
            ],
        ]);

        $agendamento->update($dados);

        return redirect()
            ->back()
            ->with('success', 'Agendamento atualizado com sucesso!');
    }

    // EXCLUIR AGENDAMENTO
    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);

        $agendamento->delete();

        return redirect()
            ->back()
            ->with('success', 'Agendamento excluído com sucesso!');
    }
}
