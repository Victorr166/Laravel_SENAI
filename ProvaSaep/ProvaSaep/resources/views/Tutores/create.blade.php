
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Tutor</title>
</head>
<body>

    <h1>Cadastrar Tutor</h1>

    <form action="/tutores" method="POST">

        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <br><br>

        <label>CPF:</label>
        <input type="text" name="cpf" required>

        <br><br>

        <label>Telefone:</label>
        <input type="text" name="telefone" required>

        <br><br>

        <label>E-mail:</label>
        <input type="email" name="email" required>

        <br><br>

        <button type="submit">
            Cadastrar Tutor
        </button>

    </form>

    <br>

    <a href="/tutores/listar">
        Voltar
    </a>

</body>
</html>
