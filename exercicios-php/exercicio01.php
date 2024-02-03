<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exercicio 01</title>
<style>
* { box-sizing: border-box; }
html { font-size: 14px; }
body { font-family: 'Segoe UI', 'Verdana'; }
</style>
</head>
<body>
<h1>Exercício 01 - Criar variáveis e/ou constantes para:</h1>
<hr>

<ul>
	<li>Data de hoje</li>
	<li>Nome de uma pessoa</li>
	<li>Nome de um curso que esta pessoa faz</li>
	<li>Carga horária deste curso</li>
	<li>Limite de faltas*</li>
</ul>

<p>Coloque dados nestas variáveis e faça com que o script mostre no HTML uma mensagem apresentando o nome da pessoa, o nome do curso, a carga horária do curso e o limite de faltas. </p>

<p><i>Dica: Para calcular o valor do limite de faltas, você pode fazer carga horária multiplicada por 0.25 ou dividindo carga horária por 4.</i></p>

<hr>
<?php
	$data="17/05/2021";
	$nome="Guilherme Monteiro Espim";
	define("CURSO", "Programador Web");
	define("CARGA", 240);
	define("LIMFALTAS", CARGA*0.25);
?>
<p>data: <?=$data?></p>
<p>nome: <?=$nome?></p>
<p>curso: <?=CURSO?></p>
<p>carga horária: <?=CARGA?></p>
<p>limite de faltas: <?=LIMFALTAS?></p>

</body>
</html>