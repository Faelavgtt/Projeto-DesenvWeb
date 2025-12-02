<?php
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . '/..');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>

    <link rel="stylesheet" href="/Projeto-DesenvWeb/src/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/Projeto-DesenvWeb/src/public/assets/css/home.css">

    <style>
        .main-content {
            padding: 40px;
            font-family: "Poppins";
        }

        .titulo-pagina {
            font-size: 45px;
            color: var(--mainTextColor);
            margin-bottom: 30px;
            font-family: Baby;
            letter-spacing: 2px;
        }

        .form-container {
            background: var(--secondaryColor);
            padding: 25px;
            border-radius: 20px;
            width: 500px;
            box-shadow: 0px 3px 6px rgba(0,0,0,0.1);
            font-family: "Poppins";
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 6px;
            color: var(--mainTextColor);
        }

        .form-group input,
        .form-group textarea {
            padding: 10px;
            border-radius: 10px;
            border: 1px solid var(--primaryDarkColor);
        }

        .btn-cadastrar {
            width: 100%;
            padding: 12px;
            background: var(--funPurple);
            color: #fff;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-cadastrar:hover {
            background: var(--funPink);
            transform: scale(1.03);
        }

        .mensagem-alerta {
            padding: 12px;
            background: #c8e6c9;
            border-left: 5px solid #2e7d32;
            color: #2e7d32;
            width: 400px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-family: "Poppins";
        }
    </style>

</head>

<body class="dashboard-body">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h2>Painel Admin</h2>
        <ul>
            <li><a href="/Projeto-DesenvWeb/dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Usuários</a></li>
            <li><a href="/Projeto-DesenvWeb/produtos/cadastrar" class="active"><i class="fas fa-car"></i> Produtos</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
        </ul>
    </aside>


    <!-- CONTEÚDO PRINCIPAL -->
    <div class="main-content">

        <h1 class="titulo-pagina">Cadastrar Produto</h1>

        <?php if (!empty($_GET['sucesso'])): ?>
            <div class="mensagem-alerta">Produto cadastrado com sucesso!</div>
        <?php endif; ?>

        <div class="form-container">
            <form action="/Projeto-DesenvWeb/produtos/salvar" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Nome do Produto:</label>
                    <input type="text" name="nome" required>
                </div>

                <div class="form-group">
                    <label>Preço:</label>
                    <input type="number" name="preco" step="0.01" required>
                </div>

                <div class="form-group">
                    <label>Descrição:</label>
                    <textarea name="descricao" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label>Imagem (URL ou upload futuramente):</label>
                    <input type="text" name="image_url">
                </div>

                <button class="btn-cadastrar">Cadastrar</button>
            </form>
        </div>

    </div>

</body>
</html>
