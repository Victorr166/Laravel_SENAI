<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela listar</title>
</head>
<body>
    <h1>Relatório de Livros</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>AUTOR</th>
                <th>DESCRICAO</th>
                <th>NUMEROPAGINAS</th>
                <th>DATAPUBLICACAO</th>
                <th>EDITORA</th>
                <th>CUSTO</th>
                <th>PRECO</th>
                <th>IMPOSTO</th>
            </tr>
        </thead>
        <tbody>
            @forelse($livros as $livro)
                <tr>
                    <td>{{ $livro->id }}</td>
                    <td>{{ $livro->nome }}</td>
                        <a href="{{route('livros.atualizar', $livro->id)}}" method="POST"
                            onsubmit="return confirm('Deseja realmente excluir');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nemhum livro encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>    
</body>
</html>