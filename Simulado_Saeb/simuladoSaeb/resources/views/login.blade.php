<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>

    @if(session('erro'))
        <p>{{ session('erro') }}</p>
    @endif

    <form action="/login" method="POST">

        @csrf

        <label>E-mail:</label>
        <input type="email" name="email">

        <br><br>

        <label>Senha:</label>
        <input type="password" name="senha">



        <br><br>

        <button type="submit">Entrar</button>

    </form>

</body>
</html>