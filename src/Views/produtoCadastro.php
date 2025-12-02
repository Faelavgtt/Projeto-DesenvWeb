<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="/Projeto-DesenvWeb/src/public/assets/css/produtoCadastro.css">

</head>
<body>

<h1>Cadastrar Produto</h1>

<form action="/Projeto-DesenvWeb/produtos/salvar" method="POST" enctype="multipart/form-data">

    <label>Imagem do Produto</label><br>
    <input type="file" name="imagem" accept="image/*" required><br><br>

    <label>Nome</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Preço</label><br>
    <input type="number" name="preco" step="0.01" required><br><br>

    <label>Descrição</label><br>
    <textarea name="descricao"></textarea><br><br>

    <button type="submit">Salvar</button>

</form>

<a href="/Projeto-DesenvWeb/produtos">Voltar</a>

</body>
</html>
