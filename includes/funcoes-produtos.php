<?php
// funcoes-produtos.php
require "conecta.php";

function lerProdutos($conexao){
    $sql = "SELECT id, nome, preco, quantidade, descricao, fabricantes_id
    FROM produtos ORDER BY nome";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    
    $produtos = [];

    while($produto = mysqli_fetch_assoc($resultado)){
        array_push($produtos, $produto);
    }

    return $produtos;
}

//teste
// var_dump(lerProdutos($conexao));

function inserirProduto($conexao, $nome){
    $sql = "INSERT INTO produtos(nome) VALUES('$nome')";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function lerUmProduto($conexao, $id){
    $sql = "SELECT id, nome FROM produtos WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado);
}

function atualizarProduto($conexao, $id, $nome){
    $sql = "UPDATE produtos SET nome = '$nome' WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function excluirProduto($conexao, $id){
    $sql = "DELETE FROM produtos WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}