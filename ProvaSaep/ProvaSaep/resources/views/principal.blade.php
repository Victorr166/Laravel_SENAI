
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Veterinária</title>
</head>
<body>

    <h1>Clínica Veterinária</h1>

    <h2>
        Bem-vindo, {{ session('usuario_nome') }}!
    </h2>

    <hr>

    <h3>Menu Principal</h3>

    <a href="/tutores/listar">
        <button type="button">Tutores</button>
    </a>

    <br><br>

    <a href="/pets/listar">
        <button type="button">Pets</button>
    </a>

    <br><br>

    <a href="/agendamentos/listar">
        <button type="button">Agendamentos</button>
    </a>

    <br><br>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>

</body>
</html>
