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
    $sql = "INSERT INTO fabricantes(nome) VALUES('$nome')";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function lerUmFabricante($conexao, $id){
    // montagem do comando SQL com parâmetro id
    $sql = "SELECT id, nome FROM fabricantes WHERE id = $id";

    // execução do comando e armazenamento do resultado
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // retornando para fora da função o resultado como array associativo
    return mysqli_fetch_assoc($resultado);
}

function atualizarFabricante($conexao, $id, $nome){
    $sql = "UPDATE fabricantes SET nome = '$nome' WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function excluirFabricante($conexao, $id){
    $sql = "DELETE FROM fabricantes WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}