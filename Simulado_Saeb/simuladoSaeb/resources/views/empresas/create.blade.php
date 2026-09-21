<!DOCTYPE html>
<html>
<head>
    <title>Nova Empresa</title>
</head>
<body>

    <h1>Nova Empresa</h1>

    <form action="/empresas" method="POST">

        @csrf

        <label>Nome:</label>
        <input type="text" name="nome">

        <br><br>

        <label>CNPJ:</label>
        <input type="text" name="cnpj">

        <br><br>

        <label>Telefone:</label>
        <input type="text" name="telefone">

        <br><br>

        <label>E-mail:</label>
        <input type="email" name="email">

        <br><br>

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <br>

    <a href="/empresas/listar">
        Voltar
    </a>

</body>
</html>