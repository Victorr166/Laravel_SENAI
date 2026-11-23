
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Veterinárias</title>
</head>
<body>

    <h1>Consultas Veterinárias</h1>

    <a href="/principal">
        Voltar
    </a>

    <br><br>

    <a href="/agendamentos/create">
        <button type="button">Nova Consulta</button>
    </a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Tutor</th>
            <th>Animal</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>

        @foreach($agendamentos as $agendamento)

        <tr>

            <td>{{ $agendamento->id }}</td>

            <td>
                {{ date('d/m/Y', strtotime($agendamento->data)) }}
            </td>

            <td>
                {{ $agendamento->hora }}
            </td>

            <td>
                {{ $agendamento->animal->cliente->nome }}
            </td>

            <td>
                {{ $agendamento->animal->nome }}
            </td>

            <td>
                {{ $agendamento->descricao }}
            </td>

            <td>

                <a href="/agendamentos/{{ $agendamento->id }}/edit">
                    Editar
                </a>

                <form
                    action="/agendamentos/{{ $agendamento->id }}"
                    method="POST"
                    style="display:inline"
                >

                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Excluir
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

</body>
</html>
