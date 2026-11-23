
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutores Cadastrados</title>
</head>
<body>

    <h1>Tutores Cadastrados</h1>

    <a href="/principal">
        Voltar
    </a>

    <br><br>

    <a href="/tutores/create">
        <button type="button">Novo Tutor</button>
    </a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>

        @foreach($tutores as $tutor)

        <tr>

            <td>{{ $tutor->id }}</td>

            <td>{{ $tutor->nome }}</td>

            <td>{{ $tutor->cpf }}</td>

            <td>{{ $tutor->telefone }}</td>

            <td>{{ $tutor->email }}</td>

            <td>

                <a href="/tutores/{{ $tutor->id }}/edit">
                    Editar
                </a>

                <form
                    action="/tutores/{{ $tutor->id }}"
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
