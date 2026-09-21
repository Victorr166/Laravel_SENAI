<!DOCTYPE html>
<html>
<head>
    <title>Salas</title>
</head>
<body>

    <h1>Salas</h1>

    <a href="/principal">
        Voltar
    </a>

    <br><br>

    <a href="/salas/create">
        <button>Nova Salas</button>
    </a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Número da Sala</th>
            <th>Bloco</th>
            <th>Empresa</th>
            <th>Ações</th>
        </tr>

        @foreach($salas as $sala)

        <tr>

            <td>{{ $sala->id }}</td>

            <td>{{ $sala->n_sala }}</td>

            <td>{{ $sala->bloco }}</td>

            <td>
                {{ $sala->empresa->nome }}
            </td>

            <td>

                <a href="/salas/{{ $sala->id }}/edit">
                    Editar
                </a>

                <form
                    action="/salas/{{ $sala->id }}"
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