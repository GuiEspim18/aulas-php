<?php
require "../includes/funcoes-produtos.php";
$produtos = lerProdutos($conexao);
// Teste simples com var_dump
/* echo "<pre>";
var_dump($produtos);
echo "</pre>"; */
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Produtos | SELECT - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <h1>SELECT - CRUD com PHP e MySQL - <a href="../index.php">Home</a></h1>
    <p><i>Lendo e carregando <b>todos os produtos</b></i></p>

    <?php foreach($produtos as $produto){ ?>
        <div>
            <p>Fabricante: <?=$produto['fabricante']?></p>
            <p>Nome: <?=$produto['nome']?></p>
            <p>Descrição: <?=$produto['descricao']?></p>
            <p>
                <a href="atualizar.php?id=<?=$produto['id']?>">Atualizar</a> - 
                <a href="excluir.php?id=<?=$produto['id']?>">Excluir</a>
            </p>
        </div>
        <hr>    
    <?php } ?>

    <p><a href="../index.php">Voltar ao início</a></p>
</div>


</body>
</html>