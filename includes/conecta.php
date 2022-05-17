<?php 
// parâmetros do servidor BD
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vendas_izabelle";

// conectando ao servidor 
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// habilitando suporte ao charset utf8
mysqli_set_charset($conexao, "utf8");

// teste
/* if ($conexao) {
    echo "Tudo ok";
} */