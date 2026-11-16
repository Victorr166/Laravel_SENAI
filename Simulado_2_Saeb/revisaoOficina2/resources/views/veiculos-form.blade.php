@extends('layout-app')

@section('title', 'Cadastrar veículo')

@section('content')
    <h1>Cadastrar veículo</h1>
    <p>Todo veículo deve estar associado a um cliente.</p>

    @if ($clients->isEmpty())
        <p>
            Cadastre um cliente antes de adicionar um veículo.
            <a href="{{ route('clientes.create') }}">Cadastrar cliente</a>
        </p>
    @else
        <form method="post" action="{{ route('veiculos.store') }}">
            @csrf

            <div>
                <label for="id_cliente">Proprietário *</label>
                <select id="id_cliente" name="id_cliente" required>
                    <option value="">Selecione um cliente</option>
                    @foreach ($clients as $client)
                        <option
                            value="{{ $client->id_cliente }}"
                            @selected(old('id_cliente') == $client->id_cliente)
                        >
                            {{ $client->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="placa">Placa *</label>
                <input id="placa" name="placa" value="{{ old('placa') }}" maxlength="10" required>
            </div>

            <div>
                <label for="marca">Marca *</label>
                <input id="marca" name="marca" value="{{ old('marca') }}" maxlength="50" required>
            </div>

            <div>
                <label for="modelo">Modelo *</label>
                <input id="modelo" name="modelo" value="{{ old('modelo') }}" maxlength="50" required>
            </div>

            <div>
                <label for="ano">Ano *</label>
                <input
                    id="ano"
                    name="ano"
                    type="number"
                    value="{{ old('ano') }}"
                    min="1950"
                    max="{{ now()->year + 1 }}"
                >
            </div>

            <button type="submit">Cadastrar veículo</button>
            <a href="{{ route('veiculos.index') }}">Cancelar</a>
        </form>
    @endif
@endsection
