<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exercicio 03</title>
<style>
* { box-sizing: border-box; }
html { font-size: 14px; }
body { font-family: 'Segoe UI', 'Verdana'; }
</style>
</head>

<body>
<h1>Exercício 03 - If</h1>
<hr>

<p>Montar um script PHP com a lógica a seguir:</p>

<ul>
	<li>Se o salário for menor que 500, aplicar 15% de reajuste.</li>
	<li>Senão, se o salário for menor ou igual a 1000, aplicar 10% de reajuste.</li>
	<li>Senão aplicar 5% de reajuste.</li>
</ul>

<p>Mostrar no HTML o valor antigo do salário e o novo valor do salário reajustado.</p>

<p><i>Dica: para calcular o reajuste, multiplique o salário por 1.15 (15%), 1.10 (10%) e 1.05 (5%).</i></p>

<hr>
<?php
$salario=3000;
if($salario<500){
	$reajuste=$salario*1.15;
}elseif($salario<=1000){
	$reajuste=$salario*1.10;
}else{
	$reajuste=$salario*1.05;
}
?>
<p>salário: <?=$salario?></p>
<p>salário com reajuste: <?=$reajuste?></p>


</body>
</html>