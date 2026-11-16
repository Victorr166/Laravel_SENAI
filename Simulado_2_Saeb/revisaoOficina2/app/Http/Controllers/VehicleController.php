<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('client')->orderBy('placa')->paginate(12);

        return view('veiculos-index', compact('vehicles'));
    }

    public function create()
    {
        return view('veiculos-form', [
            'vehicle' => new Vehicle,
            'clients' => Client::orderBy('nome')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_cliente' => ['required', 'exists:clientes,id_cliente'],
            'placa' => ['required', 'string', 'max:10', 'unique:veiculos,placa'],
            'marca' => ['required', 'string', 'max:50'],
            'modelo' => ['required', 'string', 'max:50'],
            'ano' => ['required', 'integer', 'between:1950,'.(now()->year + 1)],
        ]);
        Vehicle::create($data);

        return redirect()->route('veiculos.index')->with('success', 'Veículo cadastrado.');
    }
}