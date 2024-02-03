<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exercicio 02</title>
<style>
* { box-sizing: border-box; }
html { font-size: 14px; }
body { font-family: 'Segoe UI', 'Verdana'; }
</style>
</head>

<body>
<h1>Exercício 02 - Arrays</h1>
<hr>

<p>Crie um array para armazenar os dados fictícios: <em>nome de usuario</em>, <em>senha</em>, <em>idade</em>, <em>sexo</em> e <em>cidade</em>.</p>
<p>Em seguida, mostre  os valores de "nome de usuario", "idade" e "sexo" em uma lista ordenada.</p>
<p>Destaque estas informações com CSS.</p>
<hr>
<?php 
$dados= [
    "username" => "GuiEspim",
    "senha" => "senha1234",
    "idade" => 19,
    "sexo" => "masculino"
];
?>
<p>username: <?=$dados["username"]?></p>
<p>idade: <?=$dados["idade"]?>anos</p>
<p>sexo: <?=$dados["sexo"]?></p>
</body>
</html>