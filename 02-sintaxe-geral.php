<!-- O php suporta html -->
<!-- Para poder colocar um comando php no html o arquivo precisa ser .php -->
<!DOCTYPE html>
<html lang="en">
<head>

    <?php $cor = "blue";?>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sintaxe geral</title>
    <style>
        h1{
            color: <?=$cor?>;
        }
        .destaque{
            background-color: purple;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Conhecendo PHP</h1>
    <hr>

<!-- script/programa php execulta apenas no servidor no SERVER (localhost) -->
<?php
    /* Variável em php */
    /* Uma varoável php é declarada com um $+o nome dela, tipo: */
    $escola = "Senac";
    $anoLetivo = 2021;
    $aluno = "Guilherme";
    $idade = 19;
    
    // Para dar uma saída de dados precisa usar o comando echo

    // Saída direta na tag ou bloco php
    // precisa colocar a tag envolvida em áspas com as tags e dentro delas o valor da váriavel
    echo "<h2 class='destaque'>$escola</h2>";
    echo '<p><b>$anoLetivo</b></p>'; /* Ele não vai interpretar a váriavel */
    echo "<p><b class='destaque'>$anoLetivo</b></p>";
?>
    <!-- Saídas intercalando PHP e HTML -->
    <p class="destaque">Olá! Me chamo <?php echo $aluno;?>, tenho <?php echo $idade?> anos e estudo no <?php echo $escola?>.<!-- Essa tag php está vindo do servidor php (código backend) --></p>

    <!-- Ou podemos fazer da seguinte forma -->

    <p>Olá! Me chamo <span class="destaque"><?= $aluno?></span>, tenho <span class="destaque"><?= $idade?></span> anos e estudo no <span class="destaque"><?= $escola?></span>.</p>

    <ul>
        <li>Escola: <?= $escola?></li>
        <li>Ano Letivo: <?= $anoLetivo?></li>
    </ul>

        <?php
            /* Variável */
            $livro = "Senhor dos Anéis";

            /* Constante */
            define("FILME", "Vingadores: Ultimato");
            echo FILME;
        ?>

        <p>Melhor FILME do mundo: <?=FILME?></p>
    <script>console.log("Oi :)")</script>
</body>
</html>


