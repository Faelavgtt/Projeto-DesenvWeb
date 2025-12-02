<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MagicArt</title>

    <link rel="shortcut icon" href="/Projeto-DesenvWeb/src/public/assets/img/logoMagicArt.svg" type="image/x-icon">
    <link rel="stylesheet" href="/Projeto-DesenvWeb/src/public/assets/css/login.css">
</head>

<body class="login-body">
    <div class="login-container">
        <h2>Entrar</h2>

 
        <form action="/Projeto-DesenvWeb/dashboard" method="POST">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required> 
            </div>

            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="login-button">Acessar</button>
        </form>

        <div class="login-links">
            <a href="#">Esqueceu a Senha?</a>
            <a href="#">Cadastrar-se</a>
        </div>

        <!-- MOSTRA ERRO DO LOGIN -->
        <?php if (isset($_SESSION['erro_login'])): ?>
            <p style="color:red; margin-top: 15px;">
                <?= $_SESSION['erro_login']; ?>
            </p>
            <?php unset($_SESSION['erro_login']); ?>
        <?php endif; ?>

    </div>
</body>
</html>
