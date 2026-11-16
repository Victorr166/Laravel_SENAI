<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $term = trim((string) $request->query('q', ''));
        $clients = Client::query()
            ->when($term, function ($query) use ($term) {
                $query->where(function ($query) use ($term) {
                    $query->where('nome', 'like', "%{$term}%")
                        ->orWhere('email', 'like', "%{$term}%")
                        ->orWhere('telefone', 'like', "%{$term}%");
                });
            })
            ->orderBy('nome')
            ->paginate(12)
            ->withQueryString();

        return view('clientes-index', compact('clients', 'term'));
    }

    public function create()
    {
        return view('clientes-form', ['client' => new Client]);
    }

    public function store(Request $request)
    {
        Client::create($this->validated($request));

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado.');
    }

    public function edit(Client $cliente)
    {
        return view('clientes-form', ['client' => $cliente]);
    }

    public function update(Request $request, Client $cliente)
    {
        $cliente->update($this->validated($request));

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:100'],
            'telefone' => ['required', 'string', 'max:20'],
            'cpf' => ['required', 'string', 'max:20'],
        ]);
    }
}