<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Tutor;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function listar()
    {
        $pets = Pet::with('tutor')->get();

        return view('pets.listar', compact('pets'));
    }

    public function create()
    {
        $tutores = Tutor::all();

        return view('pets.create', compact('tutores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'especie' => 'required|string|max:50',
            'raca' => 'required|string|max:50',
            'idade' => 'required|integer|min:0',
            'sexo' => 'required|string|max:20',
            'id_tutor' => 'required|exists:tutores,id_tutor',
        ]);

        Pet::create([
            'nome' => $request->nome,
            'especie' => $request->especie,
            'raca' => $request->raca,
            'idade' => $request->idade,
            'sexo' => $request->sexo,
            'id_tutor' => $request->id_tutor,
        ]);

        return redirect()->back()->with('success', 'Pet cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);

        $tutores = Tutor::all();

        return view('pets.edit', compact('pet', 'tutores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'especie' => 'required|string|max:50',
            'raca' => 'required|string|max:50',
            'idade' => 'required|integer|min:0',
            'sexo' => 'required|string|max:20',
            'id_tutor' => 'required|exists:tutores,id_tutor',
        ]);

        $pet = Pet::findOrFail($id);

        $pet->update([
            'nome' => $request->nome,
            'especie' => $request->especie,
            'raca' => $request->raca,
            'idade' => $request->idade,
            'sexo' => $request->sexo,
            'id_tutor' => $request->id_tutor,
        ]);

        return redirect()->back()->with('success', 'Pet atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);

        if ($pet->agendamentos()->exists()) {
            return redirect()->back()->with(
                'error',
                'Não é possível excluir este pet, pois ele possui agendamentos.'
            );
        }

        $pet->delete();

        return redirect()->back()->with('success', 'Pet deletado com sucesso!');
    }
}
