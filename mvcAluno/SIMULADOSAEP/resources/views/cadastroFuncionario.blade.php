<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Funcionario</title>
</head>
<body>
    <h1>Cadastro Funcionarios</h1>

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
        <label for="cargo">Cargo: </label>
        <input type="cargo" name="cargo" id="cargo" placeholder="Cargo..."
            required value="{{ old('cargo')}}"
        >

        <br><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Email..."
            required value="{{ old('email')}}"
        >

         <br><br>
        <label for="dataadmissao">DataAdmissao: </label>
        <input type="dataadmissao" name="dataadmissao" id="dataadmissao" placeholder="DataAdmissao..."
            required value="{{ old('dataadmissao')}}"
        >

        <br><br>
        <label for="salario">Salario: </label>
        <input type="salario" name="salario" id="salario" placeholder="Salario..."
            required value="{{ old('salario')}}"
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

        <h1>Cadastro dadosPessoais</h1>

         <form action="{{route('funcionario.salvar') }}" method="POST">
        @csrf
        <label for="cpf">Cpf: </label>
        <input type="text" name="cpf" id="cpf" placeholder="Cpf..."
            require value="{{ old('cpf') }}"
        >
        <br><br>
        <label for="">rg: </label>
        <input type="rg" name="rg" id="rg" placeholder="RG..."
            required value="{{ old('rg')}}"
        >

        <br><br>
        <label for="dataNascimento">dataNascimento: </label>
        <input type="dataNascimento" name="dataNascimento" id="dataNascimento" placeholder="dataNascimento..."
            required value="{{ old('dataNascimento')}}"
        >

         <br><br>
        <label for="cep">cep: </label>
        <input type="cep" name="cep" id="cep" placeholder="Cep..."
            required value="{{ old('cep')}}"
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