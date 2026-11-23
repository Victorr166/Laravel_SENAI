
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Clínica Veterinária</title>
</head>
<body>

    <h1>Clínica Veterinária</h1>

    <h2>Login</h2>

    @if(session('erro'))
        <p style="color: red;">
            {{ session('erro') }}
        </p>
    @endif

    @if($errors->any())
        <p style="color: red;">
            {{ $errors->first() }}
        </p>
    @endif

    <form action="/login" method="POST">

        @csrf

        <label>E-mail:</label>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
        >

        <br><br>

        <label>Senha:</label>
        <input
            type="password"
            name="senha"
            required
        >

        <br><br>

        <button type="submit">Entrar</button>

    </form>

</body>
</html>
