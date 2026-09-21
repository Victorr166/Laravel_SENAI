<!DOCTYPE html>
<html>
<head>
    <title>Editar Agendamento</title>
</head>
<body>

    <h1>Editar Agendamento</h1>

    <form action="/agendamentos/{{ $agendamento->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Data:</label>

        <input
            type="date"
            name="data"
            value="{{ $agendamento->data }}"
        >

        <br><br>

        <label>Hora:</label>

        <input
            type="time"
            name="hora"
            value="{{ $agendamento->hora }}"
        >

        <br><br>

        <label>Descrição:</label>

        <input
            type="text"
            name="descricao"
            value="{{ $agendamento->descricao }}"
        >

        <br><br>

        <label>Sala:</label>

        <select name="sala_id">

            @foreach($salas as $sala)

                <option
                    value="{{ $sala->id }}"
                    {{ $agendamento->sala_id == $sala->id ? 'selected' : '' }}
                >
                    {{ $sala->placa }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Salvar
        </button>

    </form>

    <br>

    <a href="/agendamentos/listar">
        Voltar
    </a>

</body>
</html>