<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays no php</title>
</head>
<body>
    <h1>Trabalhando com Arrays (vetores/metrizes)</h1>
    <hr>
    <!-- Duas maneiras de trabalhar com arrays em php -->

    <h2>Arrays com índice numérico</h2>
<?php
    // primeira forma
    $bandas[0] = "Slayer";
    $bandas[1] = "Iron Maiden";
    $bandas[2] = "Nightwish";

    // Segunda forma
    $curso = array("HTML5", "Node.JS", "Design Digital", "PHP");

    // Tercieira forma
    $comidas = ["Pastel", "Lasanha", "Ravioli", "Cuscuz"];
?>

<!-- Acessando dados dos arrays -->
<p>
    Adoro a banda <?=$bandas[1]?>, estou estudando <?=$curso[3]?> e vou almoçar <?=$comidas[2]?>.
</p>
<p>
    <pre>
    <?=var_dump($bandas)?> <!-- Vai mostrar o array no documento php para testes -->
    </pre>
</p>
    <pre>
        <?=print_r($bandas)?>
    </pre>
<h2>Arrays associativos</h2>
<?php
    // essa forma é bem parecida com um ojeto
    //primeira forma
    $pedido['codigo'] = "123abc";
    $pedido['produto'] = "TV Led LG";
    $pedido['prazo'] = 7;
    $pedido['valor'] = 1599.99;
    
    // segunda forma
    $curso = array(
        "nome" => "Porgramador Web",
        "modalidade" => "remoto",
        "carga_horaria" => 240
    );
    /* Nome recebe Porgramado Web, modalidade recebe remoto, carga_horaria recebe 240 */

    // terceira forma
    $livro = [
        "titulo" => "Senhor dos Anéis",
        "ano" => 1954
    ];
?>
<!-- Acessando os dados dos arrays associativos -->

<p>Comprei o produto <?=$pedido['produto']?> e o prazo de entrega é de <?=$pedido['prazo']?> dias úteis</p>

<pre>
    <?=var_dump($livro)?>
    <?=var_dump($curso)?>
</pre>
</body>
</html>