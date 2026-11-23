
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pet</title>
</head>
<body>

    <h1>Editar Pet</h1>

    <form action="/pets/{{ $animal->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Nome:</label>

        <input
            type="text"
            name="nome"
            value="{{ $animal->nome }}"
            required
        >

        <br><br>

        <label>Espécie:</label>

        <input
            type="text"
            name="especie"
            value="{{ $animal->especie }}"
            required
        >

        <br><br>

        <label>Raça:</label>

        <input
            type="text"
            name="raca"
            value="{{ $animal->raca }}"
            required
        >

        <br><br>

        <label>Idade:</label>

        <input
            type="number"
            name="idade"
            value="{{ $animal->idade }}"
            min="0"
            required
        >

        <br><br>

        <label>Sexo:</label>

        <select name="sexo" required>

            <option value="Macho" {{ $animal->sexo == 'Macho' ? 'selected' : '' }}>
                Macho
            </option>

            <option value="Fêmea" {{ $animal->sexo == 'Fêmea' ? 'selected' : '' }}>
                Fêmea
            </option>

        </select>

        <br><br>

        <label>Tutor:</label>

        <select name="cliente_id" required>

            @foreach($clientes as $cliente)

                <option
                    value="{{ $cliente->id }}"
                    {{ $animal->cliente_id == $cliente->id ? 'selected' : '' }}
                >
                    {{ $cliente->nome }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Salvar Alterações
        </button>

    </form>

    <br>

    <a href="/pets/listar">
        Voltar
    </a>

</body>
</html>
