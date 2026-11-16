@extends('layout-app')

@section('title', $appointment->exists ? 'Editar agendamento' : 'Cadastrar agendamento')

@section('content')
    <h1>{{ $appointment->exists ? 'Editar agendamento' : 'Cadastrar agendamento' }}</h1>

    @if ($clients->isEmpty() || $vehicles->isEmpty())
        <p>
            Cadastre um cliente e um veículo antes de criar um agendamento.
            <a href="{{ route('veiculos.create') }}">Cadastrar veículo</a>
        </p>
    @else
        <form
            method="post"
            action="{{ $appointment->exists
                ? route('agendamentos.update', $appointment)
                : route('agendamentos.store') }}"
        >
            @csrf
            @if ($appointment->exists)
                @method('PUT')
            @endif

            <div>
                <label for="id_cliente">Cliente *</label>
                <select id="id_cliente" name="id_cliente" required>
                    <option value="">Selecione um cliente</option>
                    @foreach ($clients as $client)
                        <option
                            value="{{ $client->id_cliente }}"
                            @selected(old('id_cliente', $appointment->id_cliente) == $client->id_cliente)
                        >
                            {{ $client->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="id_veiculo">Veículo *</label>
                <select id="id_veiculo" name="id_veiculo" required>
                    <option value="">Selecione um veículo</option>
                    @foreach ($vehicles as $vehicle)
                        <option
                            value="{{ $vehicle->id_veiculo }}"
                            @selected(old('id_veiculo', $appointment->id_veiculo) == $vehicle->id_veiculo)
                        >
                            {{ $vehicle->marca }} {{ $vehicle->modelo }}
                            - {{ $vehicle->placa }}
                            - {{ $vehicle->client->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="data_agendamento">Data e horário *</label>
                <input
                    id="data_agendamento"
                    name="data_agendamento"
                    type="datetime-local"
                    value="{{ old(
                        'data_agendamento',
                        $appointment->exists
                            ? $appointment->data_agendamento->format('Y-m-d\\TH:i')
                            : '',
                    ) }}"
                    required
                >
            </div>

            <div>
                <label for="descricao_servico">Serviço *</label>
                <input
                    id="descricao_servico"
                    name="descricao_servico"
                    value="{{ old('descricao_servico', $appointment->descricao_servico) }}"
                    maxlength="255"
                    required
                >
            </div>

            <div>
                <label for="status">Status *</label>
                <select id="status" name="status" required>
                    @foreach (['Agendado', 'Em andamento', 'Concluído', 'Cancelado'] as $status)
                        <option
                            value="{{ $status }}"
                            @selected(old('status', $appointment->status ?: 'Agendado') === $status)
                        >
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit">
                {{ $appointment->exists ? 'Salvar alterações' : 'Cadastrar agendamento' }}
            </button>
            <a href="{{ route('agendamentos.index') }}">Cancelar</a>
        </form>
    @endif
@endsection
