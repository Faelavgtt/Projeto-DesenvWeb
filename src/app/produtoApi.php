<?php
header("Content-Type: application/json");

require_once __DIR__ . "/conexao.php";

try {
    $sql = "SELECT 
                image_url AS image, 
                nome AS name, 
                preco AS price, 
                descricao AS `desc`
            FROM produtos";

    $stmt = $pdo->query($sql);
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($produtos);
    exit;

} catch (Exception $e) {
    echo json_encode(["erro" => $e->getMessage()]);
    exit;
}
