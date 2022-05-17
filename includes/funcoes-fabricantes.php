<?php
// funcoes-fabricantes.php
require "conecta.php";

function lerFabricantes($conexao){
    // 1) montar a string do comando SQL
    $sql = "SELECT id, nome FROM fabricantes";

    // 2) executar o comando (select)
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // 3) criar um array vazio para receber os resultados
    $fabricantes = []; // se tornara a matriz

    // 4) loop interado com cada resultado e a cada fabricante que for localizadom, é acresecentado ao array fabricantes 
    while($fabricante = mysqli_fetch_assoc($resultado)){
        // array_push(nome do array principal (matriz), nome do array individual)
        array_push($fabricantes, $fabricante);
    }

    // 5) retornando para fora da função os fabricantes localizados
    return $fabricantes; //lista de fabricantes matriz
}

//teste
// var_dump(lerFabricantes($conexao));

function inserirFabricante($conexao, $nome){
    $sql = "INSERT INTO FABRICANTES(nome) VALUES('$nome')";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}