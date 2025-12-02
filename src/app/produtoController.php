<?php

require_once __DIR__ . "/conexao.php";

function salvarProduto() {
    global $pdo;

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo "Método não permitido!";
        exit;
    }

    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    $descricao = $_POST['descricao'] ?? '';
    $image_url = $_POST['image_url'] ?? '';

    try {
        $sql = "INSERT INTO produtos (image_url, nome, preco, descricao)
                VALUES (:img, :nome, :preco, :desc)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':img', $image_url);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':preco', $preco);
        $stmt->bindValue(':desc', $descricao);

        $stmt->execute();

        header("Location: /Projeto-DesenvWeb/produtos/cadastrar?sucesso=1");
        exit;

    } catch (Exception $e) {
        echo "Erro ao salvar o produto: " . $e->getMessage();
        exit;
    }
}
