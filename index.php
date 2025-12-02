<?php
define('ROOT_PATH', __DIR__); 

$sub_diretorio_base = '/Projeto-DesenvWeb'; 

$uri = $_SERVER['REQUEST_URI'];
$caminho = parse_url($uri, PHP_URL_PATH);


if (str_starts_with($caminho, $sub_diretorio_base)) {
    $caminho = substr($caminho, strlen($sub_diretorio_base));
}

$rotas = explode('/', trim($caminho, '/'));
$rota_principal = array_shift($rotas);

$BASE_PATH = __DIR__ . '/src';

switch ($rota_principal) {
    
    case '':
        include $BASE_PATH . '/Views/Home.php';
        break;

    case 'login':
        include $BASE_PATH . '/Views/login.php';
        break;

    case 'produtos':
    $acao = $rotas[0] ?? '';

    switch ($acao) {

        case 'cadastrar':
            include $BASE_PATH . '/Views/produtos_cadastro.php';
            break;

        case 'salvar':
            include $BASE_PATH . '/controllers/ProdutoController.php';
            salvarProduto();
            break;

        case 'excluir':
            include $BASE_PATH . '/controllers/ProdutoController.php';
            excluirProduto();
            break;

        default:
            include $BASE_PATH . '/Views/produtos_lista.php';
            break;
    }
    break;

    case 'dashboard':
        include $BASE_PATH . '/views/dashboard.php';
        break;

    default:
        header("HTTP/1.0 404 Not Found");
        include $BASE_PATH . '/views/404.php';
        break;
}
