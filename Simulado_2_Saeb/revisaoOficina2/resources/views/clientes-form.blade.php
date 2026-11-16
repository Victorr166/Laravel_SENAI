@extends('layout-app')

@section('title', $client->exists ? 'Editar cliente' : 'Cadastrar cliente')

@section('content')
    <h1>{{ $client->exists ? 'Editar cliente' : 'Cadastrar cliente' }}</h1>

    <form
        method="post"
        action="{{ $client->exists ? route('clientes.update', $client) : route('clientes.store') }}"
    >
        @csrf
        @if ($client->exists)
            @method('PUT')
        @endif

        <div>
            <label for="nome">Nome completo *</label>
            <input
                id="nome"
                name="nome"
                value="{{ old('nome', $client->nome) }}"
                maxlength="100"
                required
            >
        </div>

        <div>
            <label for="email">E-mail</label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $client->email) }}"
                maxlength="100"
            >
        </div>

        <div>
            <label for="telefone">Telefone</label>
            <input
                id="telefone"
                name="telefone"
                value="{{ old('telefone', $client->telefone) }}"
                maxlength="20"
                required
            >
        </div>

        <div>
            <label for="cpf">CPF</label>
            <input
                id="cpf"
                name="cpf"
                value="{{ old('cpf', $client->cpf) }}"
                maxlength="20"
                required
            >
            <p>O CPF é armazenado criptografado no banco de dados.</p>
        </div>

        <button type="submit">{{ $client->exists ? 'Salvar alterações' : 'Cadastrar cliente' }}</button>
        <a href="{{ route('clientes.index') }}">Cancelar</a>
    </form>
@endsection
