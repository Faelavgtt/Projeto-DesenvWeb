<?php
session_start();
require_once ROOT_PATH . '/src/app/conexao.php';

// PROCESSAMENTO DO LOGIN DEVE VIR ANTES DO HTML
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $senha = $_POST['password'];

    $sql = "SELECT senha FROM usuario WHERE email = :email";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {

            if ($senha === $usuario['senha']) {

                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;

                header("Location: /Projeto-DesenvWeb/dashboard");
                exit;

            } else {
                $_SESSION['erro_login'] = "Senha incorreta.";
            }

        } else {
            $_SESSION['erro_login'] = "Email não cadastrado.";
        }

    } catch (PDOException $e) {
        $_SESSION['erro_login'] = "Erro ao processar o login: " . $e->getMessage();
    }

    header("Location: /Projeto-DesenvWeb/login");
    exit;
}
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

        <form action="/Projeto-DesenvWeb/login" method="POST">
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

        <?php if (isset($_SESSION['erro_login'])): ?>
            <p style="color:red; margin-top: 15px;"><?= $_SESSION['erro_login']; ?></p>
            <?php unset($_SESSION['erro_login']); ?>
        <?php endif; ?>

    </div>
</body>
</html>
