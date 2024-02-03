<?php require "../includes/funcoes-fabricantes.php"; 
$fabricantes = lerFabricantes($conexao);
/* echo "<pre>";
var_dump($fabricantes);
echo "</pre>";
var_dump mostra todas os dados do array */
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Fabricantes | SELECT - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <h1>SELECT - CRUD com PHP e MySQL - <a href="../index.php">Home</a></h1>
    <p><i>Lendo e carregando <b>todos os fabricantes</b></i></p>
    <hr>
    <?php 
    // loop para mostrar todos os dados que estavam dentro da variável fabricantes
    foreach($fabricantes as $fabricante){ ?>
        <div>
            <p>ID: <?=$fabricante['id']?></p>
            <p>Nome: <?=$fabricante['nome']?></p>
            <p>
            <!-- Link com parâmetro ? + parâmetro exemplo: ?id 
            
            falei que o id vai ser igual ao fabricante


            ?id = $fabricante['id']
            trouxe o id do array fabricante
            -->
                <a href="atualizar.php?id=<?=$fabricante['id']?>">Atualizar</a> - 
                <a href="excluir.php?id=<?=$fabricante['id']?>">Excluir</a>
            </p>
        </div>
        <hr>
    <?php } ?>    

    <p><a href="../index.php">Voltar ao início</a></p>
</div>


</body>
</html>