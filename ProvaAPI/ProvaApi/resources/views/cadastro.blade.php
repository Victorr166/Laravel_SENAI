<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>

    <br>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit">SAIR</button>
        </form>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{ route('produto.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Produto..." require value="{{old('nome')}}">
        <br><br>

        <label for="qntd">Quantidade:</label>
        <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade..." require value="{{old('quantidade')}}">
        <br><br>

        <label for="tipoMateria">Matéria:</label>
        <select name="tipoMateria" id="tipoMateria" required>
            <option value="" disabled selected>Selecione o tipo de matéria prima</option>
                <option value="Alimentação">Aço</option>
                <option value="Alimentação">Ferro</option>
                <option value="Alimentação">Aluminio</option>

        <br><br>
        <label for="date">Data de fabricação:</label>
        <input type="date" name="data" id="data" placeholder="Data de fabricação..." require value="{{old('data')}}">
        <br><br>

        <label for="Quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" placeholder=" Quantidade de itens..." require value="{{old('quantidade')}}">
        <br><br>

        <label for="Preco">Preço de Venda:</label>
        <input type="number" name="preco" id="preco" placeholder="Preço do produto..." require value="{{old('preco')}}">
        <br><br>

            @foreach ($setores as $setor)
                <option value="{{ $setor->id }}">
                    Setor - {{ $setor->nome }} - N° {{ $setor->nCorredor }}
                </option>
            @endforeach
        </select>
        
        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>

        </div>
    @endif
</body>
</html>