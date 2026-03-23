<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro Usuario</h1>

    @if(session('sucess'))
        <p style="dcolor:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('Aluno.salvar')}}">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Email..."
            required value="{{ old('email') }}"
        >

        <imput type="Submit" value="Cadastra">
    </form>

    @if($erros->any())
        <div style="color:red">
            <ul>
                @foreach ($erros->all() as $err)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>