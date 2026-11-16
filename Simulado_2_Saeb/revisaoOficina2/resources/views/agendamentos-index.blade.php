@extends('layout-app')

@section('title', 'Agendamentos')

@section('content')
    <h1>Agendamentos</h1>
    <p>Serviços organizados por data e horário.</p>
    <p><a href="{{ route('agendamentos.create') }}">Cadastrar agendamento</a></p>

    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Horário</th>
                <th>Cliente</th>
                <th>Contato</th>
                <th>Veículo</th>
                <th>Placa</th>
                <th>Serviço</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->data_agendamento->format('d/m/Y') }}</td>
                    <td>{{ $appointment->data_agendamento->format('H:i') }}</td>
                    <td>{{ $appointment->client->nome }}</td>
                    <td>
                        {{ $appointment->client->telefone
                            ?: $appointment->client->email
                            ?: 'Não informado' }}
                    </td>
                    <td>{{ $appointment->vehicle->marca }} {{ $appointment->vehicle->modelo }}</td>
                    <td>{{ $appointment->vehicle->placa }}</td>
                    <td>{{ $appointment->descricao_servico }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td><a href="{{ route('agendamentos.edit', $appointment) }}">Editar</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Nenhum agendamento cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $appointments->links() }}
@endsection
