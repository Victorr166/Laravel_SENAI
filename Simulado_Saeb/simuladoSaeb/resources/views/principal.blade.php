<!DOCTYPE html>
<html>
<head>
    <title>Gestão de Espaços</title>
</head>
<body>

    <h1>Gestão de Espaços</h1>

    <h2>
        Bem-vindo, {{ session('usuario_nome') }}!
    </h2>

    <hr>

    <h3>Menu</h3>

    <a href="/empresas/listar">
        <button>Empresas</button>
    </a>

    <br><br>

    <a href="/salas/listar">
        <button>Salas</button>
    </a>

    <br><br>

    <a href="/agendamentos/listar">
        <button>Agendamentos</button>
    </a>

    <br><br>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>

</body>
</html>