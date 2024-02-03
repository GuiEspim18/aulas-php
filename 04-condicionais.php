<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condicionais no PHP</title>
</head>
<body>
    <h1>Trabalhando com condicionais no PHP</h1>
    <hr>

    <h2>Condicionais Simples</h2>
    <?php
    $numero = 10;
    if($numero > 5){
        echo "<p>$numero é maior que 5!</p>";
    }
    ?>
    <!-- Versão 2: Intercalando php e html -->
    <!-- Intercalei o if com html e php -->
    <?php
    $numero = 10;
    if($numero > 5){
    ?>
        <p><?=$numero?> é maior que 5!</p>
        <!-- precisa colocar a chave fechada sozinha -->
    <?php
    }
    ?>
    <h2>Condicional composta</h2>
    <?php
    $produto = "Notebook";
    $qtdEmEstoque = 50; // o que temos no momento
    $qtdCritica = 15; // mínimo necessário
    $qtd = $qtdEmEstoque - $qtdCritica;

    echo "<h3>Produto: $produto</h3>";
    if ($qtdEmEstoque < $qtdCritica) {
       echo "<p>Necessário repor!</p>";
       echo "<p>Está faltando $qtd</p>";
    } else {
        echo "<p>Não é necessário repor.</p>";
        echo "<p>Está sobrando $qtd</p>";
    }
    ?>

<?php
    $produto = "Notebook";
    $qtdEmEstoque = 100; // o que temos no momento
    $qtdCritica = 15; // mínimo necessário
    $qtd = $qtdEmEstoque - $qtdCritica;
?>
    <h3>Produto: <?=$produto?></h3>
<?php if ($qtdEmEstoque < $qtdCritica) { ?>
       <p>Necessário repor!</p>
       <p>Está faltando $qtd</p>
<?php } else { ?>
        <p>Não é necessário repor.</p>
        <p>Está sobrando <?=$qtd?></p>
<?php } ?>

<h2>Condicional Encadeada</h2>
<?php
    /* Opções válidas
    1 -> pedido de informações
    2 -> fazer reclamação
    3 -> fazer elogio
    qualquer outra coisa -> falar com atendente */
    $opcao = 4;
    if($opcao == 1){ ?>
        <p>Ok ! Que informação você precisa?</p>
    <?php }elseif( $opcao == 2){ ?>
        <p>Puxa, que pena! Mas pode falar!</p>
    <?php }elseif($opcao == 3){ ?>
        <p>Legal! O que deseja elogiar?</p>
    <?php }else{ ?>
        <p>Ok, vou te transferir...</p>
    <?php } ?>

    <hr>
<!-- Outra forma de fazer essa extrutura de uma forma mais fácil -->
<?php $opcao = 4;
    if($opcao == 1){
        $texto = "Ok ! Que informação você precisa?";
    }elseif( $opcao == 2){
        $texto = "Puxa, que pena! Mas pode falar!";
    }elseif($opcao == 3){
        $texto = "Legal! O que deseja elogiar?";
    }else{
        $texto = "Ok, vou te transferir...";
} 
?>
<!-- Quando chegar aqui em baixo a variável texto já existe e ela vai aparecer dentro do p -->
<p> <?=$texto?></p>

<!-- Podemos usar o switch também -->
<?php $opc = 3;
   switch($opc){
        case 1: 
            $texto = "Ok ! Que informação você precisa?";
        break;
        case 2:
            $texto = "Puxa, que pena! Mas pode falar!";
        break;
        case 3:
            $texto = "Legal! O que deseja elogiar?";
        break;
        default:
            $texto = "Ok, vou te transferir...";
        break;
   }
?>
<p> <?=$texto?></p>
</body>
</html>