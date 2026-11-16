@extends('layout-app')

@section('title', 'Veículos')

@section('content')
    <h1>Veículos</h1>
    <p>Veículos cadastrados e seus respectivos proprietários.</p>
    <p><a href="{{ route('veiculos.create') }}">Cadastrar veículo</a></p>

    <table>
        <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Proprietário</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->placa }}</td>
                    <td>{{ $vehicle->marca }}</td>
                    <td>{{ $vehicle->modelo }}</td>
                    <td>{{ $vehicle->ano }}</td>
                    <td>{{ $vehicle->client->nome }}</td>
                    <td>{{ $vehicle->client->telefone }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhum veículo cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $vehicles->links() }}
@endsection
