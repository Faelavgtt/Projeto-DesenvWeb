<?php
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . '/..');
}

require_once(ROOT_PATH . '/src/app/conexao.php');


$sql = "SELECT id, nome, preco FROM produtos ORDER BY id DESC LIMIT 4";
$stmt = $pdo->query($sql);

// 2. Executa a consulta e pega todos os resultados
$produtos_recentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Define um status padrão (você pode precisar de uma coluna 'status' no BD real para ser preciso)
function getStatusBadge($id) {
    if ($id % 3 == 0) return ['label' => 'Vendido', 'class' => 'status-sold'];
    if ($id % 2 == 0) return ['label' => 'Pendente', 'class' => 'status-pending'];
    return ['label' => 'Ativo', 'class' => 'status-active'];
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="/Projeto-DesenvWeb/src/public/assets/css/dashboard.css">
    <link rel="shortcut icon" href="/Projeto-DesenvWeb/src/public/assets/img/logoMagicArt.svg" type="image/x-icon">

</head>
<body class="dashboard-body">

    <aside class="sidebar">
        <h2>Painel Admin</h2>
        <ul>
            <li><a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Usuários</a></li>
            <li><a href="#"><i class="fas fa-car"></i> Produtos</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
        </ul>
    </aside>

    <div class="main-content">
        <h1>Produtos Recentes</h1>

        

       <div class="products-table-container">
        <h3>Produtos Recentes</h3>
        <table class="products-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>Preço</th>
                    <th>Status</th>
                    </tr>
            </thead>
            <tbody>
                <?php 
                // 3. Loop para exibir os dados
                foreach ($produtos_recentes as $produto): 
                    $status = getStatusBadge($produto['id']);
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($produto['id']); ?></td>
                    <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                    <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                    <td><span class="status-badge <?php echo $status['class']; ?>"><?php echo $status['label']; ?></span></td>
                </tr>
                <?php endforeach; ?>
                
                <?php if (empty($produtos_recentes)): ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Nenhum produto encontrado.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
        
    </div>
</body>
</html>