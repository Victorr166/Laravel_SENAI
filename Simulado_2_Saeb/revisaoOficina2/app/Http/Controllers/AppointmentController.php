<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['client', 'vehicle'])
            ->orderBy('data_agendamento')
            ->paginate(12);

        return view('agendamentos-index', compact('appointments'));
    }

    public function create()
    {
        return view('agendamentos-form', [
            'appointment' => new Appointment,
            'clients' => Client::orderBy('nome')->get(),
            'vehicles' => Vehicle::with('client')->orderBy('placa')->get(),
        ]);
    }

    public function store(Request $request)
    {
        Appointment::create($this->validated($request));

        return redirect()
            ->route('agendamentos.index')
            ->with('success', 'Agendamento cadastrado.');
    }

    public function edit(Appointment $agendamento)
    {
        return view('agendamentos-form', [
            'appointment' => $agendamento,
            'clients' => Client::orderBy('nome')->get(),
            'vehicles' => Vehicle::with('client')->orderBy('placa')->get(),
        ]);
    }

    public function update(Request $request, Appointment $agendamento)
    {
        $agendamento->update($this->validated($request));

        return redirect()
            ->route('agendamentos.index')
            ->with('success', 'Agendamento atualizado.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'id_cliente' => ['required', 'exists:clientes,id_cliente'],
            'id_veiculo' => [
                'required',
                Rule::exists('veiculos', 'id_veiculo')
                    ->where('id_cliente', $request->input('id_cliente')),
            ],
            'data_agendamento' => ['required', 'date'],
            'descricao_servico' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:Agendado,Em andamento,Concluído,Cancelado'],
        ]);
    }
}