<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exercicio 04</title>
<style>
* { box-sizing: border-box; }
html { font-size: 14px; }
body { font-family: 'Segoe UI', 'Verdana'; }
</style>
</head>

<body>
<h1> Exercicio 05 (loop)</h1>
<hr>

<p>Montar uma lista não-ordenada de 25 itens utilizando um laço de repetição do PHP.</p>
<p>Exiba em cada item da lista o valor da variável de controle.</p>
<hr>
<ul>
    <?php
    $control=1;
    while($control<=25){
        $item = "item$control";?>
        <li><?=$item?></li>
        <?php $control++;
    }
    ?>
</ul>

</body>
</html>