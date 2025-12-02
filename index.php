<?php
define('ROOT_PATH', __DIR__); 
$BASE_PATH = ROOT_PATH . '/src';

$sub_diretorio_base = '/Projeto-DesenvWeb'; 

$uri = $_SERVER['REQUEST_URI'];
$caminho = parse_url($uri, PHP_URL_PATH);

// Remove o nome da pasta base da URL
if (str_starts_with($caminho, $sub_diretorio_base)) {
    $caminho = substr($caminho, strlen($sub_diretorio_base));
}

// Quebra rota
$rotas = explode('/', trim($caminho, '/'));
$rota_principal = array_shift($rotas);

// Início das rotas
switch ($rota_principal) {

    case '':
        include $BASE_PATH . '/Views/Home.php';
        break;

    case 'login':
        include $BASE_PATH . '/Views/login.php';
        break;

    case 'dashboard':
        include $BASE_PATH . '/Views/dashboard.php';
        break;
        
    case 'api-produtos':
    include $BASE_PATH . '/app/produtoApi.php';
    break;

    case 'produtos':
        $acao = $rotas[0] ?? '';

        switch ($acao) {

            case 'cadastrar':
                include $BASE_PATH . '/Views/produtoCadastro.php';
                break;

            case 'salvar':
                include $BASE_PATH . '/app/produtoController.php';
                salvarProduto();
                break;

            case 'excluir':
                include $BASE_PATH . '/app/produtoController.php';
                excluirProduto();
                break;

            default:
                include $BASE_PATH . '/Views/produtos_lista.php';
                break;
        }
        break;

    default:
        http_response_code(404);
        include $BASE_PATH . '/Views/404.php';
        break;
}
