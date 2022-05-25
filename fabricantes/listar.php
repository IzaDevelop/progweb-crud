<?php
require "../includes/funcoes-fabricantes.php";
$listaDeFabricantes = lerFabricantes($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Fabricantes | SELECT - CRUD com PHP e MySQL </title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

<!-- Meu CSS -->
<!-- <link href="../css/style.css" rel="stylesheet"> -->

<!-- Customização de uma classe do bootstrap -->
<style>
    .btn-outline-primary:hover {
        background-color: darkblue;
    }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">XYZ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-link active" href="../index.php">Home <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="../fabricantes/listar.php">Fabricantes</a>
        <a class="nav-link" href="../produtos/listar.php">Produtos</a>
        </div>
    </div>
    </nav>

<div class="container">
    <h1 class="text-center">Fabricantes | SELECT -
    <a href="../index.php">Home</a> </h1>
</div>
      

<div class="container">
    
    <h2 class="text-muted">Lendo e carregando todos os fabricantes</h2>
    <p><a class="btn btn-outline-primary btn-lg" href="inserir.php">Inserir</a></p>    

    <table class="table table-striped table-secondary table-bordered">
        <caption> Lista de Fabricantes </caption>
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Operação</th>
            </tr>
        </thead>
                
        <tbody>
        <?php foreach($listaDeFabricantes as $fabricante){ ?>
            <tr>
                <td><?=$fabricante["id"]?></td>
                <td><?=$fabricante["nome"]?></td>
                <td>
                    <!-- link dinamico/link com parametro -->
                    <a class="btn btn-warning text-reset" href="atualizar.php?id=<?=$fabricante["id"]?>">Atualizar</a> <a class="btn btn-danger text-reset" href="excluir.php?id=<?=$fabricante["id"]?>">Excluir</a>
                </td>
            </tr>
        <?php } //opcional require "../includes/desconcta.php"; 
        ?>
        </tbody>
    </table>
 </div>
<!-- Jquery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>