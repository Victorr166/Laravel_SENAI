
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tutor</title>
</head>
<body>

    <h1>Editar Tutor</h1>

    <form action="/tutores/{{ $tutor->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Nome:</label>

        <input
            type="text"
            name="nome"
            value="{{ $tutor->nome }}"
            required
        >

        <br><br>

        <label>CPF:</label>

        <input
            type="text"
            name="cpf"
            value="{{ $tutor->cpf }}"
            required
        >

        <br><br>

        <label>Telefone:</label>

        <input
            type="text"
            name="telefone"
            value="{{ $tutor->telefone }}"
            required
        >

        <br><br>

        <label>E-mail:</label>

        <input
            type="email"
            name="email"
            value="{{ $tutor->email }}"
            required
        >

        <br><br>

        <button type="submit">
            Salvar Alterações
        </button>

    </form>

    <br>

    <a href="/tutores/listar">
        Voltar
    </a>

</body>
</html>
