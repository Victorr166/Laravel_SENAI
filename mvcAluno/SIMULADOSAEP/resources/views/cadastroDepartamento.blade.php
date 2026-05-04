<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Departamento</title>
</head>
<body>
    <h1>Cadastro Departamento</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('funcionario.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="dataCriação">dataCriação: </label>
        <input type="dataCriação" name="dataCriação" id="dataCriação" placeholder="dataCriação..."
            required value="{{ old('dataCriação')}}"
        >

        <br><br>
        <label for="orcamento">Orcamento: </label>
        <input type="orcamento" name="orcamento" id="orcamento" placeholder="orcamento..."
            required value="{{ old('orcamento')}}"
        >

         <br><br>
        <label for="dataadmissao">DataAdmissao: </label>
        <input type="dataadmissao" name="dataadmissao" id="dataadmissao" placeholder="DataAdmissao..."
            required value="{{ old('dataadmissao')}}"
        >

        <br><br>
        <label for="sigla">Sigla: </label>
        <input type="sigla" name="sigla" id="sigla" placeholder="sigla..."
            required value="{{ old('sigla')}}"
        >

        <br><br>
        <label for="funcionario_id">ID DO FUNCIONARIO: </label>
        {{-- <input type="number" name="turma_id" id="turma_id" placeholder="ID TURMA..."
            value="{{ old('turma_id')}}"
        > --}}
        <select name="funcionario_id" id="funcionario_id">
            @foreach ($funcionarios as $funcionario)
                <option value="{{$funcionario->id}}">{{$funcionario->serie}}</option>
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