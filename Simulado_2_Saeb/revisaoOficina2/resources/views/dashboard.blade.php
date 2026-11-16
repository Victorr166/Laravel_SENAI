@extends('layout-app')

@section('title', 'Painel')

@section('content')
    <h1>Painel</h1>
    <p>Olá, {{ explode(' ', auth()->user()->nome)[0] }}.</p>
    <p>Acompanhe os cadastros e os atendimentos da oficina.</p>

    <section>
        <h2>Resumo</h2>
        <ul>
            <li>Clientes cadastrados: {{ \App\Models\Client::count() }}</li>
            <li>Veículos cadastrados: {{ \App\Models\Vehicle::count() }}</li>
            <li>
                Agendamentos futuros:
                {{ \App\Models\Appointment::where('data_agendamento', '>=', now())->where('status', '!=', 'Cancelado')->count() }}
            </li>
        </ul>
    </section>

    <section>
        <h2>Acesso rápido</h2>
        <ul>
            <li><a href="{{ route('clientes.create') }}">Cadastrar cliente</a></li>
            <li><a href="{{ route('veiculos.create') }}">Cadastrar veículo</a></li>
            <li><a href="{{ route('agendamentos.create') }}">Agendar serviço</a></li>
            <li><a href="{{ route('clientes.index') }}">Buscar cliente</a></li>
        </ul>
    </section>
@endsection
