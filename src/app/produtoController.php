<?php
require_once ROOT_PATH . "/src/app/conexao.php";

function salvarProduto() {
    global $pdo;

    $uploadDir = ROOT_PATH . "/src/public/uploads/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

 
    if (!empty($_FILES['imagem']['name'])) {
        $nomeArquivo = time() . "_" . basename($_FILES['imagem']['name']);
        $caminhoCompleto = $uploadDir . $nomeArquivo;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
            $image_url = "/Projeto-DesenvWeb/src/public/uploads/" . $nomeArquivo;
        } else {
            die("Erro ao fazer upload da imagem.");
        }
    }

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO produtos (image_url, nome, preco, descricao) 
            VALUES (:image_url, :nome, :preco, :descricao)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":image_url", $image_url);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":descricao", $descricao);

    $stmt->execute();

    header("Location: /Projeto-DesenvWeb/produtos");
    exit;
}
