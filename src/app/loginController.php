<?php
session_start();
require_once ROOT_PATH . '/src/app/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $senha = $_POST['password'];

    $sql = "SELECT senha, nome FROM usuarios WHERE email = :email";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {

            if (password_verify($senha, $usuario['senha'])) {

                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;


                header("Location: /Projeto-DesenvWeb/dashboard");
                exit;
            } else {
                $erro = "Senha incorreta.";
            }

        } else {
            $erro = "Email não cadastrado.";
        }

    } catch (PDOException $e) {
        $erro = "Erro ao processar o login: " . $e->getMessage();
    }
}

if (isset($erro)) {
    $_SESSION['erro_login'] = $erro;
    header("Location: /Projeto-DesenvWeb/login");
    exit;
}
?>
