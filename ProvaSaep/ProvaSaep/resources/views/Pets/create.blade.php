
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Pet</title>
</head>
<body>

    <h1>Cadastrar Pet</h1>

    <form action="/pets" method="POST">

        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <br><br>

        <label>Espécie:</label>
        <input type="text" name="especie" required>

        <br><br>

        <label>Raça:</label>
        <input type="text" name="raca" required>

        <br><br>

        <label>Idade:</label>
        <input type="number" name="idade" min="0" required>

        <br><br>

        <label>Sexo:</label>
        <select name="sexo" required>
            <option value="">Selecione</option>
            <option value="Macho">Macho</option>
            <option value="Fêmea">Fêmea</option>
        </select>

        <br><br>

        <label>Tutor:</label>
        <select name="cliente_id" required>

            <option value="">Selecione um tutor</option>

            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">
                    {{ $cliente->nome }}
                </option>
            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Cadastrar Pet
        </button>

    </form>

    <br>

    <a href="/pets/listar">
        Voltar
    </a>

</body>
</html>
