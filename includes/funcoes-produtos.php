<?php
// funcoes-produtos.php
require "conecta.php";

function lerProdutos($conexao){
    // $sql = "SELECT id, nome, preco, quantidade, descricao, fabricantes_id
    // FROM produtos ORDER BY nome";

    $sql = "SELECT produtos.id, produtos.nome AS produto, produtos.preco, produtos.quantidade, produtos.descricao, fabricantes.nome AS fabricante
    FROM produtos INNER JOIN fabricantes
    ON produtos.fabricantes_id = fabricantes.id ORDER BY produto";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    
    $produtos = [];

    while($produto = mysqli_fetch_assoc($resultado)){
        array_push($produtos, $produto);
    }

    return $produtos;
}

//teste
// var_dump(lerProdutos($conexao));

function inserirProduto($conexao, $nome, $preco, $quantidade, $descricao, $fabricanteId){
    $sql = "INSERT INTO produtos(nome, preco, quantidade, descricao, fabricantes_id) VALUES('$nome', $preco, $quantidade, '$descricao', $fabricanteId)";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function lerUmProduto($conexao, $id){
    $sql = "SELECT id, nome, preco, quantidade, descricao, fabricantes_id FROM produtos WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado);
}

function atualizarProduto($conexao, $id, $nome, $preco, $quantidade, $descricao){
    $sql = "UPDATE produtos SET nome = '$nome', preco = $preco, quantidade = $quantidade, descricao = '$descricao' WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function excluirProduto($conexao, $id){
    $sql = "DELETE FROM produtos WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}