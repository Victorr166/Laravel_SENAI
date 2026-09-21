<!DOCTYPE html>
<html>
<head>
    <title>Novo Agendamento</title>
</head>
<body>

    <h1>Novo Agendamento</h1>

    <form action="/agendamentos" method="POST">

        @csrf

        <label>Data:</label>

        <input type="date" name="data">

        <br><br>

        <label>Hora:</label>

        <input type="time" name="hora">

        <br><br>

        <label>Descrição:</label>

        <input type="text" name="descricao">

        <br><br>

        <label>Sala:</label>

        <select name="sala_id">

            <option value="">
                Selecione uma sala
            </option>

            @foreach($salas as $sala)

                <option value="{{ $sala->id }}">
                    {{ $sala->n_sala }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <br>

    <a href="/agendamentos/listar">
        Voltar
    </a>

</body>
</html>