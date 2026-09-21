<!DOCTYPE html>
<html>
<head>
    <title>Editar Sala</title>
</head>
<body>

    <h1>Editar Sala</h1>

    <form action="/salas/{{ $sala->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Número da Sala:</label>

        <input
            type="text"
            name="n_sala"
            value="{{ $sala->n_sala }}"
        >

        <br><br>

        <label>Bloco:</label>

        <input
            type="text"
            name="bloco"
            value="{{ $sala->bloco }}"
        >

        <br><br>

        <label>Empresa:</label>

        <select name="empresa_id">

            @foreach($empresas as $empresa)

                <option
                    value="{{ $empresa->id }}"
                    {{ $sala->empresa_id == $empresa->id ? 'selected' : '' }}
                >
                    {{ $empresa->nome }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Salvar
        </button>

    </form>

    <br>

    <a href="/salas/listar">
        Voltar
    </a>

</body>
</html>