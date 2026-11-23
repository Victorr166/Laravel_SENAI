
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Consulta</title>
</head>
<body>

    <h1>Editar Consulta Veterinária</h1>

    <form action="/agendamentos/{{ $agendamento->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Data:</label>

        <input
            type="date"
            name="data"
            value="{{ $agendamento->data }}"
            required
        >

        <br><br>

        <label>Hora:</label>

        <input
            type="time"
            name="hora"
            value="{{ $agendamento->hora }}"
            required
        >

        <br><br>

        <label>Descrição:</label>

        <input
            type="text"
            name="descricao"
            value="{{ $agendamento->descricao }}"
            required
        >

        <br><br>

        <label>Animal:</label>

        <select name="animal_id" required>

            @foreach($animais as $animal)

                <option
                    value="{{ $animal->id }}"
                    {{ $agendamento->animal_id == $animal->id ? 'selected' : '' }}
                >
                    {{ $animal->nome }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Salvar Alterações
        </button>

    </form>

    <br>

    <a href="/agendamentos/listar">
        Voltar
    </a>

</body>
</html>
