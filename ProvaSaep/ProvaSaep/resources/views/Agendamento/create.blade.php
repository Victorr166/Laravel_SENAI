
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Consulta</title>
</head>
<body>

    <h1>Agendar Consulta Veterinária</h1>

    <form action="/agendamentos" method="POST">

        @csrf

        <label>Data:</label>
        <input type="date" name="data" required>

        <br><br>

        <label>Hora:</label>
        <input type="time" name="hora" required>

        <br><br>

        <label>Descrição:</label>
        <input type="text" name="descricao" required>

        <br><br>

        <label>Animal:</label>

        <select name="animal_id" required>

            <option value="">
                Selecione um animal
            </option>

            @foreach($animais as $animal)

                <option value="{{ $animal->id }}">
                    {{ $animal->nome }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Agendar Consulta
        </button>

    </form>

    <br>

    <a href="/agendamentos/listar">
        Voltar
    </a>

</body>
</html>
