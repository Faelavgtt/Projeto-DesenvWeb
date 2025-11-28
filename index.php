<?php

$sub_diretorio_base = '/Projeto-DesenvWeb'; 


$uri = $_SERVER['REQUEST_URI'];

$caminho = parse_url($uri, PHP_URL_PATH);


if (str_starts_with($caminho, $sub_diretorio_base)) {
    $caminho = substr($caminho, strlen($sub_diretorio_base));
}


$rotas = explode('/', trim($caminho, '/'));


$rota_principal = array_shift($rotas); 



switch ($rota_principal) {
    
    case '':
        // URL: http://localhost/Projeto-DesenvWeb/
        include 'views/home.php';
        break;

    case 'produtos':
        // ...
        $sub_rota = array_shift($rotas);
        
        if ($sub_rota === 'detalhes') {
            // ...
            $id = array_shift($rotas);
            include 'controllers/ProdutoController.php';
        } else {
            // ...
            include 'views/produtos_lista.php';
        }
        break;

    case 'contato':
        // ...
        include 'views/contato.php';
        break;

    default:
        header("HTTP/1.0 404 Not Found");
        include 'views/404.php';
        break;
}

