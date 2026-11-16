<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrar - Oficina Flux</title>
</head>
<body>
    <main>
        <h1>Oficina Flux</h1>
        <h2>Acesse sua conta</h2>
        <p>Entre com suas credenciais para continuar.</p>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="post" action="{{ route('login.store') }}">
            @csrf

            <div>
                <label for="email">E-mail</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    autocomplete="username"
                    required
                    autofocus
                >
            </div>

            <div>
                <label for="password">Senha</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit">Entrar</button>
        </form>
    </main>
</body>
</html>
