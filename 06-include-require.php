<?php include "includes/recursos.php"; ?> <!-- Fiz uma inclusão no meu documento html do meu documento php -->
<!-- Se usa o require quando tem os recursos importantes para a página -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>include e require</title>
</head>
<body>
    <h1>Trabalhando com inclusões de recursos</h1>
    <hr>
    <!-- A partir deste ponto, exibir dados dinâmicos provenientes de outro arquivo -->

    <p>Estamos estudando no <?=ESCOLA?> fazendo o curso de <?=$curso?>.</p>

    <h2>Tecnologias estudadas</h2>
    <ul>
    <?php foreach($tecnologias as $tecnologia){ ?>
        <li><?=$tecnologia?></li>
    <?php } ?>
    </ul>

    <hr>

    <div>
        <h2>Conteúdo/Texto abaixo foi carregado a partir de include</h2>
        <p> <?php include "includes/textos.html"; ?></p>
    </div>
</body>
</html>