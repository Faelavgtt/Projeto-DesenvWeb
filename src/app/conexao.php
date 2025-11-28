<?php

$servidor = "localhost"; 
$usuario = "root"; 
$senha = "";
$banco_de_dados = "magicart";

$conn = new mysqli($servidor, $usuario, $senha, $banco_de_dados);


if ($conn->connect_error) {
   
    die("A conexão falhou: " . $conn->connect_error);
}


echo "Conexão bem-sucedida!";

?>