<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Oficina') - Oficina Flux</title>
</head>
<body>
    <header>
        <p><a href="{{ route('dashboard') }}">Oficina Flux</a></p>

        <nav aria-label="Navegação principal">
            <a href="{{ route('dashboard') }}">Painel</a>
            <a href="{{ route('clientes.index') }}">Clientes</a>
            <a href="{{ route('veiculos.index') }}">Veículos</a>
            <a href="{{ route('agendamentos.index') }}">Agendamentos</a>
        </nav>

        <p>Usuário: {{ auth()->user()->nome }}</p>

        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </header>

    <main>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @yield('content')
    </main>
</body>
</html>
