<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loops PHP</title>
</head>
<body>
    <h1>Trabalhando com loops no PHP</h1>
    <hr>
    <h2>While (ENQUANTO)</h2>
    <ol>
    <?php
        $i =1;
        while($i <= 5){?>
            <li>Variável i: <?=$i?></li>
            <?php $i++;
        }?>
    </ol>

    <hr>

    <h2>DO/WHILE (FAÇA/ENQUANTO)</h2>
    <section>
        <h3>Lorem ipsum dolor</h3>
        <figure>
            <?php
            // O do/while é um loop que podemos garantir que funciona pelo menos uma vez
            $j = 1;
            do{ ?>
                <img src="https://picsum.photos/200/80?random=<?=$j?>" alt="imagem">                
                <?php $j++;
            }while($j <= 3); ?>
        </figure>
    </section>

    <hr>

    <h2>For (PARA)</h2>
    <?php
    for($i = 1; $i <= 10; $i++){
        echo $i;
    }

    $meses = ["janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"];

    ?>
    <!-- Mini-exercício:
    Exiba o nome de cada mês dentro de um item em uma lista não ordenada -->
    <br><br> 
    <ul>
        <?php
        $qtdMeses = count($meses);
        for($control = 0; $control < $qtdMeses; $control++){ ?>
            <li><?=$meses[$control]?></li>
        <?php } ?>
    </ul>

    <hr>
    <h2>FOREACH (PARA CADA)</h2>
    <ol>
        <?php foreach($meses as $mes){ ?> <!-- Loop com váriavel de acesso -->
            <li><?=$mes?></li>
        <?php } ?>
    </ol>
</body>
</html>