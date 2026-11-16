@extends('layout-app')

@section('title', 'Clientes')

@section('content')
    <h1>Clientes</h1>
    <p>Consulte, pesquise e atualize os dados dos clientes.</p>
    <p><a href="{{ route('clientes.create') }}">Cadastrar cliente</a></p>

    <form method="get" action="{{ route('clientes.index') }}">
        <label for="q">Buscar por nome, e-mail ou telefone</label>
        <input id="q" name="q" value="{{ $term }}">
        <button type="submit">Buscar</button>
        @if ($term)
            <a href="{{ route('clientes.index') }}">Limpar busca</a>
        @endif
    </form>

    <p>Total de clientes: {{ $clients->total() }}</p>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Veículos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $client)
                <tr>
                    <td>{{ $client->nome }}</td>
                    <td>{{ $client->email ?: 'Não informado' }}</td>
                    <td>{{ $client->telefone }}</td>
                    <td>{{ $client->vehicles()->count() }}</td>
                    <td><a href="{{ route('clientes.edit', $client) }}">Editar</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum cliente encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $clients->links() }}
@endsection
