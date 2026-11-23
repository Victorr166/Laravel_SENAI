
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets Cadastrados</title>
</head>
<body>

    <h1>Pets Cadastrados</h1>

    <a href="/principal">
        Voltar
    </a>

    <br><br>

    <a href="/pets/create">
        <button type="button">Novo Pet</button>
    </a>

    <h2>Buscar Pet</h2>

    <form action="/pets/listar" method="GET">

        <input
            type="text"
            name="nome"
            placeholder="Digite o nome do pet"
            value="{{ request('nome') }}"
        >

        <button type="submit">
            Pesquisar
        </button>

    </form>

    <br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Espécie</th>
            <th>Raça</th>
            <th>Idade</th>
            <th>Sexo</th>
            <th>Tutor</th>
            <th>Ações</th>
        </tr>

        @foreach($pets as $pet)

        <tr>

            <td>{{ $pet->id }}</td>

            <td>{{ $pet->nome }}</td>

            <td>{{ $pet->especie }}</td>

            <td>{{ $pet->raca }}</td>

            <td>{{ $pet->idade }}</td>

            <td>{{ $pet->sexo }}</td>

            <td>{{ $pet->tutor->nome }}</td>

            <td>

                <a href="/pets/{{ $pet->id }}/edit">
                    Editar
                </a>

                <form
                    action="/pets/{{ $pet->id }}"
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
