<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body>
    <h1>Lista dos Funcionarios</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>CARGO</th>
                <th>EMAIL</th>
                <th>DATAADMISSAO</th>
                <th>SALARIO</th>
                <th>SOBRENOME</th>
            </tr>
        </thead>
        <tbody>
            @forelse($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->id }}</td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->email?->id}}</td>
                    <td>{{ $funcionario->dataadmissao?}}</td>
                    <td>{{ $funcionario->salario}}</td>
                    <td>{{ $funcionario->sobrenome}}</td>
                    <td>
                        <a href="{{route('funcionario.atualizar', $funcionario->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('funcionario.deletar', $funcionario->id)}}" method="POST"
                            onsubmit="return confirm('Deseja realmente excluir');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhum funcionario encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>