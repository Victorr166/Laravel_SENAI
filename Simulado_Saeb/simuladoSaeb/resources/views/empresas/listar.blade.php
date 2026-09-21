<!DOCTYPE html>
<html>
<head>
    <title>Empresas</title>
</head>
<body>

    <h1>Empresas</h1>

    <a href="/principal">
        Voltar
    </a>

    <br><br>

    <a href="/empresas/create">
        <button>Nova Empresa</button>
    </a>

    <h2>Buscar Empresa</h2>

    <form action="/empresas/listar" method="GET">

        <input
            type="text"
            name="nome"
            placeholder="Digite o nome"
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
            <th>CNPJ</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>

        @foreach($empresas as $empresa)

        <tr>

            <td>{{ $empresa->id }}</td>

            <td>{{ $empresa->nome }}</td>

            <td>{{ $empresa->cnpj }}</td>

            <td>{{ $empresa->telefone }}</td>

            <td>{{ $empresa->email }}</td>

            <td>

                <a href="/empresas/{{ $empresa->id }}/edit">
                    Editar
                </a>

                <form
                    action="/empresas/{{ $empresa->id }}"
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